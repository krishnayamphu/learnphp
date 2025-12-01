<?php
$file = fopen("doc.txt", "a");
fwrite($file, " , This is appended data.");
fflush($file);
echo "data append successfully";
fclose($file);
