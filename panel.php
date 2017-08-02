<?php
session_start();

if($_SESSION['logged']!=2) {

	header("Location:index.php");
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-en">
<head>
	<title>Action Coach</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />

	<style type="text/css">
	
#footer { background: url(img/bg.gif) repeat; font-family: arial,verdana,helvetica; }	
	
	.auto-style2 {
		vertical-align: top;
		float: right;
	}
	
	.main-title{ font-size: 22px; font-weight: bold; color: #4d5467;  margin: 0; margin-bottom: 20px; padding-bottom: 1px; border-bottom: 1px dotted #84a1af; display:block; }

	</style>

</head>
<body>

<?php
include("include/headerPanelReporte.php");
?>
<div class="colmask threecol">
	

	</div>

<div id="footer">
	<p style="text-align:center;color:white;">© 2012 Copyright Action Coach. Todos los derechos reservados. </p>

</div>

</body>
</html>
