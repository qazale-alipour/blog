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
                        <a class="btn btn-gradient-01" href="<?= url('category/create'); ?>" role="button">ایجاد دسته
                            بندی</a>
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
                    <h4>دسته بندی ها</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="width: 600px; margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th style="width: 150px">#</th>
                                <th>نام</th>
                                <th style="width: 120px">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($categories as $category) {
                                ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= $category->id; ?></span></td>
                                    <td><?= $category->name; ?></td>
                                    <td class="td-actions" style="width: 150px">
                                        <a href="<?= url('category/show/' . $category->id); ?>"><i
                                                    class="la la-check-square delete" id="showInfo"></i></a>
                                        <a href="<?= url('category/edit/' . $category->id); ?>"><i
                                                    class="la la-edit edit"></i></a>
                                        <a href="<?= url('category/delete/' . $category->id); ?>"><i
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