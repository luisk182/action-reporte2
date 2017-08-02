<?php
include("include/conn.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-en">
<head>
	<title>Action Coach</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />
</head>

<body>
<?php
if($_POST['light'] == "green") {

	//borrar
	$sql="DELETE from reportes where id=".$_POST['id']; 
	$query = mysql_query($sql) or die(mysql_error());
	
	echo "<h1 style='text-align:center;'>Informaci&oacute;n borrada.</h1>"
	."<p style='text-align:center;'><a href='reportes.php'>Regresar al listado</a>";
	
	exit();
}
?>

<h1>Borrar Reporte</h1>
<form action="" method="post" name="form">
<fieldset style="border:0"><p style="text-align:center" class="texto">
¿En verdad desea borrar?</p><p style="text-align:center">
<input type="button" value="regresar a listado" onclick="window.location='reportes.php'" />
<input type="submit" value="borrar" />
<input type="hidden" name="light" value="green" />
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
</p>
</fieldset></form>
</body>

</html>
