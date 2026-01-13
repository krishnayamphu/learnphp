<?php get_header();
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<main>
    <div class="container pt-3">
        <?php //get_search_form(); 
        ?>
        <div class="py-4">
            About <?php echo $total_results; ?> results
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php
                if (have_posts()) {
                    // Start the loop.
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content/content-search', get_post_format());
                    endwhile;
                } else {
                    echo 'no result found';
                }
                ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <div class="my-4">
            <?php echo paginate_links(); ?>
        </div>
    </div>
</main>

<?php
get_footer();
