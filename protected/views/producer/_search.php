<?php
/* @var $this ProducerController */
/* @var $model Producer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	

	<div class="row">
		<?php echo $form->label($model,'registry'); ?>
		<?php echo $form->textField($model,'registry',array('size'=>50,'maxlength'=>50)); ?>
	</div>	

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'document_number'); ?>
		<?php echo $form->textField($model,'document_number',array('size'=>15,'maxlength'=>15)); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->