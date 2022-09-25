<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
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
                                <th style="width: 170px">تعداد بازدید ها</th>
                                <th style="width: 100px">وضعیت</th>
                                <th style="width: 150px">دسته بندی</th>
                                <th style="width: 150px">نویسنده</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($articles as $article) {
                                ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= $article->id; ?></span></td>
                                    <td><?= $article->title; ?></td>
                                    <td><?= $article->view; ?></td>
                                    <td><?= $article->status; ?></td>
                                    <td><?= $article->cat_name; ?></td>
                                    <td><?= $article->user_name; ?></td>
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
    <!-- Begin Row -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Border -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>کامنت ها</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th style="width: 100px">#</th>
                                <th>کامنت</th>
                                <th>پست مربوطه</th>
                                <th>کاربر</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($comments as $comment) {
                                ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= $comment->id; ?></span></td>
                                    <td><?= $comment->comment; ?></td>
                                    <td><?= $comment->article_title; ?></td>
                                    <td><?= $comment->username; ?></td>
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