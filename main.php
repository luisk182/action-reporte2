<?php
session_start();

if($_SESSION['logged']!=1) {

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
	
#footer { background: url("img/bg.gif") repeat; font-family: arial,verdana,helvetica; }	
	
	.auto-style2 {
		vertical-align: top;
		float: right;
	}
	
	.main-title{ font-size: 22px; font-weight: bold; color: #4d5467;  margin: 0; margin-bottom: 20px; padding-bottom: 1px; border-bottom: 1px dotted #84a1af; display:block; }

	</style>

</head>
<body>

<div id="header">
	<div id="logo">
	<img src="img/logoac.png" alt="Action Coach" height="77" width="350" />
	<p class="auto-style2"><img alt="usuario" src="img/man2.png" height="25" width="30" /><span class="main-title"><?php echo $_SESSION['usuario']; ?></span></p>
	</div>

	
	<p id="layoutdims"><a href="reporte/categorias.php" target="centro">Categorías</a> | <a href="reporte/estrategia.php" target="centro">Estrategia</a> | <a href="reporte/pasos.php" target="centro">Pasos</a> | <a href="reporte/bibliografia.php" target="centro">Bibliografia</a> | <a href="reporte/preguntas.php" target="centro">Preguntas</a> | <a href="reporte/metas.php" target="centro">Metas</a> | <a href="reporte/usuarios.php" target="centro">Usuarios reporte</a> | <a href="reporte/apalancamiento.php" target="centro">Apalancamiento</a> | <a href="reporte/tiposdepasos.php" target="centro">Tipos de pasos</a> | <a href="reporte/logout.php" target="_parent">Salir del sistema</a></p>

</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
			<iframe name="centro" frameborder="0" width="100%" height="600px"></iframe>
			</div>
			<div class="col2">
			 <!--menu--></div>
			<div class="col3">
			<!--instrucciones--></div>
		</div>

	</div>
</div>
<div id="footer">
	<p style="text-align:center;color:white;">© 2012 Copyright Action Coach. Todos los derechos reservados. </p>

</div>

</body>
</html>
