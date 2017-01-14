<?php
$pdf = Yii::createComponent('application.extensions.MPDF56.mpdf');

$html='
<!doctype html>
	<html>
		<head>
<style>
body {font-family: sans-serif;
    font-size: 10pt;
}
p {    margin: 0pt;
}
td { vertical-align: top; }
.items td {
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
    text-align: center;
    border: 0.1mm solid #000000;
}
.items td.blanktotal {
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-top: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
.items td.totals {
    text-align: right;
    border: 0.1mm solid #000000;
}

tr.top td { border-top: thin solid black; }
tr.bottom td { border-bottom: thin solid black; }
tr.row td:first-child { border-left: thin solid black; }
tr.row td:last-child { border-right: thin solid black; }

li{
	list-style:square;
	margin-left:0;
	padding-left:1em;
	text-indent:-1em;
}
.top{border: solid 0 black; border-top-width:1px; height:5px}
.bottom{border: solid 0 black; border-bottom-width:1px; height:9px}
.thin{border: solid 0 black; border-bottom-width:1px; border-top-width:1px; height:9px}

table{
	page-break-inside: avoid;
}

div{
	page-break-inside: avoid;
}
.smallfont{font-size:0.6em;font-weight:bold;}
.bigfont{font-size:1em}
.left{text-align: left;}

.well {
  min-height: 15px;
  padding: 10px;
  margin-bottom: 0px;
  background-color: #f5f5f5;
  border: 1px solid #e3e3e3;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
}
</style>
		</head>
	<body>
			<div style="font-size: 1.2em; text-align: center; font-weight: bold;">Certificado de Análisis de Lote de Semillas</div><div>
			 <p><strong>Información Declarada por el Solicitante</strong></p></div>
			<div class="span9 well">
				<table width="100%" cellpadding="2" cellspacing="5">
					<tr>
            <td class="top smallfont" width="20%" >RUC</td>
            <td class="top smallfont" colspan="4" ><div>Nombre</div></td>
	        </tr>
  	      <tr>
            <td class="bottom bigfont" width="20%"><div>'.$model->usera->legal_name.'</div></td>
            <td class="bottom bigfont" colspan="4"><div>'.$model->usera->legal_name.'</div></td>    
        	</tr>
					<tr>
            <td class="top smallfont" colspan="2" ><div >Dirección</div></td>                                    
	        </tr>
  	      <tr>
            <td class="bottom bigfont" colspan="2"><div></div></td>                                              
       	 </tr>
          <tr>
            <td class="smallfont" colspan="2"><div>Información del Lote</div></td>                                              
        	</tr>
					<tr>  
            <td class="top smallfont" width="20%"><div>Especie</div></td>
            <td class="top smallfont" width="20%"><div>Cultivar</div></td>
            <td class="top smallfont" width="20%"><div>Clase / Categoría</div></td>           
        </tr>
        <tr>
            <td class="bottom bigfont" width="20%"><div>.</div></td>
            <td class="bottom bigfont" width="20%"><div>.</div></td>
            <td class="bottom bigfont" width="20%"><div>.</div></td>                    
        </tr>  
        <tr>  
            <td class="top smallfont" width="20%"><div>Nro de Envases</div></td>
            <td class="top smallfont" width="20%"><div>Peso del Lote (kg)</div></td>
            <td class="top smallfont" width="20%"><div>Codigo del Lote</div></td>           
        </tr>
        <tr>
            <td class="bottom bigfont" width="20%"><div>.</div></td>
            <td class="bottom bigfont" width="20%"><div>.</div></td>
            <td class="bottom bigfont" width="20%"><div>.</div></td>                    
        </tr>           
       </table>
			</div>
			<div><br>
	<p><strong>Datos del Muestreo</strong></p></div>
			<div class="span9 well">
        <table width="100%" cellpadding="2">
        <tr>
            <td class="top smallfont" colspan="3"><div>Muestreador</div></td>    
            <td class="top smallfont" width="20%"><div>Fecha de muesteo</div></td>
            <td width="20%"><div></div></td>
        </tr>
        <tr>
            <td class="bottom bigfont" colspan="3"><div>.</div></td>        
            <td class="bottom bigfont" width="20%"><div>.</div></td>
            <td width="20%"><div></div></td>
        </tr>                      
       </table>
			</div>
      
  <div><br>
   <p><strong>Resultados del análisis</strong>			</p></div>
      <div class="span9 well">
      
        <table width="100%" class="thin" cellspacing="0" cellpadding="0">
         <tr>
          <td class="smallfont thin" align="center" colspan="3" rowspan="2">Análisis de Pureza (% en Peso)</td>
          <td class="smallfont thin" align="center" colspan="6">Prueba de Germinación</td>
          <td class="smallfont thin" align="center" rowspan="3">Contenido de Humedad (%)</td>
         </tr>
         <tr>
          <td class="smallfont thin" align="center" rowspan="2">Número de Días</td>
          <td class="smallfont thin" align="center" colspan="5">% en numero</td>
         </tr>
         <tr>
          <td class="smallfont thin" align="center" width="10%">Semilla Pura</td>
          <td class="smallfont thin" align="center" width="10%">Materia Inerte</td>
          <td class="smallfont thin" align="center" width="10%">Otras Semillas</td>
          <td class="smallfont thin" align="center" width="10%">Plantulas Normales</td>
          <td class="smallfont thin" align="center" width="10%">Semillas Duras</td>
          <td class="smallfont thin" align="center" width="10%">Semillas Frescas</td>
          <td class="smallfont thin" align="center" width="10%">Plantulas anormales</td>
          <td class="smallfont thin" align="center" width="10%">Semillas Muertas</td>
         </tr>
         <tr>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
          <td class="bigfont" align="center">.</td>
         </tr>
        </table>    
          <table width="100%" cellpadding="2">
        <tr>
            <td class=" thin smallfont" width="20%"><div>Clase de Materia Inerte:</div></td>    
            <td class=" thin smallfont" colspan="4"><div></div></td>               
        </tr>
       <tr>
            <td class=" thin smallfont" width="20%"><div>Otras Semillas</div></td>    
            <td class=" thin smallfont" colspan="4"><div></div></td>               
        </tr>
        <tr>
            <td class=" thin smallfont" width="20%"><div>Otras Determinaciones</div></td>    
            <td class=" thin smallfont" colspan="4"><div></div></td>               
        </tr>                   
       </table>
			</div>
      
      
	
		<div><br><p><strong>Observación</strong></p></div>
		<div class="span9 well">APROBADO</div>
            	<div >
  		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="page-break-inside: avoid;">
    		<tr>
 		 			<td><br><br><br><br><br></td>
    		</tr>
   			<tr>
      		<td width="50%" style="text-align: center;"><strong></strong></td>
		      <td width="50%" style="text-align: center;"><strong>Responsable del muestreo</strong></td>
    		</tr> 
		    <tr>
		      <td width="50%" style="text-align: center;"></td>
					<td width="50%" style="text-align: center;">Nombre:__________________</td>      
		    </tr> 
		    <tr>
		      <td width="50%" style="text-align: center;"></td>
		      <td width="50%" style="text-align: center;">DNI:__________________</td>
		    </tr>                          
		  </table>
		</div>
	</body>
</html>

';

$mpdf=new mPDF('UTF-8','A4','','',15,15,25,12,5,7);

$varestacion = 1;
if($varestacion ===1)
{
    $mpdf->SetHTMLHeader('
        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20%"></td> 
                    <td width="60%"><div align="center"><img src="../../../xampp/htdocs/peas/images/form_header.png" width="437" height="40"  alt=""/></div></td>
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: XXXX-XX-XX</td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20%"></td> 
                    <td width="20%"></td> 
                </tr>
            </table>
        </div>
'
,'O');    
}
else
{
    $mpdf->SetHTMLHeader('
        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="40%" style="font-size: 0.8em; text-align: center;"><p><strong>Comité Regional de Semillas de San Martín</strong><br>R.J. Nro 134-2006-AG-SENASA</p></td>
                    <td colspan="2"></td> 
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: XXXX-XX-XX</td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20%"></td> 
                    <td width="20%"></td> 
                </tr>
            </table>
        </div>'
,'O');
}

$mpdf->SetHTMLFooter('
<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; "><tr>
<td width="33%"><span>{DATE j-m-Y}</span></td>
<td width="33%" align="center">{PAGENO}/{nbpg}</td>
<td width="33%" style="text-align: right; "></td>
</tr></table>
');  // Note that the second parameter is optional : default = 'O' for ODD

$mpdf->WriteHTML($html);
$mpdf->Output('Ficha-Contrato-'.$model->id.'.pdf','D');
exit;
?>