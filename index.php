<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
<link rel="stylesheet" type="text/css" href="css/admin.css" media="screen" />
</head>
<body class="login">
<div id="login">
	<h1><a href="http://www.coachdenegocios.com" title="Action coach">Action Coach</a></h1>
	<?php
		if($_GET['e']==1) {
		?>
		<p class="main-error">Datos de acceso incorrectos</p>
    <?php } ?>
    <form name="form" id="form" action="login.php" method="post">
        <p>
            <label for="user_login">Nombre de usuario<br>
            <input class="input" type="text" name="usuario" id="usuario" size="20" tabindex="10" /></label>
        </p>
        <p>
            <label for="user_pass">Contraseña<br>
            <input class="input" type="password" name="password" id="password"  value="" size="20" tabindex="20"></label>
        </p>
       
        <p class="submit">
            <input type="submit" value="Acceder" tabindex="100" class="button-primary">
        </p>
    </form>

    <p id="nav">
    <a href="http://www.coachdenegocios.com" title="¿Te has perdido?">« Ir a ActionCOACH</a>
    </p>
</div>
</body>
</html>
