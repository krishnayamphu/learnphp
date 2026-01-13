<form action="<?php echo esc_url(home_url('/')); ?>" class="d-flex gap-2 py-2">
    <input type="search" class="p-2 rounded" placeholder="search" value="<?php echo get_search_query(); ?>"
        name="s" aria-label="Search">
    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
</form>