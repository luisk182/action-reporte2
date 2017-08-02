<?php
session_start();

if($_SESSION['logged']!=2) {

	header("Location:index.php");
	
	}

include("include/conn.php");


//select all
$sql="select e.nombre as estrategia, c.nombre as categoria, e.idCategoria, e.contenido, e.texto, e.contenido2, e.texto2, e.contenido3, e.texto3, e.contenido4, e.texto4, e.agregar1, e.agregar2, e.agregar3, e.agregar4 from estrategias e, categorias c where c.id = e.idCategoria AND e.id=".$_GET['id'];
$query=mysql_query($sql) or die(mysql_error());
$rowEO=mysql_fetch_array($query);


$allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
 $allowedTags.='<li><ol><ul><span><div><br><ins><del>';  
 $sContent1 = strip_tags(stripslashes($rowEO['contenido']),$allowedTags);
 $sTexto1 = strip_tags(stripslashes($rowEO['texto']),$allowedTags);
 $sContent2 = strip_tags(stripslashes($rowEO['contenido2']),$allowedTags);
 $sTexto2 = strip_tags(stripslashes($rowEO['texto2']),$allowedTags);
 $sContent3 = strip_tags(stripslashes($rowEO['contenido3']),$allowedTags);
 $sTexto3 = strip_tags(stripslashes($rowEO['texto3']),$allowedTags);
 $sContent4 = strip_tags(stripslashes($rowEO['contenido4']),$allowedTags);
 $sTexto4 = strip_tags(stripslashes($rowEO['texto4']),$allowedTags);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-en">
<head>
	<title>Action Coach</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />

	<style type="text/css">
	
