<?php

session_start();

define("BASE_PATH", __DIR__);
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "blog");
define("DISPLAY_ERRORS", true);

require_once "admin-dashboard/CreateTable.php";
require_once "admin-dashboard/Auth.php";
require_once "admin-dashboard/Dashboard.php";
require_once "admin-dashboard/User.php";
require_once "admin-dashboard/Category.php";
require_once "admin-dashboard/Article.php";
require_once "admin-dashboard/WebSetting.php";
require_once "admin-dashboard/Menu.php";
require_once "admin-dashboard/Comment.php";
require_once "admin-dashboard/Home.php";

//use Database\CreateTable;

/*$createTable = new CreateTable();
$createTable->run();*/

if (DISPLAY_ERRORS === true) {
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
} else {
    ini_set("display_errors", 0);
    ini_set("display_startup_errors", 0);
    error_reporting(0);
}

function uri($reservedURI, $class, $method, $requestMethod = "GET")
{
    //Current URI Array
    $currentURL = explode("?", currentURL())[0];
    $currentURI = str_replace(currentDomain() . "/blog/", "", $currentURL);
    $currentURI = trim($currentURI, "/");
    $currentURIArray = explode("/", $currentURI);

    //Reserved URI Array
    $reservedURI = trim($reservedURI, "/");
    $reservedURIArray = explode("/", $reservedURI);

    if ($currentURIArray[0] == "" or $currentURIArray[0] == "/") {
        $currentURIArray[0] = "home";
    }
    $parameters = array();
    if ((sizeof($reservedURIArray) != sizeof($currentURIArray)) or ($requestMethod != methodField())) {
        return false;
    } else {
        foreach (array_combine($reservedURIArray, $currentURIArray) as $key => $uri) {
            if ($key[0] == "{" and $key[strlen($key) - 1] == "}") {
                array_push($parameters, $uri);
            } elseif ($key != $uri) {
                return false;
            }
        }
        if (methodField() == "POST") {
            $request = isset($_FILES) === true ? array_merge($_POST, $_FILES) : $_POST;
            $parameters = array_merge([$request], $parameters);
        }
        $class = "AdminDashboard\\" . $class;
        $object = new $class;
        call_user_func_array(array($object, $method), $parameters);
        exit();
    }
}

//helpers
function protocol()
{
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'], "https") === true ? "https://" : "http://";
    return $protocol;
}

function currentDomain()
{
    $domain = protocol() . $_SERVER['HTTP_HOST'];
    return $domain;
}

function currentURL()
{
    $url = currentDomain() . $_SERVER['REQUEST_URI'];
    return $url;
}

function methodField()
{
    $method = $_SERVER['REQUEST_METHOD'];
    return $method;
}

function asset($src)
{
    $asset = currentDomain() . "/blog/" . trim($src, "/");
    return $asset;
}

function url($url)
{
    $url = currentDomain() . "/blog/" . trim($url, "/");
    return $url;
}

//Reserved Routs

//Authentication
uri('login', 'Auth', 'login');
uri('check-login', 'Auth', 'checkLogin', 'POST');
uri('register', 'Auth', 'register');
uri('register-store', 'Auth', 'registerStore', 'POST');
uri('logout', 'Auth', 'logout');

//Dashboard
uri('dashboard', 'Dashboard', 'index');

//User
uri('user', 'User', 'index');
uri('user/permission/{id}', 'User', 'permission');
uri('user/edit/{id}', 'User', 'edit');
uri('user/update/{id}', 'User', 'update', 'POST');
uri('user/delete/{id}', 'User', 'delete');

//Category
uri('category', 'Category', 'index');
uri('category/show/{id}', 'Category', 'show');
uri('category/create', 'Category', 'create');
uri('category/store', 'Category', 'store', 'POST');
uri('category/edit/{id}', 'Category', 'edit');
uri('category/update/{id}', 'Category', 'update', 'POST');
uri('category/delete/{id}', 'Category', 'delete');

//Article
uri('article', 'Article', 'index');
uri('article/show/{id}', 'Article', 'show');
uri('article/create', 'Article', 'create');
uri('article/store', 'Article', 'store', 'POST');
uri('article/edit/{id}', 'Article', 'edit');
uri('article/update/{id}', 'Article', 'update', 'POST');
uri('article/delete/{id}', 'Article', 'delete');

//Websetting
uri('websetting', 'WebSetting', 'index');
uri('websetting/set', 'WebSetting', 'set');
uri('websetting/store', 'WebSetting', 'store', 'POST');

//Menu
uri('menu', 'Menu', 'index');
uri('menu/create', 'Menu', 'create');
uri('menu/store', 'Menu', 'store', 'POST');
uri('menu/show/{id}', 'Menu', 'show');
uri('menu/edit/{id}', 'Menu', 'edit');
uri('menu/update/{id}', 'Menu', 'update', 'POST');
uri('menu/delete/{id}', 'Menu', 'delete');

//Comment
uri('comment', 'Comment', 'index');
uri('comment/approved/{id}', 'Comment', 'approved');
uri('comment/show/{id}', 'Comment', 'show');

//Home
uri('home', 'Home', 'index');
uri('show-category/{id}', 'Home', 'showCategory');
uri('show-article/{id}', 'Home', 'showArticle');
uri('comment-store', 'Home', 'commentStore', 'POST');