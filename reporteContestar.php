<?php
session_start();

if($_SESSION['logged']!=2) {

	header("Location:index.php");
	
	}

include("include/conn.php");


$allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
 $allowedTags.='<li><ol><ul><span><div><br><ins><del>';  



//select all
$sql="select * from reportes where idUsuario = ".$_SESSION['id'];
$query=mysql_query($sql) or die(mysql_error());


///////////////
//saves metas//
///////////////
if($_POST['light'] == "m") 
{

	$sql="select * from metas where id=".$_GET['id']." and manejaopcional=1";
		$query=mysql_query($sql) or die(mysql_error());
		$rowo=mysql_fetch_array($query);
        $x=1;
       
        if($rowo['manejaopcional'] == '1')
        {
			$sql1="delete from respuestasMetas where idMeta=".$_POST["idMeta"]." AND idReporte=".$_POST["idReporte"]." AND idUsuario=".$_SESSION['id'];
			$query=mysql_query($sql1) or die(mysql_error());
			
            $sql2="delete from preguntasopcionales where idMeta=".$_POST["idMeta"]." AND idReporte=".$_POST["idReporte"]." AND idUsuario=".$_SESSION['id'];
			$query=mysql_query($sql2) or die(mysql_error());
			
			$x=1;
			$y=1;
			while($x<=$_POST['numberOfTexts']) 
			{
			
				$valuePostPregunta = "idPregunta".$x;
				$valuePostRespuesta = "respuesta".$x;
				
				if ($_POST["$valuePostPregunta"] == "3")
				{
					if (isset($_POST['vis'])) 
					{
						$_POST["visible"] = "true";
					} 
					else 
					{
						$_POST["visible"] = "false";
					}
				}
				else
				{
					$_POST["visible"] = "true"; 
				}
			 //if ($_POST['idMeta']!="" and $_POST["$valuePostPregunta"]!="" and $_POST["$valuePostRespuesta"]!="" and $_POST["idReporte"]!="" )
             
				$sql="insert into respuestasMetas (idMeta, idPregunta, respuesta, idReporte, idUsuario,visible) 
				values (
				".$_POST["idMeta"].",
				'".$_POST["$valuePostPregunta"]."',
				'".$_POST["$valuePostRespuesta"]."', 
				".$_POST["idReporte"].",
				".$_SESSION['id'].", 
				".$_POST["visible"]." )";
				
				$query=mysql_query($sql) or die(mysql_error());
                $x=$x+1;
        
				 
                
                    
                

			}
			

			while($y<=$_POST['numberOfTextsOpcionales']) 
			{
			
				$valueOpPregunta = "oppregunta".$y;
				$valueOpRespuesta = "oprespuesta".$y;
								
				$sql="insert into preguntasopcionales (idMeta, Pregunta, Respuesta, IdReporte, IdUsuario) values (".$_POST["idMeta"].",'".$_POST["$valueOpPregunta"]."','".$_POST["$valueOpRespuesta"]."', ".$_POST["idReporte"].", ".$_SESSION['id']." )";
				//echo $sql."<br />";
				$query=mysql_query($sql) or die(mysql_error());
				//echo $sql."<br />";
				$y=$y+1;
			}
			
			
			//truncate sem
			$sql="delete from semaforo where paso=".$_POST["idPasoSem"]." AND idReporte=".$_POST["idReporte"];
			$query=mysql_query($sql) or die(mysql_error());
			$sql="insert into semaforo (paso, idReporte, light) values (".$_POST["idPasoSem"].", ".$_POST["idReporte"].", 2)";		
			$query=mysql_query($sql) or die(mysql_error());
	   

			   	   
       }
	   else
	   {	   

			$sql1="delete from respuestasMetas where idMeta=".$_POST["idMeta"]." AND idReporte=".$_POST["idReporte"]." AND idUsuario=".$_SESSION['id'];
			$query=mysql_query($sql1) or die(mysql_error());
			
			$x=1;
			
			while($x<=$_POST['numberOfTexts']) 
			{
			
				$valuePostPregunta = "idPregunta".$x;
				$valuePostRespuesta = "respuesta".$x;
				
				if ($_POST["$valuePostPregunta"] == "3")
				{
					if (isset($_POST['vis'])) 
					{
						$_POST["visible"] = "true";
					} 
					else 
					{
						$_POST["visible"] = "false";
					}
				}
				else
				{
					$_POST["visible"] = "true";
				}
				
				$sql="insert into respuestasMetas (idMeta, idPregunta, respuesta, idReporte, idUsuario,visible) values (".$_POST["idMeta"].",".$_POST["$valuePostPregunta"].",'".$_POST["$valuePostRespuesta"]."', ".$_POST["idReporte"].", ".$_SESSION['id'].", ".$_POST["visible"]." )";
				$query=mysql_query($sql) or die(mysql_error());
				//echo $sql."<br />";
				$x=$x+1;
			}
			
			//truncate sem
			$sql="delete from semaforo where paso=".$_POST["idPasoSem"]." AND idReporte=".$_POST["idReporte"];
			$query=mysql_query($sql) or die(mysql_error());
			$sql="insert into semaforo (paso, idReporte, light) values (".$_POST["idPasoSem"].", ".$_POST["idReporte"].", 2)";		
			$query=mysql_query($sql) or die(mysql_error());
	   
	   }      
        
        

}





///////////////////
//fin saves metas//
///////////////////

