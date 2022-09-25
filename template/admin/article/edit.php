<?php
require_once BASE_PATH . "/template/admin/layout/head-tag.php";
?>
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>ویرایش پست</h4>
                </div>
                <div class="widget-body">
                    <form action="<?= url('article/update/' . $article->id); ?>" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عنوان</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="title" value="<?= $article->title; ?>">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عکس</label>
                            <div class="col-lg-5">
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"></label>
                            <div class="col-lg-5">
                                <img src="<?= asset($article->image); ?>" style="width: 300px;">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">خلاصه</label>
                            <div class="col-lg-5">
                                <textarea class="form-control" name="summary"
                                          rows="6"><?= $article->summary; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">بدنه پست</label>
                            <div class="col-lg-5">
                                <textarea class="form-control" name="body" rows="6"><?= $article->body; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">وضعیت</label>
                            <div class="col-lg-1">
                                <div class="custom-control custom-radio styled-radio mb-3">
                                    <input class="custom-control-input" type="radio" name="status" id="opt-01"
                                           value="enable" <?php if ($article->status == 'enable') echo 'checked'; ?>>
                                    <label class="custom-control-descfeedback" for="opt-01">enable</label>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-1">
                                <div class="custom-control custom-radio styled-radio mb-3">
                                    <input class="custom-control-input" type="radio" name="status" id="opt-02"
                                           value="disable" <?php if ($article->status == 'disable') echo 'checked'; ?>>
                                    <label class="custom-control-descfeedback" for="opt-02">disable</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">دسته بندی</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <select name="cat_id" class="custom-select form-control">
                                        <option value="">-----</option>
                                        <?php
                                        foreach ($categories as $category) {
                                            ?>
                                            <option value="<?= $category->id; ?>" <?php if ($article->cat_id == $category->id) echo 'selected'; ?>><?= $category->name; ?></option>
                                        <?php } ?>
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