<?php

include("include/conn.php");





//============================================================+

// File name   : example_039.php

// Begin       : 2008-10-16

// Last Update : 2010-08-08

//

// Description : Example 039 for TCPDF class

//               HTML justification

//

// Author: Nicola Asuni

//

// (c) Copyright:

//               Nicola Asuni

//               Tecnick.com LTD

//               Manor Coach House, Church Hill

//               Aldershot, Hants, GU12 4RQ

//               UK

//               www.tecnick.com

//               info@tecnick.com

//============================================================+



/**

 * Creates an example PDF TEST document using TCPDF

 * @package com.tecnick.tcpdf

 * @abstract TCPDF - Example: HTML justification

 * @author Nicola Asuni

 * @since 2008-10-18

 */



require_once('tcpdf/config/lang/spa.php');

require_once('tcpdf/tcpdf.php');





set_time_limit(900);



// Extend the TCPDF class to create custom Header and Footer

class MYPDF extends TCPDF {





    //Page header

    public function Header() 

	{	 
	    $sqlInfoReporte="select * from reportes where id=".$_GET['idReporte'];

		$queryInfoReporte=mysql_query($sqlInfoReporte) or die(mysql_error());

		$rowInfoReporte=mysql_fetch_array($queryInfoReporte);		

		$html = '<table border="0" cellspacing="0" cellpadding="0">

					<tr>

						<th align="left"><p style="color:#014781;font-size:32px;">Empresa: <span style="color:#990000;">'.$rowInfoReporte['empresa'].'</span><br />Cliente: <span style="color:#990000;">'.$rowInfoReporte['cliente'].'</span></p></th>

						<th align="right"><img src="img/logoac.jpg" height="27px" /></th>

					</tr>

				</table>';

		$this->writeHTML($html, true, false, true, false, '');

		

		$border_style = array('all' => array('width' => 0.5, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));

		// --- CMYK ------------------------------------------------

		$this->SetDrawColor(255, 255, 255, 0);

		$this->SetFillColor(0, 0, 0, 0);

		$this->Rect(8, 17, 194, 263, 'DF', $border_style);

		



		

	}



    // Page footer

    public function Footer() {

    

    $sqlInfoReporte="select * from reportes where id=".$_GET['idReporte'];

	$queryInfoReporte=mysql_query($sqlInfoReporte) or die(mysql_error());

	$rowInfoReporte=mysql_fetch_array($queryInfoReporte);



        // Position at 15 mm from bottom

        $this->SetY(-12);

        // Set font

        $this->SetFont('times', '', 10);        

        

        switch(date("m")) 

		{

        	case "01":

        		$mes = "Enero";

        	break;

        	case "02":

        		$mes = "Febrero";

        	break;

        	case "03":

        		$mes = "Marzo";

        	break;

        	case "04":

        		$mes = "Abril";

        	break;

        	case "05":

        		$mes = "Mayo";

        	break;

        	case "06":

        		$mes = "Junio";

        	break;

        	case "07":

        		$mes = "Julio";

        	break;

        	case "08":

        		$mes = "Agosto";

        	break;

        	case "09":

        		$mes = "Septiembre";

        	break;

        	case "10":

        		$mes = "Octubre";

        	break;

        	case "11":

        		$mes = "Noviembre";

        	break;

        	case "12":

        		$mes = "Diciembre";

        	break;

        }

  $html = '<table border="0" cellspacing="0" cellpadding="0" style="color:#014781;">

				<tr>
					<th align="left"><span>Tu ActionCOACH: '.$rowInfoReporte['coach'].'</span></th>
					<th align="center"></th>

					<th align="right">Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages().'</th>

				</tr>

			</table>';

			

		// output the HTML content

		$this->writeHTML($html, true, false, true, false, '');



    }

}



// create new PDF document

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set document information

$pdf->SetCreator(PDF_CREATOR);

$pdf->SetAuthor('Nicola Asuni');

$pdf->SetTitle('TCPDF Example 003');

$pdf->SetSubject('TCPDF Tutorial');

$pdf->SetKeywords('TCPDF, PDF, example, test, guide');



// set default header data

//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);



// set header and footer fonts

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));



// set default monospaced font

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);



//set margins

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);





$pdf->setPrintHeader(false);

$pdf->setPrintFooter(false);



//set auto page breaks

