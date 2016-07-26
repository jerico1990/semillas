<?php
$pdf = Yii::createComponent('application.extensions.MPDF56.mpdf');

$html='
<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />

<table border="1" bordercolor="#FFFFFF" style="background-color:#FFFFFF" width="100%" cellpadding="3" cellspacing="3">
	<tr>
		<td colspan="4">REG-SEM 06-04</td>
	</tr>
        <tr>
		<td><IMG SRC="inia.png" WIDTH=178 HEIGHT=180 ></td>
		<td colspan="3">INFORME DE INSPECCION DE CAMPO DE MULTIPLICACION DE SEMILLAS DE ARROZ</td>
	</tr>
        <tr>
		<td  aling="rigth">Nro Expediente: SAMI-21-12</td>
		<td  aling="rigth">Nro Inspeccion:01</td>
                <td colspan="2" aling="rigth">Fecha: 16-05-12</td>
	</tr>
        <tr><td colspan="4">Productor de Semillas</td></tr>
	<tr>		
		<td colspan="2">Razon Social:INDUSTRIAS DE LAS SEMILLAS S.A.C.</td>
		<td colspan="2">N° Registro:037-2010-INIA</td>
	</tr>
	<tr><td colspan="4">Agricultor multiplicador</td></tr>
	<tr>		
		<td colspan="4">Nombre:INDUSEMILLAS</td>
	</tr>
        <tr><td colspan="4">Estado tecnologico del cultivo</td></tr>
	<tr>		
		<td colspan="2"><input type="checkbox" name="option1" value="Siembra"> Siembra Directa<br>
		<td colspan="2"><input type="checkbox" name="option2" value="Transplante" checked> Transplante</td></td>
	</tr>
        <tr><td colspan="4">Semilla</td></tr>
	<tr>		
		<td colspan="2">Cultivar:</td>
                <td colspan="2"> Categoria a producir:</td>
	</tr>
         <tr><td colspan="4">Campo de multiplicacion</td></tr>
	<tr>		
		<td colspan="2">Cultivo Anterior:</td>
                <td colspan="2">Cultivar Anterior:</td>
	</tr>
        <tr>		
		<td>Fecha de siembra:</td>
                <td>Fecha de almácigo:</td>
                <td>Fecha de trasplante :</td>
                <td colspan="2">
                Area instalada (ha) :<br/>
                Aislamiento (m)  :
                </td>
        </tr>
        <tr><td colspan="4">Resultado de Inspeccion</td></tr>
	<tr>		
		<td ><input type="checkbox" name="option1" value="Cumple"> Cumple</td>
                <td ><input type="checkbox" name="option2" value="Condicional"> Condicional</td>
                <td colspan="2"><input type="checkbox" name="option3" value="Ncumple"> No Cumple</td>
	</tr>
</table>



';
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
$mpdf->WriteHTML($html);
$mpdf->Output('Ficha-Contrato-'.$model->id.'.pdf','D');
exit;
?>