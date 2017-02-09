<?php
    $departamentos = Location::model()->findAll(array(
	'select'   => 't.department, t.department_id',
	'group'    => 't.department',
	'order'    => 't.department ASC',
	'distinct' => true
    ));
?>
<div class="form well span12" style="background: #FFFFFF">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'acondicionamiento-form',)); ?>
	<?php //echo $form->errorSummary($model); ?>
	<?php //echo CHtml::hiddenField('condicional_acondicionamientoa_id',$model->id); ?>
	<?php //echo CHtml::hiddenField('formu',$model->form_id); ?>
	<div class="row-fluid">
	    <div id="error" style="color: red"></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span12"><h4>Almacenamiento Previo al Acondicionamiento</h4></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span4">
		<label for="Acondicionamiento_department_id">Departamento</label>
		<select name="Acondicionamiento[department_id]" id="Acondicionamiento_department_id" onchange="Provincias($(this).val())">
		    <option value="">Seleccionar</option>
		    <?php foreach($departamentos as $departamento){ ?>
		    <option value="<?= $departamento->department_id ?>"><?= $departamento->department ?></option>
		    <?php } ?>
		</select>
		<div class="help-block error" id="Acondicionamiento_department_id_em_" style="display:none">Departamento no es correcto.</div>
	    </div>
	    <div class="span4">
		<label for="Acondicionamiento_province_id">Provincia</label>
		<select name="Acondicionamiento[province_id]" id="Acondicionamiento_province_id" onchange="Distritos($(this).val())">
		    <option value="">Seleccionar</option>
		</select>
		<div class="help-block error" id="Acondicionamiento_province_id_em_" style="display:none">Provincia no es correcto.</div>
	    </div>
	    <div class="span4">
		<label for="Acondicionamiento_district_id" class="required">Distrito <span class="required">*</span></label>
		<select name="Acondicionamiento[district_id]" id="Acondicionamiento_district_id">
		    <option value="">Seleccionar</option>
		</select>
		<div class="help-block error" id="Acondicionamiento_district_id_em_" style="display:none">Distrito no es correcto.</div>
	    </div>
	</div>
	<div class="row-fluid">	
	    <div class="span12">
		<label for="Acondicionamiento_address">Dirección</label>
		<input class="span12 general" name="Acondicionamiento[address]" id="Acondicionamiento_address" type="text" maxlength="200">
	    </div>
	</div>
	<div class="row-fluid">			
	    <div class="span3">
		<label for="Acondicionamiento_number_envases">N° Envases</label>
		<input class="general span12" name="Acondicionamiento[number_envases]" id="Acondicionamiento_number_envases" type="text">
	    </div>
	    <div class="span3">
		<label for="Acondicionamiento_capacidad_envases">Capacidad Envases</label>
		<input class="general span12" name="Acondicionamiento[capacidad_envases]" id="Acondicionamiento_capacidad_envases" type="text" maxlength="18">
	    </div>
	    <div class="span3">
		<label for="Acondicionamiento_peso_estimado">Peso Estimado</label>
		<input class="general span12" name="Acondicionamiento[peso_estimado]" id="Acondicionamiento_peso_estimado" type="text" maxlength="18">
	    </div>
	    <div class="span3">
		<label for="Acondicionamiento_fecha_cosecha">Fecha Cosecha</label>
		<input class="fechas span12" type="text" autocomplete="off" name="Acondicionamiento[fecha_cosecha]" id="Acondicionamiento_fecha_cosecha">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Condición de Secado</h4></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span12">
		<label for="Acondicionamiento_descripcion_secado">Descripcion Secado</label>
		<textarea class="span12 general" rows="5" name="Acondicionamiento[descripcion_secado]" id="Acondicionamiento_descripcion_secado"></textarea>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Planta de Acondicionamiento</h4></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span4"><label for="Acondicionamiento_disponibilidad">Disponibilidad</label>
		<select class="span12 general" name="Acondicionamiento[disponibilidad]" id="Acondicionamiento_disponibilidad">
		    <option value>Seleccionar</option>
		    <option value="1">P</option>
		    <option value="2">A</option>
		    <option value="3">C</option>
		    <option value="4">S</option>
		</select>
	    </div>
	    <div class="span4">
		<label for="Acondicionamiento_peso_ingreso">Peso Ingreso</label>
		<input class="span12" name="Acondicionamiento[peso_ingreso]" id="Acondicionamiento_peso_ingreso" type="text" maxlength="18">
	    </div>
	    <div class="span4">
		<label for="Acondicionamiento_registro_planta">Registro Planta</label>
		<input class="general span12" name="Acondicionamiento[registro_planta]" id="Acondicionamiento_registro_planta" type="text" maxlength="50">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Acondicionamiento_cantidad_lotes">Cantidad Lotes</label>
		<input class="general span12" name="Acondicionamiento[cantidad_lotes]" id="Acondicionamiento_cantidad_lotes" type="text" maxlength="18">
	    </div>
	    <div class="span4">
		<label for="Acondicionamiento_cantidad_envases">Cantidad Envases</label>
		<input class="span12 general" name="Acondicionamiento[cantidad_envases]" id="Acondicionamiento_cantidad_envases" type="text">
	    </div>
	    <div class="span4">
		<label for="Acondicionamiento_tipo_envase">Tipo Envase</label>
		<input class="span12 general" name="Acondicionamiento[tipo_envase]" id="Acondicionamiento_tipo_envase" type="text" maxlength="200">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Intalaciones, Equipos y Semilla</h4></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span4">
		<label for="Acondicionamiento_descripcion">Descripcion</label>
		<textarea size="60" maxlength="300" class="span12 general" rows="5" name="Acondicionamiento[descripcion]" id="Acondicionamiento_descripcion"></textarea>
	    </div>
	    <div class="span4">
		<label for="Acondicionamiento_operatividad">Operatividad</label>
		<textarea size="60" maxlength="300" class="span12 general" rows="5" name="Acondicionamiento[operatividad]" id="Acondicionamiento_operatividad"></textarea>
	    </div>
	    <div class="span4">
		<label for="Acondicionamiento_limpieza">Limpieza</label>
		<textarea size="60" maxlength="300" class="span12 " rows="5" name="Acondicionamiento[limpieza]" id="Acondicionamiento_limpieza"></textarea>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Identificación del lote de Semilla</h4></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span12">
		<label for="Acondicionamiento_identificacion_lote_semilla">Identificacion Lote Semilla</label>
		<input id="ytAcondicionamiento_identificacion_lote_semilla" type="hidden" value="" name="Acondicionamiento[identificacion_lote_semilla]">
		<span id="Acondicionamiento_identificacion_lote_semilla">
		    <label class="radio">
			<input class="general" id="Acondicionamiento_identificacion_lote_semilla_0" value="0" type="radio" name="Acondicionamiento[identificacion_lote_semilla]">Cultivar
		    </label>
		    <label class="radio">
			<input class="general" id="Acondicionamiento_identificacion_lote_semilla_1" value="1" type="radio" name="Acondicionamiento[identificacion_lote_semilla]">Categoria
		    </label>
		    <label class="radio">
			<input class="general" id="Acondicionamiento_identificacion_lote_semilla_2" value="2" type="radio" name="Acondicionamiento[identificacion_lote_semilla]">N° de control
		    </label>
		    <label class="radio">
			<input class="general" id="Acondicionamiento_identificacion_lote_semilla_3" value="3" type="radio" name="Acondicionamiento[identificacion_lote_semilla]">Productor de Semillas
		    </label>
		</span>
	    </div>					 
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Resultado</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<label for="Acondicionamiento_observacion">Observacion</label>
		<textarea size="60" maxlength="300" class="span12" rows="5" name="Acondicionamiento[observacion]" id="Acondicionamiento_observacion"></textarea>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<div class="form-actions">
		    <div class="span4">
		    <!--Aprobado-->
			<input name="Acondicionamiento[y01]" id="hidden" type="hidden">
			<button id="btn_apro" class="btn btn-success span12">Cumple</button>
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
	<!--Boton Condicional-->	
	<div id="myModal_acond_conda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 id="myModalLabel">Fecha sugerida de Subsanación</h4>
	    </div>
	    <div class="modal-body">
		<p>
		    <label for="Acondicionamiento_subsanacion_date">Subsanación Fecha</label>
		    <input type="date" name="Acondicionamiento[subsanacion_date]" id="Acondicionamiento_subsanacion_date">
		</p>
	    </div>
	    <div class="modal-footer">
		<button id="btn_enviar_condicional" class="btn btn-primary">Enviar</button>			
	    </div>
	</div>
