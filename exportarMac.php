<?php
session_start();
include("include/conn.php");
if($_SESSION['logged']!=2) {
	header("Location:index.php");
}
?>
<?php
	header("Content-type: application/vnd.ms-excel; name='excel'");
	header("Content-Disposition: filename=estrategiasMac.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	body { font-family:Arial, Helvetica, sans-serif; }
	h1{ font-size:12px; font-weight:normal; margin:0; padding:0;}
	h2{font-size:11px; text-align:center; margin:0; padding:0;}
	h3{font-size:12px; font-weight:normal; text-align:center; margin:0; padding:0;}
	h4{ margin:0; padding:0;}
	h5{font-size:12px; font-weight:normal; margin:0; padding:0;}

	table.tableizer-table h5.estrategias {		
		font-size:12px;
		margin:0;
	} 
	.tableizer-table td {
	
	}
	.tableizer-table td.ancho {
		width:100px;
	}
	
	blockquote {
		display: block;
		margin: 0 0 0 55px;
	}
	
</style>
</head>
<body>
<?php
    $sqlCoach="SELECT cliente,coach FROM reportes WHERE id =".$_GET['idReporte'];
    $queryCoach=mysql_query($sqlCoach) or die(mysql_error());
    $rowCoach=mysql_fetch_array($queryCoach);
?> 
    <table border="0" cellpadding="0" cellspacing="0" class="tableizer-table" width="2393">
    	<tr>
        	<td style="width:58px;"></td>
            <td style="width:2340;" colspan="60"><h1>PLAN DE ACCIÓN PARA LOS PRÓXIMOS 12 MESES PARA: <?php echo $rowCoach['cliente']; ?></h1></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="60"></td>
        </tr>
		<tr>
            <td style="width:58px;"></td>
            <td colspan="13" style="width:11.04cm; border:solid 1px #000000; text-align:center;"><h1>PRIMER TRIMESTRE</h1></td>
            <td colspan="13" style="width:11.04cm; border-top:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000; text-align:center;"><h1>SEGUNDO TRIMESTRE</h1></td>
            <td colspan="13" style="width:11.04cm; border-top:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000; text-align:center;"><h1>TERCER TRIMESTRE</h1></td>
            <td colspan="21" style="width:22.8cm; border-top:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000; text-align:center;"><h1>CUARTO TRIMESTRE</h1></td>
            
        </tr>
        <tr align="center">
            <td style="width:2.05cm; font-size:12px; text-align:left;"><b>Sem</b></td>
            <td width="39" style="width:1.1cm" >1</td>
            <td width="39" style="width:1.1cm" >2</td>
            <td width="39" style="width:1.1cm" >3</td>
            <td width="39" style="width:1.1cm" >4</td>
            <td width="39" style="width:1.1cm" >5</td>
            <td width="39" style="width:1.1cm" >6</td>
            <td width="39" style="width:1.1cm" >7</td>
            <td width="39" style="width:1.1cm" >8</td>
            <td width="39" style="width:1.1cm" >9</td>
            <td width="39" style="width:1.1cm" >10</td>
            <td width="39" style="width:1.1cm" >11</td>
            <td width="39" style="width:1.1cm" >12</td>
            <td width="39" style="width:1.1cm" >13</td>
            <td width="39" style="width:1.1cm" >14</td>
            <td width="39" style="width:1.1cm" >15</td>
            <td width="39" style="width:1.1cm" >16</td>
            <td width="39" style="width:1.1cm" >17</td>
            <td width="39" style="width:1.1cm" >18</td>
            <td width="39" style="width:1.1cm" >19</td>
            <td width="39" style="width:1.1cm" >20</td>            
            <td width="39" style="width:1.1cm" >21</td>
            <td width="42" style="width:1.1825cm" >22</td>
            <td width="42" style="width:1.1825cm" >23</td>
            <td width="42" style="width:1.1825cm" >24</td>
            <td width="42" style="width:1.1825cm" >25</td>
            <td width="42" style="width:1.1825cm" >26</td>
            <td width="42" style="width:1.1825cm" >27</td>
            <td width="42" style="width:1.1825cm" >28</td>
            <td width="42" style="width:1.1825cm" >29</td>
            <td width="42" style="width:1.1825cm" >30</td>
            <td width="42" style="width:1.1825cm" >31</td>
            <td width="42" style="width:1.1825cm" >32</td>
            <td width="42" style="width:1.1825cm" >33</td>
            <td width="42" style="width:1.1825cm" >34</td>
            <td width="42" style="width:1.1825cm" >35</td>
            <td width="42" style="width:1.1825cm" >36</td>
            <td width="42" style="width:1.1825cm" >37</td>
            <td width="42" style="width:1.1825cm" >38</td>
            <td width="42" style="width:1.1825cm" >39</td>
            <td width="42" style="width:1.1825cm" >40</td>
            
            <td colspan="2" style="width:1.6cm" >41</td>            
            <td colspan="2" style="width:1.6cm" >42</td>
            <td colspan="2" style="width:1.6cm" >43</td>
            <td colspan="2" style="width:1.6cm" >44</td>
            <td colspan="2" style="width:1.6cm" >45 &nbsp; 46</td>
            <td colspan="2" style="width:1.6cm" >47</td>
            <td colspan="2" style="width:1.6cm" >48</td>
            <td colspan="2" style="width:1.6cm" >49</td>
            <td colspan="2" style="width:1.6cm" >50</td>
            <td colspan="2" style="width:1.6cm" >51 &nbsp; 52 </td>
        </tr>
        <tr>
            <td style="font-size:12px;">Fecha</td>
            <td colspan="60" ></td>
          </tr>
        <tr>
            <td style="font-size:12px;"><b>E</b></td>
            <td colspan="13" style="background-color:#00CCFF;border:solid 1px #000000;"><h2>DOMINIO</h2></td>
            <td colspan="47"></td>
        </tr>
        <tr>
            <td style="font-size:12px;"><b>T</b></td>
            <td colspan="5"></td>
            <td colspan="16" style="background-color:#1FB714;border:solid 1px #000000;"><h2>NICHO</h2></td>
            <td colspan="39"></td>
        </tr>
        <tr>
            <td style="font-size:12px;"><b>A</b></td>
            <td colspan="8"></td>
            <td colspan="26" style="background-color:#CC99FF; border:solid 1px #000000;"><h2>APALANCAMIENTO</h2></td>
            <td colspan="26"></td>
        </tr>
        <tr>
            <td style="font-size:12px;"><b>P</b></td>
            <td colspan="21"></td>
            <td colspan="17" style="background-color:#FCF305; border:solid 1px #000000;"><h2>EQUIPO</h2></td>
            <td colspan="22"></td>
        </tr>
        <tr>
            <td style="font-size:12px;"><b>A</b></td>
            <td colspan="34"></td>
            <td colspan="14"  style="background-color:#FF9900; border:solid 1px #000000;"><h2>SINERGIA</h2></td>
            <td colspan="12"></td>
        </tr>
        <tr>
            <td style="font-size:12px;"><b>S</b></td>
            <td colspan="39"></td>
            <td colspan="21" style="background-color:#C0C0C0; border:solid 1px #000000;"><h2>RESULTADOS</h2></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="60"></td>
        </tr>
        
        
        
		<tr valign="top">
        	<td style="width:58px;"></td>
            <td colspan="10" style="width:11.04cm; background-color:#99CCFF; border:solid 1px #000000;"><h3>1. Primero hay que tener un <b>DOMINIO</b> del negocio</h3></td>
            <td colspan="10" style="width:11.04cm; background-color:#1FB714; background-color:#1FB714; border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>2. Después vamos a crecer en un <b>NICHO</b> de mercado</h3></td>
            <td colspan="10" style="width:11.04cm; background-color:#CC99FF; border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>3. En seguida aseguraremos el correcto <b>APALANCAMIENTO</b> del negocio</h3></td>
            <td colspan="10" style="width:11.04cm; background-color:#FCF305; border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>4. Entonces trabajaremos en potenciar a tu <b>EQUIPO</b> de Trabajo</h3></td>
            <td colspan="10" style="width:11.04cm; background-color:#FF9900; border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>5.  Y por último lograremos tener una <b>SINERGIA</b> en todo tu negocio y con ello lograr los <b>RESULTADOS MASIVOS</b> (paso 6)</h3></td>
            <td colspan="10" style="width:11.04cm; background-color:#C0C0C0; border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>6.  En esta etapa revisaremos los <b>RESULTADOS</b> que llevas a lo largo de año, los que te faltan y hay qu trabajar más y ya estarás listo para crear nuevas empresas y convertirte en un verdadero empresario</h3></td>
        </tr>
	    <tr height="5px">
        	<td></td>
            <td colspan="10" style="background-color:#99CCFF; border-left:solid 1px #000000;border-right:solid 1px #000000;"><h3>Duración: 3 meses - del mes 1 al 3</h3></td>
    		<td colspan="10" style="background-color:#1FB714; border-right:solid 1px #000000;"><h3>Duración: 4 meses - del mes 2 al 5</h3></td>
            <td colspan="10" style="background-color:#CC99FF;  border-right:solid 1px #000000;"><h3>Duración: 6 meses - del mes 3 al 8</h3></td>
            <td colspan="10" style="background-color:#FCF305;  border-right:solid 1px #000000;"><h3>Duración: 4 meses - del mes 6 al 9</h3></td>
            <td colspan="10" style="background-color:#FF9900; border-right:solid 1px #000000;"><h3>Duración: 5 meses - del mes 8 al 12</h3></td>
            <td colspan="10" style="background-color:#C0C0C0; border-right:solid 1px #000000;"><h3>Duración: 3 meses</h3></td>
        </tr>
    	<tr height="5px">
        	<td></td>
            <td colspan="10" style="background-color:#99CCFF; border-left:solid 1px #000000;border-right:solid 1px #000000;"><h3>Objetivo: Tener un Ctrl. del Tiempo, el Dinero y la Entrega del Producto o Servicio</h3></td>
            <td colspan="10" style="background-color:#1FB714; border-right:solid 1px #000000;"><h3>Objetivo: Generar Utilidades de una manera creciente y consistente</h3></td>
            <td colspan="10" style="background-color:#CC99FF; border-right:solid 1px #000000;"><h3>Objetivo: Sistematizar todos los aspectos del negocio y generar más tiempo en la gente</h3></td>
            <td colspan="10" style="background-color:#FCF305; border-right:solid 1px #000000;"><h3>Objetivo: Desarrollar Equipos de Alto Desempeño en el negocio</h3></td>
            <td colspan="10" style="background-color:#FF9900; border-right:solid 1px #000000;"><h3>Objetivo: Que el personal maneje los sistemas y saque el mayor potencial de los diferentes nichos que se puedan generar</h3></td>
            <td colspan="10" style="background-color:#C0C0C0; border-right:solid 1px #000000;"><h3></h3></td>
        </tr>
    	<tr height="5px">
        	<td></td>
        	<td colspan="10" style="background-color:#99CCFF; border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><h3>Conceptos Clave: SOBREVIVENCIA Y CONTROL</h3></td>
            <td colspan="10" style="background-color:#1FB714; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>Conceptos Clave: FLUJO Y UTILIDADES</h3></td>
            <td colspan="10" style="background-color:#CC99FF; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>Conceptos Clave: TIEMPO Y CRECIMIENTO</h3></td>
            <td colspan="10" style="background-color:#FCF305; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>Conceptos Clave: ARMONIA Y FELICIDAD</h3></td>
            <td colspan="10" style="background-color:#FF9900; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>Conceptos Clave: TRANQUILIDAD Y DIVERSIFICACIÓN</h3></td>
            <td colspan="10" style="background-color:#C0C0C0; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3></h3></td>
        </tr>
        <tr>
            <td valign="top"></td>
            <?php
                $colspan = 10;						
                
				for($x=1;$x<=6;$x++) {
				
				switch ($x) {
				case 1:
					 $color = "#B2D9FF";
					 break;
				case 2:
					 $color = "#1FB714";
					 break;
				case 3:
					 $color = "#CC99FF";
					 break;
				case 4:
					 $color = "#FDF644";
					 break;
				case 5:
 					 $colspan = 12;
					 $color = "#FFB239";
					 break;
				case 6:
					 $colspan = 12;
					 $color = "#C0C0C0";
					 break;
				}
				
                $sql="select c.id AS idCategoria, c.nombre AS categoria, e.id, e.nombre AS estrategia, rpe.prioridad FROM respuestasPasosEstrategias rpe, estrategias e, categorias c WHERE rpe.idPaso =".$x." AND idReporte =".$_GET['idReporte']." AND idUsuario =".$_GET['idU']." AND rpe.idEstrategia = e.id AND e.idCategoria = c.id ORDER BY c.prioridad ASC , uai(e.nombre) ASC ";
                $query=mysql_query($sql) or die(mysql_error());
            ?>
            <td colspan="10" valign="top">                
				<?php 
                    $muestraCategoria="";
                    while($row=mysql_fetch_array($query)) {                    
                        if($row['categoria']!=$muestraCategoria) { 
                            echo  '<h4 style="font-weight:bold; font-size:14px !important; color:'.$color.';">'.$row['categoria'].'</h4>';
                            $muestraCategoria=$row['categoria'];
                        }
                    echo  '<blockquote><h5 class="estrategias">'.$row['estrategia'].'</blockquote></h2>';
                    }
                ?>
            </td>
        	<?php } ?>
        </tr>    	      
        <tr>
        	<td>&nbsp;</td>
            <td colspan="60"></td>
        </tr>            
        <tr>
        	<td></td>
            <td colspan="60">Tu Coach: <?php echo  $rowCoach['coach'];?></td>
        </tr>
        <tr>
        	<td></td>
            <td colspan="60"></td>
        </tr>
    </table>
</body>
</html>
