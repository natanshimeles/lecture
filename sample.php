<?php
$root =$_SERVER['DOCUMENT_ROOT'];
require "$root/program/fpdf/fpdf.php";
require "$root/program/Conn.php";


class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
}





$create=fopen("index.txt", "r");
$name= fgets($create);
fclose($create);
$profile = "select * from person where firstname='$name'";
$resultprofile = $conn->query($profile);

if($resultprofile->num_rows > 0){

    while ($rows = $resultprofile->fetch_assoc()) {
        $firstname = $name;
        $lastname = $rows["lastname"];
        $gender =$rows["gender"];
        $passno = $rows["passno"];
        $dob=$rows["dob"];
        $Nationality= $rows["nationality"];
        $title =$rows["title"];
        $cellpo = $rows["Cellpo"];
        $institution= $rows["inistitution"];
        $email=$rows["email"];
        $preferredtime = $rows["preferredtime"];


    }



}

$course1 = "select * from course1 where email='$email'";
$resultc1=$conn->query($course1);

if($resultc1->num_rows > 0){

    while ($rows = $resultc1->fetch_assoc()) {
        $course1title=$rows["title"];
        $course1str =$rows["structure"];
        $course1precour =$rows["precour"];
        $course1textbook = $rows["textbook"];
        $course1ref = $rows["ref"];
        $course1AIMS = $rows["AIMS"];


    }



}






$course2 ="select * from course2 where email='$email'";
$resultc2=$conn->query($course2);

if($resultc2->num_rows > 0){

    while ($rows = $resultc2->fetch_assoc()) {
        $course2title=$rows["title"];
        $course2str =$rows["structure"];
        $course2precour =$rows["precour"];
        $course2textbook = $rows["textbook"];
        $course2ref = $rows["ref"];
        $course2AIMS = $rows["AIMS"];


    }



}



$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
//numbers are box height and width
$pdf->cell(200,20,"Personal profile");
$pdf->Image('index.jpg',170,6,30);
$pdf->Ln();
$pdf->Ln();

$fullname = "Full Name: ".$lastname." ".$firstname;
$pdf->Cell(100,20,$fullname,1);
$pdf->cell(70,20,"Gender :".$gender,1);
$pdf->Ln();
$pdf->Cell(100,20,"passport number: ".$passno,1);
$pdf->cell(70,20,"Date of Birth:".$dob,1);
$pdf->Ln();
$pdf->Cell(100,20,"Nationality: ".$Nationality,1);
$pdf->cell(70,20,"title:".$title,1);
$pdf->Ln();
$pdf->Cell(100,20,"Cell phone: ".$cellpo,1);
$pdf->cell(70,20,"Inistitution:".$institution,1);
$pdf->Ln();
$pdf->Cell(100,20,"Email: ".$email,1);
$pdf->Cell(70,20,"preferred time: ".$preferredtime ,1);
$pdf->Ln();
$pdf->Ln();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->cell(200,20,"Course Information(Option 1)");
 $pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->WriteHTML("course title: ".$course1title);
 $pdf->Ln();
 $pdf->Ln();
 $pdf->WriteHTML("course Structure".$course1str);
 $pdf->Ln();
 $pdf->Ln();
 $pdf->WriteHTML("course Precourses: ". $course1precour);
 $pdf->Ln();
 $pdf->Ln();
 $pdf->WriteHTML("course Textbooks: ".$course1textbook);
 $pdf->Ln();
 $pdf->Ln();
 $pdf->WriteHTML("course Reference: ".$course1ref);
 $pdf->Ln();
 $pdf->Ln();
 

 $pdf->WriteHTML("course AIMS: ".$course1AIMS);
 $pdf->Ln();
 $pdf->Ln();


 $pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->cell(200,20,"Course Information(Option 2)");
 $pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->WriteHTML("course title: ".$course2title);
 $pdf->Ln();
  $pdf->Ln();
 $pdf->WriteHTML("course Structure:  ".$course2str);
 $pdf->Ln();
  $pdf->Ln();
 $pdf->WriteHTML("course Precourses: ".$course2precour);
 $pdf->Ln();
  $pdf->Ln();
 $pdf->WriteHTML("course Textbooks: ".$course2textbook);
 $pdf->Ln();
  $pdf->Ln();
$pdf->WriteHTML("course Reference: ".$course2ref);
 $pdf->Ln();
  $pdf->Ln();
$pdf->WriteHTML("course AIMS: ".$course2AIMS);
 $pdf->Ln();
 $pdf->Ln();





 



	





$pdf->SetTitle("Personal profile of ".$fullname);


$pdf->Output();









?>