<?php
session_start();
include("include/conn.php");
?>
<script language="javascript" type="text/javascript">
	function validar() {
		if(document.form.autor.value == "" || document.form.libro.value == "" || document.form.descripcion.value == "" )
		{
			
			alert("Es necesario llenar todos los campos, Intente de nuevo")
			return false;
		}
	}
</script>
<?php
if($_POST['light'] == "green") {
    $plibro =$_POST['libro'];
    $pautor=$_POST['autor'];
    $pdescripcion=$_POST['descripcion'];
    $idusuario=$_SESSION['id'];
	$sql="insert into bibliografiaapalancaprofe (autor,libro,descripcion,idUsuario,esHistorico) VALUES('$pautor','$plibro','$pdescripcion','$idusuario',0)";
	$query=mysql_query($sql) or die(mysql_error());

	$Pt=$_GET['t'];
	$Pidreporte=$_GET['idReporte'];
	$Pidpasosem=$_GET['idPasoSem'];
	
	echo "<h1 style='text-align:center;'>Informaci&oacute;n agregada.</h1>"
	."<p style='text-align:center;'><a href='reporteContestar.php?id=0&t=$Pt&idReporte=$Pidreporte&idPasoSem=$Pidpasosem'>Regresar</a>";
	
	exit();
}
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-en">
<head>
	<title>Action Coach</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />
	</head>
<body>
<form id="form" method="post" onsubmit="return validar()" name="form">
<div><h3 style="margin-left:10px;">Agregar bibliografia</h3></div>
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
     <input type="text" name="libro" id="libro" style="width:90%" required/>
	</td>
	</tr>
	<tr>
	<td>
    <b>Autor:</b>
	</td>
	<td>
     <input type="text" name="autor" id="autor" style="width:90%" required/>
	</td>
	</tr>
	<tr>
	<td>
	<b>Descripcion</b>	
	</td>	
	</tr>
	<tr>
    <td colspan="2">	
    <textarea name="descripcion" id="descripcion" cols="58" rows="8" class="esteno" required></textarea>
	
    </td>
	</tr>
	<tr>
		<td colspan="2">
			<div align="right">
			<input type="submit" value="Agregar">
			</div>
		</td>
	</tr>
</tbody>
</table>
<input type="hidden" name="light" value="green" /></p>
</form>
</body>
</html>
