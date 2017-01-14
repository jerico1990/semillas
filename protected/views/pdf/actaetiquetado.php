<?php
$categoria=Maestro::model()->find('codigo=:codigo and codigo_detalle=:codigo_detalle',array(':codigo'=>'005',':codigo_detalle'=>$model->category));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));

$inbox=Inbox::model()->find('status_id=:status_id and form_id=:form_id',
                            array(':status_id'=>3,':form_id'=>$model->id));
$user=User::model()->find('id=:id',array(':id'=>$inbox->to));

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
      body {
        font-family: sans-serif;
        font-size: 10pt;
      }
      p {
        margin: 0pt;
      }
      td {
        vertical-align: top;
      }
      .items td {
        border-left: 0.1mm solid #000000;
        border-right: 0.1mm solid #000000;
      }
      table thead td {
        background-color: #EEEEEE;
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
      
      tr.top td {
        border-top: thin solid black;
      }
      tr.bottom td {
        border-bottom: thin solid black;
      }
      tr.row td:first-child {
        border-left: thin solid black;
      }
      tr.row td:last-child {
        border-right: thin solid black;
      }
      
      
      .top{
        border: solid 0 black;
        border-top-width:1px;
        height:5px}
      .bottom{
        border: solid 0 black;
        border-bottom-width:1px;
        height:9px}
      
      
      .smallfont{
        font-size:0.6em}
      .bigfont{
        font-size:1em}
      
      
      .tab{
        text-indent: 1.5em}
      
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
    <!--
<div style="text-align: center; font-style: italic;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="bigfont" width="50%">
<p>
<strong>
Comité Regional de Semillas de San Martín
</strong>

</p>
<p>
R.J. Nro 134-2006-AG-SENASA
</p>
</td>
<td width="15%">
.
</td>
<td width="35%" bgcolor="#FFFFFF" class="bigfont">
</td>
</tr>
<tr>
<td class="smallfont" width="50%">
<p>
Jr. Martinez de Compagñon Nro 1035-Tarapoto      
</p>
<p>
Telefax (042)-52228881 | email:corese_sm@speedy.com.pe
</p>
</td>
<td width="15%">
</td>
<td width="35%">
</td>
</tr>
</table>
</div>
-->
  
  </head>
  <body>
	<table width="100%" cellpadding="2">
      <tr>
        <td colspan="3" align="center">
          <div>
            <br>
			<strong>
              Acta de verificación de etiquetado de certificación de semillas
  </strong>
         </div>
       </td>
	  </tr>
      <tr>
        <td colspan="3" align="center">
          <div>
			<strong>
              Nro '.$model->form_number.'
  </strong>
         </div>
      </td>
	  </tr>
      
      <tr>
        <td colspan="3" align="center">
          <div>
            <br>
          </div>
        </td>
	  </tr>
  </table>
  
  <table width="100%" cellpadding="2">
    
    <tr>
      <td width="100%">
        <div>
          Siendo las '.date('h:i A').' horas del día '.date('d').' de '.date('F').' del año '.date('Y').' en las oficinas de la Dirección Estación Experimental Agraria Andenes Ubicado en '.$model->location_annex.' Distrito de '.$location->district.' Provincia de '.$location->province.' Departamento de '.$location->department.', el inspector del inia,  identificado con DNI Nro '.$user->document_number.' y de conformidad con lo establecido en el Artículo 51 del Reglamento de Certificación de Semillas, D.S. Nro 024-2005-AG, procede a verificar el etiquetado del lote de semillas en certificación pertenecientes  al Productor de Semillas:'.$model->usera->legal_name.' represetando por: '.$model->usera->first_name.' '.$model->usera->last_name.' y de acuerdo a la información que se consigna a continuación: 
        </div>
      </td>
    </tr>
    
  </table>
  <div class="span9 well">
  <table width="100%" cellpadding="2">
      <tr>
        <td class="smallfont" colspan="5">
          Envases
        </td>
        >
      </tr>
      
      <tr>
        <td class="top smallfont" width="25%">
          <div>Material</div>
        </td>        
        <td class="top smallfont" width="25%">
          <div>
            Nro de envases</div>
        </td>
        <td class="top smallfont" width="25%">
          <div>
            Peso o Nro de Semillas</div>
        </td>
        <td class="top smallfont" width="25%">
          <div>
            Peso Total (kg)</div>
        </td>
      </tr>
      <tr>
        <td class="bottom bigfont" width="25%">
          <div>
           
          </div>
        </td>
            
          </div>
        </td>
        <td class="bottom bigfont" width="25%">
          <div>
           '.$muestreo->nro_envases.'
          </div>
        </td>
        <td class="bottom bigfont" width="25%">
          <div>
            '.$muestreo->peso_envase.'
          </div>
        </td>
        <td class="bottom bigfont" width="25%">
          <div>
            '.$etiquetado->peso_total.'
          </div>
        </td>
      </tr>     
     
    </table>
    <table width="100%" cellpadding="2">
      <tr>
        <td class="smallfont" colspan="5">
          <div>
            Etiquetas
          </div>
        </td>
        >
      </tr>
      
      <tr>
        <td class="top smallfont" width="20%">
          <div>
            Nro de Lote
          </div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Especie
          </div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Cultivar
          </div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Categoría
          </div>
        </td>
        <td width="20%">         
        </td>
      </tr>
      <tr>
        <td class="bottom bigfont" width="20%">
          <div>
            '.$muestreo->codigo_lote.'
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            '.$model->crop->name.'
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
             '.$model->variety->name.'
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            '.$categoria->descripcion.'
          </div>
        </td>
        <td width="20%">
        </td>
      </tr>     
      <tr>
        <td class="top smallfont" width="20%">
          <div>
            Fecha del etiquetado
          </div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Numeración del
          </div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Numeración al
          </div>
        </td>
        <td width="20%">
        </td>
        
        <td width="20%">
        </td>
        
      </tr>
      
      ';
      
      foreach($etiquetas as $etiqueta):
      $html.='<tr>
	      <td width="10%">
         '.$etiquetado->fecha_notificado_etiquetado.'
        </td>
        <td class="top" width="20%">
          <div>
            '.$etiqueta->serie_inicio.'
          </div>
        </td>
        <td class="top" width="20%">
          <div>
            '.$etiqueta->serie_fin.'
          </div>
        </td>
        <td width="20%">
        </td>
        
        <td width="20%">
        </td>
      </tr>';
      endforeach;
    $html.='
      
      <tr>
        <td class="top" width="20%">
          <div>
          </div>
        </td>
        <td class="top" width="20%">
          <div>
          </div>
        </td>
        <td class="top" width="20%">
          <div>
          </div>
        </td>
        <td width="20%">
        </td>
        
        <td width="20%">
        </td>
        
      </tr>
    </table>
  </div>
  
  
  
  
  <table width="100%" cellpadding="2">
    <tr>
     <td width="100%" class="tab">
      </td>
    </tr>
    <!--
    <tr>
     <td width="100%" class="tab">
        Observaciones 
      </td>
    </tr>
    <tr>
     <td width="100%" class="tab">
        xxxx 
      </td>
	 </tr>
    -->
  </table>
  <table width="100%" cellpadding="2">
    <tr>
     <td width="100%" class="tab">
        
      </td>
    </tr>
    <tr>
     <td width="100%" class="tab">
        En fe de lo actuado suscriben el presente acta: 
      </td>
    </tr>
  </table>
  
  </div>
  <div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <br>
          <br>
          <br>
          <br>
          <br>
        </td>
      </tr>
      <tr>
        <td width="50%" style="text-align: center;">
          <strong>
            Productor de semillas
          </strong>
        </td>
        <td width="50%" style="text-align: center;">
          <strong>
            Inspector de certificación
          </strong>
        </td>
      </tr>
      
      <tr>
        <td width="50%" style="text-align: center;">
          Nombre:__________________
        </td>
        <td width="50%" style="text-align: center;">
          Nombre:__________________
        </td>
        
      </tr>
      
      <tr>
        <td width="50%" style="text-align: center;">
          DNI:__________________
        </td>
        <td width="50%" style="text-align: center;">
          DNI:__________________
        </td>
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