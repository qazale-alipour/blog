<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>نمایش دسته بندی</h4>
                </div>
                <div class="widget-body">
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">نام</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="name" value="<?= $category->name; ?>" disabled
                                   style="background-color: white">
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-gradient-01" href="<?= url('category'); ?>" role="button">بازگشت</a>
                    </div>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
<?php
require_once BASE_PATH . "/template/admin/layout/footer.php";
?>