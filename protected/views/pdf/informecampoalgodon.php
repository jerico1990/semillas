<?php
$inspection=Inspection::model()->find('form_id=:form_id and inspection_number=:inspection_number',
                                      array(':form_id'=>$model->id,':inspection_number'=>$id));
$categoria=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',array(':codigo'=>'005',':codigo_detalle'=>$model->category));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));
$user=User::model()->find()->find('id=:id',array(':id'=>$model->user_id));
$location_user=Location::model()->find('district_id=:district_id',array(':district_id'=>$user->district_id));

$cultivo_ant=Crop::model()->find('id=:id',array(':id'=>$model->crop_before_id));
$cultivar_ant=Crop::model()->find('id=:id',array(':id'=>$model->variety_before_id));


$organismoCertificador=Headquarter::model()->find('id=:id',array(':id'=>$model->headquarter_id));
$width="437px";
$height="40px";
$img="form_header.png";
$logo=User::model()->find('ruc=:ruc',array(':ruc'=>$organismoCertificador->ruc));
$img="logos/".$logo->avatar;
if($logo)
{
    $width="200px";
    $height="60";
}

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
<div style="font-size: 1.2em; text-align: center; font-weight: bold;">Informe de Inspección de campo de multiplicación de semillas de Algodón</div>  
<div><br><p><strong>Productor de semillas</strong></p>
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
    <td class="top smallfont" width="25%"><div>Inspección</div></td>
    <td class="top smallfont" width="25%"><div>Fecha</div></td>
    <td width="25%"><div></div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div>'.$model->form_number.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$inspection->inspection_number.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.date('d-m-Y',strtotime($inspection->real_date)).'</div></td>
    <td  width="25%"><div>.</div></td>
</tr>
<tr>
    <td class="top smallfont" width="25%"><div>Nº de Registro</div></td>
    <td class="top smallfont" colspan="2"><div>Productor de Semillas</div></td>
    <td width="25%"><div></div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div>'.$model->usera->registry.'</div></td>
    <td class="bottom bigfont" colspan="2%"><div>'.$model->usera->legal_name.'</div></td>
    <td  width="25%"><div></div></td>
</tr>
<tr>
    <td class="top smallfont" width="25%"><div>Departamento</div></td>
    <td class="top smallfont" width="25%"><div>Provincia</div></td>
    <td class="top smallfont" width="25%"><div>Distrito</div></td>
    <td class="top smallfont" width="25%"><div>Sector/Zona</div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div>'.$location_user->department.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$location_user->province.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$location_user->district.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$model->location_annex.'</div></td>
</tr>
<tr>
    <td class="top smallfont" width="25%"><div>Categoria a Obtener</div></td>
    <td class="top smallfont" width="25%"><div>Area (m2)</div></td>
    <td class="top smallfont" width="25%"><div>Cultivo Anterior</div></td>
    <td class="top smallfont" width="25%"><div>Cultivar Anterior</div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div>'.$categoria->descripcion.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$model->area.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$cultivo_ant->name.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$cultivar_ant->name.'</div></td>
</tr>
</table>
</div>
	<div><br><p><strong>Datos del campo de multiplicación</strong></p>
</div>
<div class="span9 well">
<table width="100%" cellpadding="2">

<tr>
    
    <td class="top smallfont" width="25%"><div>Departamento</div></td>
    <td class="top smallfont" width="25%"><div>Provincia</div></td>
    <td class="top smallfont" width="25%"><div>Distrito</div></td>
    <td class="top smallfont" width="25%"><div>Anexo / Sector</div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div>'.$location->department.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$location->province.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$location->district.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$model->location_annex.'</div></td>
</tr>
<tr>
    <td class="top smallfont" width="25%"><div>Nombre del Predio</div></td>
    <td class="top smallfont" width="25%"><div>Área</div></td>
    <td class="top smallfont" width="25%"><div>Fecha de Siembra</div></td>
    <td  width="25%"><div></div></td>
</tr>
<tr>
    <td class="bottom bigfont" width="25%"><div>'.$model->location_name.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.$inspection->size.'</div></td>
    <td class="bottom bigfont" width="25%"><div>'.date('d-m-Y',strtotime($model->seed_date)).'</div></td>
    <td width="25%"><div></div></td>
