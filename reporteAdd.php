<?php
session_start();

include("include/conn.php");

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

		/*if(document.form.logo.value == "") {
			alert("Selecciona un logo.");
			return false;
		}*/


	}
	</script>
	<style type="text/css">
	
#footer { background: font-family: arial,verdana,helvetica; }	
	
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
	.titulo{
		margin: 30px 15%;
	}
	.leyenda{
		color: red;
		text-align: left;
		margin-left: 15%;
	}

	</style>

</head>
<body>

<?php
include("include/headerPanelReporte.php");
?>
<div>
<?php
if($_POST['light'] == "green") {


if ($_FILES["file"]["type"] != "") {

	//photo
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

	//insert
	$sql="INSERT INTO reportes (cliente, empresa, coach, email, logo, idUsuario) VALUES ('".$_POST['cliente']."', '".$_POST['empresa']."', '".$_POST['coach']."', '".$_POST['email']."','logos/". $_FILES["file"]["name"]."', ".$_SESSION['id'].")"; 
	$query = mysql_query($sql) or die(mysql_error());
	echo "<br /><br /><br />";

	echo "<h1 style='text-align:center;'>Informaci&oacute;n agregada.</h1>"
	."<p style='text-align:center;'><a href='reportes.php'>Regresar al listado</a>";
	echo "<br /><br /><br />";
	include("include/footerPanelReporte.php");
	exit();
}
?>

<h1 class="titulo">Agregar Reporte</h1>
<form action="" method="post" onsubmit="return validar();" name="form" enctype="multipart/form-data">
<fieldset style="border:0; width: 55%;margin:auto;text-align:center;">
<p><label for="name">Nombre del cliente</label> 
<input type="text" id="cliente" name="cliente" size="50" /></p>
<p><label for="e-mail">Nombre de la empresa</label> 
<input type="text" id="empresa" name="empresa" size="50" /></p>
<p><label for="e-mail">Nombre del coach</label> <input type="text" id="coach" name="coach" size="50" /></p>
<p><label for="e-mail">Email</label> <input type="text" id="email" name="email" size="50" /></p>
<p>
<label for="e-mail">Logo *</label><input type="file" name="file" id="file" />
</p>
<p class="leyenda">*El tamaño del logo deberá ser 230px de ancho por lo que de de alto</p>

<p style="text-align:center">
<input type="button" value="Regresar a listado" onclick="window.location='reportes.php'" />&nbsp;&nbsp;&nbsp;<input type="submit" value="Guardar" />
<input type="hidden" name="light" value="green" /></p>
</fieldset></form>
</div>

<?php
include("include/footerPanelReporte.php");
?>
</body>
</html>
