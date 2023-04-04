<?php include './header.php';?>
<?php include './common/nav.php';?>

<!-- ---------------------------->

        <br><hr>
        <section class="reb_log_btn">
            <div>
                <b>MyBlog</b>
            </div>
            <div>
                <a href="./auth/reg.php">Register</a> ||
                <a href="./auth/login.php">Login</a>
            </div>
        </section>
        <hr>

        <main>

            <section id="about">
            <?php include './pages/about.php';?>
            </section>
            
            <section id="blog">
                <?php include './pages/blog.php';?>
            </section>

            <section id="gallery">
            <?php include './pages/gallery.php';?>
            </section>

        </main>

<!-- ---------------------------->
<?php include './footer.php';?>

