<?php

namespace Database;

use PDO;
use PDOException;

class Database
{
    private $dbHost = DB_HOST;
    private $dbUsername = DB_USERNAME;
    private $dbPassword = DB_PASSWORD;
    private $dbName = DB_NAME;
    private $connection;
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassword, $this->options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function createTable($sql)
    {
        try {
            $this->connection->exec($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insert($tableName, $fields, $values)
    {
        $sql = "INSERT INTO `" . $tableName . "` (`" . implode("`, `", $fields) . "`, `created_at`) VALUES (:" . implode(", :", $fields) . ", NOW())";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_combine($fields, $values));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function select($sql, $value = null)
    {
        try {
            if ($value !== null) {
                $stmt = $this->connection->prepare($sql);
                $stmt->execute($value);
                $result = $stmt;
                return $result;
            } else {
                $result = $this->connection->query($sql);
                return $result;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($tableName, $fields, $values, $id)
    {
        $sql = "UPDATE `" . $tableName . "` SET `";
        foreach (array_combine($fields, $values) as $field => $value) {
            if ($value != null) {
                $sql .= $field . "` = ?, `";
            } else {
                $sql .= $field . "` = NULL, `";
            }
        }
        $sql .= "updated_at` = NOW() WHERE `id` = ?";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_merge(array_filter(array_values($values)), [$id]));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($tableName, $id)
    {
        $sql = "DELETE FROM `" . $tableName . "` WHERE `id` = ?";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
