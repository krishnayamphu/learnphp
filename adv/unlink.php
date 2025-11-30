<?php
$filename = "uploads/img.gif";
if (file_exists($filename)) {
    if (unlink($filename)) {
        echo "The file $filename was deleted successfully.";
    } else {
        echo "Error: Could not delete the file $filename.";
    }
} else {
    echo "The file $filename does not exist.";
}
