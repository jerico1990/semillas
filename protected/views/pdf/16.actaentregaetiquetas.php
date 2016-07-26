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
              Acta de entrega de etiquetas de certificación de semillas
  </strong>
              </div>
          </td>
	  </tr>
      <tr>
        <td colspan="3" align="center">
          <div>
			<strong>
              Nro _________________________
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
          Siendo las ______ horas del día __ de ________ del año 20__ en las oficinas de la Dirección Estación Experimental Agraria Andenes Ubicado en _____ Distrito de ___ Provincia de _____ Departamento de ____, el inspector del inia, ___________ identificado con DNI Nro __________ y de conformidad con lo establecido en el Artículo 51 del Reglamento de Certificación de Semillas, D.S. Nro 024-2005-AG, procede a la entrega de etiquetas de certificación de semillas debidamente llenadas, al Productor de Semillas: __________________ represetando po: ______________ y de acuerdo a la información que se consigna a continuación:
        </div>
      </td>
    </tr>
    
  </table>
  <div class="span9 well">
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
        <td class="top smallfont" width="20%">
          <div>
            Peso Total (kg)
          </div>
        </td>
      </tr>
      <tr>
        <td class="bottom bigfont" width="25%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="25%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="25%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="25%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="25%">
          <div>
            .
          </div>
        </td>
      </tr>
    </table>
    
    <table width="100%" cellpadding="2">
      
      <tr>
        <td class="top smallfont" width="20%">
          <div>
            Cantidad
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
      <tr>
        <td class="bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td class="bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td class="bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td width="20%">
        </td>
        
        <td width="20%">
        </td>
        
      </tr>
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
      <td width="100%">
        <div class="tab">
          <div align="justify">
            El productor de semillas se compromete a utilizar las etiquetas de certificación en el lote de semillas descrito.
          </div>
        </div>
      </td>
    </tr>
    
    <tr>
      <td width="100%">
        <div class="tab">
          <div align="justify">
            El productor de semillas se compromete a coser las etiquetas de certificación en los envases que utilizará.
          </div>
        </div>
      </td>
    </tr>
    
    <tr>
      <td width="100%">
        <div class="tab">
          <div align="justify">
            El productor de semillas se compromete a devolver las etiquetas de certificación que no utilice.
          </div>
        </div>
      </td>
    </tr>
  </table>
  
  <table width="100%" cellpadding="2">
    <tr>
      <td width="100%" class="tab">
      </td>
    </tr>
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
                    <td width="60%"><div align="center"><img src="../../../xampp/htdocs/peas/images/form_header.png" width="437" height="40"  alt=""/></div></td>
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: XXXX-XX-XX</td>
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
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: XXXX-XX-XX</td>
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