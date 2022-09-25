<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>ویرایش اطلاعات کاربر</h4>
                </div>
                <div class="widget-body">
                    <form action="<?= url('user/update/' . $user->id); ?>" method="post">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">نام و نام
                                خانوادگی</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="username" value="<?= $user->username; ?>">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">ایمیل</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email" value="<?= $user->email; ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">نوع دسترسی</label>
                            <div class="col-lg-1">
                                <div class="custom-control custom-radio styled-radio mb-3">
                                    <input class="custom-control-input" type="radio" name="permission" id="opt-01"
                                           value="admin" required <?php if ($user->permission == 'admin') {
                                        echo "checked";
                                    } ?>>
                                    <label class="custom-control-descfeedback" for="opt-01">ادمین</label>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="custom-control custom-radio styled-radio mb-3">
                                    <input class="custom-control-input" type="radio" name="permission" id="opt-02"
                                           value="user" required <?php if ($user->permission == 'user') {
                                        echo "checked";
                                    } ?>>
                                    <label class="custom-control-descfeedback" for="opt-02">کاربر</label>
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