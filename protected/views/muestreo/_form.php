<?php
/* @var $this MuestreoController */
/* @var $model Muestreo */
/* @var $form CActiveForm */
$departamentos = Location::model()->findAll(array(
	  'select'   => 't.department, t.department_id',
	  'group'    => 't.department',
	  'order'    => 't.department ASC',
	  'distinct' => true
     ));

$departments = Location::model()->findAll(array(
					 'select'   => 't.id, t.department, t.department_id',
					 'group'    => 't.id,t.department',
					 'order'    => 't.department ASC',
					 'distinct' => true
		  )); 
$listdeparts = CHtml::listData($departments,'department_id','department');


$maestro=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'011'));
$lista=CHtml::listData($maestro,'codigo_detalle','descripcion');

$laboratorios=User::model()->findAll('type_id=:type_id',array(':type_id'=>6));
$lista_laboratorios=CHtml::listData($laboratorios,'id','legal_name');
?>

<div class="form well span12">
    <?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'muestreo-form',));?>
	<div id="error" style="color: red"></div>
	<div class="row-fluid">
	    <div class="span12"><h4>Datos del Muestreo</h4></div>      
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Muestreo_name_muestreador">Nombre del Muestreador</label>
		<input size="60" maxlength="150" name="Muestreo[name_muestreador]" id="Muestreo_name_muestreador" type="text">
	    </div>
	    <div class="span4">
		<label for="Muestreo_fecha_muestreo">Fecha Muestreo</label>
		<input class="produccion" value="" type="text" autocomplete="off" name="Muestreo[fecha_muestreo]" id="Muestreo_fecha_muestreo">
	    </div>
	    <div class="span4">
		<label for="Muestreo_peso_muestra">Peso Muestra</label>
		<input size="18" maxlength="18" name="Muestreo[peso_muestra]" id="Muestreo_peso_muestra" type="text">
	    </div>
	</div>
	<div class="row-fluid">			 				
	    <div class="span12"><label for="Muestreo_lugar_ubicacion">Lugar Ubicación del Lote (Nombre de planta acondicionadora,almacén,etc)</label><input size="60" maxlength="300" class="span8" name="Muestreo[lugar_ubicacion]" id="Muestreo_lugar_ubicacion" type="text"></div>
	</div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Muestreo_department_id">Departamento</label>
		<select name="Muestreo[department_id]" id="Muestreo_department_id" onchange="Provincias($(this).val())">
		    <option value="">Seleccionar</option>
		    <?php foreach($departamentos as $departamento){ ?>
		    <option value="<?= $departamento->department_id ?>"><?= $departamento->department ?></option>
		    <?php } ?>
		</select>
		<div class="help-block error" id="Muestreo_department_id_em_" style="display:none">Departamento no es correcto.</div>
	    </div>
	    <div class="span4">
		<label for="Muestreo_province_id">Provincia</label>
		<select name="Muestreo[province_id]" id="Muestreo_province_id" onchange="Distritos($(this).val())">
		    <option value="">Seleccionar</option>
		</select>
		<div class="help-block error" id="Muestreo_province_id_em_" style="display:none">Provincia no es correcto.</div>
	    </div>
	    <div class="span4">
		<label for="Muestreo_district_id" class="required">Distrito <span class="required">*</span></label>
		<select name="Muestreo[district_id]" id="Muestreo_district_id">
		    <option value="">Seleccionar</option>
		</select>
		<div class="help-block error" id="Muestreo_district_id_em_" style="display:none">Distrito no es correcto.</div>
	    </div>
	</div>
	<div class="row-fluid">			 				
	    <div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_germinacion'); ?></div>
	    <div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_humedad'); ?></div>
	    <div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_pureza'); ?></div>
	    <div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_otras_especies'); ?></div>
	</div>

	<div class="row-fluid">			 				
	    <div class="span12">
		<label for="Muestreo_observacion">Observación</label>
		<textarea size="60" maxlength="300" rows="6" class="span12" name="Muestreo[observacion]" id="Muestreo_observacion"></textarea>
	    </div>
	</div>
	<div class="row-fluid">		  
	    <div class="span12"><?php echo $form->dropDownListRow($model,'laboratorio_id',$lista_laboratorios, array('empty'=>' ')); ?></div>
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<input type="hidden" id="y01" name="Muestreo[y01]">
		<button class="btn btn-success" id="aceptar" type="submit">Aceptar</button>
		<button class="btn btn-danger" id="rechazar" type="submit">Rechazar</button>
	    </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$provincias=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
