<?php
require "config/connect_db.php";
require "dao/category_functions.php";
require "dao/post_functions.php";
require "utils/functions.php";

$uploadUrl = "/learnphp/blogpost/admin/media/uploads/";
$posts = getRecentPosts($conn, 2);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Blogpost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="container">
            <?php if (count($posts) === 0) : ?>
                <div class="alert alert-info mt-4">
                    No posts found.
                </div>

            <?php else : ?>
                <div class="d-flex flex-column gap-4 mt-4">
                    <?php foreach ($posts as $post): ?>
                        <div class="card">
                            <div class="d-flex gap-4">
                                <a class="text-decoration-none" href="single.php?id=<?= $post['id'] ?>"><img width="200" src="<?= $uploadUrl . $post['thumbnail'] ?>"></a>
                                <div class="card-body">
                                    <h2><a class="text-decoration-none" href="single.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
                                    <p><?= getExcerpt($post['content'], 15) ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>

    </main>

    <?php mysqli_close($conn) ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>