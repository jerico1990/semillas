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


.tab{text-indent: 1.5em}

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
<!--<div style="text-align: center; font-style: italic;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="bigfont" width="50%"><p><strong>Comité Regional de Semillas de San Martín</strong> </p>
      <p>R.J. Nro 134-2006-AG-SENASA</p></td>
      <td width="15%">.</td>
      <td width="35%" bgcolor="#FFFFFF" class="bigfont"></td>
    </tr>
    <tr>
      <td class="smallfont" width="50%">
        <p>Jr. Martinez de Compagñon Nro 1035-Tarapoto      </p>
      <p>Telefax (042)-52228881 | email:corese_sm@speedy.com.pe</p></td>
      <td width="15%"></td>
      <td width="35%"></td>
    </tr>
    </table>
</div> --> 
</head>
<body>
	<table width="100%" cellpadding="2">
		<tr>
			<td colspan="3" align="center"><div><br>
			<strong>Notificacion para la realización de muestreo de semillas</strong></div></td>
	  </tr>
      <tr>
			<td colspan="3" align="center"><div><br></div></td>
	  </tr>
	</table>
	<table width="100%" cellpadding="2">
        <tr>
            <td width="5%"><div>Para</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="90%"><div>'.$model->usera->legal_name.'</div></td>    
        </tr>
        <tr>
            <td width="5%"><div>Fecha</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="90%"><div>'.$model->usera->legal_name.'</div></td>    
        </tr>
        <tr>
            <td width="5%"><div>Asunto</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="90%"><div>Realización de muestreo de semillas del lote</div></td>    
        </tr>
    </table>
	<table width="100%" cellpadding="2">
		<tr>
		    <td width="100%"><div ></div></td>
        </tr>
	    <tr>
    		<td width="100%"><div ></div></td>
		</tr>
		<tr>
    		<td width="100%"><div class="tab">
    		 <div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por la presente, le comunicamos que el muestreo de semillas de Trigo con Lote Nro. andi-02-12, se realizara en día 12/11/2012 a horas 10:20 am. Por lo que deberá estar presente usted o un representante y cuando corresponda el agricultor multiplicador, en su planta de acondicionamiento a fin de cumplir con la inspección programada, en cumplimiento al artículo 19 del Reglamento Técnico de Certificación de Semillas (DS Nro. 033-2005-AG).</div>
    		</div></td>
		</tr>
		<tr>
		    <td width="100%"><div ></div></td>
		</tr>		
		<tr>
		    <td width="100%"><div ></div></td>
		</tr>
        <tr>
            <td width="100%"><div class="tab">
             <div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sin otro particular es propicia la oportunidad para expresarle las consideraciones de mi estima personal.</div>
            </div></td>
        </tr>
        <tr>
            <td width="100%"><div ></div></td>
        </tr>
        <tr>
            <td width="100%" class="tab"> Atentamente </td>
		</tr>
	</table>	
</div>
<div align="center">
<br><br><br><br>______________________________
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