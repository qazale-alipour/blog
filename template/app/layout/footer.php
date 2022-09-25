<footer class="footer">
    <section class="app bg-map">
        <section class="footer-row">
            <section class="footer-col">
                <img class="footer-logo" src="<?= asset($setting->icon); ?>" alt="">
                <section class="clear-fix"></section>
                <p class="footer-p"><?= $setting->description; ?></p>
            </section>
            <section class="footer-col">
                <h3 class="footer-section-title">جدید ترین خبر ها</h3>
                <section class="footer-section-link-item">
                    <a href="<?= url('show-article/' . $newArticles[0]->id); ?>"><?= $newArticles[0]->title; ?></a>
                    <p><?= date("M d, Y", strtotime($newArticles[0]->created_at)); ?></p>
                </section>
                <section class="footer-line"></section>
                <section class="footer-section-link-item">
                    <a href="<?= url('show-article/' . $newArticles[1]->id); ?>"><?= $newArticles[1]->title; ?></a>
                    <p><?= date("M d, Y", strtotime($newArticles[1]->created_at)); ?></p>
                </section>
            </section>
            <section class="footer-col">
                <h3 class="footer-section-title">جدید ترین خبر ها</h3>
                <section class="footer-section-link-item">
                    <a href="<?= url('show-article/' . $newArticles[2]->id); ?>"><?= $newArticles[2]->title; ?></a>
                    <p><?= date("M d, Y", strtotime($newArticles[2]->created_at)); ?></p>
                </section>
                <section class="footer-line"></section>
                <section class="footer-section-link-item">
                    <a href="<?= url('show-article/' . $newArticles[3]->id); ?>"><?= $newArticles[3]->title; ?></a>
                    <p><?= date("M d, Y", strtotime($newArticles[3]->created_at)); ?></p>
                </section>
            </section>
            <section class="clear-fix"></section>
        </section>
        <section class="footer-line"></section>
    </section><!--end of second app section-->
    <section class="clear-fix"></section>
</footer><!--end of footer-->

<script type="text/javascript">
    function showMenu() {
        var x = document.getElementById("menu");
        if (x.className === "header-menu") {
            x.className += " show";
            console.log(1);
        } else {
            x.className = "header-menu";
            console.log(0);
        }
    }
</script>
</body>
</html>
