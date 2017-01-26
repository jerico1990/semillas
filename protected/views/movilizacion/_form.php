<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */

$criteria1=new CDbCriteria;
$criteria1->condition='form_id=:form_id';
$criteria1->params=array(':form_id'=>$id);
$movilizaciones = Movilizacion::model()->findAll($criteria1);
?>
<div class="row-fluid span12" id="error" style="color: red">
</div>
<div class="row-fluid well span12">
	<div class='row-fluid'>
	    <div class='span2'>Fecha</div>
	    <div class='span2'>Cantidad(kg)</div>
	    <div class='span6'></div>
	</div>
	<?php foreach($movilizaciones as $movilizacion) { ?>
	    <div class='row-fluid'>
		<div class='span2'><?= date('d-m-Y',strtotime($movilizacion->fecha)) ?></div>
		<div class='span2'><?= $movilizacion->cantidad_movilizar ?></div>
		<div class='span6'><?= CHtml::link('Descargar',array('pdf/movilizacion','id'=>$movilizacion->id)) ?> </div>
	    </div>
	<?php } ?>
</div>
<div class="form well span12" >





<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
<?php echo CHtml::hiddenField('form_id',$id); ?>
    <?php $departamentos = Location::model()->findAll(array(
			  'select'   => 't.department, t.department_id',
			  'group'    => 't.department',
			  'order'    => 't.department ASC',
			  'distinct' => true
		     ));
    ?>

    <div class="row-fluid">
	<div class="span12"><h4>Semilla a movilizar</h4></div>      
    </div>
    <div class="row-fluid">
	<div class="span3">
	    <label for="Movilizacion_cantidad_envases">Cantidad Envases</label>
	    <input class="movilizacion span12" name="Movilizacion[cantidad_envases]" id="Movilizacion_cantidad_envases" type="text" maxlength="18">
	</div>
	<div class="span3">
	    <label for="Movilizacion_capacidad_envases">Capacidad Envases (kg)</label>
	    <input class="movilizacion span12" name="Movilizacion[capacidad_envases]" id="Movilizacion_capacidad_envases" type="text" maxlength="18">
	</div>
	<div class="span3">
	    <label for="Movilizacion_cantidad_movilizar">Cantidad Movilizar (kg)</label>
	    <input class="movilizacion span12" name="Movilizacion[cantidad_movilizar]" id="Movilizacion_cantidad_movilizar" type="text" maxlength="18">
	</div>
	<div class="span3">
	    <label for="Movilizacion_fecha">Fecha de movilización</label><input class="span12" type="text" autocomplete="off" name="Movilizacion[fecha]" id="Movilizacion_fecha">
	</div>
    </div>								  
    <div class="row-fluid">
	<div class="span12"><h4>Origen de la movilización</h4></div>      
    </div>
    <div class="row-fluid">
	<div class="span12">					 
	    <label for="Movilizacion_origen">Origen</label>
	    <input id="ytMovilizacion_origen" type="hidden" value="" name="Movilizacion[origen]">
	    <span id="Movilizacion_origen">
		<label class="radio">
		    <input id="Movilizacion_origen_0" value="0" type="radio" name="Movilizacion[origen]">Planta de acondicionamiento
		</label>
		<label class="radio">
		    <input id="Movilizacion_origen_1" value="1" type="radio" name="Movilizacion[origen]">Almacén
		</label>
		<label class="radio">
		    <input id="Movilizacion_origen_2" value="2" type="radio" name="Movilizacion[origen]">Campo de multiplicación
		</label>
	    </span>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"></div>     
    </div>
    <div class="row-fluid">
	<div class="span12">
	    <label for="Movilizacion_origen_nombre_predio">Nombre del Predio</label>
	    <input class="span6" name="Movilizacion[origen_nombre_predio]" id="Movilizacion_origen_nombre_predio" type="text" maxlength="150">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <label for="Movilizacion_odepartment_id">Departamento</label>
	    <select name="Movilizacion[odepartment_id]" id="Movilizacion_odepartment_id" onchange="Provincias($(this).val(),1)">
		<option value="">Seleccionar</option>
		<?php foreach($departamentos as $departamento){ ?>
		<option value="<?= $departamento->department_id ?>"><?= $departamento->department ?></option>
		<?php } ?>
	    </select>
	    <div class="help-block error" id="Movilizacion_odepartment_id_em_" style="display:none">Departamento no es correcto.</div>
	</div>
	<div class="span4">
	    <label for="Movilizacion_oprovince_id">Provincia</label>
	    <select name="Movilizacion[oprovince_id]" id="Movilizacion_oprovince_id" onchange="Distritos($(this).val(),1)">
		<option value="">Seleccionar</option>
	    </select>
	    <div class="help-block error" id="Movilizacion_oprovince_id_em_" style="display:none">Provincia no es correcto.</div>
	</div>
	<div class="span4">
	    <label for="Movilizacion_origen_district_id" class="required">Distrito <span class="required">*</span></label>
	    <select name="Movilizacion[origen_district_id]" id="Movilizacion_origen_district_id">
		<option value="">Seleccionar</option>
	    </select>
	    <div class="help-block error" id="Movilizacion_origen_district_id_em_" style="display:none">Distrito no es correcto.</div>
	</div>
    </div> 
    <div class="row-fluid">
	<div class="span12"><h4>Destino de la movilización</h4></div>      
    </div>
    <div class="row-fluid">
	<div id="destino" class="span12">
	    <label for="Movilizacion_destino">Destino</label>
	    <input id="ytMovilizacion_destino" type="hidden" value="" name="Movilizacion[destino]">
	    <span id="Movilizacion_destino">
		<label class="radio">
		    <input id="Movilizacion_destino_0" value="0" type="radio" name="Movilizacion[destino]">Planta de acondicionamiento
		</label>
		<label class="radio">
		    <input id="Movilizacion_destino_1" value="1" type="radio" name="Movilizacion[destino]">Almacén
		</label>
		<label class="radio">
		    <input id="Movilizacion_destino_2" value="2" type="radio" name="Movilizacion[destino]">Campo de multiplicación
		</label>
	    </span>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span6">
	    <label for="Movilizacion_destino_nombre_predio">Nombre del Predio</label>
	    <input class="span12" name="Movilizacion[destino_nombre_predio]" id="Movilizacion_destino_nombre_predio" type="text" maxlength="150">
	</div>
	<div class="span6">
	    <label for="Movilizacion_destino_registro" class="required">N° Registro</label>
	    <input type="text" id="destino_registro" name="Movilizacion[destino_registro]">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <label for="Movilizacion_ddepartment_id">Departamento</label>
	    <select name="Movilizacion[ddepartment_id]" id="Movilizacion_ddepartment_id" onchange="Provincias($(this).val(),2)">
		<option value="">Seleccionar</option>
		<?php foreach($departamentos as $departamento){ ?>
		<option value="<?= $departamento->department_id ?>"><?= $departamento->department ?></option>
		<?php } ?>
	    </select>
	    <div class="help-block error" id="Movilizacion_ddepartment_id_em_" style="display:none">Departamento no es correcto.</div>
	</div>
	<div class="span4">
	    <label for="Movilizacion_dprovince_id">Provincia</label>
	    <select name="Movilizacion[dprovince_id]" id="Movilizacion_dprovince_id" onchange="Distritos($(this).val(),2)">
		<option value="">Seleccionar</option>
	    </select>
	    <div class="help-block error" id="Movilizacion_dprovince_id_em_" style="display:none">Provincia no es correcto.</div>
	</div>
	<div class="span4">
	    <label for="Movilizacion_destino_district_id" class="required">Distrito <span class="required">*</span></label>
	    <select name="Movilizacion[destino_district_id]" id="Movilizacion_destino_district_id">
		<option value="">Seleccionar</option>
	    </select>
	    <div class="help-block error" id="Movilizacion_destino_district_id_em_" style="display:none">Distrito no es correcto.</div>
	</div>
    </div>
    <?php echo CHtml::hiddenField('id_acondicionamiento',$model->id); ?>
    <?php echo CHtml::hiddenField('formu',$model->form_id); ?>

    <div class="row-fluid">
	<div class="span12">
	    <div class="form-actions">
		<div class="span8"></div>
		<div class="span4">														  
                    <button class="span12  btn btn-success" id="yw2" type="submit" name="yt0">Reportar</button>
		</div>
	    </div>
	</div>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$provincias=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
