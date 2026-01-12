<?php require "header.php"; ?>

<main>
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="card my-5">
                <div class="card-body">
                    <h1 class="card-title"><?php the_title(); ?></h1>

                    <!-- Post meta information -->
                    <div class="post-meta text-muted mb-3">
                        <small>
                            Posted on <?php the_date(); ?> by <?php the_author(); ?>
                            <?php if (get_the_category()) : ?>
                                in <?php the_category(', '); ?>
                            <?php endif; ?>
                        </small>
                    </div>

                    <!-- Featured Image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail mb-4">
                            <?php the_post_thumbnail('large', ['class' => 'img-fluid w-100 rounded']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Content -->
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <!-- Tags -->
                    <?php if (has_tag()) : ?>
                        <div class="post-tags mt-4">
                            <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Navigation -->
                    <div class="post-navigation mt-5 pt-4 border-top">
                        <div class="row">
                            <div class="col-6 text-start">
                                <?php previous_post_link('%link', '← Previous Post'); ?>
                            </div>
                            <div class="col-6 text-end">
                                <?php next_post_link('%link', 'Next Post →'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Comments -->
                    <?php if (comments_open() || get_comments_number()) : ?>
                        <div class="comments-section mt-5">
                            <?php //comments_template(); 
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php require "footer.php"; ?>