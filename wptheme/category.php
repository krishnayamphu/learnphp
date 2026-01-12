<?php
// $category = get_queried_object();
// echo $category->name;
require "header.php"
?>
<main>
    <div class="container py-4">
        <h4>Category: <?php single_cat_title(); ?></h4>
        <hr>
        <?php if (have_posts()) : ?>
            <div class="row row-cols-1 row-cols-lg-1">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col mb-4">
                        <div class="card">
                            <div class="card-body d-flex gap-4">
                                <!-- Featured Image -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="mb-4" style="width: 300px;">
                                        <?php the_post_thumbnail('medium', ['class' => 'cat-thumb rounded']); ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h2>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <p>
                                        <?php
                                        // if (has_excerpt()) {
                                        //     echo wp_trim_words(get_the_excerpt(), 20, '...');
                                        // } else {
                                        //     echo wp_trim_words(get_the_content(), 20, '...');
                                        // }

                                        echo custom_excerpt(50);
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php echo paginate_links(); ?>
        <?php else : ?>
            <?php _e('Sorry, no posts were found.', 'wptheme'); ?>
        <?php endif; ?>
    </div>
</main>
<?php require "footer.php" ?>