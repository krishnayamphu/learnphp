<?php
require "../../filters/authFilter.php";

$uploadDir = __DIR__ . "/uploads/";
$uploadUrl = "/learnphp/blogpost/admin/media/uploads/";

$files = glob($uploadDir . "*");
$files = $files ?: []; // if false, make empty array

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image'])) {
    $fileName = basename($_POST['image']);
    $filePath = $uploadDir . $fileName;

    if (is_file($filePath)) {
        unlink($filePath);
        $files = glob($uploadDir . "*") ?: [];
    }
}
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
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-6 g-4">

            <?php if (empty($files)): ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        No files found
                    </div>
                </div>
            <?php else: ?>

                <?php foreach ($files as $file):
                    $fileName = basename($file);
                ?>
                    <div class="col">
                        <a href="<?= $uploadUrl . $fileName ?>" target="_blank">
                            <img src="<?= $uploadUrl . $fileName ?>" class="img-fluid rounded">
                        </a>

                        <form method="post">
                            <input type="hidden" name="image" value="<?= $fileName ?>">
                            <button class="btn btn-danger btn-sm mt-2" type="submit">
                                Remove
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>
    <?php mysqli_close($conn) ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>