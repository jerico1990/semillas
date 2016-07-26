<?php
/* @var $this LaboratoryController */
/* @var $model Laboratory */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'form_id'); ?>
		<?php echo $form->textField($model,'form_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peso_recibido'); ?>
		<?php echo $form->textField($model,'peso_recibido',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_recepcion'); ?>
		<?php echo $form->textField($model,'date_recepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_termino_analisis'); ?>
		<?php echo $form->textField($model,'date_termino_analisis'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_analisis'); ?>
		<?php echo $form->textField($model,'number_analisis',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semilla_pura'); ?>
		<?php echo $form->textField($model,'semilla_pura',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'materia_inerte'); ?>
		<?php echo $form->textField($model,'materia_inerte',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otras_semillas'); ?>
		<?php echo $form->textField($model,'otras_semillas',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_day'); ?>
		<?php echo $form->textField($model,'number_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plantulas_normales'); ?>
		<?php echo $form->textField($model,'plantulas_normales',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semillas_duras'); ?>
		<?php echo $form->textField($model,'semillas_duras',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semillas_frescas'); ?>
		<?php echo $form->textField($model,'semillas_frescas',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plantulas_anormales'); ?>
		<?php echo $form->textField($model,'plantulas_anormales',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semillas_muertas'); ?>
		<?php echo $form->textField($model,'semillas_muertas',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contenido_humedad'); ?>
		<?php echo $form->textField($model,'contenido_humedad',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clase_materia_inerte'); ?>
		<?php echo $form->textField($model,'clase_materia_inerte',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion'); ?>
		<?php echo $form->textField($model,'observacion',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->