<!--Fin de botones-->
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$provincias=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
?>


<script>
	//Fecha Formato
	$('.fechas').datepicker({
	    format: 'dd-mm-yyyy',    
	})
	$('.fechas').datepicker().on('changeDate', function(ev){		
	    $('#Acondicionamiento_cantidad_lotes').trigger('keyup');
	});
	$('.general').on('blur', function(){
	    //alert($("input[type='radio']:checked").val());
	    //alert($('#Acondicionamiento_identificacion_lote_semilla').val('checked'));
	    $('#Acondicionamiento_number_envases').val(numeral($('#Acondicionamiento_number_envases').val()).format('0,0.00'));
	    $('#Acondicionamiento_capacidad_envases').val(numeral($('#Acondicionamiento_capacidad_envases').val()).format('0,0.00'));
	    $('#Acondicionamiento_peso_estimado').val(numeral($('#Acondicionamiento_peso_estimado').val()).format('0,0.00'));
	    $('#Acondicionamiento_cantidad_lotes').val(numeral($('#Acondicionamiento_cantidad_lotes').val()).format('0,0.00'));
	    $('#Acondicionamiento_peso_ingreso').val(numeral($('#Acondicionamiento_peso_ingreso').val()).format('0,0.00'));
	    $('#Acondicionamiento_cantidad_envases').val(numeral($('#Acondicionamiento_cantidad_envases').val()).format('0,0.00'));
	});
	
	function Provincias(valor) {
	    $.get( "<?= $provincias ?>?departamento="+valor, function( data ) {$( "#Acondicionamiento_province_id" ).html( data );});
	    $("#Acondicionamiento_province_id").find("option").remove().end().append("<option value></option>").val("");
	    $("#Acondicionamiento_district_id").find("option").remove().end().append("<option value></option>").val("");
	}
	
	function Distritos(valor) {
	    $.get( "<?= $distritos ?>?provincia="+valor, function( data ) {$( "#Acondicionamiento_district_id" ).html( data );});
	    $("#Acondicionamiento_district_id").find("option").remove().end().append("<option value></option>").val("");
	}
	
	$('#btn_apro').on('click', function(){
	    var error='';
	    if ($('#Acondicionamiento_department_id').val()=='') {
		error=error+'Debe ingresar el departamento previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_province_id').val()=='') {
		    error=error+'Debe ingresar la provincia previo al acondicionamiento<br>';
		}
	    if ($('#Acondicionamiento_district_id').val()=='') {
		error=error+'Debe ingresar el distrito previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_address').val()=='') {
		error=error+'Debe ingresar la dirección previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_number_envases').val()=='') {
		error=error+'Debe ingresar el numero de envases previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_capacidad_envases').val()=='') {
		error=error+'Debe ingresar la capacidad de envases previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_peso_estimado').val()=='') {
		error=error+'Debe ingresar el peso estimado previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la fecha de cosecha previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_descripcion_secado').val()=='') {
		error=error+'Debe ingresar la condición de secado<br>';
	    }
	    if ($('#Acondicionamiento_disponibilidad').val()=='') {
		error=error+'Debe ingresar la disponibilidad de la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_peso_ingreso').val()=='') {
		error=error+'Debe ingresar el peso de ingreso en la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_registro_planta').val()=='') {
		error=error+'Debe ingresar el registro de planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_cantidad_lotes').val()=='') {
		error=error+'Debe ingresar la cantidad de lotes de la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_cantidad_envases').val()=='') {
		error=error+'Debe ingresar la cantidad de envases que tendrá la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_tipo_envase').val()=='') {
		error=error+'Debe ingresar el tipo de envase que tendrá planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_descripcion').val()=='') {
		error=error+'Debe ingresar la descripción de instalaciones,equipos y semilla<br>';
	    }
	    if ($('#Acondicionamiento_operatividad').val()=='') {
		error=error+'Debe ingresar la operatividad de instalaciones,equipos y semilla<br>';
	    }
	    if ($('#Acondicionamiento_limpieza').val()=='') {
		error=error+'Debe ingresar la limpieza de instalaciones,equipos y semilla<br>';
	    }
	    /*
	    if ($('#ytAcondicionamiento_identificacion_lote_semilla').val()=='') {
		error=error+'Debe ingresar la identificación de lote de semilla<br>';
	    }*/
	    if ($('#Acondicionamiento_observacion').val()=='') {
		error=error+'Debe ingresar el resultado<br>';
	    }
	    if (error!='') {
		$('#error').html(error);
		return false;
	    }
	    $('#error').html('');
	    var txt;
	    var r = confirm("¿Estas seguro de que cumple con el acondicionamiento?");
	    if (r == true) {
		$('#hidden').val(1);
		return true;
	    } else {
		return false;
	    }
	});
	
	$('#btn_condi').on('click', function(){
	    var error='';
	    if ($('#Acondicionamiento_department_id').val()=='') {
		error=error+'Debe ingresar el departamento previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_province_id').val()=='') {
		    error=error+'Debe ingresar la provincia previo al acondicionamiento<br>';
		}
	    if ($('#Acondicionamiento_district_id').val()=='') {
		error=error+'Debe ingresar el distrito previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_address').val()=='') {
		error=error+'Debe ingresar la dirección previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_number_envases').val()=='') {
		error=error+'Debe ingresar el numero de envases previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_capacidad_envases').val()=='') {
		error=error+'Debe ingresar la capacidad de envases previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_peso_estimado').val()=='') {
		error=error+'Debe ingresar el peso estimado previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la fecha de cosecha previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_descripcion_secado').val()=='') {
		error=error+'Debe ingresar la condición de secado<br>';
	    }
	    if ($('#Acondicionamiento_disponibilidad').val()=='') {
		error=error+'Debe ingresar la disponibilidad de la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_peso_ingreso').val()=='') {
		error=error+'Debe ingresar el peso de ingreso en la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_registro_planta').val()=='') {
		error=error+'Debe ingresar el registro de planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_cantidad_lotes').val()=='') {
		error=error+'Debe ingresar la cantidad de lotes de la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_cantidad_envases').val()=='') {
		error=error+'Debe ingresar la cantidad de envases que tendrá la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_tipo_envase').val()=='') {
		error=error+'Debe ingresar el tipo de envase que tendrá planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_descripcion').val()=='') {
		error=error+'Debe ingresar la descripción de instalaciones,equipos y semilla<br>';
	    }
	    if ($('#Acondicionamiento_operatividad').val()=='') {
		error=error+'Debe ingresar la operatividad de instalaciones,equipos y semilla<br>';
	    }
	    if ($('#Acondicionamiento_limpieza').val()=='') {
		error=error+'Debe ingresar la limpieza de instalaciones,equipos y semilla<br>';
	    }
	    /*
	    if ($('#ytAcondicionamiento_identificacion_lote_semilla').val()=='') {
		error=error+'Debe ingresar la identificación de lote de semilla<br>';
	    }*/
	    if ($('#Acondicionamiento_observacion').val()=='') {
		error=error+'Debe ingresar el resultado<br>';
	    }
	    if (error!='') {
		//alert(error);
		$('#error').html(error);
		return false;
	    }
	    $('#error').html('');
	    $('#myModal_acond_conda').modal('show');
	    return true;
	});
	
	
	$('#btn_recha').on('click', function(){
	    var error='';
	    if ($('#Acondicionamiento_department_id').val()=='') {
		error=error+'Debe ingresar el departamento previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_province_id').val()=='') {
		    error=error+'Debe ingresar la provincia previo al acondicionamiento<br>';
		}
	    if ($('#Acondicionamiento_district_id').val()=='') {
		error=error+'Debe ingresar el distrito previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_address').val()=='') {
		error=error+'Debe ingresar la dirección previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_number_envases').val()=='') {
		error=error+'Debe ingresar el numero de envases previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_capacidad_envases').val()=='') {
		error=error+'Debe ingresar la capacidad de envases previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_peso_estimado').val()=='') {
		error=error+'Debe ingresar el peso estimado previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_fecha_cosecha').val()=='') {
		error=error+'Debe ingresar la fecha de cosecha previo al acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_descripcion_secado').val()=='') {
		error=error+'Debe ingresar la condición de secado<br>';
	    }
	    if ($('#Acondicionamiento_disponibilidad').val()=='') {
		error=error+'Debe ingresar la disponibilidad de la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_peso_ingreso').val()=='') {
		error=error+'Debe ingresar el peso de ingreso en la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_registro_planta').val()=='') {
		error=error+'Debe ingresar el registro de planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_cantidad_lotes').val()=='') {
		error=error+'Debe ingresar la cantidad de lotes de la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_cantidad_envases').val()=='') {
		error=error+'Debe ingresar la cantidad de envases que tendrá la planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_tipo_envase').val()=='') {
		error=error+'Debe ingresar el tipo de envase que tendrá planta de acondicionamiento<br>';
	    }
	    if ($('#Acondicionamiento_descripcion').val()=='') {
		error=error+'Debe ingresar la descripción de instalaciones,equipos y semilla<br>';
	    }
	    if ($('#Acondicionamiento_operatividad').val()=='') {
		error=error+'Debe ingresar la operatividad de instalaciones,equipos y semilla<br>';
	    }
	    if ($('#Acondicionamiento_limpieza').val()=='') {
		error=error+'Debe ingresar la limpieza de instalaciones,equipos y semilla<br>';
	    }
	    /*
	    if ($('#ytAcondicionamiento_identificacion_lote_semilla').val()=='') {
		error=error+'Debe ingresar la identificación de lote de semilla<br>';
	    }*/
	    if ($('#Acondicionamiento_observacion').val()=='') {
		error=error+'Debe ingresar el resultado<br>';
	    }
	    if (error!='') {
		$('#error').html(error);
		return false;
	    }
	    $('#error').html('');
	    var txt;
	    var r = confirm("¿Estas seguro de que el informe no cumple?");
	    if (r == true) {
		$('#hidden').val(3);
		return true;
	    } else {
		return false;
	    }
	});
	
	
	$('#btn_enviar_condicional').click(function(){
	    var error='';
	    if ($('#Acondicionamiento_subsanacion_date').val()=='') {
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
