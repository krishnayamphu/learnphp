<?php
$dir = 'uploads'; // Replace with your directory path
$files = glob($dir . '/*'); // Lists all files and directories

foreach ($files as $file) {
    if (is_file($file)) { // Check if it's a file (not a directory)
        // echo basename($file) . "<br>"; // Display only the filename

        echo "<img src='" . $file . "'>";
    }
}

// To list only .txt files:
// $txtFiles = glob($dir . '/*.txt');
