<?php
$muestreos=Muestreo::model()->findAll('form_id=:form_id',array(':form_id'=>$id));
$boton=Muestreo::model()->find('form_id=:form_id',array(':form_id'=>$id));
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>

<script>

$(function(){
    $('#Muestreo_time_proposed').clockface();
});
</script>

<?php if(Yii::app()->user->checkAccess('productor')) {?>
<br>
<!--Generar Muestreo-->
<div class="row-fluid well">
    <div class='row-fluid'>
	<div class="form">
	    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'muestreo-form')); ?>
		<div id="error" style="color: red"></div>
	    <?php //echo CHtml::hiddenField('form_id',$id); ?>
		<input type="hidden" value="<?= $id ?>" name="form_id" id="form_id">
		<div class="row-fluid">			 				
		    <?php // <div class="span3">echo $form->textFieldRow($model,'n_muestreo',array('class'=>'produccion span12'));</div> ?>
		    <div class="span2">
			<label for="Muestreo_peso_total">Peso Total</label>
			<input class="produccion span12" name="Muestreo[peso_total]" id="Muestreo_peso_total" type="text">
		    </div>
		    <div class="span2">
			<label for="Muestreo_peso_envase">Peso Envase</label>
			<input class="produccion span12" name="Muestreo[peso_envase]" id="Muestreo_peso_envase" type="text">
		    </div>
		    <div class="span2">
			<label for="Muestreo_nro_envases">Nro Envases</label>
			<input class="produccion span12" name="Muestreo[nro_envases]" id="Muestreo_nro_envases" type="text">
		    </div>
		    <div class="span2">
			<label for="Muestreo_date_proposed">Fecha solicitud</label>
			<input class="span12 produccion" type="text" autocomplete="off" name="Muestreo[date_proposed]" id="Muestreo_date_proposed">
		    </div>
		    <div class="span2">
			<label for="Muestreo_time_proposed">Hora solicitud</label>
			<input data-format="hh:mm A" class="span12 input-small" name="Muestreo[time_proposed]" id="Muestreo_time_proposed" type="text">
		    </div>
		    
		</div>         
		<div class="row-fluid">
		    <button class="btn btn-primary" id="yw0" type="submit" name="yt0">Aceptar</button>
		</div>         
         <?php $this->endWidget(); ?>
      </div><!-- form -->
    </div>
</div>
<?php } else {?>
</br>
<?php } ?>

<script>
    $('#Muestreo_date_proposed').datepicker({format: 'dd-mm-yyyy'});
    $('#yw0').on('click', function(){
	var error='';
	if ($('#Muestreo_peso_total').val()=='') {
	    error=error+'Debe ingresar el Peso total<br>';
	}
	if ($('#Muestreo_peso_envase').val()=='') {
	    error=error+'Debe ingresar el Peso de los envases<br>';
	}
	if ($('#Muestreo_nro_envases').val()=='') {
	    error=error+'Debe ingresar el Nro de envases<br>';
	}
	if ($('#Muestreo_date_proposed').val()=='') {
	    error=error+'Debe ingresar la fecha de solicitud<br>';
	}
	if ($('#Muestreo_time_proposed').val()=='') {
	    error=error+'Debe ingresar la hora de solicitud<br>';
	}
	if (error!='') {
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de que generar lotes?");
	if (r == true) {
	    return true;
	} else {
	    return false;
	}
	
    });
</script>
