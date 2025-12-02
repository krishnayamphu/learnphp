<?php
$res = file_get_contents('data.json');
$data = json_decode($res, true);
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Language</th>
                    <th scope="col">Bio</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $key => $value) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $value['id'] ?></th>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['language'] ?></td>
                        <td><?php echo $value['bio'] ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-primary" href="#">Edit</a>
                                <a class="btn btn-danger" href="#">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>