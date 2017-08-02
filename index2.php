<?php 
include("include/conn.php");
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>AC</title>
<link rel="stylesheet" type="text/css" href="css/actioncoach.css" />
<link rel="stylesheet" type="text/css" href="css/bm2.css" />
<style type="text/css">
.auto-style1 {
	margin-bottom: 0;
}
.auto-style2 {
	padding: 10px 0 20px 0;
	margin-bottom: 20px;
	font-family: verdana;
	font-size: 11px;
	color: #000;
	border-bottom: 1px dotted #000;
	/*text-align: center;*/
}
</style>

</head>

<body id="top">
        <div id="wrapper">


                <div class="menu"> 
                </div>

                <div class="clear"></div>

                <div class="clear"></div>

        <div id="wrap">


                        <div class="main-content">
                                <div class="main-title">
  <div class="left" style="margin-right: 15px;">
	  <img src="img/man2.png" alt="" /></div>
                                        <div class="left">Ingreso al sistema de reporte</div>

                    <div class="clear"></div>
            </div>

                    <div class="auto-style2">
                    <?php
                    if($_GET['e']==1) {
                    ?>
                    <p class="main-error">Datos de acceso incorrectos</p>
                    <?php }  else {?>
                    
                    <p>Favor de ingresar tu nombre de usuario y contrase&ntilde;a</p>
                    <?php } ?>
                    <form name="form" id="form" action="login.php" method="post">
                    <fieldset>
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" />
                    <br />
                    <label for="password">Contrase&ntilde;a</label>
                    <input type="password" name="password" id="password" />
                    <br /><br />
                    <p style="text-align:left"><input type="submit" value="Enviar" style="margin-left:130px;" /></p>
                    </fieldset>
                    </form>
                    </div>

                                            </div>



                                <div class="clear"></div>

                </div>
        </div>

                        <div id="topfooter" class="auto-style1">

                <div class="clear"></div>
        </div>
        <?php include("include/footer.php"); ?>
</body>


</html>