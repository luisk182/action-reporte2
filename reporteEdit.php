<?php
session_start();

include("include/conn.php");

if($_SESSION['logged']!=2) {

	header("Location:index.php");
	
	}
	
	
	
	//select all
$sql="select * from reportes where id=".$_GET['id'];
$query=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_array($query);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-en">
<head>
	<title>Action Coach</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />
<script language="javascript" type="text/javascript">
 	//validar
	function validar() {
		if(document.form.cliente.value == "") {
			alert("Escribe un cliente.");
			return false;
		}
		
		if(document.form.empresa.value == "") {
			alert("Escribe una empresa.");
			return false;
		}


		if(document.form.coach.value == "") {
			alert("Escribe un coach.");
			return false;
		}

		if(document.form.email.value == "") {
			alert("Escribe un email.");
			return false;
		}

		if(document.form.logo.value == "") {
			alert("Selecciona un logo.");
			return false;
		}


	}
	</script>
	<style type="text/css">
	
	.auto-style2 {
		vertical-align: top;
		float: right;
	}
	
	.main-title{ font-size: 22px; font-weight: bold; color: #4d5467;  margin: 0; margin-bottom: 20px; padding-bottom: 1px; border-bottom: 1px dotted #84a1af; display:block; }


label
{
width: 10em;
float: left;
text-align: right;
margin-right: 0.5em;
display: block
}

.submit input
{
margin-left: 20em;
}


	</style>

</head>
<body>
<div id="Principal">
	<?php
    include("include/headerPanelReporte.php");
    ?>
<div id="divcontenido">
    <div class="divTituloFormulario">Editar Reporte</div>
<?php


$light = isset($_POST['light']) ? $_POST['light'] : null ;
if($light == "green") {

	//photo
	if($_FILES["file"]["type"]!="") {
		if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < 100000))
	  {
	  if ($_FILES["file"]["error"] > 0)
	    {
	    //echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	    }
	  else
	    {
	    /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	    echo "Type: " . $_FILES["file"]["type"] . "<br />";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";*/
	
	    if (file_exists("logos/" . $_FILES["file"]["name"]))
	      {
	      /*echo "<br /><br /><br />";
	echo "<h1 style='text-align:center;'>El nombre de la imagen ya existe. Favor de renombrar el archivo.</h1>"
	."<p style='text-align:center;'><a href='reportes.php'>Regresar al listado</a>";
	echo "<br /><br /><br />";
	include("include/footerPanelReporte.php");
	exit();*/

	      }
	    else
	      {
	      move_uploaded_file($_FILES["file"]["tmp_name"],
	      "logos/" . $_FILES["file"]["name"]);
	      //echo "Stored in: " . "logos/" . $_FILES["file"]["name"];
	      }
	    }
	  }
	else
	  {
	  echo "<br /><br /><br />";
	echo "<h1 style='text-align:center;'>El formato de la imagen no es el permitido. Favor de revisar la extensi&oacute;n del archivo.</h1>"
	."<p style='text-align:center;'><a href='reportes.php'>Regresar al listado</a>";
	echo "<br /><br /><br />";
	include("include/footerPanelReporte.php");
	exit();
	  }
}

	//update

	$img =	$_FILES["file"]["name"];
	
	if ($row['logo'] == "logos/") 
	{
		//echo "1-".$row['logo']."<br/>";		
		if ($img != "") 
		{
			$sql="UPDATE reportes SET cliente = '".$_POST['cliente']."', empresa='".$_POST['empresa']."', coach='".$_POST['coach']."', email='".$_POST['email']."', logo='logos/". $_FILES["file"]["name"]."' WHERE id=".$_POST['id']; 
		}	
	}
	else 
	{
		//echo "2-".$row['logo'];		
		if ($img != "") 
		{
			//echo "1-".$img."<br/>";	
			$sql="UPDATE reportes SET cliente = '".$_POST['cliente']."', empresa='".$_POST['empresa']."', coach='".$_POST['coach']."', email='".$_POST['email']."', logo='logos/". $_FILES["file"]["name"]."' WHERE id=".$_POST['id']; 
			//echo $sql."<br/>";	
		}
		else
		{	
			//echo "2-".$img."<br/>";	
			$sql="UPDATE reportes SET cliente = '".$_POST['cliente']."', empresa='".$_POST['empresa']."', coach='".$_POST['coach']."', email='".$_POST['email']."' WHERE id=".$_POST['id']; 	
			//echo $sql."<br/>";	
		}
	}
	$query = mysql_query($sql) or die(mysql_error());
	
if($_POST['btnGuardar'] == "Guardar") {
	echo "<br /><br /><br />";
	echo "<h1 style='text-align:center;'>Informaci&oacute;n editada.</h1>"
	."<p style='text-align:center;'><a href='reportes.php'>Regresar al listado</a>";
	echo "<br /><br /><br />";
	include("include/footerPanelReporte.php");
}

if($_POST['btnGuardar'] == "Guardar y continuar a Llenado de Reporte") {
	//redirect
	printf("<script>location.href='reporteContestar.php?id=1&t=m&idReporte=".$_POST['id']."&idPasoSem=1'</script>");
}

	exit();
}
?>
<form action="" method="post" onsubmit="return validar();" name="form" enctype="multipart/form-data">
<fieldset style="border:0; width: 70%;margin:auto;text-align:center;">
<p><label for="name">Nombre del cliente</label> 
<input type="text" id="cliente" name="cliente" size="50" value="<?php echo $row['cliente'];?>" /></p>
<p><label for="e-mail">Nombre de la empresa</label> 
<input type="text" id="empresa" name="empresa" size="50" value="<?php echo $row['empresa'];?>" /></p>
<p><label for="e-mail">Nombre del coach</label> <input type="text" id="coach" name="coach" size="50" value="<?php echo $row['coach'];?>" /></p>
<p><label for="e-mail">Email</label> <input type="text" id="email" name="email" size="50" value="<?php echo $row['email'];?>" /></p>
<p><label for="e-mail">Logo<span style="font-size:10px;"> (230px de ancho por lo que de de alto)<span></label><input type="file" name="file" id="file" /></p>
<fieldset id="fieldsetLogo"><legend>Imagen de logo actual</legend>
<?php 
if($row['logo']=="") {
	echo "Sin imagen definida.";
	} else {
		echo "<img width='230' src='".$row['logo']."' />";
		}
		

?>
</fieldset>

<p style="text-align:center"><br /><br />
<input type="submit" name="btnGuardar" value="Guardar" onclick="window.location='reportes.php'" />&nbsp;&nbsp;&nbsp;<input type="submit" name="btnGuardar" value="Guardar y continuar a Llenado de Reporte" />
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="light" value="green" />
</p>
</fieldset>
</form>
</div>
</div><!--end principal-->
<?php
include("include/footerPanelReporte.php");
?>
</body>
</html>
