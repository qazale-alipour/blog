<?php

namespace Database;

require_once BASE_PATH . "/admin-dashboard/Database.php";

use Database\Database;

class CreateTable extends Database
{
    private $createTableQueries = array(
        "CREATE TABLE IF NOT EXISTS `users` (
            `id` INT AUTO_INCREMENT,
            `username` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `permission` ENUM('user', 'admin') NOT NULL DEFAULT 'user',
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE (`email`)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_persian_ci;",

        "CREATE TABLE IF NOT EXISTS `categories` (
            `id` INT AUTO_INCREMENT,
            `name` VARCHAR(255) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_persian_ci;",

        "CREATE TABLE IF NOT EXISTS `articles` (
            `id` INT AUTO_INCREMENT,
            `title` VARCHAR(255) NOT NULL,
            `image` VARCHAR(255) NOT NULL,
            `summary` TEXT NOT NULL,
            `body` TEXT NOT NULL,
            `status` ENUM('enable', 'disable') NOT NULL DEFAULT 'disable',
            `view` INT NOT NULL DEFAULT '0',
            `cat_id` INT NOT NULL,
            `user_id` INT NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_persian_ci;",

        "CREATE TABLE IF NOT EXISTS `websetting` (
            `id` INT AUTO_INCREMENT,
            `title` VARCHAR(255) DEFAULT NULL,
            `description` TEXT DEFAULT NULL,
            `keywords` TEXT DEFAULT NULL,
            `icon` VARCHAR(255) DEFAULT NULL,
            `logo` VARCHAR(255) DEFAULT NULL,
            `tel` VARCHAR(255) DEFAULT NULL,
            `email` VARCHAR(255) DEFAULT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_persian_ci;",

        "CREATE TABLE IF NOT EXISTS `menus` (
            `id` INT AUTO_INCREMENT,
            `name` VARCHAR(255) NOT NULL,
            `url` VARCHAR(255) NOT NULL,
            `parent_id` INT DEFAULT NULL,
            `position` ENUM('header', 'footer') NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            UNIQUE (`url`)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_persian_ci;",

        "CREATE TABLE IF NOT EXISTS `comments` (
            `id` INT AUTO_INCREMENT,
            `comment` TEXT NOT NULL,
            `status` ENUM('unseen', 'seen', 'approved') NOT NULL DEFAULT 'unseen',
            `article_id` INT NOT NULL,
            `user_id` INT NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_persian_ci;"
    );

    private $tableInitializes = array(
        [
            'table' => 'users',
            'fields' => ['username', 'email', 'password', 'permission'],
            'values' => ['غزاله علی پور', 'qazale.alipour@gmail.com', '$2y$10$JhgYP8La1BuuRBTDTR.Hk.8Hesa.rfd/Ew1LkHRD/Y5HNdWt51lqK', 'admin']
        ]
    );

    public function run()
    {
        foreach ($this->createTableQueries as $createTableQuery) {
            $this->createTable($createTableQuery);
        }
        foreach ($this->tableInitializes as $tableInitialize) {
            $this->insert($tableInitialize['table'], $tableInitialize['fields'], $tableInitialize['values']);
        }
    }
}
