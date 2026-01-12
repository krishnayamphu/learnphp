<?php require "header.php" ?>
<main>
    <div class="container">
        <h1>Homepage</h1>
        <hr>
        <h2>Economy</h2>
        <div class="row">
            <?php
            $posts = getPostsByCategorySlug('economy', 1, 0);
            if ($posts->have_posts()) :
                while ($posts->have_posts()) : $posts->the_post();
            ?>
                    <h2 class="py-4">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <!-- Featured Image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail mb-4">
                            <?php the_post_thumbnail('large', ['class' => 'img-fluid w-100 rounded']); ?>
                        </div>
                    <?php endif; ?>
                    <p class="mb-4"> <?php echo custom_excerpt(25, "...") ?> </p>
            <?php endwhile;
                wp_reset_postdata();
            else :
                _e('Sorry, no posts were found.', 'wptheme');
            endif; ?>
        </div>

        <hr>
        <div class="row row-cols-1 row-cols-3">
            <?php
            $posts = getPostsByCategorySlug('economy', 3, 1);
            if ($posts->have_posts()) :
                while ($posts->have_posts()) : $posts->the_post();
            ?>
                    <div class="col">
                        <h2 class="py-4">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="mb-4"> <?php echo custom_excerpt(25, "...") ?> </p>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            else :
                _e('Sorry, no posts were found.', 'wptheme');
            endif; ?>
        </div>
    </div>
</main>
<?php require "footer.php" ?>