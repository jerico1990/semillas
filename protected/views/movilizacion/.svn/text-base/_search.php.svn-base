<?php
/* @var $this MovilizacionController */
/* @var $model Movilizacion */
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
		<?php echo $form->label($model,'cantidad_envases'); ?>
		<?php echo $form->textField($model,'cantidad_envases',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capacidad_envases'); ?>
		<?php echo $form->textField($model,'capacidad_envases',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad_movilizar'); ?>
		<?php echo $form->textField($model,'cantidad_movilizar',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'origen'); ?>
		<?php echo $form->textField($model,'origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'origen_nombre_predio'); ?>
		<?php echo $form->textField($model,'origen_nombre_predio',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'origen_district_id'); ?>
		<?php echo $form->textField($model,'origen_district_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destino'); ?>
		<?php echo $form->textField($model,'destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destino_nombre_predio'); ?>
		<?php echo $form->textField($model,'destino_nombre_predio',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destino_registro'); ?>
		<?php echo $form->textField($model,'destino_registro',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destino_district_id'); ?>
		<?php echo $form->textField($model,'destino_district_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iform_id'); ?>
		<?php echo $form->textField($model,'iform_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->