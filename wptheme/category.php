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
        $args = array(
            'category'         => $category->cat_ID,
            'orderby'     => 'date', // Order by date
            'order'       => 'DESC', // Descending order
            'post_type'   => 'post', // Can be 'page', 'custom_type', etc.
            'post_status' => 'publish' // Post status
        );

        $posts_array = get_posts($args);

        foreach ($posts_array as $post) : setup_postdata($post); ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
        <?php endforeach;

        wp_reset_postdata(); // Important: resets the post data to the original query
        ?>
    </div>
</main>
<?php require "footer.php" ?>