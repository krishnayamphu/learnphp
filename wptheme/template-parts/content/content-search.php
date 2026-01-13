<div>
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('small', array('class' => 'w-100 h-100 rounded')); ?>
        <h5 class="py-2">
            <?php the_title(); ?>
        </h5>
    </a>
</div>