?>
<script>
    function Provincias(valor,tipo) {
	$.get( "<?= $provincias ?>?departamento="+valor, function( data ) {
	    if (tipo==1) {
		$( "#Movilizacion_oprovince_id" ).html( data );
	    }
	    else if (tipo==2) {
		$( "#Movilizacion_dprovince_id" ).html( data );
	    }
	});
	if (tipo==1) {
	    $("#Movilizacion_oprovince_id").find("option").remove().end().append("<option value></option>").val("");
	    $("#Movilizacion_origen_district_id").find("option").remove().end().append("<option value></option>").val("");
	}
	else if (tipo==2) {
	    $("#Movilizacion_dprovince_id").find("option").remove().end().append("<option value></option>").val("");
	    $("#Movilizacion_destino_district_id").find("option").remove().end().append("<option value></option>").val("");
	}
    }
    
    function Distritos(valor,tipo) {
	$.get( "<?= $distritos ?>?provincia="+valor, function( data ) {
	    if (tipo==1) {
		$( "#Movilizacion_origen_district_id" ).html( data );
	    }
	    else if (tipo==2) {
		$( "#Movilizacion_destino_district_id" ).html( data );
	    }
	    
	});
	if (tipo==1) {
	    $("#Movilizacion_origen_district_id").find("option").remove().end().append("<option value></option>").val("");
	}
	else if (tipo==2) {
	    $("#Movilizacion_destino_district_id").find("option").remove().end().append("<option value></option>").val("");
	}
    }
    
    $('.movilizacion').on('blur', function(){
	$('#Movilizacion_cantidad_envases').val(numeral($('#Movilizacion_cantidad_envases').val()).format('0,0.00'));
	$('#Movilizacion_capacidad_envases').val(numeral($('#Movilizacion_capacidad_envases').val()).format('0,0.00'));
	$('#Movilizacion_cantidad_movilizar').val(numeral($('#Movilizacion_cantidad_movilizar').val()).format('0,0.00'));
    });
    $('#Movilizacion_fecha').datepicker({format: 'dd-mm-yyyy'})
    $('#yw2').on('click', function(){
	var error='';
	if ($('#Movilizacion_cantidad_envases').val()=='') {
	    error=error+'Debe ingresar la Cantidad Envases<br>';
	}
	if ($('#Movilizacion_capacidad_envases').val()=='') {
		error=error+'Debe ingresar la Capacidad Envases (kg)<br>';
	    }
	if ($('#Movilizacion_cantidad_movilizar').val()=='') {
	    error=error+'Debe ingresar cantidad la cantidad a movilizar<br>';
	}
	if ($('#Movilizacion_origen_nombre_predio').val()=='') {
	    error=error+'Debe ingresar el Nombre del Predio origen<br>';
	}
	if ($('#Movilizacion_odepartment_id').val()=='') {
	    error=error+'Debe ingresar el departamento de origen<br>';
	}
	if ($('#Movilizacion_oprovince_id').val()=='') {
	    error=error+'Debe ingresar la provincia de origen<br>';
	}
	if ($('#Movilizacion_origen_district_id').val()=='') {
	    error=error+'Debe ingresar el distrito de origen<br>';
	}
	if ($('#Movilizacion_destino_nombre_predio').val()=='') {
	    error=error+'Debe ingresar el Nombre del Predio destino<br>';
	}
	if ($('#destino_registro').val()=='') {
	    error=error+'Debe ingresar el N° Registro del destino<br>';
	}
	if ($('#Movilizacion_ddepartment_id').val()=='') {
	    error=error+'Debe ingresar el departamento de destino<br>';
	}
	if ($('#Movilizacion_dprovince_id').val()=='') {
	    error=error+'Debe ingresar la provincia de destino<br>';
	}
	if ($('#Movilizacion_destino_district_id').val()=='') {
	    error=error+'Debe ingresar el distrito de destino<br>';
	}
	
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	
	return true;
    });
</script>
