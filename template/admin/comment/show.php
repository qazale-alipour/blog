<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>نمایش کامنت</h4>
                </div>
                <div class="widget-body">
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">کامنت</label>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="comment" rows="6" disabled
                                      style="background-color: white"><?= $comment->comment; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">پست مربوطه</label>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="article_title" rows="6" disabled
                                      style="background-color: white"><?= $comment->article_title; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">کاربر</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="username" value="<?= $comment->username; ?>"
                                   disabled style="background-color: white">
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">وضعیت</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="status" value="<?= $comment->status; ?>"
                                   disabled style="background-color: white">
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