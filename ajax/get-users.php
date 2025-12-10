<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnphp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "";
if (empty($_GET['q'])) {
    $sql = "SELECT * FROM users";
} else {
    $q = $_GET['q'];
    $sql = "SELECT * FROM users WHERE email like '" . $q . "%'";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