?>
<script>
    function Provincias(valor) {
	$.get( "<?= $provincias ?>?departamento="+valor, function( data ) {$( "#Muestreo_province_id" ).html( data );});
	$("#Muestreo_province_id").find("option").remove().end().append("<option value></option>").val("");
	$("#Muestreo_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
    
    function Distritos(valor) {
	$.get( "<?= $distritos ?>?provincia="+valor, function( data ) {$( "#Muestreo_district_id" ).html( data );});
	$("#Muestreo_district_id").find("option").remove().end().append("<option value></option>").val("");
    }
    $('body').on('click', '#aceptar', function (e) {
	var error='';
	if ($('#Muestreo_name_muestreador').val()=='') {
	    error=error+'Debe ingresar el Nombre del muestreador<br>';
	}
	if ($('#Muestreo_fecha_muestreo').val()=='') {
	    error=error+'Debe ingresar la fecha del muestreo<br>';
	}
	if ($('#Muestreo_peso_muestra').val()=='') {
	    error=error+'Debe ingresar el peso de muestra<br>';
	}
	if ($('#Muestreo_lugar_ubicacion').val()=='') {
	    error=error+'Debe ingresar el lugar de ubicación del muestreo<br>';
	}
	if ($('#Muestreo_department_id').val()=='') {
	    error=error+'Debe ingresar el departamento<br>';
	}
	if ($('#Muestreo_province_id').val()=='') {
	    error=error+'Debe ingresar la provincia<br>';
	}
	if ($('#Muestreo_district_id').val()=='') {
	    error=error+'Debe ingresar el distrito<br>';
	}
	if ($('#Muestreo_observacion').val()=='') {
	    error=error+'Debe ingresar la observación del muestreo<br>';
	}
	if ($('#Muestreo_laboratorio_id').val()=='') {
	    error=error+'Debe seleccionar el laboratorio<br>';
	}
	if (error!='') {
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de aceptar el muestreo?");
	if (r == true) {
	    $('#y01').val(1);
	    return true;
	} else {
	    return false;
	}
    });
    
    $('body').on('click', '#rechazar', function (e) {
	var error='';
	if ($('#Muestreo_name_muestreador').val()=='') {
	    error=error+'Debe ingresar el Nombre del muestreador<br>';
	}
	if ($('#Muestreo_fecha_muestreo').val()=='') {
	    error=error+'Debe ingresar la fecha del muestreo<br>';
	}
	if ($('#Muestreo_peso_muestra').val()=='') {
	    error=error+'Debe ingresar el peso de muestra<br>';
	}
	if ($('#Muestreo_lugar_ubicacion').val()=='') {
	    error=error+'Debe ingresar el lugar de ubicación del muestreo<br>';
	}
	if ($('#Muestreo_department_id').val()=='') {
	    error=error+'Debe ingresar el departamento<br>';
	}
	if ($('#Muestreo_province_id').val()=='') {
	    error=error+'Debe ingresar la provincia<br>';
	}
	if ($('#Muestreo_district_id').val()=='') {
	    error=error+'Debe ingresar el distrito<br>';
	}
	if ($('#Muestreo_observacion').val()=='') {
	    error=error+'Debe ingresar la observación del muestreo<br>';
	}
	if ($('#Muestreo_laboratorio_id').val()=='') {
	    error=error+'Debe seleccionar el laboratorio<br>';
	}
	if (error!='') {
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de rechazar el muestreo?");
	if (r == true) {
	    $('#y01').val(2);
	    return true;
	} else {
	    return false;
	}
    });
    
    $('#Muestreo_fecha_muestreo').datepicker({format: 'dd-mm-yyyy'});
    
</script>