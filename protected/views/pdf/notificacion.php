<?php

if($identificador==1){
   $inbox=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
                            array(':form_id'=>$model->id,':status_id'=>4));
}
elseif($identificador==2)
{
   $inbox=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
                            array(':form_id'=>$model->id,':status_id'=>5));
}

$status=Status::model()->find('id=:id',array(':id'=>$inbox->status_id));

$organismoCertificador=Headquarter::model()->find('id=:id',array(':id'=>$model->headquarter_id));
$width="437px";
$height="40px";
$img="form_header.png";

$logo=User::model()->find('ruc=:ruc',array(':ruc'=>$organismoCertificador->ruc));
$img_logo="logos/".$logo->avatar;
/*
if($logo)
{
    $width="200px";
    $height="60";
}
*/
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
    <table width="100%" cellpadding="2">
	<tr>
	    <td colspan="3" align="center"><div><br><strong>Notificacion de revisión de Solicitud</strong></div></td>
	</tr>
	<tr>
	    <td colspan="3" align="center"><div><br></div></td>
	</tr>
	</table>
	<table width="100%" cellpadding="2">
        <tr>
            <td width="15%"><div>Productor de Semilla</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="80%"><div>'.$model->usera->legal_name.'</div></td>    
        </tr>
        <tr>
            <td width="15%"><div>N° de Registro</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="80%"><div>'.$model->usera->registry.'</div></td>    
        </tr>
        <tr>
            <td width="15%"><div>Fecha</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="80%"><div>'.date('d-m-Y').'</div></td>    
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
    		 <div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Se le notifica que su solicitud de Inscripción de Campo de Multiplicación de Semillas ha sido ';
           switch($status->id)
           {
               case(4):
                  $html.="Admitida";
               break;
               case(5):
                  $html.="Rechazado";
               break;
               case(6):
                  $html.="Observado";
               break;
           }
          $html.=' al ';
          switch($status->id)
           {
               case(4):
                  $html.="Cumplir";
               break;
               case(5):
                  $html.="No cumplir";
               break;
               case(6):
                  $html.="No cumplir";
               break;
           }
          $html.=' con los requisitos de la etapa de verificación preliminar (Articulo 17° DS 024-2005-AG).</div>
    		</div></td>
		</tr>
		<tr>
		    <td width="100%"><div ></div></td>
		</tr>';
		
        $html.='<tr>
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
                    <td width="60%"><div align="center"><img src="'.Yii::app()->getBaseUrl(true).'/images/'.$img.'"   alt=""/><img src="'.Yii::app()->getBaseUrl(true).'/images/'.$img_logo.'"   alt=""/></div></td>
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