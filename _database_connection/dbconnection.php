<?php

$host = "localhost";
$username = "root";
$password = "son11son";
$database = "shoppingcart";

$connect = mysqli_connect($host, $username,$password,$database);

if(!$connect)
{
    die("connection failed" . mysqli_connect_error());
}

?>