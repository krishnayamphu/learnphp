<?php
session_start();
require "../../config/connect_db.php";
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM category WHERE id=1";

$result = mysqli_query($conn, $sql);
$data = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data = ['id' => $row['id'], 'name' => $row['name'], 'slug' => $row['slug'], 'description' => $row['description']];
    }
    echo json_encode($data);
} else {
    echo "0 results";
}

mysqli_close($conn);