//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->SetAutoPageBreak(TRUE, 38);

//set image scale factor

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



//set some language-dependent strings

$pdf->setLanguageArray($l);

// ---------------------------------------------------------PORTADA



// add a page

$pdf->AddPage();

$pdf->setPrintFooter(false);





//Portada





//marco rectangular

$border_style = array('all' => array('width' => 0.5, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));

$pdf->SetDrawColor(255, 255, 255, 0);

$pdf->SetFillColor(0, 0, 0, 0);

$pdf->Rect(8, 10, 194, 263, 'DF', $border_style);



$sqlInfoReporte="select * from reportes where id=".$_GET['idReporte'];

$queryInfoReporte=mysql_query($sqlInfoReporte) or die(mysql_error());

$rowInfoReporte=mysql_fetch_array($queryInfoReporte);



$html='<table align="center"><tr><td><br/></td></tr><tr><td>
<img src="img/logoac.jpg" width="300px" height="66px" /></td></tr><tr><td><br/></td></tr><tr><td>
<img src="img/logoreporte.jpg" width="400px" height="63px" style="border:none;" /></td></tr><tr><td><br/></td></tr><tr><td>';

	

	if($rowInfoReporte['logo']!="logos/") {

	$html.='<img width="230px" src="'.$rowInfoReporte['logo'].'" />';

	}
	
	$html.='</td></tr><tr><td>&nbsp;</td></tr></table>';



$html2 = <<<EOF

$html

EOF;



// set core font

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";



$html='<p style="text-align:center;color:#014781;">Para:<br /></p>';



$html2 = <<<EOF

$html

EOF;





$pdf->SetFont('times', '', 20);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";





$html='<p style="text-align:center;">'.$rowInfoReporte['empresa'].'</p>';



$html2 = <<<EOF

$html

EOF;

$pdf->SetFont('times', '', 26);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";



$html='<p style="text-align:center;">'.$rowInfoReporte['cliente'].'<br /><br /></p>';



$html2 = <<<EOF

$html

EOF;

$pdf->SetFont('times', '', 22);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";







$html='<p style="text-align:center;color:#014781;">Preparado por:<br /></p>';



$html2 = <<<EOF

$html

EOF;

$pdf->SetFont('times', '', 16);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";



$html='<p style="text-align:center;">'.$rowInfoReporte['coach'].'<br /></p>';



$html2 = <<<EOF

$html

EOF;

$pdf->SetFont('times', '', 18);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";


$html='<p style="text-align:center;color:#014781;">Tu ActionCOACH</p>';



$html2 = <<<EOF

$html

EOF;



// set core font

$pdf->SetFont('times', '', 12);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";



$pdf->setPrintHeader(true);

$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->setPrintFooter(true);



// ---------------------------------------------------------METAS



