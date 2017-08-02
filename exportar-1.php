<?php
session_start();

include("include/conn.php");

if($_SESSION['logged']!=2) {

	header("Location:index.php");
	
	}

?>
<?
	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=estrategias.xls");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	body { font-family:Arial, Helvetica, sans-serif; }
	h1{ font-size:14px; font-weight:normal; margin:0; padding:0;}
	h2{font-size:11px; text-align:center; margin:0; padding:0;}
	h3{font-size:12px; font-weight:normal; text-align:center; margin:0; padding:0;}

	table.tableizer-table p.estrategias {		
		font-size:12px;
		margin:0;
	} 
	.tableizer-table td {
		/*padding: 4px;
		margin: 3px;*/
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
<table border="0" cellpadding="0" cellspacing="0" class="tableizer-table" width="100%">
	<tr><td>&nbsp;</td><td colspan="52"><h1>PLAN DE ACCIÓN PARA LOS PRÓXIMOS 12 MESES PARA: <?php echo $rowCoach['cliente']; ?></h1></td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td colspan="52">&nbsp;</td><td>&nbsp;</td></tr>
	<tr align="center" valign="middle"><td></td><td colspan="13" style="border:solid 1px #000000;"><h1>PRIMER TRIMESTRE</h1></td><td colspan="13" style="border-top:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><h1>SEGUNDO TRIMESTRE</h1></td><td colspan="13" style="border-top:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><h1>TERCER TRIMESTRE</h1></td><td colspan="13" style="border-top:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><h1>CUARTO TRIMESTRE</h1></td><td>&nbsp;</td></tr>
	<tr><td style="font-size:12px;"><b>Sem</b></td><td >1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td><td>39</td><td>40</td><td>41</td><td>42</td><td>43</td><td>44</td><td>45</td><td>46</td><td>47</td><td>48</td><td>49</td><td>50</td><td>51</td><td>52</td><td>&nbsp;</td></tr>
	<tr><td style="font-size:12px;">Fecha</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td style="font-size:12px;"><b>E</b></td>
	<td colspan="13" style="background-color:#00CCFF;border:solid 1px #000000;"><h2>DOMINIO</h2></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td style="font-size:12px;"><b>T</b></td>
	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="16" style="background-color:#1FB714;border:solid 1px #000000;"><h2>NICHO</h2></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td style="font-size:12px;"><b>A</b></td>
	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="26" style="background-color:#CC99FF; border:solid 1px #000000;"><h2>APALANCAMIENTO</h2></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td style="font-size:12px;"><b>P</b></td>
	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="18" style="background-color:#FCF305; border:solid 1px #000000;"><h2>EQUIPO</h2></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td style="font-size:12px;"><b>A</b></td>
	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="14"  style="background-color:#FF9900; border:solid 1px #000000;"><h2>SINERGIA</h2></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td style="font-size:12px;"><b>S</b></td>
	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="13" style="background-color:#C0C0C0; border:solid 1px #000000;"><h2>RESULTADOS</h2></td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr height="5px"><td>&nbsp;</td><td colspan="10" style="background-color:#99CCFF; border:solid 1px #000000;"><h3>1. Primero hay que tener un <b>DOMINIO</b> del negocio</h3></td><td colspan="10"  style="background-color:#1FB714; background-color:#1FB714; border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>2. Después vamos a crecer en un <b>NICHO</b> de mercado</h3></td><td colspan="10" style="background-color:#CC99FF;  border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>3. En seguida aseguraremos el correcto <b>APALANCAMIENTO</b> del negocio</h3></td><td colspan="10" style="background-color:#FCF305; border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>4. Entonces trabajaremos en potenciar a tu <b>EQUIPO</b> de Trabajo</h3></td><td colspan="12" style="background-color:#FF9900; border-top:solid 1px #000000; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>5.  Y por último lograremos tener una <b>SINERGIA</b> en todo tu negocio y con ello lograr los <b>RESULTADOS MASIVOS</b> (paso 6)</h3></td><td>&nbsp;</td></tr>
    <tr height="5px"><td>&nbsp;</td><td colspan="10" style="background-color:#99CCFF; border-left:solid 1px #000000;border-right:solid 1px #000000;"><h3>Duración: 3 meses - del mes 1 al 3</h3></td><td colspan="10"  style="background-color:#1FB714; border-right:solid 1px #000000;"><h3>Duración: 4 meses - del mes 2 al 5</h3></td><td colspan="10" style="background-color:#CC99FF;  border-right:solid 1px #000000;"><h3>Duración: 6 meses - del mes 3 al 8</h3></td><td colspan="10" style="background-color:#FCF305;  border-right:solid 1px #000000;"><h3>Duración: 4 meses - del mes 6 al 9</h3></td><td colspan="12" style="background-color:#FF9900; border-right:solid 1px #000000;"><h3>Duración: 5 meses - del mes 8 al 12</h3></td><td>&nbsp;</td></tr>
    <tr height="5px"><td>&nbsp;</td><td colspan="10" style="background-color:#99CCFF; border-left:solid 1px #000000;border-right:solid 1px #000000;"><h3>Objetivo: Tener un Control del Tiempo, el Dinero y la Entrega del Producto o Servicio</h3></td><td colspan="10" style="background-color:#1FB714; border-right:solid 1px #000000;"><h3>Objetivo: Generar Utilidades de una manera creciente y consistente</h3></td><td colspan="10" style="background-color:#CC99FF; border-right:solid 1px #000000;"><h3>Objetivo: Sistematizar todos los aspectos del negocio y generar más tiempo en la gente</h3></td><td colspan="10" style="background-color:#FCF305; border-right:solid 1px #000000;"><h3>Objetivo: Desarrollar Equipos de Alto Desempeño en el negocio</h3></td><td colspan="12" style="background-color:#FF9900; border-right:solid 1px #000000;"><h3>Objetivo: Que el personal maneje los sistemas y saque el mayor potencial de los diferentes nichos que se puedan generar</h3></td><td>&nbsp;</td></tr>
    <tr height="5px"><td>&nbsp;</td><td colspan="10" style="background-color:#99CCFF; border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><h3>Conceptos Clave: SOBREVIVENCIA Y CONTROL</h3></td><td colspan="10" style="background-color:#1FB714; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>Conceptos Clave: FLUJO Y UTILIDADES</h3></td><td colspan="10" style="background-color:#CC99FF; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>Conceptos Clave: TIEMPO Y CRECIMIENTO</h3></td><td colspan="10" style="background-color:#FCF305; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>Conceptos Clave: ARMONIA Y FELICIDAD</h3></td><td colspan="12" style="background-color:#FF9900; border-right:solid 1px #000000; border-bottom:solid 1px #000000;"><h3>Conceptos Clave: TRANQUILIDAD Y DIVERSIFICACIÓN</h3></td><td>&nbsp;</td></tr>
    <tr>
    	<td valign="top">&nbsp;</td>
        <?php
			$colspan = 10;
						
			for($x=1;$x<=5;$x++) { 		
					
			switch ($x) {
			case 1:
				 $color = "#CCE6FF";
				 break;
			case 2:
				 $color = "#8FDB8A";
				 break;
			case 3:
				 $color = "#E6CCFF";
				 break;
			case 4:
				 $color = "#FEF982";
				 break;
			case 5:
				 $colspan = 12;
				 $color = "#FFCC80";
				 break;
			}		

			$sql="select c.id AS idCategoria, c.nombre AS categoria, e.id, e.nombre AS estrategia, rpe.prioridad FROM respuestasPasosEstrategias rpe, estrategias e, categorias c WHERE rpe.idPaso =".$x." AND idReporte =".$_GET['idReporte']." AND idUsuario =".$_GET['idU']." AND rpe.idEstrategia = e.id AND e.idCategoria = c.id ORDER BY c.prioridad ASC , e.id ASC";
			$query=mysql_query($sql) or die(mysql_error());
		?>
        <td colspan="<?php echo $colspan;?>" valign="top">
        	<table width="100%" style="border:1px solid #000000;">
                <?php 
                	$muestraCategoria="";
                    while($row=mysql_fetch_array($query)) {
                    
                        if($row['categoria']!=$muestraCategoria) { 
							echo  '<tr><td colspan='.$colspan.' style="font-weight:bold; font-size:14px !important; background-color:'.$color.';"><p>'.$row['categoria'].'</p></td></tr>';
							$muestraCategoria=$row['categoria'];
                        }
					echo  '<tr><td colspan='.$colspan.'><blockquote><p class="estrategias">'.$row['estrategia'].'</blockquote></p></td></tr>';
					}
				?>
            </table>		</td>
        <?php } ?>
    </tr>      
    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td><td colspan="52">Tu Coach: <?php echo  $rowCoach['coach'];?></td><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td></td></tr>
</table>
</body>
</html>
