<?php
session_start();
require "Conn.php";
session_start();
$emailfound=false;
$passwordfound=false;

if(isset($_POST["email"]) &&isset($_POST["password"])){
	$email = $_POST["email"];
    $password= $_POST["password"];
    

  



    $query ="select * from userandpassword";
    $result=$conn->query($query);
    
    if($result->num_rows > 0){
    	
    	while($row= $result->fetch_assoc()){

    		if($email== $row["email"]){
                $emailfound=true;
    			
    		
    		
    	}


}


    }
    //echo md5($password)."<br>";

   if($emailfound){
    $PassWordQuery= "select * from userandpassword ";
                $paswordResult = $conn-> query($PassWordQuery);
                if($paswordResult->num_rows>0){
                while($row = $paswordResult->fetch_assoc()){
                if($email==$row["email"]){
                //echo $row["pasword"]."<br>";
                    if(md5($password)==trim($row["pasword"])){
                  
                    
                        $passwordfound=true;
                        $_SESSION["name"] = $email;
                        
                        break;
                    }
                    
}
                }
            }
    
}

	}

    if($emailfound && $passwordfound){
      // echo "sucessfully logged in";
       $_SESSION["name"] = $email;
       $_SESSION["password"]=$password;
        header("Location: formtofillin.php");


    }
    else if(!$emailfound && $passwordfound){
        echo "Wrong email address or password<a href='login.html'>try again</a>";



    }
    else if($emailfound && !$passwordfound){
        echo "Wrong email address or password <a href='login.html'>try again</a>";



    }
    else {
       echo "Wrong email address or password <a href='login.html'>try again</a>";
        
    }


?>