for($x=1;$x<=5;$x++) {



$html="<style>

    h1 { color: #00407B; font-size: 2.15em; text-align:center; }

    

    h2 {color: #000000; font-size: 38px;}

	p{	text-align:justify; }
	p .interlineado {line-height:13px !important;}
	.categoria{ text-align:justify; color: #990000; font-size:52px;font-weight:bold;}

 

</style>

";



//titulo metas

$sql="select nombre, vision from metas where id=".$x;

$query=mysql_query($sql) or die(mysql_error());

$row=mysql_fetch_array($query);



$pdf->SetFont('times', '', 12);   

$html .= "<h1>".$row['nombre']."</h1>";

$pdf->SetFont('times', '', 12);



$textoI=$row['nombre'];

$textoI=strip_tags($textoI);

$textoI=html_entity_decode($textoI);

$textoI=utf8_encode($textoI);

$pdf->Bookmark($textoI, 0, 0, '', 'B', array(0,64,128));


$html .= "<style>
		 .interlineado {line-height:3px !important; font-weight:bold !important;}
		 .respuesta {line-height:3px !important;}
		 </style>";

$html .= $row['vision'];



//respuestas metas

//$sql="select p.vision, rm.respuesta from preguntas p, respuestasMetas rm where rm.idMeta=".$x." AND idReporte=".$_GET['idReporte']." AND idUsuario=".$_GET['idU']." AND p.id = rm.idPregunta AND rm.respuesta<>'' and rm.visible=1 order by p.id ASC";

$sql="(select p.id AS id, p.cardinalidad, p.vision, rm.respuesta from preguntas p, respuestasMetas rm where rm.idMeta=".$x." AND idReporte=".$_GET['idReporte']." AND idUsuario=".$_GET['idU']." AND p.id = rm.idPregunta AND rm.respuesta<>'' and rm.visible=1 order by p.id ASC)  UNION (SELECT po.IdPreguntaOpcional AS Pid,  '0' AS cardinalidad, po.pregunta, po.respuesta FROM preguntasopcionales po WHERE po.idmeta = ".$x." AND po.idreporte = ".$_GET['idReporte']." AND po.idusuario = ".$_GET['idU']."  AND pregunta <>  '' order by po.IdPreguntaOpcional ASC) ORDER BY CARDINALIDAD DESC , ID ASC";

$query=mysql_query($sql) or die(mysql_error());

$i = 1;

while($row=mysql_fetch_array($query)) {

$vision = $row['vision'];



$finalvision = substr($vision, 3, -4);

$html .= '<p class="interlineado">'.$i.'.-'.$finalvision."</p><p class='respuesta'>".$row['respuesta']."</p> ";

$textoI=$i.'.-'.$row['vision'];

$textoI=strip_tags($textoI);

$textoI=html_entity_decode($textoI);

//$textoI=utf8_encode($textoI);

$pdf->Bookmark($textoI, 1, 0, '', '', array(128,0,0));



$i = $i+1;

}

$html2 = <<<EOF

$html

EOF;



// set core font

$pdf->SetFont('times', '', 12);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";

$pdf->AddPage();

$pdf->setPrintHeader(true);

$pdf->setPrintFooter(true);

}





// ---------------------------------------------------------PASOS

for($x=1;$x<=6;$x++) {

$html="<style>
    h1 { color: #00407B; font-size: 2.15em; text-align:left; }   
    h2 {color: #000000; font-size: 38px;}
	p {	text-align:justify;	}
	.categoria{ text-align:center; color: #990000; font-size:68px;font-weight:bold;}
</style>";

//titulo pasos

$sql="select nombre from tiposdepasos where id=".$x;

$query=mysql_query($sql) or die(mysql_error());

$row=mysql_fetch_array($query);

$pdf->SetFont('times', '', 12);   

$html .= "<h1>".$row['nombre']."</h1>";

$pdf->SetFont('times', '', 12);

$textoP=$row['nombre'];
//$textoP=strip_tags($textoP);
//$textoP=html_entity_decode($textoP);
//$textoP=utf8_encode($textoP);
$NumeroPaso=$textoP;

//LineaOriginal $textoI=$row['nombre'];
//LineaOriginal $textoI=strip_tags($textoI);
//LineaOriginal $textoI=html_entity_decode($textoI);
//LineaOriginal $textoI=utf8_encode($textoI);

//LineaOriginal $NumeroPaso=utf8_encode($textoI);

$pdf->Bookmark($textoP, 0, 0, '', 'B', array(0,64,128));




//respuestas pasos

$sql="SELECT c.id as idCategoria, c.nombre AS categoria, e.id, e.nombre AS estrategia, e.*, rpe.prioridad FROM respuestasPasosEstrategias rpe, estrategias e, categorias c WHERE rpe.idPaso =".$x." AND idReporte =".$_GET['idReporte']." AND idUsuario =".$_GET['idU']." AND rpe.idEstrategia = e.id AND e.idCategoria = c.id ORDER BY c.prioridad ASC , e.id ASC";

$query=mysql_query($sql) or die(mysql_error());





$muestraCategoria="";



while($row=mysql_fetch_array($query)) {



	if($row['categoria']!=$muestraCategoria) { 

		if (!($row['idCategoria'] =='14')){

			$html .='<p class="categoria">'.$row['categoria'].'.</p>';

			$muestraCategoria=$row['categoria'];

		}

	} 



$textoI=$row['estrategia'];

$textoI=strip_tags($textoI);

$textoI=html_entity_decode($textoI);
$pdf->Bookmark($textoI, 1, 0, '', '', array(128,0,0));


$a=$row['estrategia'];
$a=htmlentities($a);
$estrategia=html_entity_decode($a);


$html .="<h2>".$estrategia."</h2>";



//estrategias editadas

			$sqlFlag="select * from estrategiasEditadasUsuario where idEstrategia='".$row['id']."' and idUsuario=".$_GET['idU']."  and idReporte=".$_GET['idReporte'];

			$queryFlag = mysql_query($sqlFlag) or die(mysql_error());

			$rowFlag = mysql_fetch_array($queryFlag);



if($row['agregar1']==1) {

	$html .=$row['contenido'];

	

	if($rowFlag['texto']!="") {

		$html .= $rowFlag['texto'];

	} else {

		$html .=$row['texto'];

	}

}



if($row['agregar2']==1) {

	$html .=$row['contenido2'];

	

	if($rowFlag['texto2']!="") {

		$html .=$rowFlag['texto2'];

	} else {

		$html .=$row['texto2'];

	}



}





if($row['agregar3']==1) {

	$html .=$row['contenido3'];

	

	if($rowFlag['texto3']!="") {

		$html .= $rowFlag['texto3'];

	} else {

		$html .=$row['texto3'];

	}



}





if($row['agregar4']==1) {

	$html .=$row['contenido4'];

	

	if($rowFlag['texto4']!="") {

		$html .= $rowFlag['texto4'];

	} else {

		$html .=$row['texto4'];

	}



}







}





$html2 = <<<EOF

$html

EOF;



// set core font

$pdf->SetFont('times', '', 12);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";

$pdf->AddPage();

$pdf->setPrintHeader(true);

$pdf->setPrintFooter(true);

//action plan del paso
$html="<style>
    h1 { color: #00407B; font-size: 2.15em; text-align:center; }
    h2 {color: #ffffff; font-size: 60px;}
	h3 {color: #000000; font-size: 50px;}
	p  {text-align:justify;	}
	.categoria{ text-align:center; color: #990000; font-size:60px;font-weight:bold;}
	.sombraoscura {background-color: #80A0BC; color:black; font-weight:bold;}
	.separador { height:40px; clear:both;}
	.datos {font-size:36px; color:#111111;} 
	hr {color: #cccccc; height: 1px;width: 100%;border: 0;}
	.colorgris {#999999;}		
	.bordegris {	border-bottom: 1px solid #f7f7f7;	}
	.renglonclaro {background-color: #ffffff;}
	.renglonobscuro {background-color:#F7F7F7;}
	table td	{	border: 1px solid #dddddd;	}
</style>";

$pdf->SetFont('times', '', 12); 
$html.="<h1>Action Plan</h1>";  
$pdf->Bookmark('Action Plan', 0, 0, '', '', array(128,0,0));
$pdf->SetFont('times', '', 12);

$html .='<p class="categoria">'.$NumeroPaso.'</p>';
$sql1="SELECT distinct (c.id) as idcategoria, rpe.idpaso as idpaso, tp.nombre as nombretp, c.nombre AS categoria, e.nombre AS estrategia, e.contenido as descripcion, rpe.prioridad  FROM respuestasPasosEstrategias rpe, estrategias e, categorias c,tiposdepasos tp WHERE rpe.idPaso =".$x." AND tp.id= ".$x."  and idReporte =".$_GET['idReporte']." AND idUsuario =".$_GET['idU']." AND rpe.idEstrategia = e.id AND e.idCategoria = c.id GROUP BY c.id ORDER BY c.prioridad, prioridad ASC";

$query1=mysql_query($sql1) or die(mysql_error());

$muestraCategoria = "";

while($row1=mysql_fetch_array($query1)) {

$catPlan=$row1['estrategia'];
$catPlan=htmlentities($catPlan);
$catPlan=html_entity_decode($catPlan);

if($row1['idcategoria']!=$muestraCategoria) 
{ 	

$html .= '<table width="628" border="0" cellpadding="5" cellspacing="1" border: 1px solid white; >';

$html.='<thead>';


$html.='<tr style="background-color:#404040;color:#ffffff; background: url(img/degradado.png) repeat-x;">

  <td class="bordegris" width="628" align="left" colspan="6">'.$catPlan.'</td>

</tr>';

$html.='<tr class="datos" style="background-color:#404040;color:#ffffff; border: 2px solid grey;">
  		  <td width="91" align="left">Prioridad</td>

		  <td width="273" align="left">Actividad</td>
		  <td width="76"  align="center"> Resp.</td>
		  <td width="76"  align="center"> Inv.</td>	  
		  <td width="56" align="left">Inicio</td>
		  <td width="56"  align="center">Final</td>
</tr>
</thead>';

$idCategoria=$row1['idcategoria'];



$sql3 = "SELECT c.id as idcategoria,tp.nombre as nombretp, c.nombre AS categoria, e.nombre AS estrategia, e.contenido as descripcion, rpe.prioridad FROM respuestasPasosEstrategias rpe, estrategias e, categorias c,tiposdepasos tp WHERE rpe.idPaso =".$x." AND tp.id= ".$x." AND c.id=".$idCategoria."  AND idReporte =".$_GET['idReporte']." AND idUsuario =".$_GET['idU']." AND rpe.idEstrategia = e.id AND e.idCategoria = c.id order by categoria, prioridad ASC"; 

$query3=mysql_query($sql3) or die(mysql_error());

$z=0;

while($row3=mysql_fetch_array($query3)) {

$estPlan=$row3['estrategia'];
$estPlan=strip_tags($estPlan);
$estPlan=htmlentities($estPlan);
$estPlan=html_entity_decode($estPlan);
//$estPlan=utf8_decode($estPlan);
//$estPlan=htmlentities($estPlan);
//$estPlan=html_entity_decode($estPlan);


if ($z % 2) 
{$clase = 'renglonclaro';
}else{
$clase = 'renglonobscuro';
}

$html.='<tr nobr="true" class="datos '.$clase.'">

  	<td width="91" >'.$row3['prioridad'].'</td>

  	<td width="273">'.$estPlan.'</td>

  	<td width="76"></td>

	<td width="76"></td>

    <td width="56" align="left"></td>

	<td width="56"  align="center"></td>

</tr>';

$z= $z+1;

 	} 

  

$html.='</table>';

}

}

$html2 = <<<EOF

$html

EOF;





// set core font

$pdf->SetFont('times', '', 12);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";

$pdf->AddPage();

$pdf->setPrintHeader(true);

$pdf->setPrintFooter(true);



//lecturas recomendadas del paso

$html="<style>
    h1 { color: #00407B; font-size: 2.15em; text-align:center; }
    h2 {color: #000000; font-size: 38px;}
	p {	text-align:justify;	}
	.categoria{ text-align:justify; color: #990000; font-size:52px;font-weight:bold;text-align:center;}
	.sombraoscura {background-color: #80A0BC; color:black; font-weight:bold;}
	.datos {font-size:36px; color: #111111;}
	table td	{	border: 1px solid #dddddd;	} 
</style>

";



$pdf->SetFont('times', '', 12);   
$html .= "<h1>Lecturas Recomendadas</h1>";
$pdf->SetFont('times', '', 12);

$pdf->Bookmark('Lecturas Recomendadas', 0, 0, '', '', array(128,0,0));







$sql="select b.libro, b.autor, b.descripcion from bibliografiaPasos bp, bibliografias_2 b where bp.idPaso=".$x." and bp.idReporte=".$_GET['idReporte']." and bp.idUsuario=".$_GET['idU']." and bp.idBibliografia=b.id order by autor ASC";

$query=mysql_query($sql) or die(mysql_error());

// Table with rowspans and THEAD

$html.=

'<table border="0" cellpadding="5" cellspacing="1" border: 1px solid white; >

<thead>

<tr>

   <td colspan="3"><p class="categoria">'.$NumeroPaso.'</p></td>

 </tr>

 <tr nobr="true" style="background-color:#404040;color:#ffffff;">

  <td  align="center"><b>T&iacute;tulo</b></td>

  <td  align="center"> <b>Autor</b></td>
  <td  align="center"><b>Descripci&oacute;n</b></td>
 </tr>

</thead>';

while($row=mysql_fetch_array($query)) {

$html .='
 <tr nobr="true" class="datos">

  <td>'.$row['libro'].'</td>

  <td>'.$row['autor'].'</td>

  <td align="left">'.$row['descripcion'].'</td>

 </tr>';
 }
$html.='</table>';

$html2 = <<<EOF

$html

EOF;





// set core font

$pdf->SetFont('times', '', 12);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";

$pdf->AddPage();

$pdf->setPrintHeader(true);

$pdf->setPrintFooter(true);





}





// ---------------------------------------------------------APALANCAMIENTO



$html="<style>

    h1 { color: #00407B; font-size: 2.15em; text-align:center; }    

    h2 {color: #ffffff; font-size: 60px;}

	h3 {color: #000000; font-size: 50px;}

	p  {text-align:justify;	}

	.categoria{ text-align:center; color: #990000; font-size:60px;font-weight:bold;}	

</style>";





$pdf->SetFont('times', '', 12); 
$html .= "<h1>Apalancamiento Personal y Profesional</h1>";
$pdf->Bookmark('Apalancamiento Personal y Profesional', 0, 0, '', 'B', array(0,64,128));
$pdf->SetFont('times', '', 12);





//respuestas pasos

$sql="SELECT a.nombre, a.contenido, ra.respuesta FROM respuestasApalancamientos ra, apalancamientos a WHERE ra.idApalancamiento = a.id AND ra.agregarReporte='si' AND idReporte =".$_GET['idReporte']." AND idUsuario =".$_GET['idU'];

$query=mysql_query($sql) or die(mysql_error());



while($row=mysql_fetch_array($query)) {



		$html .='<p class="categoria">'.$row['nombre'].'</p>';

		$pdf->Bookmark($row['nombre'], 1, 0, '', '', array(128,0,0));

		$muestraCategoria=0;

		 



$html .=$row['contenido'];

$html .=$row['respuesta'];





}





$html2 = <<<EOF

$html

EOF;



// set core font

$pdf->SetFont('times', '', 12);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";

$pdf->AddPage();

$pdf->setPrintHeader(true);

$pdf->setPrintFooter(true);



//lecturas recomendadas del paso

$html="<style>

    h1 { color: #00407B; font-size: 2.15em; text-align:center; }

    

    h2 {color: #000000; font-size: 38px;}

	p {	text-align:justify;	}



	.categoria{ text-align:justify; color: #990000; font-size:52px;font-weight:bold; text-align:center;}

	.sombraoscura {background-color: #80A0BC; color:black; font-weight:bold;}

	.datos {font-size:36px; color:#111111;} 

	table td	{	border: 1px solid #dddddd;	} 

</style>

";



$pdf->SetFont('times', '', 12); 
$html.="<h1>Lecturas Recomendadas</h1>";
$pdf->Bookmark('Lecturas Recomendadas', 0, 0, '', '', array(128,0,0));
$pdf->SetFont('times', '', 12);



$sql="SELECT DISTINCT b.autor, b.libro, b.descripcion FROM bibliografiaApalancamiento ba, bibliografias_2 b, respuestasApalancamientos ra WHERE ra.idReporte = ba.idReporte AND ra.agregarReporte = 'si' AND ba.idReporte =".$_GET['idReporte']." AND ra.idUsuario =".$_GET['idU']." AND ba.idBibliografia = b.id ORDER BY b.autor ASC";



$query=mysql_query($sql) or die(mysql_error());



// Table with rowspans and THEAD

$html.=

'<table border="0" cellpadding="5" cellspacing="1" border: 1px solid white; >

<thead>

 <tr>
 <td colspan="3"><p class="categoria">Apalancamiento Personal y Profesional</p></td>
 </tr>

 <tr nobr="true" style="background-color:#404040;color:#ffffff;">

  <td  align="center"><b>T&iacute;tulo</b></td>

  <td  align="center"> <b>Autor</b></td>
  <td  align="center"><b>Descripci&oacute;n</b></td>
 </tr>

</thead>';

while($row=mysql_fetch_array($query)) {



$html .='

<tr nobr="true" class="datos">

  <td>'.$row['libro'].'</td>

  <td>'.$row['autor'].'</td>

  <td align="center">'.$row['descripcion'].'</td>

</tr>';

 }

$html.='</table>';



$html2 = <<<EOF

$html

EOF;





// set core font

$pdf->SetFont('times', '', 12);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";

$pdf->AddPage();

$pdf->setPrintHeader(true);

$pdf->setPrintFooter(false);

// ---------------------------------------------------------CONCLUSIONES



$html="<style>

    h1 { color: #00407B; font-size: 2.15em; text-align:center; }

    

    h2 {color: #000000; font-size: 38px;}

	p {	text-align:justify;	}



	.categoria{ text-align:justify; color: #990000; font-size:52px;font-weight:bold;}

 

</style>

";











$pdf->SetFont('times', '', 12); 
$html .= "<h1>Conclusiones</h1>";
$pdf->Bookmark('Conclusiones', 0, 0, '', 'B', array(0,64,128));
$pdf->SetFont('times', '', 12);





//respuestas pasos

$sql="SELECT respuesta FROM respuestasConclusiones WHERE idConclusion = 1 AND idReporte =".$_GET['idReporte']." AND idUsuario =".$_GET['idU'];

$query=mysql_query($sql) or die(mysql_error());

$row=mysql_fetch_array($query);







	 

		//$html .="<p><b>Antes de que terminemos, me gustarÃƒÆ’Ã‚Â­a hacerte dos ÃƒÆ’Ã‚Âºltimas preguntas:</b></p><p><b>Primero, por favor enumera las 10 cosas , que si se implementan o se mejoran, justificarÃƒÆ’Ã‚Â­an por mucho tu inversiÃƒÆ’Ã‚Â³n mensual en el programa de Coaching de Negocios:</b></p>";

$html .="<p>Antes de que terminemos, me gustar&iacute;a hacerte dos &uacute;ltimas preguntas:</p><p><b>Primero, por favor enumera las 10 cosas , que si se implementan o se mejoran, justificar&iacute;­an por mucho tu inversi&oacute;n mensual en el programa de Coaching de Negocios:</b></p>";



$html .='<p style="padding-left:15px;"><span style="color:#000000;">'.$row['respuesta'].'</span></p>';





$sql="SELECT respuesta FROM respuestasConclusiones WHERE idConclusion = 2 AND idReporte =".$_GET['idReporte']." AND idUsuario =".$_GET['idU'];

$query=mysql_query($sql) or die(mysql_error());

$row=mysql_fetch_array($query);

	
		$html .="<p><b>Finalmente, la &uacute;ltima pregunta. Si hubiera una sola cosa que yo pudiera hacer por ti ahora mismo, ¿cu&aacute;l ser&iacute;­a?</b></p>";



		$html .='<p style="padding-left:15px;"><span style="color:#000000">'.$row['respuesta'].'</span></p>';



$html2 = <<<EOF

$html

EOF;



// set core font

$pdf->SetFont('times', '', 12);

$pdf->writeHTML($html2, true, 0, true, true);

$html = "";







// ---------------------------------------------------------TERMINA CODIGO



$pdf->setPrintHeader(true);

$pdf->setPrintFooter(true);

// ---------------------------------------------------------INDICE

// add a new page for TOC

$pdf->addTOCPage();



$html="<style>

    h1 { color: #00407B; font-size: 2.15em; text-align:center; }

    

    h2 {color: #000000; font-size: 38px;}

	p {	text-align:justify;	}



	.categoria{ text-align:justify; color: #990000; font-size:52px;font-weight:bold;}

 

</style>

";



// write the TOC title

$pdf->SetFont('times', 'B', 30);
$pdf->MultiCell(0, 0, 'Contenido', 0, 'C', 0, 1, '', '', false, 0);
//$pdf->Ln();



$pdf->SetFont('times', '', 12);

$bookmark_templates[0] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td colspan="2"></td></tr><tr><td width="155mm"><span style="font-family:times;font-weight:bold;font-size:11pt;color:black;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-family:courier;font-size:12pt;color:black;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';

;

$bookmark_templates[1] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="5mm"></td><td width="150mm"><span style="font-family:times;font-size:10pt;color:black;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-family:courier;font-size:12pt;color:black;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';

;

$pdf->addHTMLTOC(2, 'INDICE', $bookmark_templates, true, 'B', array(128,0,0));



$pdf->endTOCPage();

// ---------------------------------------------------------TERMINA INDICE



// set core font

$pdf->SetFont('times', '', 10);



// output the HTML content

//$pdf->writeHTML($html, true, 0, true, true);



$pdf->Ln();



// set UTF-8 Unicode font

$pdf->SetFont('times', '', 10);



// output the HTML content

//$pdf->writeHTML($html, true, 0, true, true);



// reset pointer to the last page

$pdf->lastPage();



// ---------------------------------------------------------



//Close and output PDF document

$pdf->Output($rowInfoReporte['cliente'].'.pdf', 'I');



//============================================================+

// END OF FILE                                                

//============================================================+

