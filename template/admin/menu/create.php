<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>ایجاد منو</h4>
                </div>
                <div class="widget-body">
                    <form action="<?= url('menu/store'); ?>" class="needs-validation" method="post">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">نام</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">آدرس</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="url" required>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">وضعیت</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <select name="parent_id" class="custom-select form-control">
                                        <option value="">root</option>
                                        <?php
                                        foreach ($menus as $menu) {
                                        ?>
                                            <option value="<?= $menu->id; ?>"><?= $menu->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">محل
                                قرارگیری</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <select name="position" class="custom-select form-control" required>
                                        <option value="header">header</option>
                                        <option value="footer">footer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">ذخیره</button>
                            <button class="btn btn-shadow" type="reset">بازگردانی</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
<?php
require_once BASE_PATH . "/template/admin/layout/footer.php";
?>