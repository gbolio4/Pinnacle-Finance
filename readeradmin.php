<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.html";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Submitted Data from Website Forms -  Database</title>
<style type="text/css">
<!--
.style2 {color:#000066;font-weight:bold;font-family:Georgia,"Times New Roman",Times,serif;font-size:14px;}
.style3 {	color: #006600;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style4 {	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 24px;
}
.style5 {color: #FF0000}
-->
</style>
</head>

<body>
<table width="96%" height="351" border="0" align="center" cellpadding="2" cellspacing="5">
  <tr>
							<td><p><span class="style5">Note to unauthorized users; this is a restricted zone!! If you're not the Site Admin, please <a href="<?php echo $logoutAction ?>">LEAVE NOW</a></span> </p>
      <p class="style4">Below is All the data submitted from the Website's Online forms.<br />
        </p>
        <table width="96%" height="142" border="0" align="center" cellpadding="2" cellspacing="5">
          <tr>
            <td><p class="style3">Please Ensure that you <a href="<?php echo $logoutAction ?>">Logout</a> after responding to all replies </p>
                <hr />
                <br />
                <?php readfile("datasubmitadmin.txt"); ?>
                <hr /></td>
          </tr>
        </table>
      <p><span class="style2">Go back to the <a href="javascript:history.back(1)">previous page</a> or go back <a href="<?php echo $logoutAction ?>">home </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You can also <a href="<?php echo $logoutAction ?>">Logout here</a></span> </p></td>
  </tr>
</table>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database Reader</title>
</head>

<body>
</body>
</html>
