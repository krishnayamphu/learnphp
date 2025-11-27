<?php
setcookie("user", "John Doe", time() + (86400 * 30), "/"); // 86400 = 1 day     
echo "Cookie 'user' has been set.";
