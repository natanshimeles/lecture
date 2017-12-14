<?php

session_start();
require "Conn.php";
require "checkapplied.php";





$email = htmlentities($_SESSION["name"]);
$firstname=htmlentities($_POST["fname"]);
$lastname=htmlentities($_POST["lname"]);
$gender=htmlentities($_POST["Gender"]);
$passno=htmlentities($_POST["passno"]);
$dob=htmlentities($_POST["dob"]);
$nationality=htmlentities($_POST["Nationality"]);
$inistitution=htmlentities($_POST["inst"]);
$title=htmlentities($_POST["title"]);
$Cellpo=htmlentities($_POST["cellpo"]);
$preferredtime=htmlentities($_POST["pts"]);








$cousetit1=htmlentities($_POST["coursetit1"]);
$courseAim1 = htmlentities($_POST["courseaims1"]);
$coursestru1=htmlentities($_POST["coursestru1"]);
$preqcour1=htmlentities($_POST["Prerequisite1"]);
$textbooks1=htmlentities($_POST["Textbooks1"]);
$ref1=htmlentities($_POST["References1"]);



$cousetit2=htmlentities($_POST["coursetit2"]);
$courseAim2 = htmlentities($_POST["courseaims2"]);
$coursestru2=htmlentities($_POST["coursestru2"]);
$preqcour2=htmlentities($_POST["Prerequisite2"]);
$textbooks2=htmlentities($_POST["Textbooks2"]);
$ref2=htmlentities($_POST["References2"]);









 $mainfoldername="Applicants";
 $name=$_POST["fname"];







if(checkifapplied($email,$conn)){
   $query ="insert into appliers values('$email','$name','0')";
   $resultq= $conn->query($query);
   
   
   $queryperson="INSERT INTO person(email, firstname, lastname, gender, passno, dob, nationality, inistitution, title, Cellpo, preferredtime) VALUES
   (?,?,?,?,?,?,?,?,?,?,?) ";
   $stmt0=$conn->prepare($queryperson);
   $stmt0->bind_param("sssssssssss",$email,$firstname,$lastname,$gender,$passno,$dob,$nationality,$inistitution,$title,$Cellpo,$preferredtime);
  
   
   $email = htmlentities($_SESSION["name"]);
   $firstname=htmlentities($_POST["fname"]);
   $lastname=htmlentities($_POST["lname"]);
   $gender=htmlentities($_POST["Gender"]);
   $passno=htmlentities($_POST["passno"]);
   $dob=htmlentities($_POST["dob"]);
   $nationality=htmlentities($_POST["Nationality"]);
   $inistitution=htmlentities($_POST["inst"]);
   $title=htmlentities($_POST["title"]);
   $Cellpo=htmlentities($_POST["cellpo"]);
   $preferredtime=htmlentities($_POST["pts"]);
   $stmt0->execute();







  $querycourse1="INSERT INTO course1(email, title, structure, precour, textbook, ref, AIMS) VALUES(?,?,?,?,?,?,?)";
  $stmt1 = $conn->prepare($querycourse1);

   $stmt1->bind_param("sssssss",$email,$cousetit1,$coursestru1,$preqcour1,$textbooks1,$ref1,$courseAim1);
   
   $email = htmlentities($_SESSION["name"]);
   $cousetit1=htmlentities($_POST["coursetit1"]);
   $courseAim1 = htmlentities($_POST["courseaims1"]);
   $coursestru1=htmlentities($_POST["coursestru1"]);
   $preqcour1=htmlentities($_POST["Prerequisite1"]);
   $textbooks1=htmlentities($_POST["Textbooks1"]);
   $ref1=htmlentities($_POST["References1"]);
   $stmt1->execute();         
   
   
                            

   $querycourse2="INSERT INTO course2(email, title, structure, precour, textbook, ref, AIMS) VALUES(?,?,?,?,?,?,?)";

   $stmt2 = $conn->prepare($querycourse2); 
   $stmt2->bind_param("sssssss",$email,$cousetit2,$coursestru2,$preqcour2,$textbooks2,$ref2,$courseAim2); 
   $email = htmlentities($_SESSION["name"]);
   $cousetit2=htmlentities($_POST["coursetit2"]);
   $courseAim2 = htmlentities($_POST["courseaims2"]);
   $coursestru2=htmlentities($_POST["coursestru2"]);
   $preqcour2=htmlentities($_POST["Prerequisite2"]);
   $textbooks2=htmlentities($_POST["Textbooks2"]);
   $ref2=htmlentities($_POST["References2"]);
   $stmt2->execute();                                           








 if(!file_exists("$mainfoldername/$name/$name.txt")){
   $php = "index";
   $index ="index";
   mkdir($mainfoldername."/".$name, 0755);
   $create = fopen($mainfoldername."/".$name."/".$index."."."txt","w");
   fwrite($create, $firstname);
   fclose($create);
   
  


   $oldplace = 'sample.php';
   $newplace = "$mainfoldername/$name/"."index.php";

   if (!copy($oldplace, $newplace)) {
          echo "failed to copy $file...\n";
       }

    if(!copy("sampleProfile.php","$mainfoldername/$name/profile.php")){
         echo "falied to copy sample profile..\n";


      }


 
 
 if (isset($_FILES['image'])) {
   $errors= array();
   $image_name = $_FILES['image']['name'];
   $image_size =$_FILES['image']['size'];
   $image_tmp =$_FILES['image']['tmp_name'];
   $image_type=$_FILES['image']['type'];
   $imageex= explode('.',$_FILES['image']['name']);
   $imageend = end($imageex);
   $image_ext=strtolower($imageend);

   //$expensions= array("jpg","jpg","jpg");
   $newimagename = "index.jpg";



   move_uploaded_file($image_tmp,"$mainfoldername/$name/$newimagename");


    
 }


 if(isset($_FILES['cv'])){
      $errors= array();
      $cv_name = $_FILES['cv']['name'];
      $cv_size =$_FILES['cv']['size'];
      $cv_tmp =$_FILES['cv']['tmp_name'];
      $cv_type=$_FILES['cv']['type'];
      $cvex= explode('.',$_FILES['cv']['name']);
      $cvend = end($cvex);
      $cv_ext=strtolower($cvend);
      
     
     
      move_uploaded_file($cv_tmp,"$mainfoldername/$name/index.pdf");

      
     /* if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }*/
      
      /*if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }*/
      
     /* if(empty($errors)==true){
         //$temp = explode(".", $file_name);
         $newfilename = "index.pdf";
         
//move_uploaded_file($cv_tmp,"$mainfoldername/$name/$newfilename");



         
         



         echo "Success";
      }else{
         print_r($errors);
      }*/
      
   }
   
   
  header("Location: SeeResult.php");

}



}
else{
   
   header("Location: SeeResult.php");






}



?>