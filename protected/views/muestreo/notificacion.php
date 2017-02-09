<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>
<script>

$(function(){
    $('#Muestreo_date_real').datepicker({format: 'dd-mm-yyyy'});
    $('#Muestreo_time_real').clockface();
});
</script>
<br>
<div class="form well span12">   
    <?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'muestreo-form',));?>
	<div id="error" style="color: red"></div>
	<div class="row-fluid">
	    <div class="span4">
		<label for="Muestreo_date_real">Fecha</label>
		<input class="produccion" type="text" autocomplete="off" name="Muestreo[date_real]" id="Muestreo_date_real">
	    </div>
	    <div class="span4">
		<label for="Muestreo_time_real">Hora</label>
		<input data-format="hh:mm A" class="input-small" name="Muestreo[time_real]" id="Muestreo_time_real" type="text">
	    </div>
	    
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<div class="form-actions">
		    <button class="btn btn-success" id="yw1" type="submit" name="yt0">Validar</button>
		</div>
	    </div>
	</div>
    <?php $this->endWidget(); ?>
</div>

<script>
    $('#yw1').on('click', function(){
	var error='';
	if ($('#Muestreo_date_real').val()=='') {
	    error=error+'Debe ingresar la fecha de la notificación<br>';
	}
	if ($('#Muestreo_time_real').val()=='') {
	    error=error+'Debe ingresar la hora de notificación<br>';
	}
	
	if (error!='') {
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de que generar la notificación de muestreo?");
	if (r == true) {
	    return true;
	} else {
	    return false;
	}
    });
    
</script>