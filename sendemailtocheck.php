<?php
require 'Conn.php';

$password = $_POST["password1"];
$key =generateRandomString(99);
$accountexist =false;
$email=$_POST["email"];
    $querycheck ="select email from userandpassword";
    $resultq= $conn->query($querycheck);
    if( $resultq->num_rows>0){
    	while($row= $resultq->fetch_assoc()){

    		if($email== $row["email"]){
    		echo $row["email"];
    		$accountexist =true;
                die( "account already exist please <a href='login.html'>login </a>");
    			

      }

    }
    
    }
    
    
    if(true){
    

   $q = "INSERT INTO tempemailandpassword(email, pasword, kl) VALUES (?,?,?)";
   $stmt = $conn->prepare($q);
   $stmt->bind_param("sss",$email,$pasword,$kl );
   $email= $_POST["email"];
   $pasword=md5($password) ; 
   $kl=$key;
   $stmt->execute();
   
   
   
   

$to = $_POST["email"];
$subject = 'email verification';
$message = "http://authentichimalaya.com/program/Registr.php?key=$key";
$headers = 'From: info@authentichimalaya.com' . "\r\n" .
    'Reply-To: info@authentichimalaya.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message)){

       echo "email sent";



}
else{
    echo "not send";

}

}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?> 