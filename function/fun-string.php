<?php
$msg = "Hello";

echo "Length:" . strlen($msg);
echo "<br>Word Count:" . str_word_count($msg);
echo "<br>Reverse:" . strrev($msg);
echo "<br>Position of 'lo':" . strpos($msg, "lo");
echo "<br>Replace 'Hello' with 'Hi':" . str_replace("Hello", "Hi", $msg);
echo "<br>Uppercase:" . strtoupper($msg);
echo "<br>Lowercase:" . strtolower("HELLO");
echo "<br>First Character Uppercase:" . ucfirst("hello");
echo "<br>First Letter of Each Word Uppercase:" . ucwords("hello world");
echo "<br>Trimmed String:" . trim("  Hello World  ");
echo "<br>Equal string:" . strcmp("Hello", "HELLO"); //0 if equal, <0 if str1<str2, >0 if str1>str2
echo "<br>Equal string:" . strcasecmp("HELLO", "hello"); //case insensitive comparison
