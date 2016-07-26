<?php
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->district_id));
if($model->registry!==null && $model->registry!=="")
{
$producer=Producer::model()->find('registry=:registry',array(':registry'=>$model->registry));
}

$maestro=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'010'));
$lista=CHtml::listData($maestro,'codigo_detalle','descripcion');
?>


<!--Validar Productor-->
<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<div class="span6 well">
				<!--Productor-->
				<?php 
				$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
					'id'=>'user-form',
					//'htmlOptions'=>array('class'=>'well'),   
				));
				?>		
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->textFieldRow($model,'legal_name',array('size'=>60,'maxlength'=>120,'disabled'=>true ,'class'=>'span12')); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->textFieldRow($model,'ruc',array('size'=>12,'maxlength'=>12,'disabled'=>false,'class'=>'span12')); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->textFieldRow($model,'registry',array('size'=>30,'maxlength'=>30,'disabled'=>true,'class'=>'span12')); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->textFieldRow($model,'email',array('size'=>30,'maxlength'=>30,'disabled'=>false,'class'=>'span12')); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<?php //echo $form->textFieldRow($model,'rcpassword',array('class'=>'span12')); ?>
						</div>
					</div>
					
					
					
					
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->textFieldRow($model,'department_id',array('value'=>$location->department,'disabled'=>true,'class'=>'span12')); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->textFieldRow($model,'province_id',array('value'=>$location->province,'disabled'=>true,'class'=>'span12')); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->textFieldRow($model,'district_id',array('value'=>$location->district,'disabled'=>true,'class'=>'span12')); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->textFieldRow($model,'address',array('size'=>30,'maxlength'=>100,'disabled'=>false,'class'=>'span12')); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<?php echo $form->dropDownListRow($model, 'status', $lista); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">	
							<div class="form-actions">
								<?php $this->widget('bootstrap.widgets.TbButton', array(
															'type'=>'success',
															'buttonType'=>'submit',
															'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
															)); ?>
							</div>
						</div>
					</div>
										
				<?php $this->endWidget(); ?>
			</div>
			<?php if($model->registry!==null && $model->registry!==""){  ?>
			<div class="span6 well">
				<div class="row-fluid">
					<div class="span12">
						<?php echo $form->textFieldRow($producer,'name',array('disabled'=>true ,'class'=>'span12')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<?php echo $form->textFieldRow($producer,'document_number',array('disabled'=>true ,'class'=>'span12')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<?php echo $form->textFieldRow($producer,'registry',array('disabled'=>true ,'class'=>'span12')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<?php echo $form->textFieldRow($producer,'address',array('disabled'=>true ,'class'=>'span12')); ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>	
</div>