</tr>
</table>
</div>

<div><br><p><strong>Datos de la Inspección de Campo</strong></p>
</div>
<div class="span9 well">
<table width="100%" cellpadding="2">
<tr>    
    <td class="top smallfont" width="20%"><div>Fecha de siembra: </div></td>
    <td class="top smallfont" colspan="3"><div>Etapa / Estado fenológico del cultivo</div></td>
    <td width="20%"><div></div></td>

</tr>
<tr>
    <td class="bottom bigfont" width="20%"><div>'.date('d-m-Y',strtotime($inspection->alg_fecha_siembra)).'</div></td>
    <td class="bottom" width="20%">   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="80%"><div class="smallfont">Deshije: </div></td>
            <td width="20%"><div class="left">'.date('d-m-Y',strtotime($inspection->alg_deshije)).'</div></td>
          </tr>
        </table>
	</td>
   <td class="bottom" width="20%">   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td width="80%"><div class="smallfont">Floración: </div></td>
           <td width="20%"><div class="left">'.$inspection->alg_floracion.'</div></td>
          </tr>
        </table>
	</td>
    <td class="bottom" width="20%">   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td width="80%"><div class="smallfont">Bellotas Abiertas: </div></td>
           <td width="20%"><div class="left">'.$inspection->alg_bellotas.'</div></td>
          </tr>
        </table>
    </td>
</tr>


<tr>
    
   <td class="top smallfont" colspan="2"><div>Distanciamiento</div></td>
   <td class="top smallfont" colspan="3"><div>Aislamiento</div></td>
</tr>
<tr>
   <td class="bottom" width="20%">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="80%"><div class="smallfont">Surcos: </div></td>
            <td width="20%"><div class="left">'.$inspection->alg_surcos.'</div></td>
          </tr>
    </table>
	</td>
    <td class="bottom" width="20%">   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="80%"><div class="smallfont">Mata: </div></td>
            <td width="20%"><div class="left">'.$inspection->alg_mata.'</div></td>
          </tr>
        </table>
	</td>
    <td class="bottom" width="20%">   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="80%"><div class="smallfont">Campo Comercial: </div></td>
            <td width="20%"><div class="left">'.$inspection->alg_campo_comercial.'</div></td>
          </tr>
        </table>
	</td>
    <td class="bottom" width="20%">   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="80%"><div class="smallfont">Otras especie/ híbrido: </div></td>
            <td width="20%"><div class="left">'.$inspection->alg_otra_especie.'</div></td>
          </tr>
        </table>
	</td>
  <td class="bottom" width="20%">   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td width="80%"><div class="smallfont">Otro cultivar: </div></td>
            <td width="20%"><div class="left">'.$inspection->alg_otra_cultivar.'</div></td>
          </tr>
        </table>
	</td>
</tr>
<tr>
   <td class="top smallfont" colspan="2"><div>Plantas de otra especie</div></td>
   <td class="top smallfont" colspan="2"><div>Plantas fuera de tipo</div></td>
   <td width="20%"><div></div></td>
</tr>
<tr>
   <td class="bottom bigfont"  colspan="2"><div>'.$inspection->alg_plantas_otra_especie.'</div></td>
   <td class="bottom bigfont"  colspan="2"><div>'.$inspection->alg_plantas_fuera_tipo.'</div></td>
   <td width="20%"><div></div></td>
</tr>
</table>
</div>

<div><br><p><strong>Estado de la inspección</strong></p>
</div>
<div class="span9 well">
';
      if($identificador=="1"){$html.="Aprobado";}
      elseif($identificador=="2"){$html.="Observado";}
      elseif($identificador=="3"){$html.="Rechazado";}
      
     
      $html.='
</div>

<div><br><p><strong>Observación</strong></p>
</div>
<div class="span9 well">
'.$inspection->observaciones.'
</div>

<div>
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
                    <td width="60%"><div align="center"><img src="'.Yii::app()->getBaseUrl(true).'/images/'.$img.'" width="'.$width.'" height="'.$height.'"  alt=""/></div></td>
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: '.$model->form_number.'</td>
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
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: '.$model->form_number.'</td>
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