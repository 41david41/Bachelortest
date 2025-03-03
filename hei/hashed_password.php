<?php
$hashedPassword = password_hash("marcus123", PASSWORD_DEFAULT);
echo "Hashed Password: " . $hashedPassword;
?>
