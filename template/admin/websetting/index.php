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
                        <a class="btn btn-gradient-01" href="<?= url('websetting/set'); ?>" role="button">مقدار دهی
                            تنظیمات سایت</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>تنظیمات کلی سایت</h4>
                </div>
                <div class="widget-body">
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عنوان سایت</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="title"
                                   value="<?php if ($setting != null) echo $setting->title; ?>" disabled
                                   style="background-color: white">
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">توضیحات درباره
                            سایت</label>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="description" rows="5" disabled
                                      style="background-color: white"><?php if ($setting != null) echo $setting->description; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">کلمات کلیدی برای
                            جستجو</label>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="keywords" rows="5" disabled
                                      style="background-color: white"><?php if ($setting != null) echo $setting->keywords; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">آیکون</label>
                        <div class="col-lg-5">
                            <?php if ($setting != null) { ?>
                                <img src="<?= asset($setting->icon); ?>" style="width: 50px; height: 50px">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">لوگو</label>
                        <div class="col-lg-5">
                            <?php if ($setting != null) { ?>
                                <img src="<?= asset($setting->logo); ?>" style="width: 50px; height: 50px">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تلفن تماس</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="tel"
                                   value="<?php if ($setting != null) echo $setting->tel; ?>" disabled
                                   style="background-color: white">
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">ایمیل</label>
                        <div class="col-lg-5">
                            <input type="email" class="form-control" name="email"
                                   value="<?php if ($setting != null) echo $setting->email; ?>" disabled
                                   style="background-color: white">
                        </div>
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