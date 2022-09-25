<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title"></h2>
                <div>
                    <div class="page-header-tools">
                        <a class="btn btn-gradient-01" href="<?= url('article/create'); ?>" role="button">ایجاد پست</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Begin Row -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Border -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>پست ها</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th style="width: 50px">#</th>
                                <th style="width: 300px">عنوان</th>
                                <th style="width: 300px">خلاصه</th>
                                <th style="width: 170px">تعداد بازدید ها</th>
                                <th style="width: 100px">وضعیت</th>
                                <th style="width: 150px">دسته بندی</th>
                                <th style="width: 150px">نویسنده</th>
                                <th style="width: 200px">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($articles as $article) {
                                ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= $article->id; ?></span></td>
                                    <td><?= $article->title; ?></td>
                                    <td><?= $article->summary; ?></td>
                                    <td><?= $article->view; ?></td>
                                    <td><?= $article->status; ?></td>
                                    <td><?= $article->cat_name; ?></td>
                                    <td><?= $article->user_name; ?></td>
                                    <td class="td-actions" style="width: 150px">
                                        <a href="<?= url('article/show/' . $article->id); ?>"><i
                                                    class="la la-check-square delete" id="showInfo"></i></a>
                                        <a href="<?= url('article/edit/' . $article->id); ?>"><i
                                                    class="la la-edit edit"></i></a>
                                        <a href="<?= url('article/delete/' . $article->id); ?>"><i
                                                    class="la la-trash-o delete"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Border -->
        </div>
    </div>
    <!-- End Row -->

<?php
require_once BASE_PATH . "/template/admin/layout/footer.php";
?>