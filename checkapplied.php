<?php 
require 'Conn.php';
function checkifapplied($email,$conn)
{

   $querys = "select * from appliers ";  
   $results=$conn->query($querys );
   
   
   
   
   

   if( $results->num_rows>0){
  
    	while($row= $results->fetch_assoc()){

    		if($row["email"]==$email){
    		return false;
    		
                 
   
   
   }
   
   
   
      
            
           

       }



   
}
return true;

}




?>