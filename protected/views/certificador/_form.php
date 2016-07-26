<?php
/* @var $this CertificadorController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->textField($model,'role_id'); ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ruc'); ?>
		<?php echo $form->textField($model,'ruc',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'ruc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cruge_user_id'); ?>
		<?php echo $form->textField($model,'cruge_user_id'); ?>
		<?php echo $form->error($model,'cruge_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_type'); ?>
		<?php echo $form->textField($model,'person_type',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'person_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'legal_name'); ?>
		<?php echo $form->textField($model,'legal_name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'legal_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registry'); ?>
		<?php echo $form->textField($model,'registry',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'registry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district_id'); ?>
		<?php echo $form->textField($model,'district_id'); ?>
		<?php echo $form->error($model,'district_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'headquarter_id'); ?>
		<?php echo $form->textField($model,'headquarter_id'); ?>
		<?php echo $form->error($model,'headquarter_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reference'); ?>
		<?php echo $form->textField($model,'reference',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'reference'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_number'); ?>
		<?php echo $form->textField($model,'document_number',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'document_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_estacion'); ?>
		<?php echo $form->textField($model,'parent_estacion'); ?>
		<?php echo $form->error($model,'parent_estacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->