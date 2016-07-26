<?php
/* @var $this ArrozController */
/* @var $model Inspection */
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
		<?php echo $form->label($model,'inspection_number'); ?>
		<?php echo $form->textField($model,'inspection_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposed_time'); ?>
		<?php echo $form->textField($model,'proposed_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposed_date'); ?>
		<?php echo $form->textField($model,'proposed_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arz_area_instalada'); ?>
		<?php echo $form->textField($model,'arz_area_instalada',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arz_aislamiento'); ?>
		<?php echo $form->textField($model,'arz_aislamiento',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'form_id'); ?>
		<?php echo $form->textField($model,'form_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->