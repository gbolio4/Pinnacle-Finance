<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="JavaScript1.2">

isIE=document.all;
isNN=!document.all&&document.getElementById;
isN4=document.layers;
isHot=false;

function ddInit(e){
  topDog=isIE ? "BODY" : "HTML";
  whichDog=isIE ? document.all.theLayer : document.getElementById("theLayer");  
  hotDog=isIE ? event.srcElement : e.target;  
  while (hotDog.id!="titleBar"&&hotDog.tagName!=topDog){
    hotDog=isIE ? hotDog.parentElement : hotDog.parentNode;
  }  
  if (hotDog.id=="titleBar"){
    offsetx=isIE ? event.clientX : e.clientX;
    offsety=isIE ? event.clientY : e.clientY;
    nowX=parseInt(whichDog.style.left);
    nowY=parseInt(whichDog.style.top);
    ddEnabled=true;
    document.onmousemove=dd;
  }
}

function dd(e){
  if (!ddEnabled) return;
  whichDog.style.left=isIE ? nowX+event.clientX-offsetx : nowX+e.clientX-offsetx; 
  whichDog.style.top=isIE ? nowY+event.clientY-offsety : nowY+e.clientY-offsety;
  return false;  
}

function ddN4(whatDog){
  if (!isN4) return;
  N4=eval(whatDog);
  N4.captureEvents(Event.MOUSEDOWN|Event.MOUSEUP);
  N4.onmousedown=function(e){
    N4.captureEvents(Event.MOUSEMOVE);
    N4x=e.x;
    N4y=e.y;
  }
  N4.onmousemove=function(e){
    if (isHot){
      N4.moveBy(e.x-N4x,e.y-N4y);
      return false;
    }
  }
  N4.onmouseup=function(){
    N4.releaseEvents(Event.MOUSEMOVE);
  }
}

function hideMe(){
  if (isIE||isNN) whichDog.style.visibility="hidden";
  else if (isN4) document.theLayer.visibility="hide";
}

function showMe(){
  if (isIE||isNN) whichDog.style.visibility="visible";
  else if (isN4) document.theLayer.visibility="show";
}

document.onmousedown=ddInit;
document.onmouseup=Function("ddEnabled=false");

</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::  Webpage Under Construction  ::</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
body {
	background-color: #000000;
	margin-left: 15px;
	margin-top: 10px;
	margin-right: 15px;
	margin-bottom: 10px;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 24px; }
.style3 {
	font-size: 12px;
	font-weight: bold;
}
.style4 {font-size: smaller}
.style5 {font-size: 24px}
.style6 {font-size: 18px; }
.style7 {
	color: #FFFF00;
	font-style: italic;
	font-weight: bold;
}
.style9 {
	font-size: large;
	font-weight: bold;
}
.style16 {color: #000000; font-style: italic; font-weight: bold; }
.style17 {font-size: smaller; color: #000000; }
-->
</style>
</head>

<body>



<p>&nbsp;</p>
<table width="618" height="213" border="0" align="center">
  <tr>
    <td height="209" align="center"><p class="style2"><img src="undercontructII.gif" width="125" height="39" /></p>
      <hr width="234" size="7" noshade="noshade" />
      <p><span class="style9">THIS PAGE </span></p>
      <p class="style5">Is Currently Undergoing Content Updates  and Will Be Online Soon !!! </p>
      <p class="style6">&nbsp;</p>
      <p class="style6"> Please check back later !</p>
      <hr width="434" size="7" noshade="noshade" />
      <p><img src="undercontruct.gif" alt="Under construction" width="160" height="200" /></p>
      <hr width="434" size="7" noshade="noshade" />
      <p class="style3">&nbsp;</p>
      <p><strong><a href="javascript:history.back(1)" style="text-decoration:none; color:#FFFF00">Go back</a>  to the previous page</strong></p>
    </td>
  </tr>
</table>
</body>
</html>
