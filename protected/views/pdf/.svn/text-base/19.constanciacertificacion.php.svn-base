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
            <h1><br>
             <strong>
              CONSTANCIA DE CERTIFICACIÓN DE SEMILLAS
             </strong>
            </h1>
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
      <td colspan="5">
        <div>
          Se certifica por el presente que la semilla perteneciente a: 
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="5">
      </td>
    </tr>
    <tr>
      <td width="25%">
        <div><strong>Nombre/Razón Social :
        </strong></div>
      </td>
      <td width="75%">
        <div>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="5">
      </td>
    </tr>
    <tr>
      <td width="25%">
        <div><strong>RUC :
        </strong></div>
      </td>
      <td width="75%">
        <div>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="5">
      </td>
    </tr>
    <tr>
      <td width="25%">
        <div><strong>Domicilio Legal :
        </strong></div>
      </td>
      <td width="75%">
        <div>
        </div>
      </td>
    </tr>
    
    
    
  </table>
  <div >
  <table width="100%" cellpadding="2">         
      <tr>
      	<td width="10%">
        </td>
        <td class="top smallfont" width="20%">
          <div>Especie</div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Cultivar</div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Categoría</div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Nº Lote</div>
        </td>
        <td width="10%">
        </td>
      </tr>
      <tr>
	      <td width="10%">
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td width="10%">
        </td>
      </tr>     
     	<tr>
      	<td width="10%">
        </td>
        <td class="top smallfont" width="20%">
          <div>Nº de envases</div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Peso (Kg.) o Nº semillas / envase</div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Peso Total (kg)</div>
        </td>
        <td class="top smallfont" width="20%">
          <div>
            Fecha de Etiquetado</div>
        </td>
        <td width="10%">
        </td>
      </tr>
      <tr>
	      <td width="10%">
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" width="20%">
          <div>
            .
          </div>
        </td>
        <td width="10%">
        </td>
      </tr>
      <tr>
      	<td width="10%">
        </td>
        <td class="top smallfont" colspan="2">
          <div>Numeración  Del</div>
        </td>
        <td class="top smallfont" colspan="2">
          <div>
            Numeración  Al</div>
        </td>        
        <td width="10%">
        </td>
      </tr>
      <tr>
	      <td width="10%">
        </td>
        <td class="bottom bigfont" colspan="2">
          <div>
            .
          </div>
        </td>
        <td class="bottom bigfont" colspan="2">
          <div>
            .
          </div>
        </td>
        <td width="10%">
        </td>
      </tr>
    </table>
   
  </div>
  
  <table width="100%" cellpadding="2">
    <tr>
     <td width="100%" class="tab">
      </td>
    </tr>
    <tr>
     <td width="100%" class="tab">
        ha concluido satisfactoriamente con el proceso de certificación de semillas de acuerdo a lo dispuesto en el Reglamento de Certificación de Semillas (D.S. Nº 024-2005-AG) y el Reglamento Específico de Semillas de _______ (D.S. Nº XXX-XXXX-AG). 
      </td>
    </tr>
    
    <tr>
     <td width="100%" class="tab">
        &nbsp;
      </td>
    </tr>
    <tr>
     <td width="100%" class="tab">
        Validez de la certificación: ____ meses, siempre y cuando la semilla se mantenga en adecuadas condiciones de almacenamiento y conserve las etiquetas de certificación. 
      </td>
    </tr>
    <tr>
     <td width="100%" class="tab">
        &nbsp;
      </td>
    </tr>
    <tr>
     <td width="100%" class="tab">
        Se expide el presente, para los fines pertinentes. 
      </td>
    </tr>
    <tr>
     <td width="100%" class="tab">
        &nbsp;
      </td>
    </tr>
    <tr>
     <td width="100%" class="tab" align="right">
        Lugar y Fecha:_______________________ 
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
          
        </td>
        <td class="top" width="30%" style="text-align: center;">
          <strong>
            Director Estación Experimental Agraria
          </strong>
        </td>
        <td width="20%" style="text-align: center;">
          
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