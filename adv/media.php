<?php
$dir = 'uploads';
$files = glob($dir . '/*');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image'])) {
    $imageToDelete = $_POST['image'];
    if (in_array($imageToDelete, $files) && is_file($imageToDelete)) {
        unlink($imageToDelete);
        // Refresh the file list after deletion
        $files = glob($dir . '/*');
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


    <div class="container mt-5">
        <div class="row justify-content-center">

            <?php include 'form.php'; ?>
            <hr class="my-4">
            <div class="col">
                <h1 class="mb-4">Media Files</h1>
                <div class="row row-cols-1 row-cols-lg-6 g-4">
                    <?php
                    foreach ($files as $file) {
                        if (is_file($file)) {
                    ?>
                            <div class="col">
                                <a href="<?php echo $file; ?>" target="_blank">
                                    <img src="<?php echo $file; ?>" class="img-fluid" alt="<?php echo basename($file); ?>">
                                </a>
                                <form action="" method="post">
                                    <input type="hidden" name="image" value="<?php echo $file; ?>">
                                    <button class="btn btn-danger mt-2" type="submit">Remove</button>
                                </form>

                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>