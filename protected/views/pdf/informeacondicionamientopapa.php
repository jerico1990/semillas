<?php
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));
$categoria=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',array(':codigo'=>'005',':codigo_detalle'=>$model->category));
$cultivo_ant=Crop::model()->find('id=:id',array(':id'=>$model->crop_before_id));
$cultivar_ant=Crop::model()->find('id=:id',array(':id'=>$model->variety_before_id));
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
			<div style="font-size: 1.2em; text-align: center; font-weight: bold;">Informe de Inspección de acondicionamiento de semillas de Papa</div>
			<div><br><p><strong>Productor de semillas</strong></p></div>
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
			<div><br><p><strong>Datos del expediente</strong></p></div>
			<div class="span9 well">
        <table width="100%" cellpadding="2">
        <tr>
            <td class="top smallfont" width="25%"><div>Nº de Expediente</div></td>
            <td class="top smallfont" width="25%"><div>Nº de Visita</div></td>
            <td class="top smallfont" width="25%"><div>Fecha</div></td>
            <td width="25%"><div></div></td>
        </tr>
        <tr>
            <td class="bottom bigfont" width="25%"><div>'.$model->form_number.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$acondicionamiento->acondicionamiento_number.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$model->seed_date.'</div></td>
            <td  width="25%"><div>.</div></td>
        </tr>       
        <tr>
            <td class="top smallfont" width="25%"><div>Departamento</div></td>
            <td class="top smallfont" width="25%"><div>Provincia</div></td>
            <td class="top smallfont" width="25%"><div>Distrito</div></td>
            <td class="top smallfont" width="25%"><div>Sector/Zona</div></td>
        </tr>
        <tr>
            <td class="bottom bigfont" width="25%"><div>'.$location->department.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$location->province.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$location->district.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$model->location_annex.'</div></td>
        </tr>
        <tr>
            <td class="top smallfont" width="25%"><div>Cultivo Anterior</div></td>
            <td class="top smallfont" width="25%"><div>Cultivar Anterior</div></td>
            <td class="top smallfont" width="25%"><div>Categoria a Obtener</div></td>
            <td class="top smallfont" width="25%"><div>Area (m2)</div></td>
        </tr>
        <tr>
            <td class="bottom bigfont" width="25%"><div>'.$cultivo_ant->name.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$cultivar_ant->name.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$categoria->descripcion.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$model->area.'</div></td>
        </tr>
        </table>
			</div>
			
		<div><br><p><strong>PLAGAS TUBERCULOS (De una muestra de 20 tubérculos/envase, tomado en 5 envases diferentes de un lote de 100
envases. Total de tubérculos muestreados/ lote = 100)</strong></p></div>    
    <div class="span9 well">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
        <td class="top smallfont" colspan="4" rowspan="2"><div>Plagas</div></td>
        <td class="top smallfont" rowspan="2"><div>Factor de importancia</div></td>
        <td class="top smallfont" rowspan="2"><div>Por</div></td>
        <td class="top smallfont" colspan="2"><div>Primera evaluación</div></td>
        <td class="top smallfont" colspan="2"><div>Segunda Evaluación</div></td>
      </tr>
       <tr>
        <td class="top smallfont"><div>% Pl. Afectadas</div></td>
        <td class="top smallfont"><div>Puntos</div></td>
        <td class="top smallfont"><div>% Pl. Afectadas</div></td>
        <td class="top smallfont"><div>Puntos</div></td>
       </tr>
       <tr>
        <td class="top smallfont" colspan="4"><div>Pobredumbre blanda (Erwinia caratovora)</div></td>
        <td class="top bigfont" width="10%"><div>10</div></td>
        <td class="top bigfont" width="10%"><div>x</div></td>
        <td class="top bigfont" width="10%"><div>'.$acondicionamiento->afectadas_erwinia.'</div></td>        
        <td class="top bigfont" width="10%"><div>='; $html.=$acondicionamiento->afectadas_erwinia*10; $html.='</div></td>
        <td class="top bigfont" width="10%"><div></div></td>
        <td class="top bigfont" width="10%"><div>=</div></td>
       </tr>
       <tr>
        <td class="top smallfont" colspan="4"><div>Pobredumbre seca (Fusarium solani)</div></td>
        <td class="top bigfont" width="10%"><div>7</div></td>
        <td class="top bigfont" width="10%"><div>x</div></td>
        <td class="top bigfont" width="10%"><div>'.$acondicionamiento->afectadas_fusarium.'</div></td>        
        <td class="top bigfont" width="10%"><div>='; $html.=$acondicionamiento->afectadas_fusarium*7; $html.='</div></td>
        <td class="top bigfont" width="10%"><div></div></td>
        <td class="top bigfont" width="10%"><div>=</div></td>
       </tr>
       <tr>
        <td class="top smallfont" colspan="4"><div>Rhizoctoniasis (Rhizoctonia solani) y Roña (Spongospora subterraneae)</div></td>
        <td class="top bigfont" width="10%"><div>4</div></td>
        <td class="top bigfont" width="10%"><div>x</div></td>
        <td class="top bigfont" width="10%"><div>'.$acondicionamiento->afectadas_rhizoctoniasis.'</div></td>        
        <td class="top bigfont" width="10%"><div>='; $html.=$acondicionamiento->afectadas_rhizoctoniasis*4; $html.='</div></td>
        <td class="top bigfont" width="10%"><div></div></td>
        <td class="top bigfont" width="10%"><div>=</div></td>
       </tr>
       <tr>
        <td class="top smallfont" colspan="4"><div>Mezcla varietal</div></td>
        <td class="top bigfont" width="10%"><div>1</div></td>
        <td class="top bigfont" width="10%"><div>x</div></td>
        <td class="top bigfont" width="10%"><div>'.$acondicionamiento->afectadas_mezcla_varietal.'</div></td>        
        <td class="top bigfont" width="10%"><div>='; $html.=$acondicionamiento->afectadas_mezcla_varietal*1; $html.='</div></td>
        <td class="top bigfont" width="10%"><div></div></td>
        <td class="top bigfont" width="10%"><div>=</div></td>
       </tr>
       <tr>
        <td class="top smallfont" colspan="4"><div>Fuera de tamaño, rajaduras, daño, pelado y deforme.</div></td>
        <td class="top bigfont" width="10%"><div>3</div></td>
        <td class="top bigfont" width="10%"><div>x</div></td>
        <td class="top bigfont" width="10%"><div>'.$acondicionamiento->afectadas_fuera_tamano.'</div></td>        
        <td class="top bigfont" width="10%"><div>='; $html.=$acondicionamiento->afectadas_fuera_tamano*3; $html.='</div></td>
        <td class="top bigfont" width="10%"><div></div></td>
        <td class="top bigfont" width="10%"><div>=</div></td>
       </tr>
       <tr>
        <td colspan="4"></td>
        <td width="10%"></td>
        <td width="10%"></td>
        <td class="top smallfont" width="10%"><div>Puntaje Total</div></td>        
        <td class="top bigfont" width="10%"><div>'; $html.=$acondicionamiento->afectadas_fuera_tamano*3+
                                                           $acondicionamiento->afectadas_mezcla_varietal*1+
                                                           $acondicionamiento->afectadas_rhizoctoniasis*4+
                                                           $acondicionamiento->afectadas_fusarium*7+
                                                           $acondicionamiento->afectadas_erwinia*10;                                                    
         $html.='</div></td>
        <td class="top smallfont" width="10%"><div>Puntaje Total</div></td>
        <td class="top bigfont" width="10%"><div></div></td>
       </tr>      
     </table>
    </div>
