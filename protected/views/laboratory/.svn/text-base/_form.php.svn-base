<?php
/* @var $this LaboratoryController */
/* @var $model Laboratory */
/* @var $form CActiveForm */
?>

<div class="form well span12">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'laboratory-form',
   
)); ?>


	<div class="row-fluid">
		<div class="span12"><h4>Resultados de los Análisis</h4></div>	
	</div>
	<div class="row-fluid">
		<div class="span4"><?php echo $form->textFieldRow($model,'peso_recibido',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
		<div class="span4"><?php 	echo $form->datepickerRow($model,'date_recepcion',
								array(//'prepend'=>'<li class="icon-calendar"></li>',
								'options'=>array( 'format' => 'dd-mm-yyyy', 
								'weekStart'=> 1,
								'showButtonPanel' => true,
								'showAnim'=>'fold',)))?>
		</div>
		<div class="span4"><?php 	echo $form->datepickerRow($model,'date_termino_analisis',
								array(//'prepend'=>'<li class="icon-calendar"></li>',
								'options'=>array( 'format' => 'dd-mm-yyyy', 
								'weekStart'=> 1,
								'showButtonPanel' => true,
								'showAnim'=>'fold',)))?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12"><h4>Análisis de Pureza</h4></div>      
	</div>
	<div class="row-fluid">
		<div class="span4"><?php echo $form->textFieldRow($model,'semilla_pura',array('size'=>1,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'materia_inerte',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'otras_semillas',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
	</div>
	
	
	<div class="row-fluid">
		<div class="span12"><h4>Prueba de Germinación</h4></div>      
	</div>
	
	<div class="row-fluid">
		<div class="span4"><?php echo $form->textFieldRow($model,'number_day'); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'plantulas_normales',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'semillas_duras',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span4"><?php echo $form->textFieldRow($model,'semillas_frescas',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'plantulas_anormales',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'semillas_muertas',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
	</div>
	
	<div class="row-fluid">
		<div class="span12"><h4>Contenido de Humedad(%)</h4></div>      
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'contenido_humedad',array('size'=>18,'maxlength'=>18,'class'=>'laboratorio')); ?></div>
	</div>
	
	<div class="row-fluid">
		<div class="span12"><h4>Observación</h4></div>      
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textAreaRow($model,'observacion',array('size'=>60,'maxlength'=>300,'class'=>'span10','rows'=>5)); ?></div>
	</div>
	
	<div class="row-fluid">		
		<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>$model->isNewRecord ? 'Reportar' : 'Emitir Informe','htmlOptions' => array('name'=>'btn','value'=>'aceptar'),)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script>
	
	$('.laboratorio').on('blur', function(){
		console.log('trigger')		
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
	})
</script>