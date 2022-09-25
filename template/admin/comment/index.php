<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
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
                                <th>وضعیت</th>
                                <th>تغییر وضعیت</th>
                                <th style="width: 50px">تنظیمات</th>
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
                                    <td><?= $comment->status; ?></td>
                                    <td>
                                        <?php
                                        if ($comment->status == 'seen') {
                                            ?>
                                            <a role="button" href="<?= url('comment/approved/' . $comment->id); ?>"
                                               class="btn btn-info mr-1 mb-2" style="color: white">تایید کردن</a>
                                        <?php } else { ?>
                                            <a role="button" href="<?= url('comment/approved/' . $comment->id); ?>"
                                               class="btn btn-warning mr-1 mb-2" style="color: white">عدم نمایش</a>
                                        <?php } ?>
                                    </td>
                                    <td class="td-actions" style="width: 150px">
                                        <a href="<?= url('comment/show/' . $comment->id); ?>"><i
                                                    class="la la-check-square delete" id="showInfo"></i></a>
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