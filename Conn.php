<?php
$servername ="localhost";
$username = "authentic";
$password = "suman123";
$database = "authenti_lectureprogram";
$conn=new mysqli($servername,$username,$password,$database) or die("cant connect");

if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}



?>