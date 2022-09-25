<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $setting->title; ?></title>

    <link rel="stylesheet" href="<?= asset('public/app/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
        #category:hover {
            color: black;
        }
    </style>
</head>
<body>
<section class="app">
    <header>
        <nav class="header">
            <img class="header-logo" src="<?= asset($setting->logo); ?>" alt="">
            <button class="header-menu-burger" onclick="showMenu()" type="button"><i class="fas fa-bars"></i></button>
            <ul class="header-menu" id="menu" style="direction: ltr">
                <?php
                foreach ($menus as $menu) {
                    ?>
                    <li class="header-menu-item"><a class="header-menu-item-link"
                                                    href="<?= url($menu->url); ?>"><?= $menu->name; ?></a>
                    <?php
                    if ($menu->submenu_count > 0) {
                        ?>
                        <span>
                        <?php
                        foreach ($submenus as $submenu) {
                            if ($menu->id == $submenu->parent_id) {
                                ?>
                                <a href="<?= url($submenu->url); ?>"><?= $submenu->name; ?></a>
                            <?php }
                        } ?>
                    </span>
                        </li>
                    <?php }
                } ?>
            </ul>
            <section class="clear-fix"></section>
        </nav><!--end of navbar-->
    </header><!--end of header-->
