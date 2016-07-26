<?php
$pdf = Yii::createComponent('application.extensions.MPDF56.mpdf');

$html='
<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />

<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->id.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> '.$model->to.'</td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> '.$model->status_id.'</td></tr>
</table>

';
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
$mpdf->WriteHTML($html);
$mpdf->Output('Ficha-Contrato-'.$model->id.'.pdf','D');
exit;
?>