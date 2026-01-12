<?php

function custom_excerpt($limit = 20, $more = '...')
{
    $excerpt = get_the_excerpt();
    if (empty($excerpt)) {
        $excerpt = get_the_content();
    }
    $excerpt = wp_strip_all_tags($excerpt);
    $excerpt = wp_trim_words($excerpt, $limit, $more);
    return $excerpt;
}


function getPostsByCategorySlug($category_slug, $count_posts, $offset)
{
    $args = array(
        'category_name' => $category_slug,  // <-- Uses SLUG, not name
        'posts_per_page' => $count_posts,
        'offset' => $offset,
        'post_status' => 'publish'
    );

    $posts = new WP_Query($args);
    return $posts;
}
