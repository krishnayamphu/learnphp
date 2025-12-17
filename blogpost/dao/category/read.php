<?php
session_start();
require "../../config/connect_db.php";

$sql = "SELECT * FROM category";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['slug'] . "</td>";
        echo "<td class='d-flex gap-2'> <a class='btn btn-primary' href='/learnphp/blogpost/admin/category/edit.php?id=" . $row['id'] . "'>Edit</a>
                                    <form action='delete.php' method='post'>
                                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                                        <button class='btn btn-danger'>Delete</button>
                                    </form></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
