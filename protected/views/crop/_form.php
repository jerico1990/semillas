<?php
/* @var $this CropController */
/* @var $model Crop */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'crop-form',
    'htmlOptions'=>array('class'=>'well'),
   
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->textFieldRow($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		
		<?php echo $form->dropDownListRow($model, 'status', array('1'=>'Habilitado','2'=>'Deshabilitado'), array('empty'=>'Seleccionar..')); ?>
				
	<div class="form-actions">		
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Crear' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->