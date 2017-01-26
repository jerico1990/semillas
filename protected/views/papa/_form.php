<div class="form well span12" style="background: #FFFFFF">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm');?>

    <div class="row-fluid">
	<div class="span12"><h4>Campo de Multiplicación</h4></div>      
    </div> 
    <div class="row-fluid">
	<div class="span3">
	    <label for="Inspection_size">Area(m2)</label>
	    <input class="papa span12" name="Inspection[size]" id="Inspection_size" type="text" maxlength="18">
	</div>
	<div class="span9">
	    <label for="Inspection_papa_fecha_siembra">Fecha Siembra</label>
	    <input class="papa_fecha" type="text" autocomplete="off" name="Inspection[papa_fecha_siembra]" id="Inspection_papa_fecha_siembra">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Aislamiento</h4></div>      
    </div> 
    <div class="row-fluid">
	<div class="span4">
	    <label for="Inspection_papa_campo_comercial">Campo Comercial (m)</label>
	    <input class="papa span12" maxlength="18" name="Inspection[papa_campo_comercial]" id="Inspection_papa_campo_comercial" type="text">
	</div>
	<div class="span4">
	    <label for="Inspection_papa_otra_especie">Otra Especies (m)</label>
	    <input class="papa span12" maxlength="18" name="Inspection[papa_otra_especie]" id="Inspection_papa_otra_especie" type="text">
	</div>
	<div class="span4">
	    <label for="Inspection_papa_otro_cultivar">Otro Cultivar (m)</label>
	    <input class="papa span12" maxlength="18" name="Inspection[papa_otro_cultivar]" id="Inspection_papa_otro_cultivar" type="text">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12" >			
	    <table width="744" height="344" border="1px">
		<tr>
		    <td colspan="7">PLAGAS EN EL CULTIVO</td>
		</tr>
		<tr>
		    <td width="223" rowspan="2">Plagas</td>
		    <td width="125" rowspan="2">Factor Importancia</td>
		    <td width="26" rowspan="2">Por</td>
		    <td height="29" colspan="2">Evaluación</td>
		</tr>
		<tr>
		    <td width="123" height="28">%PI. Afectadas</td>
		    <td width="58">Puntos</td>
		</tr>
		<tr>
		    <td>Enrollamiento (PLRV) y  Mozaico Severo (PYV)</td>
		    <td align="right">10</td>
		    <td>X</td>
		    <td>
			<label for="Inspection_afectadas_enrollamiento"></label>
			<input class="papa span12" name="Inspection[afectadas_enrollamiento]" id="Inspection_afectadas_enrollamiento" type="text" maxlength="18">
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Mozaico suave (PVS y PVX) y Rhizoctonia</td>
		    <td>4</td>
		    <td>X</td>
		    <td>
			<label for="Inspection_afectadas_mozaico"></label>
			<input class="papa span12" name="Inspection[afectadas_mozaico]" id="Inspection_afectadas_mozaico" type="text" maxlength="18">
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Otros virus</td>
		    <td>2</td>
		    <td>X</td>
		    <td>
			<label for="Inspection_afectadas_otros_virus"></label>
			<input class="papa span12" name="Inspection[afectadas_otros_virus]" id="Inspection_afectadas_otros_virus" type="text" maxlength="18">
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Erwinia</td>
		    <td>6</td>
		    <td>X</td>
		    <td>
			<label for="Inspection_afectadas_erwinia"></label>
			<input class="papa span12" name="Inspection[afectadas_erwinia]" id="Inspection_afectadas_erwinia" type="text" maxlength="18">
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Mezcla</td>
		    <td>1</td>
		    <td>X</td>
		    <td>
			<label for="Inspection_afectadas_mezclas"></label>
			<input class="papa span12" name="Inspection[afectadas_mezclas]" id="Inspection_afectadas_mezclas" type="text" maxlength="18">
		    </td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td height="29" colspan="3">&nbsp;</td>
		    <td>Total</td>
		    <td>&nbsp;</td>
		</tr>
            </table>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Puntaje Máximo de Tolerancia</h4></div>      
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <b><u>Categoria de semilla</u></b><br>
	    Certificada o Autorizada<br>
	    Registrada<br>
	    Básica
	</div>
	<div class="span4">
	    <b><u>Puntaje Límite(1ra Insp.)</u></b><br>
	    150<br>
	    100<br>
	    60
	</div>
	<div class="span4">
	    <b><u>Puntaje Límite(2da Insp.)</u></b><br>
	    80<br>
	    60<br>
	    30	
	</div>
    </div>
      
    <div class="row-fluid">
	<div class="span12"><h4>Enfermedades que no se permiten</h4></div>      
    </div> 
    <div class="row-fluid">
	<div class="span12">	 
	    <b><u>Virus de Amarillamiento de las venas de la papa</u></b><br>			  
	    - No debe existir ninguna planta con sintomalogia del virus
	    - En caso de detectarse plantas con sintomalogía, el campo será rechazado como semillero e inspeccionar todo el <br>
	      campo, determinando el grado de incidencia y notificar al SENASA de la juridicción.<br>
	    Marchitez bacteriana.....
	</div>
    </div>		  
    <div class="row-fluid">
	<div class="span12"><h4>Observaciones </h4></div>      
    </div> 
    <div class="row-fluid">
	<div class="span12">
	    <label for="Inspection_observaciones"> </label>
	    <textarea class="papa span12" maxlength="300" rows="6" name="Inspection[observaciones]" id="Inspection_observaciones"></textarea>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12">
	    <div class="form-actions">
		<div class="span4">
		<!--Aprobado-->
		    <button id="btn_apro" class="btn btn-success span12" data-toggle="modal">Cumple</button>
		    <input name="Inspection[y01]" id="hidden" type="hidden">
		<!--Fin de Aprobado-->	
		</div>
		<div class="span4">
		<!--Condicional-->
		    <button id="btn_condi"  class="btn btn-primary span12" data-toggle="modal">condicional</button>
		<!--Fin de Condicional-->
		</div>
		<!--Boton de No cumples-->
		<div class="span4">
		    <button id="btn_recha"  class="btn btn-danger span12" >No cumple</button>
		</div>
	    </div>
	</div>
    </div>
    <!--Botones-->
    <!--Aprobado-->
    <div id="myModal_acond_apro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >	
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h4 id="myModalLabel">Pasar a Inspeccion de Acondicionamiento</h4>
	</div>
	<div class="modal-body">
	    <p>
		<div class="form">
		    <div class="row-fluid">
			<div class="span5">Continuar con la Inspección de</div>
			<div class="span7">
			    <select class="validar" name="Inspection[select_id]" id="Inspection_select_id">
				<option value>Seleccionar</option>
				<option value="1">Acondicionamiento</option>
				<option value="2">Campo</option>
			    </select>
			</div>
		    </div>
		    <div class="row-fluid">
			<div class="span5">Fecha propuesta</div>
			<div class="span7">
			    <input type="date" name="Inspection[aprobado_fecha_propuesta]" id="Inspection_aprobado_fecha_propuesta">
			</div>
		    </div>
		</div><!-- form -->
	    </p>
	</div>
	<div class="modal-footer">
	    <button id="btn_enviar_aprobado" class="btn btn-primary">Enviar</button>
	</div>
    </div>
    <!--Boton Condicional-->	
    <div id="myModal_acond_conda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h4 id="myModalLabel">Fecha sugerida de Subsanación</h4>
	</div>
	<div class="modal-body">
	    <p>
		<label for="Inspection_subsanacion_date">Subsanación Fecha</label>
		<input type="date" name="Inspection[subsanacion_date]" id="Inspection_subsanacion_date">
	    </p>
	</div>
	<div class="modal-footer">
	    <button id="btn_enviar_condicional" class="btn btn-primary">Enviar</button>			
	</div>
    </div>
    <!--Boton Rechazado-->
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php
    $cumple=CController::createUrl('inspection/rechazado');
    $condicional=CController::createUrl('inspection/condicional');
    $no_cumple=CController::createUrl('inspection/rechazado');
