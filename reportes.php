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
    
	<style type="text/css">
	.auto-style2 {
		vertical-align: top;
		float: right;
	}	
	.main-title{ font-size: 12px; font-weight: bold; color: #4d5467;  margin: 0; padding-bottom: 1px; border-bottom: 1px dotted #84a1af; display:block; }
	</style>

</head>
<body>
<div id="Principal">

<?php
include("include/headerPanelReporte.php");
?>

<?php
	//select all
$sql="select * from reportes where idUsuario = ".$_SESSION['id'];
$query=mysql_query($sql) or die(mysql_error());
?>

<div id="divcontenido">
    <div class="divTituloFormulario">Mis reportes</div>
    <div align="right" style="padding-bottom:10px;"><a style="text-decoration:none;" href="reporteAdd.php"><img alt="agregar"  src="img/agregar.png" width="16" border="0" align="texttop"  />&nbsp; Agregar reporte</a></div>
    <div style="height:390px; overflow:auto;">
    <table class="bordered" border="1" width="100%" align="center" rules="cols">    
    <thead>
    	<tr  class="encabezadotabla"><td><span class="texto" style="font-size:14px;">Cliente</span></td><td><span class="texto" style="font-size:14px;">Reporte</span></td>
    	<td><span class="texto" style="font-size:14px;">Eliminar</span></td>
    	<td><span class="texto" style="font-size:14px;">Generar Reporte</span></td>
        <td><span class="texto" style="font-size:14px;">Exportar Excel</span></td>
    </tr>
    </thead>
	<tbody>
	<?php
	$z=0;
    while($row=mysql_fetch_array($query)) {
	if ($z % 2) 
		{$clase = 'renglonclaro';
	}else{
		$clase = 'renglonobscuro';
	}
    ?>
    
    <tr class="<?php echo $clase; ?>">
    <td style="text-transform:uppercase;"> <a href="reporteEdit.php?id=<?php echo $row['id']; ?>"><?php echo $row['cliente']; ?></a></td>    
    <td class="auto-style1">
    <a href="reporteContestar.php?id=1&t=m&idReporte=<?php echo $row['id']; ?>&idPasoSem=1">
    <img alt="editar" src="img/editar.png" width="16" style="border:none;" /></a></td>
    <td class="auto-style1">
    <a href="reporteDelete.php?id=<?php echo $row['id']; ?>">
    <img width="16" alt="eliminar" src="img/borrar.png" style="border:none;" /></a></td>
    <td class="auto-style1">
    <?php 
    
    $sqlFlag="SELECT COUNT(paso) as number FROM `semaforo` where idReporte=".$row["id"];
    $queryFlag=mysql_query($sqlFlag) or die("33");
    $rowFlag=mysql_fetch_array($queryFlag);
    
    if($rowFlag['number']>=20) { 
    ?>
    <a href="generarPDF.php?idU=<?php echo $_SESSION['id']; ?>&idReporte=<?php echo $row['id']; ?>"><img src="img/descargar.png" border="0" /></a>
    <?php } ?>    </td>
    
    <td class="auto-style1">
    <?php     
    if($rowFlag['number']>=20) { 
    ?>
    
	<a href="#" onclick='validar(<?php echo $_SESSION['id']; ?>, <?php echo $row['id']; ?>);'><img src="img/excel.png" border="0" /></a>
    <?php } ?>    </td>
    
    </tr>
     
    <?php
	$z= $z+1;
    }
    ?>
    </tbody>
    </table>
	</div>
  </div>
<br /><br />
</div><!--end principal-->
	<?php
include("include/footerPanelReporte.php");
?>
</div>
<script>
	function validar(pIdUsuario, pIdReporte)
	{
	
		var navInfo = window.navigator.appVersion.toLowerCase();

		if(navInfo.indexOf('mac') != -1){	
			alert(pIdUsuario);
			alert(pIdReporte);
			window.open("exportarMac.php?idU="+pIdUsuario+"&idReporte="+pIdReporte,"_blank", "height=400, width=550, status=yes, toolbar=yes, scrollbars=yes, location=yes,titlebar=yes,top=0");
			return false;		
		}
		else {
			window.open("exportar.php?idU="+pIdUsuario+"&idReporte="+pIdReporte,"_blank", "height=400, width=550, status=no, toolbar=no, scrollbars=no, location=no,titlebar=no,top=0");
			return false;
		}
	}
</script>
</body>
</html>
