<?php
$file = fopen("doc.txt", "r") or die("Unable to open file!");
echo fread($file, filesize("doc.txt"));
fclose($file);
