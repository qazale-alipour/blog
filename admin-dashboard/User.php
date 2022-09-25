<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Database.php";
require_once BASE_PATH . "/admin-dashboard/Admin.php";

use Database\Database;
use AdminDashboard\Admin;

class User extends Admin
{
    public function index()
    {
        $db = new Database();
        $users = ($db->select("SELECT * FROM `users` ORDER BY `id` DESC;"))->fetchAll();
        require_once BASE_PATH . "/template/admin/user/index.php";
    }

    public function permission($id)
    {
        $db = new Database();
        $user = ($db->select("SELECT * FROM `users` WHERE `id` = ?", [$id]))->fetch();
        if ($user->permission == 'user')
            $db->update('users', ['permission'], ['admin'], $id);
        else
            $db->update('users', ['permission'], ['user'], $id);
        $this->redirectBack();
    }

    public function edit($id)
    {
        $db = new Database();
        $user = ($db->select("SELECT * FROM `users` WHERE `id` = ?", [$id]))->fetch();
        require_once BASE_PATH . "/template/admin/user/edit.php";
    }

    public function update($request, $id)
    {
        $db = new Database();
        $db->update('users', array_keys($request), $request, $id);
        $this->redirect('user');
    }

    public function delete($id)
    {
        $db = new Database();
        $db->delete('users', $id);
        $this->redirectBack();
    }
}