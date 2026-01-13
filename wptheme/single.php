<?php require "header.php"; ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php get_template_part('template-parts/post/content', get_post_format()); ?>
            </div>
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<?php require "footer.php"; ?>