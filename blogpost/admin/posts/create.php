<?php
require "../../filters/authFilter.php";
require "../../config/connect_db.php";
require "../../dao/category_functions.php";
require "../../dao/post_functions.php";

$categories = getCategories($conn);
$title = '';
$slug = '';
$content = '';
$thumbnail = 'default.jpg';
$categoryId = 0;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $content   = trim($_POST['content'] ?? '');
    $thumbnail = trim($_POST['thumbnail'] ?? 'default.jpg');
    $categoryId = (int) ($_POST['category_id'] ?? 0);

    if ($title === '') {
        $errors['title'] = 'Title is required';
    } elseif (strlen($title) < 3) {
        $errors['title'] = 'Title must be at least 3 characters';
    }

    if ($slug === '') {
        $errors['slug'] = 'Slug is required';
    } elseif (!preg_match('~^[a-z0-9-]+$~', $slug)) {
        $errors['slug'] = 'Invalid slug format';
    }

    if ($categoryId <= 0) {
        $errors['categoryId'] = 'Category is required';
    }

    if (empty($errors)) {
        if (createPost($conn, $title, $slug, $content, $thumbnail, $categoryId)) {
            header("Location: index.php");
            exit;
        } else {
            $errors['general'] = 'Failed to create post';
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 bg-info vh-100 py-4 px-2">
                <?php include "../sidebar.php" ?>
            </div>
            <div class="col-lg-10 p-4">
                <div class="d-flex">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Post Details</a>
                        </li>
                    </ul>
                    <a class="btn btn-secondary" href="/learnphp/blogpost/admin/category">All Posts</a>
                </div>
                <hr>
                <form method="POST">
                    <?php if (!empty($errors['general'])): ?>
                        <div class="alert alert-danger">
                            <?= $errors['general'] ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control"
                            value="<?= htmlspecialchars($title) ?>">
                        <?php if (!empty($errors['title'])): ?>
                            <small class="text-danger"><?= $errors['title'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control"
                            value="<?= htmlspecialchars($slug) ?>">
                        <?php if (!empty($errors['slug'])): ?>
                            <small class="text-danger"><?= $errors['slug'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Select Category --</option>

                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"
                                    <?= ($category['id'] == $categoryId) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <?php if (!empty($errors['categoryId'])): ?>
                            <small class="text-danger"><?= $errors['categoryId'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Content</label>
                        <textarea name="content" class="form-control"><?= htmlspecialchars($content) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <input type="text" name="thumbnail" class="form-control"
                            value="<?= htmlspecialchars($thumbnail) ?>">
                    </div>

                    <button class="btn btn-primary">Create Post</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>