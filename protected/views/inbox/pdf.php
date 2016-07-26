<?php
$pdf = Yii::createComponent('application.extensions.MPDF56.mpdf');

$html='
<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />

<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>


<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>

<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<table id="yw0" class="detail-view2 " style="width:10000px;outline:1px solid black;">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>
<tr class="odd"><td> <b>N° Control</b> </td><td> '.$model->category.'</td></tr>
<tr class="odd"><td> <b>Nombre Estado</b> </td></tr>
<tr class="even"><td> <b>Empresa</b> </td><td> </td></tr>
<tr class="odd"><td> <b>Personal Actuante</b> </td><td> </td></tr>
</table>
<form method="post" action=""> <br>
First Name:<input type="text" size="12" maxlength="12" name="Fname"> <br>
Last Name:<input type="text" size="12" maxlength="36" name="Lname"> <br>
Gender:<br>
Male:<input type="radio" value="Male" name="gender"><br>
Female:<input type="radio" value="Female" name="gender"><br>
Favorite Food:<br>
Steak:<input type="checkbox" value="Steak" name="food[]"><br>
Pizza:<input type="checkbox" value="Pizza" name="food[]"><br>
Chicken:<input type="checkbox" value="Chicken" name="food[]"><br>
<textarea rows="5" name="quote" cols="20" wrap="physical">Enter your favorite quote!</textarea><br>
Select a Level of Education:<br>
<select name="education">
<option value="Jr.High">Jr.High</option>
<option value="HighSchool">HighSchool</option>
<option value="College">College</option></select><br>
Select your favorite time of day:<br>
<select name="TofD" size="3">
<option value="Morning">Morning</option>
<option value="Day">Day</option>
<option value="Night">Night</option></select>
</form>



';
$mpdf=new mPDF('UTF-8','A4','','',15,15,25,12,5,7);
$mpdf->WriteHTML($html);
$mpdf->Output('Ficha-Contrato-'.$model->id.'.pdf','D');



$mpdf=new mPDF('win-1252','A4','','',20,15,48,25,10,10); 
$mpdf->useOnlyCoreFonts = true;    // false is default
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Acme Trading Co. - Invoice");
$mpdf->SetAuthor("Acme Trading Co.");
$mpdf->SetWatermarkText("Paid");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$html = '
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
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB;"><span style="font-weight: bold; font-size: 14pt;">Acme Trading Co.</span><br />123 Anystreet<br />Your City<br />GD12 4LP<br /><span style="font-size: 15pt;">&#9742;</span> 01777 123 567</td>
<td width="50%" style="text-align: right;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">0012345</span></td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

<div style="text-align: right">Date: '.date('jS F Y').'</div>

<table width="100%" style="font-family: serif;" cellpadding="10">
<tr>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
</tr>
</table>


<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="8">
<thead>
<tr>
<td width="15%">REF. NO.</td>
<td width="10%">QUANTITY</td>
<td width="45%">DESCRIPTION</td>
<td width="15%">UNIT PRICE</td>
<td width="15%">AMOUNT</td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal" colspan="3" rowspan="6"></td>
<td class="totals">Subtotal:</td>
<td class="totals">&pound;1825.60</td>
</tr>
<tr>
<td class="totals">Tax:</td>
<td class="totals">&pound;18.25</td>
</tr>
<tr>
<td class="totals">Shipping:</td>
<td class="totals">&pound;42.56</td>
</tr>
<tr>
<td class="totals"><b>TOTAL:</b></td>
<td class="totals"><b>&pound;1882.56</b></td>
</tr>
<tr>
<td class="totals">Deposit:</td>
<td class="totals">&pound;100.00</td>
</tr>
<tr>
<td class="totals"><b>Balance due:</b></td>
<td class="totals"><b>&pound;1782.56</b></td>
</tr>
</tbody>
</table>
<div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>
</body>
</html>
';

$mpdf->WriteHTML($html);

$mpdf->Output(); exit;



?>



