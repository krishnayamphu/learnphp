<?php
$file = fopen("doc.txt", "w");
fwrite($file, "Hello world");
echo "data written successfully";
fclose($file);
