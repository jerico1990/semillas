<?php
/* @var $this LaboratoryController */
/* @var $model Laboratory */
/* @var $form CActiveForm */
?>
<div class="form well span12">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'laboratory-form',)); ?>
	<div id="error" style="color: red"></div>
	<div class="row-fluid">
	    <div class="span12"><h4>Resultados de los Análisis</h4></div>	
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Laboratory_peso_recibido">Peso Recibido(gramos)</label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[peso_recibido]" id="Laboratory_peso_recibido" type="text">
	    </div>
	    <div class="span4">
		<label for="Laboratory_date_recepcion">Fecha de recepción del muestra</label>
		<input type="text" autocomplete="off" name="Laboratory[date_recepcion]" id="Laboratory_date_recepcion">
	    </div>
	    <div class="span4">
		<label for="Laboratory_date_termino_analisis">Fecha de término de análisis</label>
		<input type="text" autocomplete="off" name="Laboratory[date_termino_analisis]" id="Laboratory_date_termino_analisis">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Análisis de Pureza</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Laboratory_semilla_pura">Semilla pura</label>
		<input size="1" maxlength="18" class="laboratorio" name="Laboratory[semilla_pura]" id="Laboratory_semilla_pura" type="text">
	    </div>
	    <div class="span4">
		<label for="Laboratory_materia_inerte">Materia inerte</label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[materia_inerte]" id="Laboratory_materia_inerte" type="text">
	    </div>
	    <div class="span4">
		<label for="Laboratory_otras_semillas">Otras semillas</label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[otras_semillas]" id="Laboratory_otras_semillas" type="text">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Prueba de Germinación</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Laboratory_number_day">Numero de días</label>
		<input name="Laboratory[number_day]" id="Laboratory_number_day" type="text">
	    </div>
	    <div class="span4">
		<label for="Laboratory_plantulas_normales">Plantulas normales</label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[plantulas_normales]" id="Laboratory_plantulas_normales" type="text">
	    </div>
	    <div class="span4">
		<label for="Laboratory_semillas_duras">Semillas duras</label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[semillas_duras]" id="Laboratory_semillas_duras" type="text">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Laboratory_semillas_frescas">Semillas frescas</label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[semillas_frescas]" id="Laboratory_semillas_frescas" type="text">
	    </div>
	    <div class="span4">
		<label for="Laboratory_plantulas_anormales">Plantulas anormales</label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[plantulas_anormales]" id="Laboratory_plantulas_anormales" type="text">
	    </div>
	    <div class="span4">
		<label for="Laboratory_semillas_muertas">Semillas muertas</label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[semillas_muertas]" id="Laboratory_semillas_muertas" type="text">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Contenido de Humedad(%)</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<label for="Laboratory_contenido_humedad"></label>
		<input size="18" maxlength="18" class="laboratorio" name="Laboratory[contenido_humedad]" id="Laboratory_contenido_humedad" type="text">
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Observación</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<label for="Laboratory_observacion"></label>
		<textarea size="60" maxlength="300" class="span12" rows="5" name="Laboratory[observacion]" id="Laboratory_observacion"></textarea>
	    </div>
	</div>
	<div class="row-fluid">		
	    <?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>$model->isNewRecord ? 'Reportar' : 'Emitir Informe','htmlOptions' => array('name'=>'btn','value'=>'aceptar'),)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script>
    $('.laboratorio').on('blur', function(){	
	$('#Laboratory_peso_recibido').val(numeral($('#Laboratory_peso_recibido').val()).format('0,0.00'));
	$('#Laboratory_semilla_pura').val(numeral($('#Laboratory_semilla_pura').val()).format('0,0.00'));
	$('#Laboratory_materia_inerte').val(numeral($('#Laboratory_materia_inerte').val()).format('0,0.00'));
	$('#Laboratory_otras_semillas').val(numeral($('#Laboratory_otras_semillas').val()).format('0,0.00'));
	$('#Laboratory_plantulas_normales').val(numeral($('#Laboratory_plantulas_normales').val()).format('0,0.00'));
	$('#Laboratory_semillas_duras').val(numeral($('#Laboratory_semillas_duras').val()).format('0,0.00'));
	$('#Laboratory_semillas_frescas').val(numeral($('#Laboratory_semillas_frescas').val()).format('0,0.00'));
	$('#Laboratory_plantulas_anormales').val(numeral($('#Laboratory_plantulas_anormales').val()).format('0,0.00'));
	$('#Laboratory_semillas_muertas').val(numeral($('#Laboratory_semillas_muertas').val()).format('0,0.00'));
	$('#Laboratory_contenido_humedad').val(numeral($('#Laboratory_contenido_humedad').val()).format('0,0.00'));	
    });
    $('#Laboratory_date_recepcion').datepicker({format: 'dd-mm-yyyy'});
    $('#Laboratory_date_termino_analisis').datepicker({format: 'dd-mm-yyyy'});
    $('body').on('click', '#yw0', function (e) {
	var error='';
	if ($('#Laboratory_peso_recibido').val()=='') {
	    error=error+'Debe ingresar el peso recibido en gramos<br>';
	}
	if ($('#Laboratory_date_recepcion').val()=='') {
	    error=error+'Debe ingresar la fecha de recepción del muestra<br>';
	}
	if ($('#Laboratory_date_termino_analisis').val()=='') {
	    error=error+'Debe ingresar la fecha de término de análisis<br>';
	}
	if ($('#Laboratory_semilla_pura').val()=='') {
	    error=error+'Debe ingresar el análisis de pureza de semilla pura<br>';
	}
	if ($('#Laboratory_materia_inerte').val()=='') {
	    error=error+'Debe ingresar el análisis de pureza de materia inerte<br>';
	}
	if ($('#Laboratory_otras_semillas').val()=='') {
	    error=error+'Debe ingresar el análisis de pureza de otras semillas<br>';
	}
	if ($('#Laboratory_number_day').val()=='') {
	    error=error+'Debe ingresar el numero de días de prueba de germinación<br>';
	}
	if ($('#Laboratory_plantulas_normales').val()=='') {
	    error=error+'Debe ingresar la prueba de germinación de plantulas normales<br>';
	}
	if ($('#Laboratory_semillas_duras').val()=='') {
	    error=error+'Debe ingresar la prueba de germinación de semillas duras<br>';
	}
	if ($('#Laboratory_semillas_frescas').val()=='') {
	    error=error+'Debe ingresar la prueba de germinación de semillas frescas<br>';
	}
	if ($('#Laboratory_plantulas_anormales').val()=='') {
	    error=error+'Debe ingresar la prueba de germinación de plantulas anormales<br>';
	}
	if ($('#Laboratory_semillas_muertas').val()=='') {
	    error=error+'Debe ingresar la prueba de germinación de semillas muertas<br>';
	}
	if ($('#Laboratory_contenido_humedad').val()=='') {
	    error=error+'Debe ingresar el contenido de humedad en %<br>';
	}
	if (error!='') {
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de generar el informe de laboratorio?");
	if (r == true) {
	    return true;
	} else {
	    return false;
	}
    });
</script>