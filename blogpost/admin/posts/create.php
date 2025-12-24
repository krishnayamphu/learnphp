<?php
require "../../filters/authFilter.php";
require "../../config/connect_db.php";
require "../../dao/category_functions.php";
require "../../dao/post_functions.php";


$uploadDir = __DIR__ . "/../media/uploads/";
$uploadUrl = "/learnphp/blogpost/admin/media/uploads/";

$files = glob($uploadDir . "*");
$files = $files ?: []; // if false, make empty array

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
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/47.3.0/ckeditor5.css" />
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
                        <textarea style="min-height: 400px!important;" id="editor" name="content" class="form-control"><?= htmlspecialchars($content) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <div class="d-flex gap-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary flex-shrink-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Set Thumbnail
                            </button>
                            <input type="text" name="thumbnail" id="thumbnail" class="form-control"
                                value="<?= htmlspecialchars($thumbnail) ?>">

                        </div>
                    </div>

                    <button class="btn btn-primary">Create Post</button>
                </form>


                <!-- Start Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">All Media Files</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php if (empty($files)): ?>
                                    <div class="col-12">
                                        <div class="alert alert-warning text-center">
                                            No files found
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4 mb-4">
                                        <?php foreach ($files as $file):
                                            $fileName = basename($file);
                                        ?>
                                            <div class="col">
                                                <a href="#" data-bs-dismiss="modal" onclick="setThumbnail('<?= $fileName ?>')">
                                                    <img src="<?= $uploadUrl . $fileName ?>" class="img-fluid rounded">
                                                </a>
                                            </div>

                                        <?php endforeach; ?>
                                    </div>

                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Select</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/47.3.0/ckeditor5.umd.js"></script>

    <script>
        function setThumbnail(name) {
            $("#thumbnail").val(name);
        }

        $(document).ready(() => {
            const {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph
            } = CKEDITOR;

            ClassicEditor
                .create($('#editor')[0], {
                    licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3OTgxNTY3OTksImp0aSI6ImQxMDNjZjVhLTc2NWUtNDlmNC04YjQ0LTFmNWJmNDY4MGViNyIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCIsIkUyUCIsIkUyVyJdLCJyZW1vdmVGZWF0dXJlcyI6WyJQQiIsIlJGIiwiU0NIIiwiVENQIiwiVEwiLCJUQ1IiLCJJUiIsIlNVQSIsIkI2NEEiLCJMUCIsIkhFIiwiUkVEIiwiUEZPIiwiV0MiLCJGQVIiLCJCS00iLCJGUEgiLCJNUkUiXSwidmMiOiI4NjIzNDQ5OCJ9.-fj15u89nv2xg19FYHGvzhUa7nvLYUtuPo9YHISdvQhMvcGLNdp99vNjO6Ppwkdl-6K3klB6CfEvizse9zgGrQ',
                    plugins: [Essentials, Paragraph, Bold, Italic, Font],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'paragraph'
                    ]
                })
                .then(editor => {
                    // Editor initialized successfully.
                    console.log('CKEditor 5 initialized with jQuery!');
                })
                .catch(error => {
                    console.error('Error initializing CKEditor 5:', error);
                });
        });
    </script>
</body>

</html>