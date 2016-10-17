<?php
$categoria=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',array(':codigo'=>'005',':codigo_detalle'=>$model->category));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));
$produccion=Produccion::model()->find('form_id=:form_id',array(':form_id'=>$model->id));
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


.smallfont{font-size:0.6em}
.bigfont{font-size:1em}

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
<div style="text-align: center; font-style: italic;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="bigfont" width="50%"><p><strong></strong> </p>
      <p></p></td>
      <td width="15%"></td>
      <td width="35%" rowspan="2" bgcolor="#FFFFFF" class="bigfont"><strong>Solicitud</strong>: Inspección de lotes de semilla en acondicionamiento</td>
    </tr>
    <tr>
      <td class="smallfont" width="50%">
        <p></p>
      <p></p></td>
      <td width="15%"></td>
    </tr>
    </table>
</div>  
</head>
<body>
<div style="text-align:justify;">
 			 <p>Señor:<br>
 			  Director Estación Experimental Agraria </p>
 			 <blockquote>
 			  <p>Por la presente solicito a Usted, se sirva disponer a quien corresponda la Inspección de lotes de semillas en acondicionamiento, para lo cual declaro la siguiente información:</p>
		   </blockquote>
 			</div>
<div><br><br><p><strong>Productor de semillas</strong></p>
</div>
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
	<div><br><p><strong>Datos del expediente</strong></p>
</div>
<div class="span9 well">
<table width="100%" cellpadding="2">
<tr>
    <td class="top smallfont" width="25%"><div>Nº de Expediente</div></td>
    <td class="top smallfont" width="25%"><div>Cultivo / Especie</div></td>
    <td class="top smallfont" width="25%"><div>Cultivar</div></td>
    <td class="top smallfont" width="25%"><div>Categoria a obtener</div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div>'.$model->form_number.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$model->crop->name.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$model->variety->name.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$categoria->descripcion.'</div></td>
</tr>
</table>
</div>
	<div><br>
	<p><strong>Datos de ubicación de Planta de Acondicionamiento</strong></p>
</div>
<div class="span9 well">
<table width="100%" cellpadding="2">

<tr>
    
    <td class="top smallfont" width="25%"><div>Nombre Planta Acondicionadora</div></td>
    <td class="top smallfont" width="25%"><div>Departamento</div></td>
    <td class="top smallfont" width="25%"><div>Provincia</div></td>
    <td class="top smallfont" width="25%">Distrito</td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div></div></td>
    <td class="bottom bigfont" width="25%"><div>.</div></td>
    <td class="bottom bigfont" width="25%"><div>.</div></td>
    <td class="bottom bigfont" width="25%"><div>.</div></td>
</tr>
<tr>
    <td class="top smallfont" width="25%"><div>Anexo / Sector</div></td>
    <td class="top smallfont" width="25%"><div>Volumen de Semilla en Acondicionamiento (kg)</div></td>
    <td  width="25%"><div></div></td>
    <td  width="25%"><div></div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div>.</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$produccion->produccion.'</div></td>
    <td width="25%"><div></div></td>
    <td width="25%"><div></div></td>
</tr>
</table>
</div>
	<div><br>
	<p><strong>Datos de la Inspección de Acondicionamiento</strong></p>
</div>
<div class="span9 well">
<table width="100%" cellpadding="2">
<tr>
    <td class="top smallfont" width="20%"><div>Fecha Propuesta</div></td>
    <td class="top smallfont" width="20%"><div>Hora Propuesta</div></td>    
    <td colspan="3"><div></div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="20%"><div>'.date('d-m-Y',strtotime($acondicionamiento->proposed_date)).'</div></td>
    <td class="bottom bigfont" width="20%"><div>'.date('h:m A',strtotime($acondicionamiento->proposed_date)).'</div></td>
    <td colspan="3"><div>.</div></td>
</tr>
</table>
</div>
<!--<div style="text-align: left; font-style: italic;" class="bigfont">
  <br><p>Para tal efecto, se adjuntan los siguiente documentos:  (Indicar los documentos que se adjuntan):</p>
  <table width="100%" border="2px" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>-->
<div style="text-align: left; font-style: italic;" class="bigfont"><strong>Declaración Jurada:</strong></div>
<div style="text-align: left; font-style: italic;" class="bigfont">Declaro bajo juramento que los datos consignados en la presente solicitud son verídicos, que conozco la normatividad vigente para la producción y certificación de semillas, la reglamentación específica de semillas de la especie a multiplicar y me someto a las sanciones legales que se impongan por contravenir la Ley General de Semillas y sus Reglamentos. Asimismo me comprometo a proporcionar toda la información necesaria y facilitar el acceso al INIA para el proceso de certificación.</div>
<div style="text-align: center; font-style: italic;" class="bigfont">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr>
      <td width="40%"></td>
      <td width="35%"></td>
      <td width="15%"></td>
      <td width="10%"></td>
    </tr> 
    <tr>
      <td width="40%"></td>
      <td width="35%" align="right">Lugar y Fecha:</td>
      <td width="15%" align="left">_____________________________</td>
      <td width="10%"></td>
    </tr>
    <tr>
      <td width="40%"></td>
      <td width="35%"></td>
      <td width="15%"></td>
      <td width="10%"></td>
    </tr> 
    <tr>
      <td width="40%"></td>
      <td width="35%" align="right">Firma</td>
      <td width="15%" align="left">_____________________________</td>
      <td width="10%"></td>
    </tr> 
    
    <tr>
      <td width="40%"></td>
      <td width="35%" align="right">Nombre Completo</td>
      <td width="15%" align="left">_____________________________</td>
      <td width="10%"></td>
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
                    <td width="60%"><div align="center"><img src="'.Yii::app()->getBaseUrl(true).'/images/form_header.png" width="437" height="40"  alt=""/></div></td>
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