<div class="form well span12" style="background: #FFFFFF">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
    <div class="row-fluid">
	<div class="span12" id="error" style="color: red"></div>      
    </div> 
    <div class="row-fluid">
	<div class="span12"><h4>Campo de Multiplicación</h4></div>      
    </div> 
    <div class="row-fluid">
	<div class="span3">
	    <label for="Inspection_size">Area(m2)</label>
	    <input class="maiz span12" name="Inspection[size]" id="Inspection_size" type="text" maxlength="18">
	</div>
	<div class="span9">
	    <label for="Inspection_maiz_fecha_siembra">Fecha de Siembra</label>
	    <input class="maiz_fecha" type="text" autocomplete="off" name="Inspection[maiz_fecha_siembra]" id="Inspection_maiz_fecha_siembra">
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Etapa / Estado fenológico del cultivo</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Inspection_maiz_emergencia_fecha">Fecha de Emergencia</label>
		<input class="maiz_fecha" type="text" autocomplete="off" name="Inspection[maiz_emergencia_fecha]" id="Inspection_maiz_emergencia_fecha">
	    </div>
	    <div class="span8">
		<div class="row-fluid">
		    <div class="span6">
			<label for="Inspection_maiz_floracion">Floración (%)</label>
			<input size="18" maxlength="18" class="maiz span12" name="Inspection[maiz_floracion]" id="Inspection_maiz_floracion" type="text">
		    </div>
		    <div class="span6">
			<label for="Inspection_maiz_floracion_fecha">&nbsp</label>
			<input class="maiz_fecha" type="text" autocomplete="off" name="Inspection[maiz_floracion_fecha]" id="Inspection_maiz_floracion_fecha">
		    </div>
		</div>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span6 ">
		<label for="Inspection_maiz_llenado_grano">Llenado de Grano (%)</label>
		<input size="18" maxlength="18" class="maiz span12" name="Inspection[maiz_llenado_grano]" id="Inspection_maiz_llenado_grano" type="text">
	    </div>
	    <div class="span6 ">
		<label for="Inspection_maiz_fecha_cosecha">Fecha de Cosecha</label>
		<input class="maiz_fecha" type="text" autocomplete="off" name="Inspection[maiz_fecha_cosecha]" id="Inspection_maiz_fecha_cosecha">
	    </div>		
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Distancionamiento</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span6">
		<label for="Inspection_maiz_distanciamiento_surcos">Surcos (m)</label>
		<input size="18" maxlength="18" class="maiz span12" name="Inspection[maiz_distanciamiento_surcos]" id="Inspection_maiz_distanciamiento_surcos" type="text">
	    </div>
	    <div class="span6">
		<label for="Inspection_maiz_mata">Mata (m)</label>
		<input size="18" maxlength="18" class="maiz span12" name="Inspection[maiz_mata]" id="Inspection_maiz_mata" type="text">
	    </div>
	</div>
	
	<div class="row-fluid">
	    <div class="span12"><h4>Aislamiento</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Inspection_maiz_campo_comercial">Campo Comercial (m)</label>
		<input size="18" maxlength="18" class="maiz span12" name="Inspection[maiz_campo_comercial]" id="Inspection_maiz_campo_comercial" type="text">
	    </div>
	    <div class="span4">
		<label for="Inspection_maiz_otra_especie">Otra Especie (m)</label>
		<input size="18" maxlength="18" class="maiz span12" name="Inspection[maiz_otra_especie]" id="Inspection_maiz_otra_especie" type="text">
	    </div>
	    <div class="span4">
		<label for="Inspection_maiz_otro_cultivar">Otro Cultivar (m)</label>
		<input size="18" maxlength="18" class="maiz span12" name="Inspection[maiz_otro_cultivar]" id="Inspection_maiz_otro_cultivar" type="text">
	    </div>	
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Presencia</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span6">
		<label for="Inspection_maiz_presencia_maleza">De malezas</label>
		<textarea size="60" maxlength="300" class="maiz span12" rows="5" name="Inspection[maiz_presencia_maleza]" id="Inspection_maiz_presencia_maleza"></textarea>
	    </div>
	    <div class="span6">
		<label for="Inspection_maiz_presencia_plagas">De Plagas</label>
		<textarea size="60" maxlength="300" class="maiz span12" rows="5" name="Inspection[maiz_presencia_plagas]" id="Inspection_maiz_presencia_plagas"></textarea>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Plantas</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span6">
		<label for="Inspection_maiz_plantas_otras_especies">Otras Especies</label>
		<textarea size="60" maxlength="300" class="maiz span12" rows="5" name="Inspection[maiz_plantas_otras_especies]" id="Inspection_maiz_plantas_otras_especies"></textarea></div>
	    <div class="span6">
		<label for="Inspection_maiz_plantas_fuera_tipo">Fuera de Tipo</label>
		<textarea size="60" maxlength="300" class="maiz span12" rows="5" name="Inspection[maiz_plantas_fuera_tipo]" id="Inspection_maiz_plantas_fuera_tipo"></textarea></div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Datos</h4></div>      
	</div>
	<div class="row-fluid">		 
	    <div class="span12">
		<label for="Inspection_maiz_tolerancias">Tolerancias de Mazorcas</label>
		<input size="18" maxlength="18" class="maiz span12" name="Inspection[maiz_tolerancias]" id="Inspection_maiz_tolerancias" type="text">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Resultado</h4></div>      
	</div>
	<div class="row-fluid">		 
	    <div class="span12">
		<label for="Inspection_observaciones"> </label>
		<textarea size="60" maxlength="300" class="maiz span12" rows="5" name="Inspection[observaciones]" id="Inspection_observaciones"></textarea></div>
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
<!--Fin de botones-->
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
    $cumple=CController::createUrl('inspection/rechazado');
    $condicional=CController::createUrl('inspection/condicional');
    $no_cumple=CController::createUrl('inspection/rechazado');
