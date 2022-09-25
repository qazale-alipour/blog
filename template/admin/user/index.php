<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
    <!-- Begin Row -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Border -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>کاربران</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th style="width: 100px">#</th>
                                <th>نام و نام خانوادگی کاربر</th>
                                <th>ایمیل</th>
                                <th>نوع دسترسی</th>
                                <th>اجازه دسترسی</th>
                                <th style="width: 120px">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $user) {
                                ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= $user->id; ?></span></td>
                                    <td><?= $user->username; ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td><?= $user->permission; ?></td>
                                    <td>
                                        <?php
                                        if ($user->permission == 'user') {
                                            ?>
                                            <a role="button" href="<?= url('user/permission/' . $user->id); ?>"
                                               class="btn btn-info mr-1 mb-2" style="color: white">دسترسی به عنوان
                                                ادمین</a>
                                        <?php } else { ?>
                                            <a role="button" href="<?= url('user/permission/' . $user->id); ?>"
                                               class="btn btn-warning mr-1 mb-2" style="color: white">دسترسی به عنوان
                                                کاربر</a>
                                        <?php } ?>
                                    </td>
                                    <td class="td-actions" style="width: 150px">
                                        <a href="<?= url('user/edit/' . $user->id); ?>"><i
                                                    class="la la-edit edit"></i></a>
                                        <a href="<?= url('user/delete/' . $user->id); ?>"><i
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