<?php
require "../../filters/authFilter.php";
require "../../config/connect_db.php";
require "../../dao/category_functions.php";
require "../../dao/category_functions.php";
require "../../dao/post_functions.php";

$categories = getCategories($conn);
$posts = getPosts($conn);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    if ($id <= 0) {
        $errors['id'] = 'Invalid category ID';
    }
    if (empty($errors)) {
        if (deletePost($conn, $id)) {
            header("Location: index.php");
            exit;
        } else {
            $errors['general'] = 'Failed to delete post';
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 bg-info vh-100 py-4 px-2">
                <?php include "../sidebar.php" ?>
            </div>
            <div class="col-lg-10 p-4">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">All Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/learnphp/blogpost/admin/posts/create.php">Add Post</a>
                    </li>
                </ul>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#SN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php if (empty($posts)): ?>
                            <tr>
                                <td colspan="4" class="text-center">No posts found</td>
                            </tr>
                            <?php else:
                            $sn = 1;
                            foreach ($posts as $row): ?>
                                <tr>
                                    <td><?= $sn++ ?></td>
                                    <td><?= htmlspecialchars($row['title'], ENT_QUOTES) ?></td>
                                    <td><?= htmlspecialchars($row['slug'], ENT_QUOTES) ?></td>
                                    <td class="d-flex gap-2">
                                        <a class="btn btn-success" href="edit.php?id=<?= $row['id'] ?>">Edit</a>

                                        <form method="post" onsubmit="return confirm('Delete this category?');">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php mysqli_close($conn) ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>