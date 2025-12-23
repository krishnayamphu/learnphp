<?php
require "config/connect_db.php";
require "dao/category_functions.php";
require "dao/post_functions.php";
$uploadUrl = "/learnphp/blogpost/admin/media/uploads/";
$postId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$categories = getCategories($conn);
$post = getPost($conn, $postId);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Media Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar  navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">

            <div class="container">
                <a class="navbar-brand" href="#">Blogpost</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lifestyle</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Technology</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <?php if (!$post) : ?>
                <div class="alert alert-info mt-4">
                    No posts found.
                </div>

            <?php else : ?>
                <div class="card my-5 py-5 px-3">
                    <div class="d-flex flex-column gap-4">
                        <img class="w-100" src="<?= $uploadUrl . $post['thumbnail'] ?>">
                        <h1><?= $post['title'] ?></h1>
                        <p><?= $post['content'] ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php mysqli_close($conn) ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>