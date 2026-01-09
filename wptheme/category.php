<?php
$category = get_queried_object();
$category_id = $category->term_id;
// var_dump($category);
require "header.php"


?>
<main>
    <div class="container">
        <h1><?= $category->name ?></h1>

        <hr>

        <?php
        // $args = array(
        //     'category'         => $category->cat_ID,
        //     'orderby'     => 'date', // Order by date
        //     'order'       => 'DESC', // Descending order
        //     'post_type'   => 'post', // Can be 'page', 'custom_type', etc.
        //     'post_status' => 'publish' // Post status
        // );

        $args = array(
            'cat'         => $category_id,
            'post_status' => 'publish'
        );
        $posts = new WP_Query($args);

        if ($posts->have_posts()) :
            while ($posts->have_posts()) : $posts->the_post(); ?>

                <h2><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>
        <?php endwhile;
            wp_reset_postdata();
        else :
            _e('Sorry, no posts were found.', 'textdomain');
        endif;
        ?>

        <?php echo paginate_links() ?>
    </div>
</main>
<?php require "footer.php" ?>