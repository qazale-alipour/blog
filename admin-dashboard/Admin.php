<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Auth.php";

use AdminDashboard\Auth;

class Admin
{
    public function __construct()
    {
        $auth = new Auth();
        $auth->checkAdmin();
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

    protected function saveImage($image, $imagePath, $imageName = null)
    {
        $imageTemp = $image['tmp_name'];
        if (is_uploaded_file($imageTemp)) {
            date_default_timezone_set("Asia/Tehran");
            if ($imageName === null)
                $image['name'] = date("Y-m-d-H-i-s");
            else
                $image['name'] = $imageName;
            $imageType = substr($image['type'], 6);
            $destination = "public/images/" . trim($imagePath, "/") . "/" . $image['name'] . "." . $imageType;
            if (move_uploaded_file($imageTemp, $destination))
                return $destination;
            else
                return false;
        } else {
            return false;
        }
    }

    protected function removeImage($imagePath)
    {
        $imagePath = BASE_PATH . "/" . $imagePath;
        unlink($imagePath);
    }
}