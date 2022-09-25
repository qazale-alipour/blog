<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ورود به حساب کاربری</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Iran licence -->
    <link rel="stylesheet" href="<?= asset('public/admin/assets/css/fontiran.css'); ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= asset('public/admin/assets/vendors/css/base/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= asset('public/admin/assets/vendors/css/base/seenboard-1.0.css'); ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="bg-fixed-02">
<!-- Begin Container -->
<div class="container-fluid h-100 overflow-y">
    <div class="row flex-row h-100">
        <div class="col-12 my-auto">
            <div class="password-form mx-auto">
                <div class="logo-centered"></div>
                <br>
                <h3>ورود به حساب کاربری</h3>
                <br>
                <form action="<?= url('check-login'); ?>" method="post">
                    <div class="group material-input">
                        <input type="email" name="email" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>ایمیل</label>
                    </div>
                    <div class="group material-input">
                        <input type="password" name="password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>رمز عبور</label>
                    </div>
                    <div class="button text-center">
                        <button type="submit" class="btn btn-lg btn-gradient-01">ورود</button>
                    </div>
                </form>
                <div class="register">
                    اگر شما حساب کاربری ندارید؟
                    <br>
                    <a href="<?= url('register'); ?>">ساخت حساب کاربری</a>
                </div>
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Container -->
<!-- Begin Vendor Js -->
<script src="<?= asset('public/admin/assets/vendors/js/base/jquery.min.js'); ?>"></script>
<script src="<?= asset('public/admin/assets/vendors/js/base/core.min.js'); ?>"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="<?= asset('public/admin/assets/vendors/js/app/app.min.js'); ?>"></script>
<!-- End Page Vendor Js -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
$httpReferer = isset($_SERVER['HTTP_REFERER']) === true ? $_SERVER['HTTP_REFERER'] : null;
if ($httpReferer == url('login')) {
    ?>
    <script>
        swal({
            title: "خطا در ورود",
            text: "اطلاعات وارد شده صحیح نمی باشد!",
            icon: "error",
            button: "OK",
            dangerMode: true,
        });
    </script>
<?php } ?>
</body>
</html>