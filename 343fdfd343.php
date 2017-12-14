<?php
session_start();




if(empty($_SESSION["username"])){

    header("Location: adefee.html");




}



require "Conn.php";
$query = "select * from appliers";
$Results = $conn->query($query);
$i =0;

if($Results->num_rows > 0){
	while ($rows = $Results->fetch_assoc()) {

		$names[$i]= $rows["name"];
    $e[$i]=$rows["email"];
      //  echo "$names[$i]<br>";
		$i++;
	}
	/*foreach($names as $name){
	echo "<a href='Applicants/$name/'>$name</a><br>";
}*/
}



?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body background="css/2.jpg">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-md-4 col-lg-2">

        </div>
        <div class="col-md-4 col-lg-8 third">

         <div style="background-color: black; opacity: 0.9;">

            <h3 style="text-align: center ;">Welcome to Admin Page</h3><br>
            <h6 style="text-align: center ;">Appliers</h6>


            <div style="text-align: center;">
              

                <br><br><br>

        	<?php  
            $i=1;
            $j=0;
            if(!empty($names)){
           
           foreach($names as $name){


          $check = "select * from appliers where name='$name'";
          $r= $conn->query($check);
          if($r->num_rows > 0){

    while($account = $r->fetch_assoc()){
      
      if ($account["result"] == '0' ) {

        $l= 0;


      }
      else if($account["result"] == '1'){

        $l= 1;

      }
      else{
        $l= 2;

      }
    }

}



            $ac = "ac('$e[$j]','s$j')";
            $deaccept = "de('$e[$j]','s$j')";

            $approve = "<input  type='button' value='Approve' onclick=$ac > ";
            $decline = "<input  type='button' value='Decline' onclick=$deaccept >";
            $profile = "<a style='padding-left:40px;padding-right:40px;' href='Applicants/$name/profile.php'>Profile</a>";
            $pdfprofile ="<a  style='padding-left:40px;padding-right:40px;' href='Applicants/$name'>pdf profile</a>";

            
            //$link = "<a href='accept.php?name=$name'>link</a>";

        	echo "$i. $name <a   style='padding-left:40px;padding-right:40px;' href='Applicants/$name/index.pdf'> CV </a>".
                $profile.$pdfprofile;

                echo "<div id='s$j'>";
                if ($l==0) {
                  echo $approve.$decline."<br><br>";
                }
                elseif ($l==1) {
                  echo "accepted<br><br>";
                }
                else{
                   echo "declined<br><br>";

                }
                echo "</div>";

            
                $i++;
                $j++;

        		}
}

        	?>

      
        </div>
        	
        </div>
    </div>
        <div class="col-md-4 col-lg-2">

            <a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
        	
        </div>
    </div>
</div>


<script type="text/javascript">
function ac(email,num) {
  //document.getElementById("demo").innerHTML = "accepted";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = "accepted";

    }
  };
  xhttp.open("GET", "accept.php?email="+email, true);
  document.getElementById(num).innerHTML = "accepted";
  xhttp.send();
}
</script>

<script type="text/javascript">
      function de(email,num) {
        //document.getElementById("demo").innerHTML = "declined";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = "declined";
    }
  };
  xhttp.open("GET", "decline.php?email="+email, true);
  document.getElementById(num).innerHTML = "declined";
  xhttp.send();
}
</script>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>

