<?php
    require("/decode.php")
    require("/checkUser.php")
    require("/conection.php")

    $data = decode()
    $con = conectionBD()
    checkUser($con,$data->user,$data->password)

?>