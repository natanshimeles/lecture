<?php
session_start();
require 'Conn.php';

$key = $_SESSION["key"];


$getemail="select * from reset";
$result=$conn->query($getemail);

 if($result->num_rows > 0){
    	
    	while($row= $result->fetch_assoc()){
    	
    	
    	if($key==$row["key"]){
    	
    	 $email=$row["email"];
    	 //echo "done";
    	 break;
    	
    	
    	
    	
    	}
    	
    	}
    	
    	
    	}


if(!empty($email)){



      if($query="update userandpassword SET pasword=? where email = '$email'"){
      $stmt = $conn->prepare($query);
      $stmt->bind_param("s",$password);
      $password=md5($_POST["password"]);
      
      $stmt->execute();
       echo "<a href='login.html'>you can login with your new password now</a>";

      
      
      
      }
      else{
      echo "error occured";
      
      
      }
      
     
      
     





}
else{

 echo "error occured";


}







?>