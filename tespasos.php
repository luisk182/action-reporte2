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


set_time_limit(300);

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
						<th align="left"><p style="color:#336699;font-size:32px;">Empresa: <span style="color:#990000;">'.$rowInfoReporte['empresa'].'</span><br />Cliente: <span style="color:#990000;">'.$rowInfoReporte['cliente'].'</span></p></th>
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
        $this->SetFont('times', 'I', 10);        
        
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
  $html = '<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th align="left"><span>Tu Coach: '.$rowInfoReporte['coach'].'</span></th>
					<th align="center">Fecha impresión '.date('d').' de '.$mes.' del '.date('Y').'</th>
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

$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);


//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(TRUE, 38);
//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);
// ---------------------------------------------------------PORTADA

// add a page
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

//marco rectangular
$border_style = array('all' => array('width' => 0.5, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));
$pdf->SetDrawColor(255, 255, 255, 0);
$pdf->SetFillColor(0, 0, 0, 0);
$pdf->Rect(8, 10, 194, 263, 'DF', $border_style);


//Portada


$sqlInfoReporte="select * from reportes where id=".$_GET['idReporte'];
$queryInfoReporte=mysql_query($sqlInfoReporte) or die(mysql_error());
$rowInfoReporte=mysql_fetch_array($queryInfoReporte);

$html='<table align="center"><tr><td><br/></td></tr><tr><td>
<img src="img/logoac.jpg" width="350px" height="77px" /></td></tr><tr><td><br/></td></tr><tr><td><br/></td></tr><tr><td>
	<img src="img/logoreporte.jpg" width="500px" height="79px" style="border:none;" /></td></tr><tr><td><br/></td></tr><tr><td><br/></td></tr><tr><td><br/></td></tr><tr><td>';
	
	if($rowInfoReporte['logo']!="logos/") {
	$html.='<img height="150px" src="'.$rowInfoReporte['logo'].'" />';
	}
	
	$html.='</td></tr><tr><td><br/></td></tr><tr><td><br/></td></tr><tr><td>&nbsp;</td></tr></table>';

$html2 = <<<EOF
$html
EOF;

// set core font
$pdf->writeHTML($html2, true, 0, true, true);
$html = "";

$html='<p style="text-align:center;color:#336699;">Para:<br /></p>';

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



$html='<p style="text-align:center;color:#336699;">Preparado por:<br /></p>';

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


$html='<p style="text-align:center;color:#336699;">Coach de Negocios de ActionCOACH</p>';

$html2 = <<<EOF
$html
EOF;

// set core font
$pdf->SetFont('times', '', 12);
$pdf->writeHTML($html2, true, 0, true, true);
$html = "";

$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->AddPage();


// ---------------------------------------------------------METAS

for($x=1;$x<=5;$x++) {

$html="<style>
    h1 { color: #00407B; font-size: 2.15em; text-align:center; }
    
    h2 {color: #000000; font-size: 38px;}
	p{	text-align:justify; }

	.categoria{ text-align:justify; color: #990000; font-size:52px;font-weight:bold;}
 
</style>
";

//titulo metas
$sql="select nombre, vision from metas where id=".$x;
$query=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_array($query);

$pdf->SetFont('arial', '', 12);   
$html .= "<h1>".$row['nombre']."</h1>";
$pdf->SetFont('times', '', 12);

$textoI=$row['nombre'];
$textoI=strip_tags($textoI);
$textoI=html_entity_decode($textoI);
$textoI=utf8_encode($textoI);

$pdf->Bookmark($textoI, 0, 0, '', 'B', array(0,64,128));


$html .= $row['vision'];

//respuestas metas
$sql="select p.vision, rm.respuesta from preguntas p, respuestasMetas rm where rm.idMeta=".$x." AND idReporte=".$_GET['idReporte']." AND idUsuario=".$_GET['idU']." AND p.id = rm.idPregunta AND rm.respuesta<>'' order by p.id ASC";
$query=mysql_query($sql) or die(mysql_error());



while($row=mysql_fetch_array($query)) {

$vision = $row['vision'];

$finalvision = substr($vision, 3, -4);
$html .= '<p>'.$vision."<br />".$row['respuesta']."<br /></p>";

$textoI=$row['vision'];
$textoI=strip_tags($textoI);
$textoI=html_entity_decode($textoI);
$textoI=utf8_encode($textoI);
$pdf->Bookmark($textoI, 1, 0, '', '', array(128,0,0));

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


// set core font
$pdf->SetFont('times', '', 12);
$pdf->writeHTML($html2, true, 0, true, true);
$html = "";
$pdf->AddPage();
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);


// ---------------------------------------------------------TERMINA CODIGO


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


$pdf->Ln();

// set UTF-8 Unicode font
$pdf->SetFont('times', '', 10);
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($rowInfoReporte['cliente'].'.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
