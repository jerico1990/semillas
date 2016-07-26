<?php
/* @var $this EtiquetadoController */
/* @var $model Etiquetado */
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
		<?php echo $form->label($model,'muestreo_id'); ?>
		<?php echo $form->textField($model,'muestreo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_solicitud'); ?>
		<?php echo $form->textField($model,'fecha_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitud'); ?>
		<?php echo $form->checkBox($model,'solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_notificado'); ?>
		<?php echo $form->textField($model,'fecha_notificado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notificado'); ?>
		<?php echo $form->checkBox($model,'notificado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_informe'); ?>
		<?php echo $form->textField($model,'fecha_informe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informe'); ?>
		<?php echo $form->checkBox($model,'informe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_rechazado'); ?>
		<?php echo $form->textField($model,'fecha_rechazado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rechazado'); ?>
		<?php echo $form->checkBox($model,'rechazado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->