///////////////
//saves pasos//
///////////////
if($_POST['light'] == "p") {


//truncate
$sql="delete from respuestasPasosEstrategias where idPaso=".$_POST["idPaso"]." AND idReporte=".$_POST["idReporte"]." AND idUsuario=".$_SESSION['id'];
		$query=mysql_query($sql) or die(mysql_error());
	$x=1;
	
	
	
foreach($_POST['idEstrategia'] as $idEst)
{
	$valuePostPrioridad = "prioridad".$idEst;
	
		$sql="insert into respuestasPasosEstrategias (idPaso, idEstrategia, prioridad, idReporte, idUsuario) values (".$_POST["idPaso"].",".$idEst.",".$_POST["$valuePostPrioridad"].",".$_POST["idReporte"].", ".$_SESSION['id'].")";
		$query=mysql_query($sql) or die(mysql_error());
		//echo $sql."<br />";
	

}

//truncate sem
$sql="delete from semaforo where paso=".$_POST["idPasoSem"]." AND idReporte=".$_POST["idReporte"];
		$query=mysql_query($sql) or die(mysql_error());
$sql="insert into semaforo (paso, idReporte, light) values (".$_POST["idPasoSem"].", ".$_POST["idReporte"].", 2)";		
$query=mysql_query($sql) or die(mysql_error());


//codigo nuevo
if($_POST['submitEstrategia']) {
	//echo "hola";
	header("Location: ".$_POST['ligaEst']."");
	exit();
}
//codigo nuevo


}
///////////////////
//fin saves pasos//
///////////////////

/////////////////////////
//saves apalancamientos//
/////////////////////////
if($_POST['light'] == "a") {


//truncate
$sql="delete from respuestasApalancamientos where idReporte=".$_POST["idReporte"]." AND idUsuario=".$_SESSION['id'];
	$query=mysql_query($sql) or die(mysql_error());
	
	$x=1;
	
	while($x<=$_POST['numberOfTexts']) {
	
	$valuePostPregunta = "idPregunta".$x;
	$valuePostRespuesta = "respuesta".$x;
	$valuePostAgregarReporte = "agregaReporte".$x;
	
	
		if (empty($_POST[$valuePostAgregarReporte])){
			
			$nuevovalor='no';
		} 
		else{
			$nuevovalor=$_POST[$valuePostAgregarReporte];	
			
		}
	

	
		$sql="insert into respuestasApalancamientos (idApalancamiento, respuesta, agregarReporte, idReporte, idUsuario) values (".$_POST["$valuePostPregunta"].",'".$_POST["$valuePostRespuesta"]."', '".$nuevovalor."', ".$_POST["idReporte"].", ".$_SESSION['id'].")";
		
		
		$query=mysql_query($sql) or die(mysql_error());
		
		$x=$x+1;
	}

//truncate sem
$sql="delete from semaforo where paso=".$_POST["idPasoSem"]." AND idReporte=".$_POST["idReporte"];
		$query=mysql_query($sql) or die(mysql_error());
$sql="insert into semaforo (paso, idReporte, light) values (".$_POST["idPasoSem"].", ".$_POST["idReporte"].", 2)";		
$query=mysql_query($sql) or die(mysql_error());


}
/////////////////////////////
//fin saves apalancamientos//
/////////////////////////////

//////////////////////
//saves bibliografia//
//////////////////////
if($_POST['light'] == "bp") {


	//truncate
	$sql="delete from bibliografiaPasos where idPaso=".$_POST["idPaso"]." AND idReporte=".$_POST["idReporte"]." AND idUsuario=".$_SESSION['id'];
			$query=mysql_query($sql) or die(mysql_error());
		$x=1;
		
		
		
	foreach($_POST['idBibliografia'] as $idBiblio)
	{
				
			$sql="insert into bibliografiaPasos (idPaso, idBibliografia, idReporte, idUsuario) values (".$_POST["idPaso"].", ".$idBiblio.",".$_POST["idReporte"].", ".$_SESSION['id'].")";
			$query=mysql_query($sql) or die(mysql_error());
	
	}
	
	//truncate sem
$sql="delete from semaforo where paso=".$_POST["idPasoSem"]." AND idReporte=".$_POST["idReporte"];
		$query=mysql_query($sql) or die(mysql_error());
$sql="insert into semaforo (paso, idReporte, light) values (".$_POST["idPasoSem"].", ".$_POST["idReporte"].", 2)";		
$query=mysql_query($sql) or die(mysql_error());

	
}

if($_POST['light'] == "ba") {


	//truncate
	$sql="delete from bibliografiaApalancamiento where idReporte=".$_POST["idReporte"]." AND idUsuario=".$_SESSION['id'];
			$query=mysql_query($sql) or die(mysql_error());
		$x=1;
		
		
		
	foreach($_POST['idBibliografia'] as $idBiblio)
	{
				
			$sql="insert into bibliografiaApalancamiento (idBibliografia, idReporte, idUsuario) values (".$idBiblio.",".$_POST["idReporte"].", ".$_SESSION['id'].")";
			$query=mysql_query($sql) or die(mysql_error());
	
	}
	
	//truncate sem
$sql="delete from semaforo where paso=".$_POST["idPasoSem"]." AND idReporte=".$_POST["idReporte"];
		$query=mysql_query($sql) or die(mysql_error());
$sql="insert into semaforo (paso, idReporte, light) values (".$_POST["idPasoSem"].", ".$_POST["idReporte"].", 2)";		
$query=mysql_query($sql) or die(mysql_error());

	
}

//////////////////////////
//fin saves bibliografia//
//////////////////////////




//////////////////////
//saves conclusiones//
//////////////////////
if($_POST['light'] == "cc") {


//truncate
$sql="delete from respuestasConclusiones where idReporte=".$_POST["idReporte"]." AND idUsuario=".$_SESSION['id'];
	$query=mysql_query($sql) or die(mysql_error());
	
	$x=1;
	
	while($x<=$_POST['numberOfTexts']) {
	
	$valuePostPregunta = "idPregunta".$x;
	$valuePostRespuesta = "respuesta".$x;
	$valuePostAgregarReporte = "agregaReporte".$x;
	
	
	
	

	
		$sql="insert into respuestasConclusiones (idConclusion, respuesta, idReporte, idUsuario) values (".$x.",'".$_POST["$valuePostRespuesta"]."', ".$_POST["idReporte"].", ".$_SESSION['id'].")";
		
		
		$query=mysql_query($sql) or die(mysql_error());
		
		$x=$x+1;
	}

//truncate sem
$sql="delete from semaforo where paso=".$_POST["idPasoSem"]." AND idReporte=".$_POST["idReporte"];
		$query=mysql_query($sql) or die(mysql_error());
$sql="insert into semaforo (paso, idReporte, light) values (".$_POST["idPasoSem"].", ".$_POST["idReporte"].", 2)";		
$query=mysql_query($sql) or die(mysql_error());


}
//////////////////////////
//fin saves conclusiones//
//////////////////////////

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-en">
<head>
	<title>Action Coach</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen" />

	<style type="text/css">
	
