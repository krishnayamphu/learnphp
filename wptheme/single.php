<?php require "header.php" ?>
<main>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <h1><?php echo the_title(); ?></h1>
                <p><?php echo the_content(); ?></p>
            </div>
        </div>
    </div>
</main>
<?php require "footer.php" ?>