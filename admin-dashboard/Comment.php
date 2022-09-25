<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Database.php";
require_once BASE_PATH . "/admin-dashboard/Admin.php";

use Database\Database;
use AdminDashboard\Admin;

class Comment extends Admin
{
    public function index()
    {
        $db = new Database();
        $comments = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `comments`.`user_id` = `users`.`id`) AS username, (SELECT `title` FROM `articles` WHERE `comments`.`article_id` = `articles`.`id`) AS article_title FROM `comments` ORDER BY `id` DESC;"))->fetchAll();
        foreach ($comments as $comment) {
            if ($comment->status == 'unseen') {
                $db->update('comments', ['status'], ['seen'], $comment->id);
            }
        }
        require_once BASE_PATH . "/template/admin/comment/index.php";
    }

    public function show($id)
    {
        $db = new Database();
        $comment = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `comments`.`user_id` = `users`.`id`) AS username, (SELECT `title` FROM `articles` WHERE `comments`.`article_id` = `articles`.`id`) AS article_title FROM `comments` WHERE `id` = ?;", [$id]))->fetch();
        require_once BASE_PATH . "/template/admin/comment/show.php";
    }

    public function approved($id)
    {
        $db = new Database();
        $comment = ($db->select("SELECT * FROM `comments` WHERE `id` = ?;", [$id]))->fetch();
        if ($comment->status == 'approved')
            $db->update('comments', ['status'], ['seen'], $comment->id);
        else
            $db->update('comments', ['status'], ['approved'], $comment->id);
        $this->redirectBack();
    }
}