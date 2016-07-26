<?php
$categoria=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',array(':codigo'=>'005',':codigo_detalle'=>$model->category));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));
$loca_mov_origen=Location::model()->find('district_id=:district_id',array(':district_id'=>$movilizacion->origen_district_id));
$loca_mov_destino=Location::model()->find('district_id=:district_id',array(':district_id'=>$movilizacion->destino_district_id));
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


.top{border: solid 0 black; border-top-width:1px; height:5px}
.bottom{border: solid 0 black; border-bottom-width:1px; height:9px}


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
			<div style="font-size: 1.2em; text-align: center; font-weight: bold;">Reporte de movilización de semillas para el acondicionamiento</div>
 			<div style="text-align:justify;">
 			 <p>Señor:<br>
 			  Director Estación Experimental Agraria </p>
 			 <blockquote>
 			  <p>Por la presente, en cumplimiento de lo dispuesto en el Artículo 33 del Reglamento de Certificación de semillas, D.S. Nro. 024-2005-AG, informo a Usted sobre la movilización de semilla para el acondicionamiento, para lo cual declaro la siguiente información:</p>
		   </blockquote>
 			</div>
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
			<div><br>
	<p><strong>Semilla a movilizar</strong></p></div>
			<div class="span9 well">
        <table width="100%" cellpadding="2">
        <tr>
            <td class="top smallfont" width="25%"><div>Cultivo</div></td>
            <td class="top smallfont" width="25%"><div>Cultivar</div></td>
            <td class="top smallfont" width="25%"><div>Categoríá</div></td>
            <td width="25%"><div></div></td>
        </tr>
        <tr>
            <td class="bottom bigfont" width="25%"><div>'.$model->crop->name.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$model->variety->name.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$categoria->descripcion.'</div></td>
            <td  width="25%"><div>.</div></td>
        </tr>               
        



        <tr>
            <td class="top smallfont" width="25%"><div>Número de envases</div></td>
            <td class="top smallfont" width="25%"><div>Peso promedio de envases con semillas (kg)</div></td>
            <td class="top smallfont" width="25%"><div>Cantidad a movilizar (kg)</div></td>
         <td class="top smallfont" width="25%"><div>Fecha de movilización</div></td>
        </tr>
        <tr>
            <td class="bottom bigfont" width="25%"><div>'.$movilizacion->cantidad_envases.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$movilizacion->capacidad_envases.'</div></td>
            <td class="bottom bigfont" width="25%"><div>'.$movilizacion->cantidad_movilizar.'</div></td>
         <td class="bottom bigfont" width="25%"><div>'.date('d-m-Y',strtotime($movilizacion->fecha)).'</div></td>
        </tr> 
        </table>
			</div>
			<div><br>
			<p><strong>Origen de la movilización</strong></p></div>
	<div class="span9 well">
				<table width="100%" cellpadding="2">
					<tr>
						<td class="top smallfont" width="20%"><div>Nombre del Predio / Planta</div></td>
            <td class="top smallfont" width="20%"><div>Sector/Zona</div></td>
						<td class="top smallfont" width="20%"><div>Departamento</div></td>
            <td class="top smallfont" width="20%"><div>Provincia</div></td>
           	<td class="top smallfont" width="20%"><div>Distrito</div></td>
        </tr>
        <tr>
         <td class="bottom bigfont" width="20%"><div>'.$movilizacion->origen_nombre_predio.'</div></td>
         <td class="bottom bigfont" width="20%"><div>'; if($movilizacion->origen==0){$html.='Planta de acondicionamiento';}elseif($movilizacion->origen==1){$html.='Almacén';}elseif($movilizacion->origen==2){$html.='Campo de multiplicación';} $html.='</div></td>
         <td class="bottom bigfont" width="20%"><div>'.$loca_mov_origen->department.'</div></td>
         <td class="bottom bigfont" width="20%"><div>'.$loca_mov_origen->province.'</div></td>
         <td class="bottom bigfont" width="20%"><div>'.$loca_mov_origen->district.'</div></td>
        </tr>
        </table>
			</div>
      <div><br>
			<p><strong>Destino de la movilización</strong></p></div>
	<div class="span9 well">
				<table width="100%" cellpadding="2">
					<tr>
						<td class="top smallfont" width="20%"><div>Nombre del Predio / Planta</div></td>
            <td class="top smallfont" width="20%"><div>Sector/Zona</div></td>
						<td class="top smallfont" width="20%"><div>Departamento</div></td>
            <td class="top smallfont" width="20%"><div>Provincia</div></td>
           	<td class="top smallfont" width="20%"><div>Distrito</div></td>
        </tr>
        <tr>
         <td class="bottom bigfont" width="20%"><div>'.$movilizacion->destino_nombre_predio.'</div></td>
         <td class="bottom bigfont" width="20%"><div>'; if($movilizacion->destino==0){$html.='Planta de acondicionamiento';}elseif($movilizacion->destino==1){$html.='Almacén';}elseif($movilizacion->destino==2){$html.='Campo de multiplicación';} $html.='</div></td>
         <td class="bottom bigfont" width="20%"><div>'.$loca_mov_destino->department.'</div></td>
         <td class="bottom bigfont" width="20%"><div>'.$loca_mov_destino->province.'</div></td>
         <td class="bottom bigfont" width="20%"><div>'.$loca_mov_destino->district.'</div></td>
        </tr>
        </table>
			</div>
		<div><br><p>Declaro bajo juramento que los datos consignados en la presente solicitud son verídicos, que conozco la normatividad vigente para la producción y certificación de semillas, la reglamentación específica de semillas de la especia a multiplicar y me someto a las sanciones legales que se impongan por conravenir la Ley General de Semillas y sus Reglamentos. Asimismo me comprometo a proporcionar toda la información necesaria y facilitar el acceso al SENASA para el proceso de certificación.</p></div>
		
	
		<div>
  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
    		<tr>
 		 			<td><br><br><br><br><br></td>
    		</tr>
   			<tr>
      		<td width="40%" style="text-align: center;"><strong>Lugar y fecha:</strong>_______________________</td>
		      <td width="25%" style="text-align: right;"><strong>Firma:</strong></td>
 		      <td width="35%" style="text-align: left;"><strong>___________________________</strong></td>
    		</tr> 
		    <tr>
		      <td width="40%" style="text-align: center;"></td>
					<td width="25%" style="text-align: right;"><strong>Nombre Completo:</strong></td>      
					<td width="35%" style="text-align: left;"><strong>___________________________</strong></td>
		    </tr> 
		    <tr>
		      <td width="40%" style="text-align: center;"></td>
		      <td width="25%" style="text-align: right;"><strong>DNI:</strong></td>
		      <td width="35%" style="text-align: left;"><strong>___________________________</strong></td>
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