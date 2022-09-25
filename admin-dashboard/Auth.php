<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Database.php";

use Database\Database;

class Auth
{
    public function login()
    {
        require_once BASE_PATH . "/template/auth/login.php";
    }

    public function checkLogin($request)
    {
        if (empty($request['email']) or empty($request['password'])) {
            $this->redirectBack();
        } else {
            $db = new Database();
            $user = ($db->select("SELECT * FROM `users` WHERE `email` = ?;", [$request['email']]))->fetch();
            if ($user != null) {
                if (password_verify($request['password'], $user->password)) {
                    $_SESSION['user'] = $user->id;
                    $this->redirect('dashboard');
                } else {
                    $this->redirectBack();
                }
            } else {
                $this->redirectBack();
            }
        }
    }

    public function register()
    {
        require_once BASE_PATH . "/template/auth/register.php";
    }

    public function registerStore($request)
    {
        if (empty($request['email']) or empty($request['password'])) {
            $this->redirectBack();
        } elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            $this->redirectBack();
        } elseif (strlen($request['password']) < 8) {
            $this->redirectBack();
        } else {
            $db = new Database();
            $user = ($db->select("SELECT * FROM `users` WHERE `email` = ?;", [$request['email']]))->fetch();
            if ($user == null) {
                $request['password'] = $this->hash($request['password']);
                $db->insert('users', array_keys($request), $request);
                $this->redirect('login');
            } else {
                $this->redirectBack();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect('login');
    }

    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db = new Database();
            $user = ($db->select("SELECT * FROM `users` WHERE `id` = ?;", [$_SESSION['user']]))->fetch();
            if ($user != null) {
                if ($user->permission != 'admin') {
                    $this->redirect('home');
                }
            } else {
                $this->redirect('home');
            }
        }
    }

    protected function redirect($url)
    {
        header("Location: " . currentDomain() . "/blog/" . trim($url, "/"));
        exit();
    }

    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    protected function hash($string)
    {
        $hashString = password_hash($string, PASSWORD_DEFAULT);
        return $hashString;
    }
}