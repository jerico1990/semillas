
<?php

//$maestro=Maestro::model()->find('codigo_detalle=:detalle and codigo=:codigo', array(':detalle'=>$data->category,':codigo'=>'005'));
?>

<div class="form">

<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));*/

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'form-form',
    'htmlOptions'=>array('class'=>'well'),
   
)); ?>



	<p class="note">Campos <span class="required">*</span> requeridos.</p>
		
	<?php echo $form->errorSummary($model); ?>

	
	
	
	<h2>Semilla a Producir</h2>
	
		
		<?php
		
			$crop = Crop::model()->findAll(array('condition'=>'parent is null'));
			 
			$list = CHtml::listData($crop,'id','name');                 
			
			
			echo CHtml::dropDownList('crop_id',$model, $list,array('empty'=>'Seleccionar..',
									   'ajax' => array(
											   'type'=>'POST', //request type
											   'url'=>CController::createUrl('crop/variedad'), //url to call.
											   'success' => 'function(data) { $("#Form_variety_id").append(data); console.log($("Form_variety_id"))}'
											   )
										    )
						 );
                                        
		?>
		
		<?php   		
			echo $form->dropDownListRow($model,'variety_id', array(),array());		
		?>
		
	
		
		
		<?php	echo $form->dropDownListRow($model, 'category', array('1'=>'Basica','2'=>'Registrada','3'=>'Certificada','4'=>'Autorizada'), array('empty'=>'Seleccionar..')); ?>

		

		
		
		
		
	<h2>Fuente de Origen</h2>	
	
	
		<?php echo $form->textFieldRow($model,'source_crop_code',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'source_crop_code'); ?>
	
	
		<?php echo $form->textFieldRow($model,'quantity',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'quantity'); ?>
	

	<h2>Campo de Multiplicacion</h2>
	
	<?php 	$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'tabs'=>array(
		array('label'=>'Datos',
			'content'=>								
				$form->textFieldRow($model,'location_name').
				$form->error($model,'location_name').
				
				$form->textFieldRow($model,'area',array('size'=>18,'maxlength'=>18)).
				$form->error($model,'area').
							
				$form->datepickerRow($model,'seed_date',
						     array('prepend'=>'<li class="icon-calendar"></li>',
								'options'=>array( 'format' => 'dd/mm/yyyy', 
								'weekStart'=> 1,
								'showButtonPanel' => true,
								'showAnim'=>'fold',))).
				$form->error($model,'seed_date').				
				
				$form->textFieldRow($model,'sow_estimate_quantity').
				$form->error($model,'sow_estimate_quantity').				
				
				$form->textFieldRow($model,'last_crop').
				$form->error($model,'last_crop'),
				'active'=>true
				),		
		array('label'=>'Ubicacion',
			'content'=>				
				$form->textFieldRow($model,'location_id').
				$form->error($model,'location_id').
				
				$form->textFieldRow($model,'location_annex',array('size'=>60,'maxlength'=>100)).
				$form->error($model,'location_annex')
				),
		),
	)); ?>
		
	
	<h2>Agricultor Multiplicador</h2>
	
		<?php echo $form->textFieldRow($model,'farmers_id'); ?>
		<?php echo $form->error($model,'farmers_id'); ?>
	
		<?php //echo $form->labelEx($model,'registry_date'); ?>
		<?php /*echo $form->datepickerRow($model,'registry_date',
						     array('prepend'=>'<li class="icon-calendar"></li>',
								'options'=>array( 'format' => 'dd/mm/yyyy', 
								'weekStart'=> 1,
								'showButtonPanel' => true,
								'showAnim'=>'fold',))); */?>
		<?php //echo $form->error($model,'registry_date'); ?>
	
	
		<?php //echo $form->textFieldRow($farmers,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php //echo $form->error($farmers,'name'); ?>
	
		<?php //echo $form->textFieldRow($farmers,'last_name',array('size'=>30,'maxlength'=>30)); ?>
		<?php //echo $form->error($farmers,'last_name'); ?>
	
		<?php //echo $form->textFieldRow($farmers,'document_number',array('size'=>12,'maxlength'=>12)); ?>
		<?php //echo $form->error($farmers,'document_number'); ?>
	
	
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Crear' : 'Guardar')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','url'=>array('index'), 'label'=>'Cancelar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->