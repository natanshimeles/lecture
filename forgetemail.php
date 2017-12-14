<?php
session_start();
$mysqli = new mysqli("localhost", "authentic", "suman123", "authenti_lectureprogram");


$to = $_GET["email"];
$k =generateRandomString(99);
$subject ='reset password' ;
$message = "http://authentichimalaya.com/program/resetpassword.php?key=$k";
$headers = 'From: info@authentichimalaya.com' . "\r\n" .
    'Reply-To: webmaster@authentichimalaya.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message)){

$sql = "INSERT INTO reset (email,kl) VALUES (?, ?)";
  if($stmt = $mysqli->prepare($sql)){
      $stmt->bind_param("ss",$email,$keys);
      $email=$to;
      $keys=$k; 

      $stmt->execute();
      echo "sucessful";

}
else{
 echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;


}
  
  
  /*$email=$to;
  $key=$k;
  
  $query ="insert into reset values('$to','$key')";
  $resukt=$conn->query($query);


      */



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