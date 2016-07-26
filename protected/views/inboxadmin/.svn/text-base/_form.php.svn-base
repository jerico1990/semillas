<?php
/* @var $this InboxadminController */
/* @var $model Inbox */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inbox-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('readonly' => true)); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'form_id'); ?>
		<?php echo $form->textField($model,'form_id', array('readonly' => true)); ?>
		<?php echo $form->error($model,'form_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php echo $form->textField($model,'to',array('readonly' => true)); ?>
		<?php echo $form->error($model,'to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id',array('readonly' => true)); ?>
		<?php echo $form->error($model,'status_id'); ?>
	</div>
		
		<?php
			$inspector = User::model()->findAll('type_id=1');		 
			$list = CHtml::listData($inspector,'id','ruc');
			
			echo $form->dropDownList($model, 'inspector_id', $list, array('empty'=>'Seleccionar..'));
		?>

	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->