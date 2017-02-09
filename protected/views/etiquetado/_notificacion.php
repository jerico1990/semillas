<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>
<script>

$(function(){
    $('#Etiquetado_hora_notificado_etiquetado').clockface();
});
</script>
<br>
<!--Generar Muestreo-->
<div class="row-fluid well">
    <div class='row-fluid'>      
	<div class="form">
	    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'etiquetado-form',)); ?>
	    <div class="row-fluid">
		<div id="error" style="color: red"></div>
	    </div>
	    <div class="row-fluid">			
		<div class="span4">
		    <label for="Etiquetado_fecha_notificado_etiquetado">Fecha Notificado Etiquetado</label>
		    <input class="etiquetado" value="" type="text" autocomplete="off" name="Etiquetado[fecha_notificado_etiquetado]" id="Etiquetado_fecha_notificado_etiquetado">
		</div>
		<div class="span4">
		    <label for="Etiquetado_hora_notificado_etiquetado">Hora Notificado Etiquetado</label>
		    <input data-format="hh:mm A" class="input-small" value="" name="Etiquetado[hora_notificado_etiquetado]" id="Etiquetado_hora_notificado_etiquetado" type="text">
		</div>
	    </div>
	    <div class="row-fluid">
		<div class="span12">
		    <div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Solicitar','htmlOptions' => array(),)); ?>
		    </div>
		</div>
	    </div>
	    <?php $this->endWidget(); ?>
	</div><!-- form -->
    </div>
</div>
<script>
    $('#Etiquetado_fecha_notificado_etiquetado').datepicker({
	format: 'dd-mm-yyyy',    
    })
    $('body').on('click', '#yw0', function (e) {
	var error='';
	if ($('#Etiquetado_fecha_notificado_etiquetado').val()=='') {
	    error=error+'Debe ingresar la fecha de notificación de etiquetado<br>';
	}
	if ($('#Etiquetado_hora_notificado_etiquetado').val()=='') {
	    error=error+'Debe ingresar la hora de notificación de etiquetado<br>';
	}
	if (error!='') {
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de generar la notificación?");
	if (r == true) {
	    return true;
	} else {
	    return false;
	}
    });
</script>