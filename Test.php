<?php
$json = file_get_contents('php://input');
$data = json_decode($json);
echo "Username : " .  $data->name;
echo " Password : " .  $data->password;
?>