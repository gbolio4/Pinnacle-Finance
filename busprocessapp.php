<?php
// Start the session
session_start();
$_SESSION["applyidbus"] = $_POST["applicationidbus"];
//
//$var_value = $_SESSION['varname'];
error_reporting (E_ALL ^ E_NOTICE); 

//$pfrom = $_POST["formsrc"];

//if ($pfrom == "cont") 
//{	contacthandle();  }
//elseif ($pfrom == bus) 
	bushandle(); 
//elseif ($pfrom == per) 
//{	perhandle();  }
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

function bushandle()  {    
$bappcode = $_SESSION["applyidbus"];
$ftitle = $_POST["FormTitle"];  
$fullname = $_POST["YourFullName"];
$officeposition = $_POST["OfficePositionTitle"];
$phone = $_POST["PhoneNumber"];
$email = $_POST["EmailAddress"];
$fulladdress = $_POST["FullBusinessAddress"];
$bname = $_POST["BusinessName"];
$itype = $_POST["IndustryType"];
$tibus = $_POST["TimeInBusiness"];
$ostru = $_POST["OwnershipStructure"];
$amrev = $_POST["AverageMonthlyRevenue"];
$loanamount = $_POST["RequestedLoanAmount"];
$tellmore = $_POST["TellUsMore"];



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
$data .= "Application Number is".":   "." <b>$bappcode</b> \n";
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
$data .= "Name of the Business or Company is".":   "." <b>$bname</b> \n";
$data .= "<br />";
$data .= "Full Business or Office Address of applicant is".":   "." <b>$fulladdress</b> \n";
$data .= "<br />";
$data .= "Position, Post or Title of applicant at the business is".":   "." <b>$officeposition</b> \n";
$data .= "<br />";
$data .= "Industry Type of the Company".":   "." <b>$itype</b> \n";
$data .= "<br />";
$data .= "How long is the Company in Business"."?   "." <b>$tibus</b> \n";
$data .= "<br />";
$data .= "What is the Company's ownership and business structure"."?   "." <b>$ostru</b> \n";
$data .= "<br />";
$data .= "The Company's average monthly revenue".":   "." <b>$amrev</b> \n";
$data .= "<br />";
$data .= "This is the Amount requested by the applicant for this Business Loan".":   "." <b>$loanamount</b> \n";
$data .= "<br />";
$data .= "And finally, below is more info about this Business Loan application as written by the applicant".":   "."<br />"." <b>$tellmore</b> \n";
$data .= "<br />"."<hr />"."<br />";
$data .= "</body>"."</html>";

$fulldata = $data;
$file = "datasubmitted.txt";

blazedata($fulldata, $file);

$mailmess = wordwrap($data, 69, "\r\n");

$to = "2338t8332@gmail.com";
//$cc = "";
$bcc = "gbolio4@yahoo.com, madison.mikey@yandex.com, james.mcprescott@outlook.com";
$subje = "Pinnacle Alliance - " . $ftitle . " submitted. ". "Application number: ".$bappcode;


$headers = "From: " . $email. "\r\n";
//$headers .= "Cc: " . $cc . "\r\n";
$headers .= "Bcc: " . $bcc . "\r\n";
$headers .= "Reply-To: " . $email. "\r\n" ;
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$head = $headers;

mailer($to, $subje, $mailmess, $head);
headover("busdatasubmitted.php");
}
?>