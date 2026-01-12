<?php require "header.php" ?>
<main>
    <div class="container">
        <h1>Homepage</h1>
        <hr>
        <div class="row">
            <?php
            $posts = getPostsByCategorySlug('economy', 2, 0);
            if ($posts->have_posts()) :
                while ($posts->have_posts()) : $posts->the_post();
            ?>
                    <h2 class="py-4">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="mb-4"> <?php echo custom_excerpt(25, "...") ?> </p>
            <?php endwhile;
                wp_reset_postdata();
            else :
                _e('Sorry, no posts were found.', 'wptheme');
            endif; ?>
        </div>
    </div>
</main>
<?php require "footer.php" ?>