#footer { background: url(img/bg.gif) repeat; font-family: arial,verdana,helvetica; }	
	
	.auto-style2 {
		vertical-align: top;
		float: right;
	}
	
	.main-title{ font-size: 22px; font-weight: bold; color: #4d5467;  margin: 0; margin-bottom: 20px; padding-bottom: 1px; border-bottom: 1px dotted #84a1af; display:block; }

	</style>
<!-- Load jQuery -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
        google.load("jquery", "1.3");
</script>
<!-- Load jQuery build -->
<script type="text/javascript" src="include/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	
tinyMCE.init({
        // General options
        mode : "textareas",
		language : 'es',
        theme : "advanced",
        plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "spellchecker,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor,|,bullist,numlist",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,replace,|,outdent,indent,blockquote,|,undo,redo",
        theme_advanced_buttons3 : "",

        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
		spellchecker_languages : "+Spanish=es,English=en",
		init_instance_callback : function() {
		tinyMCE.activeEditor.controlManager.setActive('spellchecker', true);
			tinymce.execCommand('mceSpellCheck', true);
		},

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>

</head>

<body>

<?php
include("include/headerPanelReporte.php");
?>
<div></div>
<div id="layoutdims2">
<?php 
$xp=1;
//metas
$sql="select * from metas";
$query=mysql_query($sql) or die(mysql_error());
while($row=mysql_fetch_array($query)) {
 ?> <a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=m&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>"><?php echo $row['nombre']; ?></a>
 <?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" /> <?php

 $xp++; 
 echo "<br /><br />";
 } 
//pasos
$sql="select * from tiposdepasos";
$query=mysql_query($sql) or die(mysql_error());
while($row=mysql_fetch_array($query)) {
 ?> <a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=p&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>"><?php echo $row['nombre']; ?></a>
 <?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />
  <?php
  $xp++;
 echo "<br /><br />";
 ?> <a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=bp&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>">Bibliograf&iacute;a <?php echo $row['nombre']; ?></a>
<?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" /> 
 <?php
 $xp++;
 echo "<br /><br />"; 

 } 

//apalancamiento
?>

 <a href="reporteContestar.php?t=a&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>">Apalancamiento Personal y Profesional</a>
 <?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />
 <?php $xp++; ?>
 <br /><br />
<a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=ba&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>">Bibliograf&iacute;a Apalancamiento Personal y Profesional</a>
<?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />
<br /><br />
 <a href="generarPDF.php?idU=<?php echo $_SESSION['id']; ?>&idReporte=<?php echo $_GET['idReporte']; ?>" target="_blank">Generar PDF</a>
</div>
<div style="width:700px;margin:auto;">

<?php
if($_POST['light'] == "green") {

//ver si ya existe
/*$sql="select nombre from estrategias where nombre = '".$_POST['nombre']."'"; 
	$query = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($query) > 0) {
		echo "<h1 style='text-align:center;'>La estrategia ya existe.</h1>"
		."<p style='text-align:center;'><a href='estrategia.php'>Regresar al listado</a>";
		exit();
	}

if($_POST['chkContenido1']=="") {
$_POST['chkContenido1']=0;
}

if($_POST['chkContenido2']=="") {
$_POST['chkContenido2']=0;
}


if($_POST['chkContenido3']=="") {
$_POST['chkContenido3']=0;
}


if($_POST['chkContenido4']=="") {
$_POST['chkContenido4']=0;
}*/


//truncate
$sql="delete from estrategiasEditadasUsuario where idEstrategia=".$_POST['id']." and idUsuario=".$_SESSION['id']; 
	
	
	$query = mysql_query($sql) or die(mysql_error());
	
	
	$sql="INSERT INTO estrategiasEditadasUsuario (idEstrategia, texto,texto2, texto3,texto4,idUsuario,idReporte) VALUES ('".$_POST['id']."', '".$_POST['texto1']."', '".$_POST['texto2']."','".$_POST['texto3']."', '".$_POST['texto4']."',".$_SESSION['id'].",  ".$_POST['idReporte'].")"; 
	
	
	
	$query = mysql_query($sql) or die(mysql_error());

}


//flag estrategia editada usuario
$sqlFlag="select * from estrategiasEditadasUsuario where idEstrategia='".$_GET['id']."' and idUsuario=".$_SESSION['id']."  and idReporte=".$_GET['idReporte'];


	
	$queryFlag = mysql_query($sqlFlag) or die(mysql_error());
	$rowFlag = mysql_fetch_array($queryFlag);
	
	$allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
 $allowedTags.='<li><ol><ul><span><div><br><ins><del>';  
 $sContentFlag1 = strip_tags(stripslashes($rowFlag['contenido']),$allowedTags);
 $sTextoFlag1 = strip_tags(stripslashes($rowFlag['texto']),$allowedTags);
 $sContentFlag2 = strip_tags(stripslashes($rowFlag['contenido2']),$allowedTags);
 $sTextoFlag2 = strip_tags(stripslashes($rowFlag['texto2']),$allowedTags);
 $sContentFlag3 = strip_tags(stripslashes($rowFlag['contenido3']),$allowedTags);
 $sTextoFlag3 = strip_tags(stripslashes($rowFlag['texto3']),$allowedTags);
 $sContentFlag4 = strip_tags(stripslashes($rowFlag['contenido4']),$allowedTags);
 $sTextoFlag4 = strip_tags(stripslashes($rowFlag['texto4']),$allowedTags);



?>
<br />
<h1><?php echo $rowEO['estrategia'];?></h1>
<h2>Editar Estrategia </h2>
<form action="" method="post" onsubmit="return validar();" name="form">
<fieldset style="border:0">
	<br /><br />
	<?php if($rowEO['agregar1']==1) { //original?>
	<p style="text-align:center">
	
	<?php echo $rowEO['contenido'] ?>
	

		<textarea name="texto1" id="texto1" class="auto-style2" cols="85">
		
		<?php if (isset($rowFlag['texto'])) {
			echo $sTextoFlag1;
			
		} else { 
		 echo $sTexto1;
		}
 ?>
 
 
 </textarea>
		</p>		
		<?php } ?>
		
		
	<?php if($rowEO['agregar2']==1) { //original?>
	<p style="text-align:center">
	
	<?php echo $rowEO['contenido2'] ?>
	

		<textarea name="texto2" id="texto2" class="auto-style2" cols="85">
		<?php if (isset($rowFlag['texto'])) {		
			echo $sTextoFlag2;			
		} else { 
		 echo $sTexto2;
		 }
 ?>
 
 
 </textarea>
		</p>		
		<?php } ?>

		
		
<?php if($rowEO['agregar3']==1) { //original?>
	<p style="text-align:center">
	
	<?php echo $rowEO['contenido3'] ?>
	

	<textarea name="texto3" id="texto3" class="auto-style2" cols="85">
	
	<?php if (isset($rowFlag['texto'])) {
	
		echo $sTextoFlag3;
		
	} else { 
	echo $sTexto3;
	}
	?>
 
 
	</textarea>
</p>		
<?php } ?>


<?php if($rowEO['agregar4']==1) { //original?>
	<p style="text-align:center">
	
	<?php echo $rowEO['contenido4'] ?>
	
	<textarea name="texto4" id="texto4" class="auto-style2" cols="85">
	

	<?php if (isset($rowFlag['texto'])) {
		echo $sTextoFlag4;
		
	} else { 
	 echo $sTexto4;
	 }
 ?>
 
 
 </textarea>
		</p>		
		<?php } ?>


<p style="text-align:center"><!--<input type="button" value="Regresar a listado sin guardar" onclick="history.go(-1)" />--><input type="button" value="Regresar a listado" onclick="window.location='reporteContestar.php?id=<?php echo $_GET['idid']; ?>&t=<?php echo $_GET['tt']; ?>&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $_GET['idPasoSem']; ?>&#location-<?php echo $_GET['id']; ?>'" />&nbsp;&nbsp;&nbsp;
<input type="submit" value="Guardar" />
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="idReporte" value="<?php echo $_GET['idReporte']; ?>" />
<input type="hidden" name="light" value="green" /></p>
</fieldset></form>

</div>
<?php include("include/footerPanelReporte.php"); ?>

</body>

</html>