?>
<script>
	//Fecha Formato
	$('.papa_fecha').datepicker({
	    format: 'dd-mm-yyyy',    
	})
	$('.papa_fecha').datepicker()
	.on('changeDate', function(ev){		
		$('#Inspection_afectadas_mezclas').trigger('keyup');

	});
	$('.papa').on('blur', function(){
		$('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
		$('#Inspection_papa_campo_comercial').val(numeral($('#Inspection_papa_campo_comercial').val()).format('0,0.00'));
		$('#Inspection_papa_otra_especie').val(numeral($('#Inspection_papa_otra_especie').val()).format('0,0.00'));
		$('#Inspection_papa_otro_cultivar').val(numeral($('#Inspection_papa_otro_cultivar').val()).format('0,0.00'));
		$('#Inspection_afectadas_enrollamiento').val(numeral($('#Inspection_afectadas_enrollamiento').val()).format('0,0.00'));
		$('#Inspection_afectadas_mozaico').val(numeral($('#Inspection_afectadas_mozaico').val()).format('0,0.00'));
		$('#Inspection_afectadas_otros_virus').val(numeral($('#Inspection_afectadas_otros_virus').val()).format('0,0.00'));
		$('#Inspection_afectadas_erwinia').val(numeral($('#Inspection_afectadas_erwinia').val()).format('0,0.00'));
		$('#Inspection_afectadas_mezclas').val(numeral($('#Inspection_afectadas_mezclas').val()).format('0,0.00'));	
	})
	
	$('#btn_apro').on('click', function(){
	    var error='';
	    if ($('#Inspection_size').val()=='') {
		error=error+'Debe ingresar Area(m2)<br>';
	    }
	    if ($('#Inspection_papa_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_papa_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_papa_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especies (m)<br>';
	    }
	    if ($('#Inspection_papa_otro_cultivar').val()=='') {
		error=error+'Debe ingresar la Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_afectadas_enrollamiento').val()=='') {
		error=error+'Debe ingresar el Enrollamiento (PLRV) y Mozaico Severo (PYV)<br>';
	    }
	    if ($('#Inspection_afectadas_mozaico').val()=='') {
		error=error+'Debe ingresar el Mozaico suave (PVS y PVX) y Rhizoctonia<br>';
	    }
	    if ($('#Inspection_afectadas_otros_virus').val()=='') {
		error=error+'Debe ingresar Otros virus<br>';
	    }
	    if ($('#Inspection_afectadas_erwinia').val()=='') {
		error=error+'Debe ingresar el Erwinia<br>';
	    }
	    if ($('#Inspection_afectadas_mezclas').val()=='') {
		error=error+'Debe ingresar Mezcla<br>';
	    }
	    
	    
	    if ($('#Inspection_observaciones').val()=='') {
		error=error+'Debe ingresar los resultados<br>';
	    }
	    if (error!='') {
		//alert(error);
		$('#error').html(error);
		return false;
	    }
	    $('#myModal_acond_apro').modal('show');
	    return true;
	});
	
	$('#btn_condi').on('click', function(){
	    var error='';
	    if ($('#Inspection_size').val()=='') {
		error=error+'Debe ingresar Area(m2)<br>';
	    }
	    if ($('#Inspection_papa_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_papa_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_papa_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especies (m)<br>';
	    }
	    if ($('#Inspection_papa_otro_cultivar').val()=='') {
		error=error+'Debe ingresar la Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_afectadas_enrollamiento').val()=='') {
		error=error+'Debe ingresar el Enrollamiento (PLRV) y Mozaico Severo (PYV)<br>';
	    }
	    if ($('#Inspection_afectadas_mozaico').val()=='') {
		error=error+'Debe ingresar el Mozaico suave (PVS y PVX) y Rhizoctonia<br>';
	    }
	    if ($('#Inspection_afectadas_otros_virus').val()=='') {
		error=error+'Debe ingresar Otros virus<br>';
	    }
	    if ($('#Inspection_afectadas_erwinia').val()=='') {
		error=error+'Debe ingresar el Erwinia<br>';
	    }
	    if ($('#Inspection_afectadas_mezclas').val()=='') {
		error=error+'Debe ingresar Mezcla<br>';
	    }
	    
	    
	    if ($('#Inspection_observaciones').val()=='') {
		error=error+'Debe ingresar los resultados<br>';
	    }
	    if (error!='') {
		//alert(error);
		$('#error').html(error);
		return false;
	    }
	    $('#myModal_acond_conda').modal('show');
	    return true;
	});
	
	
	$('#btn_recha').on('click', function(){
	    var error='';
	    if ($('#Inspection_size').val()=='') {
		error=error+'Debe ingresar Area(m2)<br>';
	    }
	    if ($('#Inspection_papa_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_papa_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_papa_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especies (m)<br>';
	    }
	    if ($('#Inspection_papa_otro_cultivar').val()=='') {
		error=error+'Debe ingresar la Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_afectadas_enrollamiento').val()=='') {
		error=error+'Debe ingresar el Enrollamiento (PLRV) y Mozaico Severo (PYV)<br>';
	    }
	    if ($('#Inspection_afectadas_mozaico').val()=='') {
		error=error+'Debe ingresar el Mozaico suave (PVS y PVX) y Rhizoctonia<br>';
	    }
	    if ($('#Inspection_afectadas_otros_virus').val()=='') {
		error=error+'Debe ingresar Otros virus<br>';
	    }
	    if ($('#Inspection_afectadas_erwinia').val()=='') {
		error=error+'Debe ingresar el Erwinia<br>';
	    }
	    if ($('#Inspection_afectadas_mezclas').val()=='') {
		error=error+'Debe ingresar Mezcla<br>';
	    }
	    
	    
	    if ($('#Inspection_observaciones').val()=='') {
		error=error+'Debe ingresar los resultados<br>';
	    }
	    if (error!='') {
		//alert(error);
		$('#error').html(error);
		return false;
	    }
	    
	    var txt;
	    var r = confirm("¿Estas seguro de que el informe no cumple?");
	    if (r == true) {
		$('#hidden').val(3);
		return true;
	    } else {
		return false;
	    }
	});
	
	$('#btn_enviar_aprobado').click(function(){
	    var error='';
	    if ($('#Inspection_aprobado_fecha_propuesta').val()=='') {
		error=error+'Debe ingresar la fecha propuesta\n';
	    }
	    if (error!='') {
		alert(error);
		return false;
	    }
	    
	    
	    var txt;
	    var r = confirm("¿Estas seguro de enviar la fecha sugerida?");
	    if (r == true) {
		$('#hidden').val(1);
		return true;
	    } else {
		return false;
	    }
	});
	
	$('#btn_enviar_condicional').click(function(){
	    var error='';
	    if ($('#Inspection_subsanacion_date').val()=='') {
		error=error+'Debe ingresar la fecha de subsanación\n';
	    }
	    if (error!='') {
		alert(error);
		return false;
	    }
	    
	    
	    var txt;
	    var r = confirm("¿Estas seguro de enviar la fecha de subsanación?");
	    if (r == true) {
		$('#hidden').val(2);
		return true;
	    } else {
		return false;
	    }
	});
</script>

