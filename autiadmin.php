<?php

session_start();
require "Conn.php";
if (isset($_POST["username"])  && isset($_POST["password"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];


	$adminquery = "select * from admincontrol";
	$results =$conn->query($adminquery);
	if($results->num_rows > 0){

		while($account = $results->fetch_assoc()){
			
			if ($account["username"] == $username ) {
				$passwordcheck = "select * from admincontrol";
				$resultpass = $conn->query($passwordcheck);

				if ($resultpass->num_rows > 0) {
					while ($p =  $resultpass->fetch_assoc()) {
					
					
                                            if($p["username"]==$username){
						if(trim($p["password"])== md5($password)){

							$_SESSION["username"]=$username;
							header("Location: 343fdfd343.php");

}

						}
						
					}



					
				}
				else{
					echo "wrong username or password";
				}
 


				
			}
			else{
				echo "wrong user name or password";
			}




		}

	}





	
}





?>