<?php
$res = '{"name":"John Doe","age":30,"city":"New York","is_student":true}';

$data = json_decode($res, true);

echo "Name: " . $data['name'] . "<hr>";

foreach ($data as $key => $value) {
    echo "$key: $value<br>";
}
