<?php
setcookie("user", "John Doe", time() - 3600, "/"); // 1 hour ago     
echo "Cookie 'user' has been deleted.";
