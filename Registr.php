<?php
require "Conn.php";



       $key=$_GET["key"];
       
       $query="select * from tempemailandpassword ";
       
       $result=$conn->query($query);
       
       
  
       if($result->num_rows >0){
       
    	
    	while($row= $result->fetch_assoc()){

    		
    		
                 if($key==$row["kl"]){
                 $email= $row["email"];
    		
    	
    		
    		$password=$row["pasword"];
    		
                 break;
                 }
       
       
       
       
       
       }
       }
       
       
       
       $putintoaccout ="INSERT INTO userandpassword(email, pasword) VALUES (?, ?)";
       $resultq= $conn->prepare($putintoaccout);
       $resultq->bind_param("ss", $e, $pasword);
       
       
       $e= $email;
       $pasword=md5($password);
       
       if($resultq->execute()){
       echo "Sucessfully Registered please go to <a href='http://authentichimalaya.com/program/login.html'>login page</a>";

       
}
       




	
    
        
    
    





?>