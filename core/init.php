<?php
    $db = mysqli_connect('localhost:3307','root','','onlineshop');
    if(mysqli_connect_errno()){
        echo 'db connection error'.myssqli_connect_error();
        die();
    }
require $_SERVER['DOCUMENT_ROOT'].'/php workspace1/online shop/config.php';
require BASEURL.'helpers/helpers.php';