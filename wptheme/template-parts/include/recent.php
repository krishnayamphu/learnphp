<?php
$sidebar_args = array(
    'posts_per_page' => 5,
    'post_status'    => 'publish',
    'ignore_sticky_posts' => 1, // Avoid sticky posts appearing in sidebar
    'no_found_rows'  => true,   // Improve performance for simple queries
);

$sidebar_query = new WP_Query($sidebar_args);
?>

<?php if ($sidebar_query->have_posts()) : ?>
    <h4>Recent Posts</h4>
    <ul class="sidebar-posts-list">
        <?php while ($sidebar_query->have_posts()) : $sidebar_query->the_post(); ?>
            <li class="sidebar-post-item">
                <a href="<?php the_permalink(); ?>">
                    <?php echo esc_html(get_the_title()); ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <div class="sidebar-no-posts">
        <?php esc_html_e('Sorry, no posts were found.', 'wptheme'); ?>
    </div>
<?php endif; ?>