#footer { background: font-family: arial,verdana,helvetica; }	
	
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
	    
		setup : function(ed)
		{
		ed.onInit.add(function(ed)
		{
			this.execCommand("fontName", false, "Arial");
			this.getDoc().body.style.fontSize = '12px';
		});
		},		
        // General options
        mode : "textareas",
        editor_deselector : "esteno",
		language : 'es',
        theme : "advanced",
        plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		paste_auto_cleanup_on_paste : true,
		paste_preprocess : function(pl, o) {
			o.content = o.content.replace(/<\S[^><]*>/g, "");
        },
        /* paste_postprocess : function(pl, o) {
            alert(o.node.innerHTML);
            o.node.innerHTML = o.node.innerHTML + "\n-: CLEANED :-";
        }, */
				
        // Theme options
        theme_advanced_buttons1 : "spellchecker,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor,|,bullist,numlist,|,formatselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,replace,|,outdent,indent,blockquote,|,undo,redo",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
		spellchecker_languages : "+Spanish=es,English=en",
		init_instance_callback : function() {
		//tinyMCE.activeEditor.controlManager.setActive('spellchecker', true);
       
			tinymce.execCommand('mceSpellCheck', true);
            var obetnerTitulo = $("#titulo").text();
            
            if(obetnerTitulo == "Tus Creencias"){
                tinymce.execCommand('insertOrderedList', true);
            }
            
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
        },
		toolbar: "undo redo pastetext | styleselect | fontselect | fontsizeselect"
});


</script>

<script language="javascript" type="text/javascript">
	function validaBibliografia() {
		if(document.form.autor.value == "" || document.form.libro.value == "" || document.form.descripcion.value == "")
		{
			
			alert("Es necesario llenar todos los campos, Intente de nuevo")
			return false;
		}
	}

	function accciona(element,bdelete)
	{
		if(bdelete==0)
		{
		var idb=element.getAttribute("idb");
		
        window.location.assign("bibliografiaApalancaEdit.php?id="+idb+"&t=<?php echo $_GET['t'];?>&idReporte=<?php echo $_GET['idReporte'];?>&idPasoSem=<?php echo $_GET['idPasoSem'];?>");
         }
         else
         {
        var idb=element.getAttribute("idb");
		
        window.location.assign("bibliografiaApalancaDelete.php?id="+idb+"&t=<?php echo $_GET['t'];?>&idReporte=<?php echo $_GET['idReporte'];?>&idPasoSem=<?php echo $_GET['idPasoSem'];?>");

         }
        
	}

	function biblioPasoAccion(element,bdelete)
	{

    if(bdelete==0)
    {
    var idb=element.getAttribute("idb");
	window.location.assign("bibliografiaExtraEdit.php?id=<?php echo $_GET['id'];?>&t=<?php echo $_GET['t'];?>&idReporte=<?php echo $_GET['idReporte'];?>&idPasoSem=<?php echo $_GET['idPasoSem'];?>&idb="+idb+"");
    }
    else
    {
    var idb=element.getAttribute("idb");
	window.location.assign("bibliografiaExtraDelete.php?id=<?php echo $_GET['id'];?>&t=<?php echo $_GET['t'];?>&idReporte=<?php echo $_GET['idReporte'];?>&idPasoSem=<?php echo $_GET['idPasoSem'];?>&idb="+idb+"");
    }

	}
	
	
	</script>
	
</head>
<body>

<?php
include("include/headerPanelReporte.php");
?>
<div>
	
<?php //include("include/headerReporteMain.php"); ?>	</div>

<div id="layoutdims2">
<?php
$starCount=0;
$xp=1;
//metas
$sql="select * from metas";
$query=mysql_query($sql) or die(mysql_error());
while($row=mysql_fetch_array($query)) {
 ?><?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; } else { $starCount=$starCount+1; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />
	&nbsp; <a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=m&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>"><?php echo $row['nombre']; ?></a>
 <?php

 $xp++; 
 echo "<br /><br />";
 } 
//pasos
$sql="select * from tiposdepasos";
$query=mysql_query($sql) or die(mysql_error());
while($row=mysql_fetch_array($query)) {
 ?><?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; } else { $starCount=$starCount+1; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />&nbsp; <a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=p&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>"><?php echo $row['nombre']; ?></a>
 
  <?php
  $xp++;
  $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; } else { $starCount=$starCount+1; }
 echo "<br /><br />";
 ?><img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />&nbsp;<a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=bp&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>">Bibliografía <?php echo $row['nombre']; ?></a>
<?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; } else { $starCount=$starCount+1; }
	?>
  
 <?php
 $xp++;
 echo "<br /><br />"; 

 } 