?>
<script>
	
	//Fecha Formato
	$('.maiz_fecha').datepicker({
	    format: 'dd-mm-yyyy',    
	})
	$('.maiz_fecha').datepicker().on('changeDate', function(ev){		
	    $('#Inspection_size').trigger('keyup');
	});
	$('.maiz').on('blur', function(){
	    $('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
	    $('#Inspection_maiz_distanciamiento_surcos').val(numeral($('#Inspection_maiz_distanciamiento_surcos').val()).format('0,0.00'));
	    $('#Inspection_maiz_mata').val(numeral($('#Inspection_maiz_mata').val()).format('0,0.00'));
	    $('#Inspection_maiz_campo_comercial').val(numeral($('#Inspection_maiz_campo_comercial').val()).format('0,0.00'));
	    $('#Inspection_maiz_otra_especie').val(numeral($('#Inspection_maiz_otra_especie').val()).format('0,0.00'));
	    $('#Inspection_maiz_otro_cultivar').val(numeral($('#Inspection_maiz_otro_cultivar').val()).format('0,0.00'));
	    $('#Inspection_maiz_floracion').val(numeral($('#Inspection_maiz_floracion').val()).format('0,0.00'));
	    $('#Inspection_maiz_llenado_grano').val(numeral($('#Inspection_maiz_llenado_grano').val()).format('0,0.00'));
	})
	
	
	$('#btn_apro').on('click', function(){
	    var error='';
	    if ($('#Inspection_size').val()=='') {
		error=error+'Debe ingresar Area(m2)<br>';
	    }
	    if ($('#Inspection_maiz_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_maiz_emergencia_fecha').val()=='') {
		error=error+'Debe ingresar la fecha de emergencia<br>';
	    }
	    if ($('#Inspection_maiz_floracion').val()=='') {
		error=error+'Debe ingresar la Floración (%)<br>';
	    }
	    if ($('#Inspection_maiz_floracion_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Floración<br>';
	    }
	    if ($('#Inspection_maiz_llenado_grano').val()=='') {
		error=error+'Debe ingresar el % de Llenado de Grano<br>';
	    }
	    if ($('#Inspection_maiz_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Cosecha<br>';
	    }
	    if ($('#Inspection_maiz_distanciamiento_surcos').val()=='') {
		error=error+'Debe ingresar Surcos (m)<br>';
	    }
	    if ($('#Inspection_maiz_mata').val()=='') {
		error=error+'Debe ingresar el Mata (m)<br>';
	    }
	    if ($('#Inspection_maiz_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_maiz_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especie (m)<br>';
	    }
	    if ($('#Inspection_maiz_otro_cultivar').val()=='') {
		error=error+'Debe ingresar el Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_maiz_presencia_maleza').val()=='') {
		error=error+'Debe ingresar la presencia de malezas<br>';
	    }
	    if ($('#Inspection_maiz_presencia_plagas').val()=='') {
		error=error+'Debe ingresar la presencia de plagas<br>';
	    }
	    if ($('#Inspection_maiz_plantas_otras_especies').val()=='') {
		error=error+'Debe ingresar las plantas de otras especies<br>';
	    }
	    if ($('#Inspection_maiz_plantas_fuera_tipo').val()=='') {
		error=error+'Debe ingresar las plantas de fuera de tipo<br>';
	    }
	    if ($('#Inspection_maiz_tolerancias').val()=='') {
		error=error+'Debe ingresar las tolerancias<br>';
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
	    if ($('#Inspection_maiz_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_maiz_emergencia_fecha').val()=='') {
		error=error+'Debe ingresar la fecha de emergencia<br>';
	    }
	    if ($('#Inspection_maiz_floracion').val()=='') {
		error=error+'Debe ingresar la Floración (%)<br>';
	    }
	    if ($('#Inspection_maiz_floracion_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Floración<br>';
	    }
	    if ($('#Inspection_maiz_llenado_grano').val()=='') {
		error=error+'Debe ingresar el % de Llenado de Grano<br>';
	    }
	    if ($('#Inspection_maiz_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Cosecha<br>';
	    }
	    if ($('#Inspection_maiz_distanciamiento_surcos').val()=='') {
		error=error+'Debe ingresar Surcos (m)<br>';
	    }
	    if ($('#Inspection_maiz_mata').val()=='') {
		error=error+'Debe ingresar el Mata (m)<br>';
	    }
	    if ($('#Inspection_maiz_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_maiz_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especie (m)<br>';
	    }
	    if ($('#Inspection_maiz_otro_cultivar').val()=='') {
		error=error+'Debe ingresar el Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_maiz_presencia_maleza').val()=='') {
		error=error+'Debe ingresar la presencia de malezas<br>';
	    }
	    if ($('#Inspection_maiz_presencia_plagas').val()=='') {
		error=error+'Debe ingresar la presencia de plagas<br>';
	    }
	    if ($('#Inspection_maiz_plantas_otras_especies').val()=='') {
		error=error+'Debe ingresar las plantas de otras especies<br>';
	    }
	    if ($('#Inspection_maiz_plantas_fuera_tipo').val()=='') {
		error=error+'Debe ingresar las plantas de fuera de tipo<br>';
	    }
	    if ($('#Inspection_maiz_tolerancias').val()=='') {
		error=error+'Debe ingresar las tolerancias<br>';
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
	    if ($('#Inspection_maiz_fecha_siembra').val()=='') {
		error=error+'Debe ingresar la Fecha de Siembra<br>';
	    }
	    if ($('#Inspection_maiz_emergencia_fecha').val()=='') {
		error=error+'Debe ingresar la fecha de emergencia<br>';
	    }
	    if ($('#Inspection_maiz_floracion').val()=='') {
		error=error+'Debe ingresar la Floración (%)<br>';
	    }
	    if ($('#Inspection_maiz_floracion_fecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Floración<br>';
	    }
	    if ($('#Inspection_maiz_llenado_grano').val()=='') {
		error=error+'Debe ingresar el % de Llenado de Grano<br>';
	    }
	    if ($('#Inspection_maiz_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la Fecha de Cosecha<br>';
	    }
	    if ($('#Inspection_maiz_distanciamiento_surcos').val()=='') {
		error=error+'Debe ingresar Surcos (m)<br>';
	    }
	    if ($('#Inspection_maiz_mata').val()=='') {
		error=error+'Debe ingresar el Mata (m)<br>';
	    }
	    if ($('#Inspection_maiz_campo_comercial').val()=='') {
		error=error+'Debe ingresar el Campo Comercial (m)<br>';
	    }
	    if ($('#Inspection_maiz_otra_especie').val()=='') {
		error=error+'Debe ingresar la Otra Especie (m)<br>';
	    }
	    if ($('#Inspection_maiz_otro_cultivar').val()=='') {
		error=error+'Debe ingresar el Otro Cultivar (m)<br>';
	    }
	    if ($('#Inspection_maiz_presencia_maleza').val()=='') {
		error=error+'Debe ingresar la presencia de malezas<br>';
	    }
	    if ($('#Inspection_maiz_presencia_plagas').val()=='') {
		error=error+'Debe ingresar la presencia de plagas<br>';
	    }
	    if ($('#Inspection_maiz_plantas_otras_especies').val()=='') {
		error=error+'Debe ingresar las plantas de otras especies<br>';
	    }
	    if ($('#Inspection_maiz_plantas_fuera_tipo').val()=='') {
		error=error+'Debe ingresar las plantas de fuera de tipo<br>';
	    }
	    if ($('#Inspection_maiz_tolerancias').val()=='') {
		error=error+'Debe ingresar las tolerancias<br>';
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