<div><br><p><strong>Enfermedades que no se permiten</strong></p></div>    
    <div class="span9 well">
    	 <table width="60%" border="0" cellspacing="0" cellpadding="0">
       	<tr>
        	<td class="smallfont bottom" width="40%" ><div>Categoría de semilla</div></td>
        	<td class="smallfont bottom" width="40%"><div>Puntaje Límite (3ra Inspecc.)</div></td>          
       	 <td width="40%"><div></div></td>          
      	</tr>
        <tr>
        	<td class="bigfont bottom" width="40%" ><div>Certificada o Autorizada</div></td>
        	<td class="bigfont bottom" width="40%"><div>60</div></td>
       	 <td width="40%"><div></div></td>
      	</tr>
        <tr>
        	<td class="bigfont bottom" width="40%" ><div>Registrada</div></td>
        	<td class="bigfont bottom" width="40%"><div>50</div></td>
       	 <td width="40%"><div></div></td>
      	</tr>
        <tr>
        	<td class="bigfont bottom" width="40%" ><div>Básica</div></td>
        	<td class="bigfont bottom" width="40%"><div>40</div></td>
       	 <td width="40%"><div></div></td>
      	</tr>
       
              
      </table>
		</div>    
		<div><br><p><strong>Enfermedades que no se permiten</strong></p></div>    
    <div class="span9 well">
    	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
       	<tr>
        	<td class="bigfont" ><div>Marchitez bacteriana (Ralstonia solanacearum): Se deberá tomar una muestra de tubérculos semilla, para ser sometida a Análisis de Infección Latente de Marchitez bacteriana</div></td>
      	</tr>             
        <tr>
          <td class="bigfont" ><div>Carbón o gangrena (Thecaphora solani )</div></td>
      	</tr>              
      </table>
		</div>
		<div><br><p><strong>Estado de la inspección</strong></p></div>
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