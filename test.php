<?php
$mysqli = new mysqli("localhost", "authentic", "suman123", "authenti_lectureprogram");

/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}


if($stmt = $mysqli->prepare("INSERT INTO userandpassword(email, pasword) VALUES (?,?)")){
$stmt->bind_param("ss",$email,$pasword);
$email='natan@yah.com';
$pasword='123456'; 

$stmt->execute();
echo "sucessful";

}

 
$sql = "INSERT INTO userandpassword (email, pasword) VALUES (?, ?)";
 
if($stmt = $mysqli->prepare($sql)){
    $stmt->bind_param("ss", $email, $pasword);
    
    $email = "addanist@gmail.com";
    $pasword = "addan123";
    $stmt->execute();
    
    $email = "test@test.com";
    $last_name = "test123";
    $stmt->execute();
    
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
}
 
$stmt->close();
 
$mysqli->close();
?>