<?php
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$acondicionamiento->district_id));
$categoria=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',array(':codigo'=>'005',':codigo_detalle'=>$model->category));
?>

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
			<div style="font-size: 1.2em; text-align: center; font-weight: bold;">Informe de Inspección de  acondicionamiento de semillas<br></div><div><p><strong>Productor de semillas</strong></p></div>
			<div class="span9 well">
				<table width="100%" cellpadding="2" cellspacing="5">
					<tr>
            <td class="top smallfont" width="20%" ><div >Nº Registro</div></td>
            <td class="top smallfont" colspan="4" ><div>Razón Social</div></td>
	        </tr>
  	      <tr>
            <td class="bottom bigfont" width="20%"><div>'.$model->usera->registry.'</div></td>
            <td class="bottom bigfont" colspan="4"><div>'.$model->usera->legal_name.'</div></td>    
        	</tr>
        </table>
			</div>
			<div><br><p><strong>Almacenamiento previo al acondicionamiento</strong></p></div>
			<div class="span9 well">
        <table width="100%" cellpadding="2">
        <tr>
            <td class="top smallfont" colspan="2"><div>Dirección</div></td>    
            <td class="top smallfont" width="20%"><div>Departamento</div></td>
            <td class="top smallfont" width="20%"><div>Provincia</div></td>
            <td class="top smallfont" width="20%"><div>Distrito</div></td>
        </tr>
        <tr>
            <td class="bottom bigfont" colspan="2"><div>'.$acondicionamiento->address.'</div></td>        
            <td class="bottom bigfont" width="20%"><div>'.$location->department.'</div></td>
            <td class="bottom bigfont" width="20%"><div>'.$location->province.'</div></td>
            <td class="bottom bigfont" width="20%"><div>'.$location->district.'</div></td>
        </tr>
        <tr>
         <td class="top smallfont" width="20%"><div>Nº de Envases</div></td>
         <td class="top smallfont" width="20%"><div>Capacidad de Envases (kg)</div></td>
         <td class="top smallfont" width="20%"><div>Peso estimado (kg)</div></td>
         <td class="top smallfont" width="20%"><div>Fecha de Cosecha</div></td>                        
         <td width="20%"><div></div></td>
        </tr>
        <tr>
         <td class="bottom bigfont" width="20%"><div>'.$acondicionamiento->number_envases.'</div></td>
         <td class="bottom bigfont" width="20%"><div>'.$acondicionamiento->capacidad_envases.'</div></td>
         <td class="bottom bigfont" width="20%"><div>'.$acondicionamiento->peso_estimado.'</div></td>
            <td class="bottom bigfont" width="20%"><div>'.$acondicionamiento->fecha_cosecha.'</div></td>                                    
            <td  width="20%"><div></div></td>
         </tr>
        </table>
			</div>
      
      <div><br><p><strong>Instalaciones equipos y semillas</strong></p></div>
			<div class="span9 well">
        <table width="100%" cellpadding="2">
        <tr>
            <td class="top smallfont" width="33%"><div>Descripcion</div></td>
            <td class="top smallfont" width="33%"><div>Operatividad</div></td>
            <td class="top smallfont" width="33%"><div>Limpieza</div></td>
        </tr>
        <tr>
            <td class="bottom bigfont" width="33%"><div>'.$acondicionamiento->descripcion.'</div></td>
            <td class="bottom bigfont" width="33%"><div>'.$acondicionamiento->operatividad.'</div></td>
            <td class="bottom bigfont" width="33%"><div>'.$acondicionamiento->limpieza.'</div></td>
        </tr>        
        </table>
			</div>
      <div><br><p><strong>Identificacion del lote de semillas</strong></p></div>
			<div class="span9 well">
        <table width="100%" cellpadding="2">
        <tr>
         <td class="top smallfont" width="20%"><div>Identidad</div></td>    
            <td class="top smallfont" width="20%"><div></div></td>
            <td class="top smallfont" width="20%"><div></div></td>
            <td class="top smallfont" width="20%"><div></div></td>
         <td width="20%"><div></div></td>            
        </tr>
        <tr>
         <td class="bottom bigfont" width="20%"><div>Cultivar: ';if($acondicionamiento->identificacion_lote_semilla==0){$html.='Si';}else{$html.='No';} $html.='</div></td>        
            <td class="bottom bigfont" width="20%"><div>Categoria: ';if($acondicionamiento->identificacion_lote_semilla==1){$html.='Si';}else{$html.='No';} $html.='</div></td>
            <td class="bottom bigfont" width="20%"><div>Nro de Control: ';if($acondicionamiento->identificacion_lote_semilla==2){$html.='Si';}else{$html.='No';} $html.='</div></td>
            <td class="bottom bigfont" width="30%"><div>Productor de Semilla: ';if($acondicionamiento->identificacion_lote_semilla==3){$html.='Si';}else{$html.='No';} $html.='</div></td>
            <td width="10%"><div></div></td>             
        </tr>        
        </table>
			</div>
			
	<div><p>&nbsp;</p>
	 <p><strong>Estado de la inspección</strong></p>
	</div>
		<div class="span9 well">APROBADO</div>
		<div><br><p><strong>Observación</strong></p></div>
		<div class="span9 well">'.$acondicionamiento->observacion.'</div>
            	<div >
  		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="page-break-inside: avoid;">
    		<tr>
 		 			<td><br><br><br><br><br></td>
    		</tr>
   			<tr>
      		<td width="50%" style="text-align: center;"><strong>Productor de semillas</strong></td>
		      <td width="50%" style="text-align: center;"><strong>Inspector de certificación</strong></td>
    		</tr> 
		    <tr>
		      <td width="50%" style="text-align: center;">Nombre:__________________</td>
					<td width="50%" style="text-align: center;">Nombre:__________________</td>      
		    </tr> 
		    <tr>
		      <td width="50%" style="text-align: center;">DNI:__________________</td>
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
                    <td width="60%"><div align="center"><img src="http://localhost/peas/images/form_header.png" width="437" height="40"  alt=""/></div></td>
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: '.$model->form_number.'</td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20%"></td> 
                    <td width="60%" style="text-align: center; font-size: 0.8em;">"Decenios de las Personas con Discapacidad en el Perú"<br>"Año de la Inversión para el Desarrollo Rural y la Seguridad Alimentaria"</td>
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
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: '.$model->form_number.'</td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20%"></td> 
                    <td width="60%" style="text-align: center; font-size: 0.8em;">"Decenios de las Personas con Discapacidad en el Perú"<br>"Año de la Inversión para el Desarrollo Rural y la Seguridad Alimentaria"</td>
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