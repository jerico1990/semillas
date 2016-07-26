<?php
$pdf = Yii::createComponent('application.extensions.MPDF56.mpdf');
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha = date('d')." de ".$meses[date('n')-1]. " del ".date('Y');

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
			.thin {
    border: 1px solid black;
}
.thintable {
    border-collapse: collapse;
}
      
      
      .smallfont{
        font-size:0.9em}
      .bigfont{
        font-size:0.7em}
      
      
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
<div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20%"></td> 
                    <td width="60%"><div align="center"></td>
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;"></td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20%"></td> 
                    <td width="60%" style="text-align: center; font-size: 0.8em;">&nbsp;</td>
                    <td width="20%"></td> 
                </tr>
            </table>
        </div>
	<table class="smallfont" width="100%" cellpadding="2">
   <tr>
      <td width="76%" rowspan="2"><img src="http://localhost/peas/images/form_header.png" width="437" height="40"  alt=""/>
        </td>   

    <td width="25%">Nota de Venta Nro:</td>
      <td width="15%">
        <div>.</div>
      </td>
   <tr>
      <td colspan="2">La Molina, '.$fecha.'</td>
        <div>.</div>
      </td>
    </tr>		
  </table>
  
  <table class="smallfont" width="100%" cellpadding="2">
    
    <tr>
      <td colspan="5">
        <div></div>
      </td>
    </tr>
    <tr>
      <td colspan="5">
      </td>
    </tr>
    
    <tr>
      <td colspan="5">
      </td>
    </tr>
    <tr>
      <td width="25%">
        <div><strong>Nombre/Razón Social : </strong></div>
      </td>
      <td width="75%">
        <div>'.$user->legal_name.'
        </div>
      </td>
    </tr>
    <tr>
      <td width="25%">
        <div><strong>RUC :  </strong></div>
      </td>
      <td width="75%">
        <div>'.$user->ruc.'
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="5">
      </td>
    </tr>
    <tr>
      <td width="25%">
        <div><strong>Dirección :</strong></div>
      </td>
      <td width="75%">
        <div>'.$user->address.'
        </div>
      </td>
    </tr>       
  </table>
  
  
   <table class="smallfont" width="100%" cellpadding="2">
    
    <tr>
      <td colspan="5">
        <div>PROGRAMA ESPECIAL DE LA AUTORIDAD EN SEMILLAS (PEAS) - DEA</div>
      </td>
    </tr>
          
  </table>  
  <div >
  
  <div>	
   <table class="thintable smallfont" width="100%" cellpadding="0">    
    <tr>
      <td width="12%" align="center" bgcolor="#CCCCCC" class="thin">
        <div><strong>Cantidad</strong></div></td>
      <td width="12%" align="center" bgcolor="#CCCCCC" class="thin">
       <div><strong>Unidad de Medida</strong></div>
      </td>
      <td width="52%" align="center" bgcolor="#CCCCCC" class="thin">
       <div><strong>Descripción</strong></div>
      </td>
      <td width="12%" align="center" bgcolor="#CCCCCC" class="thin">
       <div><strong>Precio Unitario</strong></div>
      </td>
      <td width="12%" align="center" bgcolor="#CCCCCC" class="thin">
        <div><strong>Importe Total</strong></div>
      </td>
    </tr>
    ';
    
    foreach($payments as $payment){
     
      $html.='
    <tr>
      <td class="thin" width="12%">
        <div>'.$payment->quantity.'</div>
        </td>
      <td class="thin" width="12%">
        <div>'.$payment->concept->unidad.'</div>
      </td>
      <td class="thin" width="52%">
        <div>'.$payment->descripcion.' de Arroz</div>
      </td>
      <td class="thin" width="12%">
        <div>'.$payment->price.'</div>
      </td>
      <td class="thin" width="12%">
        <div>'.$payment->total.'</div>
      </td>
    </tr>';
      }
      
    $html.='	
       <tr>
      <td width="12%">
        </td>
      <td width="12%">
      </td>
      <td width="52%">
      </td>
      <td class="thin" width="12%">
        <div><strong>Total (S/.)</strong></div>
      </td>
      <td class="thin" width="12%">
        <div>.</div>
      </td>
    </tr>		
  </table>
  </div>
  <table width="100%" cellpadding="2">         
      <tr>
      	<td class="bigfont" width="100%">
         <p><strong>Nota: </strong></p>
         <p><blockquote>Todo pago por los servicios del INIA como Autoridad en Semillas, deberá ser depositado en soles a la Cta. Cte. 0000-282510 del Banco de la Nación y adjuntar el original de la boleta de depósito. <br>
         <blockquote>También podrá realizarse el pago en efectivo en Tesorería - Sede Central.
        </p></td>        
   </tr>
   </table>
   
  </div>
  
</body>
</html>
';


$mpdf=new mPDF('UTF-8','A4',0,'',15,15, 5,12,5,7);
//$mpdf=new mPDF('UTF-8','A5-L',0,'',15,15, 5,12,5,7,'L');

$mpdf->WriteHTML($html);
$mpdf->Output('Ficha-Contrato-'.$model->id.'.pdf','D');
exit;
?>

