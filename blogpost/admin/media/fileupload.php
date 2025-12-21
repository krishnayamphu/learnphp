<?php
require "../../filters/authFilter.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {

    $target_dir = __DIR__ . "/uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    $fileName = time() . "_" . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // File size (5MB)
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "File is too large.";
        $uploadOk = 0;
    }

    // Allowed formats
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Only JPG, JPEG, PNG & GIF allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Upload failed.";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload File</title>
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
                            <a class="nav-link" aria-disabled="true" href="/learnphp/blogpost/admin/media">Media Files</a>
                        </li>
                    </ul>
                </div>
                <hr>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" name="fileToUpload" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>