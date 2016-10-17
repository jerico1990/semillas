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
			<strong>INFORME TÉCNICO Nro ____ - ____ - INIA - ____</strong></div></td>
	  </tr>
      <tr>
			<td colspan="3" align="center"><div><br></div></td>
	  </tr>
	</table>
	<table width="100%" cellpadding="2">
        <tr>
            <td width="5%"><div>Señor</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="90%"><div>'.$model->usera->legal_name.'</div></td>    
        </tr>
        <tr>
            <td width="5%"><div>Asunto</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="90%"><div>'.$model->usera->legal_name.'</div></td>    
        </tr>
        <tr>
            <td width="5%"><div>Referencia</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="90%"><div>Realización de la primera inspección a campo de multiplicación</div></td>    
        </tr>
        <tr>
            <td width="5%"><div>Fecha</div></td>
            <td width="5%"><div>:</div></td>    
            <td width="90%"><div>Realización de la primera inspección a campo de multiplicación</div></td>    
        </tr>
    </table>
	<table width="100%" cellpadding="2">
		<tr>
    		<td colspan="20"><div>I. Antecedentes</div></td>
		</tr>
	    <tr>
    		<td width="5%"><div>1.</div></td>
     		<td width="95%"><div>El Reglamento de Certificación de Semillas, aprobado mediante Decreto Supremo Nº 024-2005-AG, establece las disposiciones conforme a las cuales se efectúa el proceso de certificación de semillas, de conformidad con la Ley N° 27262, Ley General de Semillas y su Reglamento General, aprobado mediante Decreto Supremo Nº 040-2001-AG.</div></td>
		</tr> 
	    <tr>          
        <td width="5%"><div>2.</div></td>
     		<td width="95%"><div>El Reglamento Específico de Semillas de ________. aprobado mediante _______, establece las épocas formas y condiciones para la ejecución de las inspecciones que corresponden al proceso de certificación de semillas de la especie, las cuales son de cumplimiento obligatorio por parte de los interesados en obtener la certificación de semillas.</div></td>
		</tr>
    	    <tr>          
        <td width="5%"><div>3.</div></td>
     		<td width="95%"><div>Mediante el expediente Nº ________ el productor de semillas ________, solicita la certificación de semillas de________</div></td>
		</tr>
    <tr>
    		<td colspan="20"><div></div></td>
		</tr>
     </table>
	<table width="100%" cellpadding="2">
    <tr>
    		<td colspan="20"><div>II. Analisis</div></td>        
		</tr>
	 <tr>          
        <td width="5%"><div>1.</div></td>
     		<td width="95%"><div>Datos generales del solicitante</div></td>
		</tr>
     <tr>          
        <td width="5%"><div></div></td>
     		<td width="95%">
        <table width="100%" cellpadding="2" cellspacing="5">
              <tr>
                  <td class="top smallfont" width="20%" ><div >Tipo Razón Social</div></td>
                  <td class="top smallfont" colspan="3" ><div>Razón Social</div></td>
                  <td class="top smallfont" width="20%"><div>Nº Registro</div></td>
              </tr>
              <tr>
                  <td class="bottom bigfont" width="20%"><div>'.$model->usera->legal_name.'</div></td>
                  <td class="bottom bigfont" colspan="3"><div>'.$model->usera->legal_name.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$model->usera->registry.'</div></td>
              </tr>
              <tr>
                  <td class="top smallfont" width="20%"><div>Apellido Paterno</div></td>
                  <td class="top smallfont" width="20%"><div>Apellido Materno</div></td>
                  <td class="top smallfont" colspan="2"><div>Nombres(s)</div></td>
                  <td class="top smallfont" width="20%"><div>Nº DNI</div></td>
              </tr>
              <tr>
                  <td class="bottom bigfont" width="20%"><div>'.$model->usera->first_name.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$model->usera->last_name.'</div></td>
                  <td class="bottom bigfont" colspan="2"><div>'.$model->usera->name.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$model->usera->document_number.'</div></td>
              </tr>
              <tr>
                  <td class="top smallfont" colspan="2"><div>Domicilio Legal</div></td>
                  <td class="top smallfont" width="20%"><div>Departamento</div></td>
                  <td class="top smallfont" width="20%"><div>Provincia</div></td>
                  <td class="top smallfont" width="20%"><div>Distrito</div></td>
              </tr>
              <tr>
                  <td class="bottom bigfont" colspan="2"><div>'.$model->usera->address.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$location->department.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$location->province.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$location->district.'</div></td>
              </tr>
              <tr>
                  <td class="top smallfont" colspan="2"><div>Referencia Direccion</div></td>
                  <td class="top smallfont" width="20%"><div>Telefono</div></td>
                  <td class="top smallfont" width="20%"><div>Fax</div></td>
                  <td class="top smallfont" width="20%"><div>Correo Electronico</div></td>
              </tr>
              <tr>
                  <td class="bottom bigfont" colspan="2"><div>'.$model->usera->reference.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$model->usera->phone.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$model->usera->fax.'</div></td>
                  <td class="bottom bigfont" width="20%"><div>'.$model->usera->email.'</div></td>
              </tr>
              </table>
        		
        
        
        
        </td>
		</tr>
    </table>
	<table width="100%" cellpadding="2">
    <tr>          
        <td width="5%"><div>2.</div></td>
     		<td width="95%"><div>Alcance de certificación de las semillas:</div></td>
		</tr>
     <tr>          
        <td width="5%"><div></div></td>
     		<td width="95%"><div>
        	<table width="100%" cellpadding="2">           
            <tr>
                <td class="top smallfont" width="20%"><div>Cultivo/Especie</div></td>
                <td class="top smallfont" width="20%"><div>Cultivar</div></td>
                <td class="top smallfont" width="20%"><div>Categoría</div></td>    
                <td class="top smallfont" width="20%"><div>Nro de Lote</div></td>
            </tr>
            <tr>
                <td class="bottom bigfont" width="20%"><div>'.$model->crop->name.'</div></td>
                <td class="bottom bigfont" width="20%"><div>'.$model->variety->name.'</div></td>
                <td class="bottom bigfont" width="20%"><div>'.$categoria->descripcion.'</div></td>
                <td class="bottom bigfont" width="20%"><div>.</div></td>
            </tr>
            <tr>
                <td class="top smallfont" width="20%"><div>Nro de envases</div></td>
                <td class="top smallfont" width="20%"><div>Peso (Kg.) o Nro semillas / envase</div></td>
                <td class="top smallfont" width="20%"><div>Peso Total (Kg.)</div></td>
            </tr>
            <tr>
                <td class="bottom bigfont" width="20%"><div>'.$model->crop->name.'</div></td>
                <td class="bottom bigfont" width="20%"><div>'.$model->variety->name.'</div></td>
                <td class="bottom bigfont" width="20%"><div>'.$categoria->descripcion.'</div></td>
            </tr>
            </table>        
        </div></td>
		</tr>
     </table>
	<table width="100%" cellpadding="2">
    <tr>          
        <td width="5%"><div>3.</div></td>
     		<td width="95%"><div>Requisitos evaluados y folios en los que se encuentran los documentos que acreditan su cumplimiento:</div></td>
		</tr>
    <tr>          
        <td width="5%"><div></div></td>
     		<td width="95%">
        <table width="100%" cellpadding="2">                    
            <tr>
                <td class="top smallfont" colspan="2"><div>Requisito</div></td>
                <td class="top smallfont" colspan="2"><div>Documento(s)</div></td>
                <td class="top smallfont" width="20%"><div>Folio(s)</div></td>
            </tr>
            <tr>
                <td class="top bigfont" colspan="5"><div>Inspecciones de campo</div></td>
            </tr>
            <tr>
                <td class="bottom smallfont" colspan="2"><div>&nbsp;</div></td>
                <td class="bottom smallfont" colspan="2"><div>&nbsp;</div></td>
                <td class="bottom smallfont" width="20%"><div>&nbsp;</div></td>
            </tr>
             <tr>
                <td class="top bigfont" colspan="5"><div>Observación (cuando corresponda)</div></td>
            </tr>
            <tr>
                <td class="bottom smallfont" colspan="2"><div>&nbsp;</div></td>
                <td class="bottom smallfont" colspan="2"><div>&nbsp;</div></td>
                <td class="bottom smallfont" width="20%"><div>&nbsp;</div></td>
            </tr>
                        <tr>
                <td class="top bigfont" colspan="5"><div>Inspección(es) de acondicionamiento</div></td>
            </tr>
            <tr>
                <td class="bottom smallfont" colspan="2"><div>&nbsp;</div></td>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" width="20%"><div></div></td>
            </tr>
                        <tr>
                <td class="top bigfont" colspan="5"><div>Observación (cuando corresponda)</div></td>
            </tr>
            <tr>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" width="20%"><div></div></td>
            </tr>
                        <tr>
                <td class="top bigfont" colspan="5"><div>Análisis de semillas (cuando corresponda)</div></td>
            </tr>
            <tr>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" width="20%"><div></div></td>
            </tr>
                        <tr>
                <td class="top bigfont" colspan="5"><div>Observación (cuando corresponda)</div></td>
            </tr>
            <tr>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" width="20%"><div></div></td>
            </tr>
            
                        <tr>
                <td class="top bigfont" colspan="5"><div>Otras observaciones (cuando corresponda)</div></td>
            </tr>
            <tr>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" colspan="2"><div></div></td>
                <td class="bottom smallfont" width="20%"><div></div></td>
            </tr>
            </table>
        
        </td>
	 </tr>
    <tr>
    		<td colspan="20"><div></div></td>
		</tr>
     </table>
	<table width="100%" cellpadding="2">
    <tr>
    		<td colspan="20"><div>III. Conclusiones</div></td>        
		</tr>
	 <tr>          
        <td width="5%"><div>1.</div></td>
     		<td width="95%"><div>1.	De acuerdo a la evaluación de lo actuado en atención al expediente Nº ________ conformado por ________ folios y los documentos que lo respaldan, el lote de semillas Nº ________ cuya certificación ha sido solicitada por el productor  de semillas ________, con N° ________; ________ (cumple/no cumple) con los requisitos que establece la legislación vigente en semillas para la certificación de semillas de la especie ________.</div></td>
		</tr>
    <tr>          
        <td width="5%"><div>2.</div></td>
     		<td width="95%"><div>Por lo antes expuesto, se opina …………………….(procedente/improcedente) otorgar la certificación de semillas al lote de semillas cuyas características se mencionan en el alcance de certificación.</div></td>
		</tr>
    <tr>          
        <td width="5%"><div>3.</div></td>
     		<td width="95%"><div>Requisitos evaluados y folios en los que se encuentran los documentos que acreditan su cumplimiento:</div></td>
		</tr>
    
        
     </table>
     
     
     
	<table width="100%" cellpadding="2">
		<tr>
    		<td width="100%"><div class="tab">
    		 <div align="justify">Es todo cuanto se informa, para su conocimiento y fines que estime conveniente.</div>
    		</div></td>
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
                    <td width="60%"><div align="center"><img src="'.Yii::app()->getBaseUrl(true).'/images/form_header.png" width="437" height="40"  alt=""/></div></td>
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;"></td>
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
                    <td width="20%" style="font-size: 0.8em; text-align: center; font-weight: bold;">Exp Nro: 12341234</td>
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