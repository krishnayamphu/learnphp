<?php
require "../../filters/authFilter.php";
require "../../config/connect_db.php";
require "../../dao/category_functions.php";

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$category = getCategory($conn, $id);

if (!$category) {
    die('Category not found');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($name === '') {
        $errors['name'] = 'Name is required';
    } elseif (!preg_match('/^[a-z0-9][a-z0-9_]{0,28}[a-z0-9]$/i', $name)) {
        $errors['name'] = 'Invalid name format';
    }

    if ($slug === '') {
        $errors['slug'] = 'Slug is required';
    } elseif (!preg_match('~^[a-z0-9-]+$~', $slug)) {
        $errors['slug'] = 'Invalid slug format';
    }

    if (empty($errors)) {
        if (updateCategory($conn, $id, $name, $slug, $description)) {
            header("Location: index.php");
            exit;
        } else {
            $errors['general'] = 'Failed to update category';
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category Details</title>
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
                            <a class="nav-link disabled" aria-disabled="true">Category Details</a>
                        </li>
                    </ul>
                    <a class="btn btn-secondary" href="/learnphp/blogpost/admin/category">All Categories</a>
                </div>
                <hr>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            value="<?= htmlspecialchars($category['name'], ENT_QUOTES) ?>">
                        <?php if (!empty($errors['name'])): ?>
                            <small class="text-danger"><?= $errors['name'] ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text"
                            name="slug"
                            class="form-control"
                            value="<?= htmlspecialchars($category['slug'], ENT_QUOTES) ?>">
                        <?php if (!empty($errors['slug'])): ?>
                            <small class="text-danger"><?= $errors['slug'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description"
                            class="form-control"><?= htmlspecialchars($category['description'], ENT_QUOTES) ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>