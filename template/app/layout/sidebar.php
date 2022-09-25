<aside class="sidebar">
    <section class="sidebar-item">
        <ul class="sidebar-list">
            <?php
            foreach ($categories as $category) {
                ?>
                <li><b><a href="<?= url('show-category/' . $category->id); ?>" style="font-weight: bold;"
                          id="category"><?= $category->name; ?></a></b></li>
            <?php } ?>
        </ul>
    </section>
    <section class="sidebar-item">
        <h2 class="title">خبر های محبوب</h2>
        <?php
        foreach ($popularArticlesSidebar as $articleSidebar) {
            ?>
            <section class="popular-post">
                <img class="popular-post-img" src="<?= asset($articleSidebar->image); ?>" alt="">
                <section class="popular-post-title">
                    <h3>
                        <a href="<?= url('show-article/' . $articleSidebar->id); ?>"><b><?= $articleSidebar->title; ?></b></a>
                    </h3>
                    <ul class="info-bar">
                        <li class=""><span class="text-muted">توسط</span> <a href="#"
                                                                             class="color-black"><b><?= $articleSidebar->username; ?>
                                    , </b></a>
                            <span class="text-muted"><?= date("M d, Y", strtotime($articleSidebar->created_at)); ?></span>
                        </li>
                    </ul>
                </section>
                <section class="clear-fix"></section>
            </section>
        <?php } ?>
    </section>
</aside><!--end of sidebar-->
