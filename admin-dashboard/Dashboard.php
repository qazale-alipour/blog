<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Database.php";
require_once BASE_PATH . "/admin-dashboard/Admin.php";

use Database\Database;
use AdminDashboard\Admin;

class Dashboard extends Admin
{
    public function index()
    {
        $db = new Database();
        $articles = ($db->select("SELECT `articles`.*,`categories`.`name` AS cat_name, `users`.`username` AS user_name FROM `articles` LEFT JOIN `categories` ON `articles`.`cat_id` = `categories`.`id` LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` ORDER BY `created_at` DESC LIMIT 0,10;"))->fetchAll();
        $comments = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `comments`.`user_id` = `users`.`id`) AS username, (SELECT `title` FROM `articles` WHERE `comments`.`article_id` = `articles`.`id`) AS titile FROM `comments` WHERE `status` = 'unseen' ORDER BY `created_at` DESC;"))->fetchAll();
        require_once BASE_PATH . "/template/admin/dashboard/index.php";
    }
}