//apalancamiento
?>
 <?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; } else { $starCount=$starCount+1; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />&nbsp;

 <a href="reporteContestar.php?t=a&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>">
	Apalancamiento Personal y Profesional</a>
 <?php $xp++; ?>
 <br /><br />
<?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; } else { $starCount=$starCount+1; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />&nbsp;
<a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=ba&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>">
	Bibliografía Apalancamiento Personal y Profesional</a>


<?php 
 $xp++; 
 
 //conclusiones
 ?>
 
 <br /><br />
<?php
 $sqlSM="select light from semaforo where paso=".$xp." AND idReporte=".$_GET['idReporte'];
	$querySM=mysql_query($sqlSM) or die(mysql_error());
	$rowSM=mysql_fetch_array($querySM);
	if($rowSM['light']=="") { $rowSM['light']="star_empty.png"; } else { $starCount=$starCount+1; }
	?>
 <img src="img/<?php echo $rowSM['light']; ?>" width="16px" height="16px" style="margin:none;" alt="star" />&nbsp;
<a href="reporteContestar.php?id=<?php echo $row['id']; ?>&t=cc&idReporte=<?php echo $_GET['idReporte']; ?>&idPasoSem=<?php echo $xp; ?>">
	Conclusiones</a>

<?php /*if($starCount==20) { 

//truncate flag

$sqlTFlag="delete from flagGenerar where idReporte=".$_GET["idReporte"];
$queryTFlag=mysql_query($sqlTFlag) or die("11");

$sqlTFlag="insert into flagGenerar (flagGenerar, idReporte) VALUES ('si', ".$_GET["idReporte"].")";
$queryTFlag=mysql_query($sqlTFlag) or die("22"); */


?>

<br /><br />

<?php 

$sqlFlag="SELECT COUNT(paso) as number FROM `semaforo` where idReporte=".$_GET["idReporte"];
$queryFlag=mysql_query($sqlFlag) or die("33");
$rowFlag=mysql_fetch_array($queryFlag);

if($rowFlag['number']>=20) { 
?>
 <a href="generarPDF.php?idU=<?php echo $_SESSION['id']; ?>&idReporte=<?php echo $_GET['idReporte']; ?>" target="_blank">
	Generar PDF</a>

<?php } ?>


<?php //} ?>

</div>
<div style="width:700px;margin:auto">
<form id="form" name="form" method="post" action="">
<?php
/////////
//metas//
/////////


if($_GET['t']=="m") {
	$sql="select * from metas where id=".$_GET['id'];
	$query=mysql_query($sql) or die(mysql_error());
	$rowMeta=mysql_fetch_array($query);
	?>
	
	<div style="text-align:center"><br /><br />
	<input type="submit" value="Guardar informaci&oacute;n" />
	</div>
	<!--IMPRIME NOMBRE DE LA META-->
	<h1 id="titulo"><?php echo $rowMeta['nombre']; ?></h1>
	
	<?php echo $rowMeta['vision']; ?>
	
	<?php
}
	?>

	<?php
    //preguntas metas
    if($_GET['t']=="m") 
    {
        $sql="SELECT * FROM preguntas WHERE idmeta=".$_GET['id']." ORDER BY cardinalidad ASC ";
        $query=mysql_query($sql) or die(mysql_error());
        $x=1;
        
        while($row=mysql_fetch_array($query)) 
		{
            //IMPRIME PREGUNTA
            echo $row['vision'];
            
            if($row['id'] == '3')
            {
                echo "¿Tu respuesta será visible en el reporte PDF? &nbsp; <input type='checkbox' name='vis' value='".$row['id']."' ";
                $sqlVisible="select visible from respuestasMetas where idMeta=".$_GET['id']." AND idReporte=".$_GET['idReporte']." AND idPregunta = ".$row['id']." AND idUsuario=".$_SESSION['id'];
                $sqlVisible=mysql_query($sqlVisible) or die(mysql_error());
                $row2=mysql_fetch_array($sqlVisible);
    
                if($row2['visible']==1) { echo " checked='checked'";}
                echo " /><br/><br/>";
            }
            //IMPRIME RESPUESTA
            
                //revisamos si ya existe respuesta a la pregunta
				echo "<textarea name='respuesta".$x."' id='respuesta".$x."' cols='85'>";
                $sqlRP="select respuesta from respuestasMetas where idMeta=".$_GET['id']." AND idReporte=".$_GET['idReporte']." AND idPregunta = ".$row['id']." AND idUsuario=".$_SESSION['id'];
            
                $queryRP=mysql_query($sqlRP) or die(mysql_error());
                $numRowsRP=mysql_num_rows($queryRP);
                
                if($numRowsRP > 0) 
                {
                    $rowRP=mysql_fetch_array($queryRP);
                     $sContent = strip_tags(stripslashes($rowRP['respuesta']),$allowedTags);
                     echo $sContent;
                }
    			echo '</textarea>';
            ?>
            
            <input type="hidden" id="idPregunta<?php echo $x; ?>" name="idPregunta<?php echo $x; ?>" value="<?php echo $row['id']; ?>" /><br /><br />
        <?php
            $x=$x+1;
        }//end while
        
        ?>
        
        
       <?php
	    $sql="select * from metas where id=".$_GET['id']." and manejaopcional=1";
		$query=mysql_query($sql) or die(mysql_error());
		$rowo=mysql_fetch_array($query);
        $y=1;
       
        if($rowo['manejaopcional'] == '1')
        {
           //IMPRIME LAS PREGUNTAS OPCIONALES
           echo "<H3>". "PREGUNTAS OPCIONALES". "</H3>";
           echo "<HR>". "<br/>";
		   $total = mysql_num_rows(mysql_query("select respuesta from preguntasopcionales where idMeta=".$_GET['id']." AND idReporte=".$_GET['idReporte']." AND idUsuario=".$_SESSION['id']));
		   if($total == 0){
		   while ($y <= 2)
		   	{
				echo "<p><b>Coloca tu pregunta opcional dentro del recuadro<b/></p>";
				echo "<textarea cols='100' name='oppregunta".$y."'  id='oppregunta".$y."'  class='auto-style2'></textarea><br /><br />";
				echo "<p><b>Coloca tu respuesta opcional dentro del recuadro<b/></p>";
				echo "<textarea cols='100' name='oprespuesta".$y."' id='oprespuesta".$y."' class='auto-style2'></textarea><br /><br />";
			$y=$y+1;
			}
				
		   }else
		   {
		   		$sqlp="select * from preguntasopcionales where idMeta=".$_GET['id']." AND idReporte=".$_GET['idReporte']." AND idUsuario=".$_SESSION['id']." Order by IdPreguntaOpcional asc";
				
				$queryp=mysql_query($sqlp) or die(mysql_error());
				

				while($row=mysql_fetch_array($queryp)) 
				{
					
					//IMPRIME RESPUESTA
					
					//echo "<input name='oppregunta".$y."' id='oppregunta".$y."' width='250' value='".$row['Pregunta']."' ><br/><br/>";
					
					echo "<p><b>Coloca tu pregunta opcional dentro del recuadro<b/></p>";
					echo "<textarea name='oppregunta".$y."' id='oppregunta".$y."' cols='85'>";
					
					
						 $sContent = strip_tags(stripslashes($row['Pregunta']),$allowedTags);
						 echo $sContent;
					
		
					echo "</textarea><br/><br/>";
					
					echo "<p><b>Coloca tu respuesta opcional dentro del recuadro<b/></p>";
					echo "<textarea name='oprespuesta".$y."' id='oprespuesta".$y."' cols='85'>";
					
					
						 $sContent = strip_tags(stripslashes($row['Respuesta']),$allowedTags);
						 echo $sContent;
					
		
					echo "</textarea><br/><br/>";
		
					$y=$y+1;
				}//end while
				
				
				
				
            
		    }

			   	   
       } //end manejaopcional       
        
        
       ?>
        
        
        
            
        
        <?
        $x=$x-1;
		$y=$y-1;
		
        ?>
        <input type="hidden" id="light" name="light" value="m" />
        <input type="hidden" id="idMeta" name="idMeta" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" id="idReporte"  name="idReporte" value="<?php echo $_GET['idReporte']; ?>" />
        <input type="hidden" id="idPasoSem" name="idPasoSem" value="<?php echo $_GET['idPasoSem']; ?>" />
        <input type="hidden" id="numberOfTexts" name="numberOfTexts" value="<?php echo $x; ?>" />
         <input type="hidden" id="numberOfTextsOpcionales" name="numberOfTextsOpcionales" value="<?php echo $y; ?>" />
        <p style="text-align:center">
        <input type="submit" value="Guardar informaci&oacute;n" />
        </p>
    
    
        <?php
    }//end if preguntas metas
?>
<?php
/////////////////
//termina metas//
/////////////////
?>
<?php
/////////
//pasos//
/////////

//titulo
if($_GET['t']=="p") {
$sql="select * from tiposdepasos where id=".$_GET['id'];
$query=mysql_query($sql) or die(mysql_error());
$rowTP=mysql_fetch_array($query);


?>
<div style="text-align:center"><br/><br/>
<input type="submit" value="Guardar informaci&oacute;n" />
</div>

<h1><?php echo $rowTP['nombre']; ?></h1>

<?php }
?>


<?php
//opciones pasos
if($_GET['t']=="p") {
	$sql="select c.id as idCategoria, c.nombre as categoria from pasos p, categorias c where p.idTipoPaso=".$_GET['id']." and p.idCategoria=c.id ORDER BY c.prioridad ASC";
	$query=mysql_query($sql) or die(mysql_error());
	$x=1;
	
	while($row=mysql_fetch_array($query)) {

		if (!($row['idCategoria'] =='14'))
		{
			echo "<h1 style='color:red'>".$row['categoria']."</h1><br />";
		}
		
		$sqlEst="select * from estrategias where idCategoria=".$row['idCategoria']." ORDER BY uai(nombre) ASC ";
		
		$queryEst=mysql_query($sqlEst) or die(mysql_error());
		
		
		
		
		while($rowEst=mysql_fetch_array($queryEst)) {
		echo "<table border='0' celpadding='2'>";
			echo "<tr>";
			echo "<td align='center'>";
			echo "<a name='location-".$rowEst['id']."'></a><input type='checkbox' name='idEstrategia[]' value='".$rowEst['id']."'";
			
			$sqlExisteEst="select id, prioridad from respuestasPasosEstrategias where idReporte=".$_GET['idReporte']." AND idPaso=".$_GET['id']." AND idUsuario=".$_SESSION['id']." AND idEstrategia=".$rowEst['id'];
			$queryExisteEst=mysql_query($sqlExisteEst) or die(mysql_error());
			$numExisteEst=mysql_num_rows($queryExisteEst);
			$rowExisteEst=mysql_fetch_array($queryExisteEst);
			
			if($numExisteEst==1) {
				echo " checked='checked'";
			}
			
			echo " onclick=\"$('#opcionEstrategia".$rowEst['id']."').toggle();\" />";
			echo "</td>";
			
			echo "<td>".$rowEst['nombre']."</td>";
			echo "</tr>";
			
			echo "</table>";
		
		echo "<div id='opcionEstrategia".$rowEst['id']."'";
		if($numExisteEst!=1) {
		echo "style='display:none;'";
		}
		
		echo ">";
		
		echo "<p class='texto' style='text-align:center'>Prioridad de estrategia</p>";
		
		echo "<p style='text-align:center'><select id='prioridad".$rowEst['id']."' name='prioridad".$rowEst['id']."'>";
			echo "<option value='1'";
			if($rowExisteEst['prioridad']=="Muy Alta") { echo " selected=selected"; }
			echo ">Muy Alta</option>";
			echo "<option value='2'";
			if($rowExisteEst['prioridad']=="Alta") { echo " selected=selected"; }
			echo ">Alta</option>";
			echo "<option value='3'";
			if($rowExisteEst['prioridad']=="Media") { echo " selected=selected"; }
			echo ">Media</option>";
			echo "<option value='4'";
			if($rowExisteEst['prioridad']=="Baja") { echo " selected=selected"; }
			echo ">Baja</option>";
			echo "<option value='5'";
			if($rowExisteEst['prioridad']=="Muy Baja") { echo " selected=selected"; }
			echo ">Muy Baja</option>";
			echo "</select></p>";
			
			echo "<p class='texto' style='text-align:center'>Contenido</p>";

			
			//estrategias editadas
			$sqlFlag="select * from estrategiasEditadasUsuario where idEstrategia='".$rowEst['id']."' and idUsuario=".$_SESSION['id']."  and idReporte=".$_GET['idReporte'];
			$queryFlag = mysql_query($sqlFlag) or die(mysql_error());
			$rowFlag = mysql_fetch_array($queryFlag);


			
			if($rowEst['agregar1'] == 1) { echo "<br />"; 
				echo $rowEst['contenido'];
				
				if(isset($rowFlag['texto'])) {
					echo $rowFlag['texto'];
				} else {
					echo $rowEst['texto'];
				}
			}
			
			if($rowEst['agregar2'] == 1) { echo "<br />"; 
				echo $rowEst['contenido2'];
				
				if(isset($rowFlag['texto2'])) {
					echo $rowFlag['texto2'];
				} else {
					echo $rowEst['texto2'];
				}
			}

			if($rowEst['agregar3'] == 1) { echo "<br />"; 
				echo $rowEst['contenido3'];

				
				if(isset($rowFlag['texto3'])) {
					echo $rowFlag['texto3'];
				} else {
					echo $rowEst['texto3'];
				}
			}

			if($rowEst['agregar4'] == 1) { echo "<br />"; 
				echo $rowEst['contenido4'];

				
				if(isset($rowFlag['texto4'])) {
					echo $rowFlag['texto4'];
				} else {
					echo $rowEst['texto4'];
				}
			}

						
			//echo "<p style='text-align:center;'><a href='editarEstrategia.php?id=".$rowEst['id']."&idReporte=".$_GET['idReporte']."&idid=".$_GET['id']."&tt=".$_GET['t']."&idPasoSem=".$_GET['idPasoSem']."'>Editar contenido de estrategia</a></p>";
			
			$milink="editarEstrategia.php?id=".$rowEst['id']."&idReporte=".$_GET['idReporte']."&idid=".$_GET['id']."&tt=".$_GET['t']."&idPasoSem=".$_GET['idPasoSem'];
			
			//codigo nuevo
			echo '<p style="text-align:center;"><input type="submit"  id="submitEstrategia" name="submitEstrategia" value="Editar contenido de estrategia" onclick="$(\'input[name=ligaEst]\').val(\''.$milink.'\');" /></p>';
			//codigo nuevo
			
			echo "<hr />";
			
		echo "</div>";
		
		echo "<br />";
		}
		
		
		
		?>
		
	<br />
	
	<?php
		$x=$x+1;
	
	}
	
	$x=$x-1;
?>
	<input type="hidden"  id="light" name="light" value="p" />
	<input type="hidden" id="idReporte" name="idReporte" value="<?php echo $_GET['idReporte']; ?>" />
	<input type="hidden" id="idPasoSem" name="idPasoSem" value="<?php echo $_GET['idPasoSem']; ?>" />
	<input type="hidden"  id="idPaso" name="idPaso" value="<?php echo $rowTP['id']; ?>" />
	<input type="hidden" id="ligaEst"  name="ligaEst" value="<?php echo $milink; ?>" />

<p style="text-align:center">
<input type="submit" value="Guardar informaci&oacute;n" />
</p>


<?php
}
?>


<?php

/////////////////
//termina pasos//
/////////////////


//////////////////
//apalancamiento//
//////////////////
?>


<?php

if($_GET['t']=="a") {
	$sql="select * from apalancamientos";
	$query=mysql_query($sql) or die(mysql_error());
	$x=1;
	?>
	
	<div style="text-align:center"><br /><br />
<input type="submit" value="Guardar informaci&oacute;n" />
</div>
	<?php
	
	while($row=mysql_fetch_array($query)) { 

		echo "";
		echo "<h1><input type=\"checkbox\" id=\"agregaReporte".$x."\" name=\"agregaReporte".$x."\" value='si'";
			
			$sqlExisteEst="select agregarReporte from respuestasApalancamientos where idReporte=".$_GET['idReporte']." AND idUsuario=".$_SESSION['id']." AND agregarReporte='si' AND idApalancamiento=".$row['id'];
			
			$queryExisteEst=mysql_query($sqlExisteEst) or die(mysql_error());
			$rowExisteEst=mysql_fetch_array($queryExisteEst);
			
			if($rowExisteEst['agregarReporte']=='si') {
				echo " checked='checked'";
			}
			
			
			echo "/>".$row['nombre']."</h1>";
		echo "<br />";
		echo $row['contenido'];
		
		?>
		<textarea name="respuesta<?php echo $x; ?>" id="respuesta<?php echo $x; ?>" cols="85">
		<?php
		//revisamos si ya existe respuesta a la pregunta
		$sqlRP="select respuesta from respuestasApalancamientos where idReporte=".$_GET['idReporte']." AND idApalancamiento = ".$row['id']." AND idUsuario=".$_SESSION['id'];
		
	$queryRP=mysql_query($sqlRP) or die(mysql_error());
	$numRowsRP=mysql_num_rows($queryRP);
	
	if($numRowsRP > 0) {
		$rowRP=mysql_fetch_array($queryRP);
		
		 $sContent = strip_tags(stripslashes($rowRP['respuesta']),$allowedTags);
		 
		 echo $sContent;
	
	}

		?></textarea>
		<input type="hidden" id="idPregunta<?php echo $x; ?>" name="idPregunta<?php echo $x; ?>" value="<?php echo $row['id']; ?>" />
	
	<br />
	<br />
	
	<?php
		$x=$x+1;
	
	}
	
	$x=$x-1;
?>
	<input type="hidden" id="light" name="light" value="a" />
	<input type="hidden" id="idReporte" name="idReporte" value="<?php echo $_GET['idReporte']; ?>" />
	<input type="hidden" id="idPasoSem" name="idPasoSem" value="<?php echo $_GET['idPasoSem']; ?>" />
	<input type="hidden" id="numberOfTexts" name="numberOfTexts" value="<?php echo $x; ?>" />
	<p style="text-align:center">
<input type="submit" value="Guardar informaci&oacute;n" />
</p>


<?php
}
?>
<?php
//////////////////////////
//termina apalancamiento//
//////////////////////////


//////////////////////
//bibliografia pasos//
//////////////////////
?>

<?php

if($_GET['t']=="bp") {


$sql="select * from tiposdepasos where id=".$_GET['id'];
$query=mysql_query($sql) or die(mysql_error());
$rowTP=mysql_fetch_array($query);

?>

<div style="text-align:center"><br /><br />
<input type="submit" value="Guardar informaci&oacute;n" />
</div>

<h1>Bibliografía <?php echo $rowTP['nombre']; ?></h1><br /><br />

<?php

    $sql="select * from bibliografias_2 where idTipoPaso=".$_GET['id']." AND idUsuario=0";
	$query=mysql_query($sql) or die(mysql_error());
	$x=1;
	
	while($row=mysql_fetch_array($query)) {
	
	
		echo "<p><input attr='2' type='checkbox' id='idBibliografia[]' name='idBibliografia[]' value='".$row['id']."'";
	
	$sqlExisteEst="select id from bibliografiaPasos where idReporte=".$_GET['idReporte']." AND idUsuario=".$_SESSION['id']." AND idPaso=".$_GET['id']." AND idBibliografia=".$row['id'];
			$queryExisteEst=mysql_query($sqlExisteEst) or die(mysql_error());
			$numExisteEst=mysql_num_rows($queryExisteEst);
			$rowExisteEst=mysql_fetch_array($queryExisteEst);
			
			if($numExisteEst==1) {
				echo " checked='checked'";
			}
			
			echo " />&nbsp;".$row['libro'].' -&nbsp;<b>'.$row['autor'].'</b>&nbsp;- '.$row['descripcion']."</p><br />";

	
		$x=$x-1;
	}
?>

<?php
	
	$sql="select * from bibliografias_2 where idTipoPaso=".$_GET['id']." and idUsuario=".$_SESSION['id']."";
	$query=mysql_query($sql) or die(mysql_error());
	$x=1;
	
	while($row=mysql_fetch_array($query)) {
	
	
		echo "<p><input attr='2' type='checkbox' id='idBibliografia[]' name='idBibliografia[]' value='".$row['id']."'";
	
	$sqlExisteEst="select id from bibliografiaPasos where idReporte=".$_GET['idReporte']." AND idUsuario=".$_SESSION['id']." AND idPaso=".$_GET['id']." AND idBibliografia=".$row['id'];
			$queryExisteEst=mysql_query($sqlExisteEst) or die(mysql_error());
			$numExisteEst=mysql_num_rows($queryExisteEst);
			$rowExisteEst=mysql_fetch_array($queryExisteEst);
			
			if($numExisteEst==1) {
				echo " checked='checked'";
			}
			
			echo " />";
			$VistaAutor=$row['autor'];
			$VistaLibro=$row['libro'];
			$VistaDescripcion=$row['descripcion'];
			$idRun=$row['id'];
			echo "$VistaAutor&nbsp;-$VistaLibro&nbsp;-$VistaDescripcion"; 
			echo '&nbsp;&nbsp;<img onclick="biblioPasoAccion(this,0)" idb='.$idRun.' src="img/edit2.png"/>&nbsp;&nbsp<img onclick="biblioPasoAccion(this,1)" idb='.$idRun.' src="img/delete2.png"/></br></br>';
	}
?>
    <div style="border: 2px groove #6495ED;width:200px;background-color:#6495ED;">
    <a style="font-family:bold;font-size:20px;color:white;text-decoration:none;" href="bibliografiaExtraAdd.php?id=<?php echo $_GET['id'];?>&t=<?php echo $_GET['t'];?>&idReporte=<?php echo $_GET['idReporte'];?>&idPasoSem=<?php echo $_GET['idPasoSem'];?>">Agregar bibliografia</a>
	<img src="img/add.png"/>
	</div>
	<input type="hidden" id="light" name="light" value="bp" />
	<input type="hidden" id="idReporte" name="idReporte" value="<?php echo $_GET['idReporte']; ?>" />
	<input type="hidden" id="idPasoSem" name="idPasoSem" value="<?php echo $_GET['idPasoSem']; ?>" />
	<input type="hidden" id="idPaso" name="idPaso" value="<?php echo $_GET['id']; ?>" />



<p style="text-align:center">
<input type="submit" value="Guardar informaci&oacute;n" />
</p>


<?php

}

//////////////////////////////
//termina bibliografia pasos//
//////////////////////////////
?>

<?php
///////////////////////////////
//bibliografia apalancamiento//
///////////////////////////////
?>
<?php

if($_GET['t']=="ba") {

?>
<p style="text-align:center">
<input type="submit" value="Guardar informaci&oacute;n" />
</p>

<h1>Bibliografía Apalancamiento Personal y Profesional</h1><br /><br />

<?php
	$sql="select * from bibliografiaapalancaprofe where idUsuario=0";
	$query=mysql_query($sql) or die(mysql_error());
	$x=1;
	
	while($row=mysql_fetch_array($query)) {
	
	
		echo "<input type='checkbox' id='idBibliografia[]' name='idBibliografia[]' value='".$row['id']."'";
	
	$sqlExisteEst="select id from bibliografiaApalancamiento where idReporte=".$_GET['idReporte']." AND idUsuario=".$_SESSION['id']." AND idBibliografia=".$row['id'];
			$queryExisteEst=mysql_query($sqlExisteEst) or die(mysql_error());
			$numExisteEst=mysql_num_rows($queryExisteEst);
			$rowExisteEst=mysql_fetch_array($queryExisteEst);
			
			if($numExisteEst==1) {
				echo " checked='checked'";
			}
			
			
			echo " />".$row['autor'].' -<b>'.$row['libro'].'</b>- '.$row['descripcion']."<br /><br />";

	
		$x=$x-1;
	}
?>

<?php
	$sql2="select * from bibliografiaapalancaprofe where idUsuario=".$_SESSION['id']."";
	$query2=mysql_query($sql2) or die(mysql_error());
	$x2=1;
	
	while($row2=mysql_fetch_array($query2)) {
	
	
		echo "<input type='checkbox' id='idBibliografia[]' name='idBibliografia[]' value='".$row2['id']."'";
	
	$sqlExisteEst2="select id from bibliografiaApalancamiento where idReporte=".$_GET['idReporte']." AND idUsuario=".$_SESSION['id']." AND idBibliografia=".$row2['id'];
			$queryExisteEst2=mysql_query($sqlExisteEst2) or die(mysql_error());
			$numExisteEst2=mysql_num_rows($queryExisteEst2);
			$rowExisteEst2=mysql_fetch_array($queryExisteEst2);
			
			if($numExisteEst2==1) {
				echo " checked='checked'";
			}
			
			
			echo " />";
			$VistaAutor=$row2['autor'];
			$VistaLibro=$row2['libro'];
			$VistaDescripcion=$row2['descripcion'];
			$idRun=$row2['id'];
			echo "$VistaAutor&nbsp;-$VistaLibro&nbsp;-$VistaDescripcion"; 
			echo '&nbsp;&nbsp;<img onclick="accciona(this,0)" idb='.$idRun.' src="img/edit2.png"/>&nbsp;&nbsp<img onclick="accciona(this,1)" idb='.$idRun.' src="img/delete2.png"/></br></br>';
			

	
		$x2=$x2-1;
	}
?>

    <div style="border: 2px groove #6495ED;width:200px;background-color:#6495ED;">
    <a style="font-family:bold;font-size:20px;color:white;text-decoration:none;" href="bibliografiaApalancaAdd.php?id=0&t=<?php echo $_GET['t'];?>&idReporte=<?php echo $_GET['idReporte'];?>&idPasoSem=<?php echo $_GET['idPasoSem'];?>">Agregar bibliografia</a>
	<img src="img/add.png"/>
	</div>
	<input type="hidden" id="light" name="light" value="ba" />
	<input type="hidden" id="idReporte" name="idReporte" value="<?php echo $_GET['idReporte']; ?>" />
	<input type="hidden" id="idPasoSem" name="idPasoSem" value="<?php echo $_GET['idPasoSem']; ?>" />

<p style="text-align:center">
<input type="submit" value="Guardar informaci&oacute;n" />
</p>

<?php

}

///////////////////////////////////////
//termina bibliografia apalancamiento//
///////////////////////////////////////
?>


<?php
/////////////////
//conclusiones//
////////////////
?>
<?php

if($_GET['t']=="cc") {
	?>
	
	<div style="text-align:center"><br /><br />
<input type="submit" value="Guardar informaci&oacute;n" />
</div>
<h1>Conclusiones</h1><br /><br />
<p>Antes de que terminemos, me gustarí­a hacerte dos últimas preguntas:</p>

<p>Primero, por favor enumera las 10 cosas , que si se implementan o se mejoran, 
justificarí­an por mucho tu inversión mensual en el programa de Coaching de 
Negocios:</p>
		<textarea name="respuesta1" id="respuesta1" cols="85">
		<?php
		//revisamos si ya existe respuesta a la pregunta
		$sqlRP="select respuesta from respuestasConclusiones where idReporte=".$_GET['idReporte']." AND idConclusion = 1 AND idUsuario=".$_SESSION['id'];
		
	$queryRP=mysql_query($sqlRP) or die(mysql_error());
	$numRowsRP=mysql_num_rows($queryRP);
	
	if($numRowsRP > 0) {
		$rowRP=mysql_fetch_array($queryRP);
		
		 $sContent = strip_tags(stripslashes($rowRP['respuesta']),$allowedTags);
		 
		 echo $sContent;
	
	}

		?></textarea>

<p>Finalmente,la última pregunta ¿Si hubiera una sola cosa que yo pudiera hacer 
por ti ahora mismo,¿cuál serí­a?</p>
		<textarea name="respuesta2" id="respuesta2" cols="85">
		<?php
		//revisamos si ya existe respuesta a la pregunta
		$sqlRP="select respuesta from respuestasConclusiones where idReporte=".$_GET['idReporte']." AND idConclusion = 2 AND idUsuario=".$_SESSION['id'];
		
	$queryRP=mysql_query($sqlRP) or die(mysql_error());
	$numRowsRP=mysql_num_rows($queryRP);
	
	if($numRowsRP > 0) {
		$rowRP=mysql_fetch_array($queryRP);
		
		 $sContent = strip_tags(stripslashes($rowRP['respuesta']),$allowedTags);
		 
		 echo $sContent;
	
	}

		?></textarea>

		<input type="hidden" id="idPregunta<?php echo $x; ?>" name="idPregunta<?php echo $x; ?>" value="<?php echo $row['id']; ?>" />
	
	<br />
	<br />
	<input type="hidden" id="light" name="light" value="cc" />
	<input type="hidden" id="idReporte" name="idReporte" value="<?php echo $_GET['idReporte']; ?>" />
	<input type="hidden" id="idPasoSem" name="idPasoSem" value="<?php echo $_GET['idPasoSem']; ?>" />
	<input type="hidden" id="numberOfTexts" name="numberOfTexts" value="2" />
	<p style="text-align:center">
<input type="submit" value="Guardar informaci&oacute;n" />
</p>


<?php
}


////////////////////////
//termina conclusiones//
////////////////////////
?>


</form>

</div>

<?php include("include/footerPanelReporte.php"); ?>

</body>
</html>