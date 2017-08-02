<?php
session_start();

include("include/conn.php");

if($_SESSION['logged']!=2) {

	header("Location:index.php");
	
	}

$sql="select * from bibliografiaapalancaprofe where id=".$_GET['id'];
$query=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_array($query);
$autorget = $row['autor'];
$libroget = $row['libro'];
$descripcionget=$row['descripcion'];
?>
<script language="javascript" type="text/javascript">
	function validar() {
		if(document.form.autor.value == "" || document.form.libro.value == "" || document.form.descripcion.value == "") {
			alert("Debes llenar todos los campos.");
			return false;
		}
	}
</script>
<?php
if($_POST['light'] == "green")
    {

	$plibro =$_POST['libro'];
	$pautor=$_POST['autor'];
	$pdescripcion=$_POST['descripcion'];
	$idusuario=$_SESSION['id'];
	$idbiblio=$_GET['id'];

	$sql="update bibliografiaapalancaprofe set libro='".$plibro."',autor='".$pautor."',descripcion='".$pdescripcion."' where id='".$idbiblio."'";
	$query=mysql_query($sql) or die(mysql_error());

	$Pt=$_GET['t'];
	$Pidreporte=$_GET['idReporte'];
	$Pidpasosem=$_GET['idPasoSem'];
	
	echo "<h1 style='text-align:center;'>Informaci&oacute;n editada.</h1>"
	."<p style='text-align:center;'><a href='reporteContestar.php?id=&t=$Pt&idReporte=$Pidreporte&idPasoSem=$Pidpasosem'>Regresar</a>";
	
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-en">
<head>
	<title>Action Coach</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("jquery", "1.3");</script>
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />
	</head>
<body>
<form method="post" onsubmit="return validar()">
<div><h3 style="margin-left:10px;">Modificar bibliografia</h3></div>
<table style="border: 2px inset #6495ED;margin-left:10px">
<tbody>
<tr>
<th style="border-right:1px groove none;padding:2px 2px 2px 2px;width:150px;height:15px;background-color:dimgray"></th>
<th style="border-right:1px groove none;padding:2px 2px 2px 2px;width:300px;height:15px;background-color:dimgray"></th>

</tr>
<tr>
	<td>
    <b>Libro:</b>
	</td>
	<td>
     <input type="text" name="libro" id="libro" style="width:90%" value="<?php echo $libroget ?>" required/>
	</td>
	</tr>
	<tr>
	<td>
    <b>Autor:</b>
	</td>
	<td>
     <input type="text" name="autor" id="autor" style="width:90%" value="<?php echo $autorget ?>" required/>
	</td>
	</tr>
	<tr>
	<td>
	<b>Descripcion</b>	
	</td>	
	</tr>
	<tr>
    <td colspan="2">	
    <textarea name="descripcion" id="descripcion" cols="58" rows="8" class="esteno" value="<?php echo $descripcionget ?>" required ><?php echo $descripcionget ?></textarea>
	
    </td>
	</tr>
	<tr>
		<td colspan="2">
			<div align="right">
			<input type="submit" value="Agregar">
			</div>
			<input type="hidden" name="light" value="green" />
		</td>

	</tr>
</tbody>
</table>
</form>
</body>
</html>
