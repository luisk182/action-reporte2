<?php
include("include/conn.php");

//select all
$sql="select * from usuarios where usuario = '".$_POST['usuario']."' and password = '".md5($_POST['password'])."'";

$query=mysql_query($sql) or die(mysql_error());

$row = mysql_fetch_array($query);

$numRows = mysql_num_rows($query);

if($numRows==1) {

	session_start();
	$_SESSION['logged'] = 2;
	$_SESSION['id'] = $row['id'];
	$_SESSION['usuario'] = $row['usuario'];
	header("Location:reportes.php");


} else {

	header("Location: index.php?e=1");
	}


?>