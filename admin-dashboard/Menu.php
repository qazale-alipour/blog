<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Database.php";
require_once BASE_PATH . "/admin-dashboard/Admin.php";

use Database\Database;
use AdminDashboard\Admin;

class Menu extends Admin
{
    public function index()
    {
        $db = new Database();
        $menus = ($db->select("SELECT m.`name` AS parent_name,s.* FROM `menus` m RIGHT JOIN `menus` s on m.`id` = s.`parent_id` ORDER BY `id` DESC;"))->fetchAll();
        require_once BASE_PATH . "/template/admin/menu/index.php";
    }

    public function create()
    {
        $db = new Database();
        $menus = ($db->select("SELECT * FROM `menus` WHERE `parent_id` IS NULL;"))->fetchAll();
        require_once BASE_PATH . "/template/admin/menu/create.php";
    }

    public function store($request)
    {
        $db = new Database();
        $db->insert('menus', array_keys(array_filter($request)), array_filter($request));
        $this->redirect('menu');
    }

    public function show($id)
    {
        $db = new Database();
        $menus = ($db->select("SELECT * FROM `menus` WHERE `parent_id` IS NULL;"))->fetchAll();
        $menu = ($db->select("SELECT * FROM `menus` WHERE `id` = ?", [$id]))->fetch();
        require_once BASE_PATH . "/template/admin/menu/show.php";
    }

    public function edit($id)
    {
        $db = new Database();
        $menus = ($db->select("SELECT * FROM `menus` WHERE `parent_id` IS NULL;"))->fetchAll();
        $menu = ($db->select("SELECT * FROM `menus` WHERE `id` = ?", [$id]))->fetch();
        require_once BASE_PATH . "/template/admin/menu/edit.php";
    }

    public function update($request, $id)
    {
        $db = new Database();
        $db->update('menus', array_keys($request), $request, $id);
        $this->redirect('menu');
    }

    public function delete($id)
    {
        $db = new Database();
        $db->delete('menus', $id);
        $this->redirectBack();
    }
}