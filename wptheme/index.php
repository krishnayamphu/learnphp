<?php require "header.php" ?>
<main>
    <div class="container">
        <h1>Hello, world!</h1>

        <hr>

        <?php
        $args = array(
            'numberposts' => 5,    // Number of posts to retrieve (-1 for all)
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