<?php
require 'Conn.php';


$query = "update appliers set result='0' where email =?";
$stmt = $conn->prepare($query );

$stmt->bind_param("s", $email);
$email=$_GET["email"];
$stmt->execute();

echo $email;

$create =fopen("NAN/index.txt","w" );
fwrite($create, "hi");
fclose($create);




?>