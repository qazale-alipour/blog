<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Database.php";
require_once BASE_PATH . "/admin-dashboard/Admin.php";

use Database\Database;

class Article extends Admin
{
    public function index()
    {
        $db = new Database();
        $articles = ($db->select("SELECT `articles`.*,`categories`.`name` AS cat_name, `users`.`username` AS user_name FROM `articles` LEFT JOIN `categories` ON `articles`.`cat_id` = `categories`.`id` LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` ORDER BY `id` DESC;"))->fetchAll();
        require_once BASE_PATH . "/template/admin/article/index.php";
    }

    public function create()
    {
        $db = new Database();
        $categories = ($db->select("SELECT * FROM `categories` ORDER BY `id` DESC;"))->fetchAll();
        require_once BASE_PATH . "/template/admin/article/create.php";
    }

    public function store($request)
    {
        $db = new Database();
        if ($request['cat_id'] != null) {
            $request['image'] = $this->saveImage($request['image'], 'articles');
            if ($request['image']) {
                $request = array_merge($request, array('user_id' => $_SESSION['user']));
                $db->insert('articles', array_keys($request), $request);
                $this->redirect('article');
            } else {
                $this->redirectBack();
            }
        } else {
            $this->redirectBack();
        }
    }

    public function show($id)
    {
        $db = new Database();
        $article = ($db->select("SELECT * FROM `articles` WHERE `id` = ?;", [$id]))->fetch();
        $categories = ($db->select("SELECT * FROM `categories` ORDER BY `id` DESC;"))->fetchAll();
        require_once BASE_PATH . "/template/admin/article/show.php";
    }

    public function edit($id)
    {
        $db = new Database();
        $article = ($db->select("SELECT * FROM `articles` WHERE `id` = ?;", [$id]))->fetch();
        $categories = ($db->select("SELECT * FROM `categories` ORDER BY `id` DESC;"))->fetchAll();
        require_once BASE_PATH . "/template/admin/article/edit.php";
    }

    public function update($request, $id)
    {
        $db = new Database();
        if ($request['cat_id'] != null) {
            if ($request['image']['tmp_name'] != null) {
                $article = ($db->select("SELECT * FROM `articles` WHERE `id` = ?;", [$id]))->fetch();
                $this->removeImage($article->image);
                $request['image'] = $this->saveImage($request['image'], 'articles');
            } else {
                unset($request['image']);
            }
            $request = array_merge($request, array('user_id' => $_SESSION['user']));
            $db->update('articles', array_keys($request), $request, $id);
            $this->redirect('article');
        } else {
            $this->redirectBack();
        }
    }

    public function delete($id)
    {
        $db = new Database();
        $db->delete('articles', $id);
        $this->redirectBack();
    }
}