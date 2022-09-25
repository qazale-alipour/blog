<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Database.php";

use Database\Database;

class Home
{
    public function index()
    {
        $db = new Database();
        $setting = ($db->select("SELECT * FROM `websetting`;"))->fetch();
        $menus = ($db->select("SELECT *, (SELECT count(submenus.`id`) FROM `menus` submenus WHERE `menus`.`id` = submenus.`parent_id`) AS submenu_count FROM `menus` WHERE `parent_id` IS NULL AND `position` = 'header';"))->fetchAll();
        $submenus = ($db->select("SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL;"));
        $categories = ($db->select("SELECT * FROM `categories` ORDER BY `id` DESC;"))->fetchAll();
        $articles = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `users`.`id` = `articles`.`user_id`) AS username, (SELECT COUNT(`comments`.`id`) FROM `comments` WHERE `articles`.`id` = `comments`.`article_id`) AS comment_count FROM `articles` ORDER BY `created_at` DESC LIMIT 0,6;"))->fetchAll();
        $popularArticles = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `users`.`id` = `articles`.`user_id`) AS username, (SELECT COUNT(`comments`.`id`) FROM `comments` WHERE `articles`.`id` = `comments`.`article_id`) AS comment_count FROM `articles` ORDER BY `view` DESC LIMIT 0,4;"))->fetchAll();
        $popularArticlesSidebar = $popularArticles;
        $newArticles = ($db->select("SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT 0,4;"))->fetchAll();
        require_once BASE_PATH . "/template/app/index.php";
    }

    public function showCategory($id)
    {
        $db = new Database();
        $setting = ($db->select("SELECT * FROM `websetting`;"))->fetch();
        $menus = ($db->select("SELECT *, (SELECT count(submenus.`id`) FROM `menus` submenus WHERE `menus`.`id` = submenus.`parent_id`) AS submenu_count FROM `menus` WHERE `parent_id` IS NULL AND `position` = 'header';"))->fetchAll();
        $submenus = ($db->select("SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL;"));
        $categories = ($db->select("SELECT * FROM `categories` ORDER BY `id` DESC;"))->fetchAll();
        $category = ($db->select("SELECT * FROM `categories` WHERE `id` = ?;", [$id]))->fetch();
        $articles = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `users`.`id` = `articles`.`user_id`) AS username, (SELECT COUNT(`comments`.`id`) FROM `comments` WHERE `articles`.`id` = `comments`.`article_id`) AS comment_count FROM `articles` WHERE `cat_id` = ? ORDER BY `id` DESC;", [$id]))->fetchAll();
        $popularArticlesSidebar = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `users`.`id` = `articles`.`user_id`) AS username, (SELECT COUNT(`comments`.`id`) FROM `comments` WHERE `articles`.`id` = `comments`.`article_id`) AS comment_count FROM `articles` ORDER BY `view` DESC LIMIT 0,4;"))->fetchAll();
        $newArticles = ($db->select("SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT 0,4;"))->fetchAll();
        require_once BASE_PATH . "/template/app/show-category.php";
    }

    public function showArticle($id)
    {
        $db = new Database();
        $article = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `users`.`id` = `articles`.`user_id`) AS username, (SELECT COUNT(`comments`.`id`) FROM `comments` WHERE `articles`.`id` = `comments`.`article_id`) AS comment_count FROM `articles` WHERE `id` = ?;", [$id]))->fetch();
        $db->update('articles', ['view'], [$article->view + 1], $article->id);
        $setting = ($db->select("SELECT * FROM `websetting`;"))->fetch();
        $menus = ($db->select("SELECT *, (SELECT count(submenus.`id`) FROM `menus` submenus WHERE `menus`.`id` = submenus.`parent_id`) AS submenu_count FROM `menus` WHERE `parent_id` IS NULL AND `position` = 'header';"))->fetchAll();
        $categories = ($db->select("SELECT * FROM `categories` ORDER BY `id` DESC;"))->fetchAll();
        $submenus = ($db->select("SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL;"));
        $popularArticlesSidebar = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `users`.`id` = `articles`.`user_id`) AS username, (SELECT COUNT(`comments`.`id`) FROM `comments` WHERE `articles`.`id` = `comments`.`article_id`) AS comment_count FROM `articles` ORDER BY `view` DESC LIMIT 0,4;"))->fetchAll();
        $newArticles = ($db->select("SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT 0,4;"))->fetchAll();
        $comments = ($db->select("SELECT *, (SELECT `username` FROM `users` WHERE `users`.`id` = `comments`.`user_id`) AS username FROM `comments` WHERE `article_id` = ?;", [$id]))->fetchAll();
        require_once BASE_PATH . "/template/app/show-article.php";
    }

    public function commentStore($request)
    {
        if (isset($_SESSION['user'])) {
            $db = new Database();
            $db->insert('comments', ['comment', 'article_id', 'user_id'], [$request['comment'], $request['article_id'], $_SESSION['user']]);
            $this->redirectBack();
        } else {
            $this->redirectBack();
        }
    }

    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}