<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
?>

<div class="form well span12">

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'acondicionamiento-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));

?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php
		$departments = Location::model()->findAll(array(
				'select'   => 't.id, t.department, t.departament_id',
				'group'    => 't.id,t.department',
				'order'	  => 't.department',
				'distinct' => true
			)); 
		$list = CHtml::listData($departments,'departament_id','department');
	?>
	
	<div class="row-fluid">
		<div class="span4"><?php echo $form->dropDownListRow($model, 'departament_id', $list,array('ajax' => array(
									'type'=>'GET', //request type
									'url'=>CController::createUrl('location/provinces'), //url to call.
									'update'=>'#Acondicionamiento_province_id', //selector to update
									'data'   => 'js:$("#Acondicionamiento_departament_id").val()'
									))); ?></div>
		<div class="span4"><?php echo $form->dropDownListRow($model, 'province_id', array(),array('ajax' => array(
									'type'=>'GET', //request type
									'url'=>CController::createUrl('location/districts'), //url to call.
									'update' => '#Acondicionamiento_district_id',
									'data'   => 'js:$("#Acondicionamiento_province_id").val()'
									))); ?></div>
		<div class="span4"><?php echo $form->dropDownListRow($model,'district_id',array(), array('ajax'   => array(
									'type'    => 'GET', 
									'url'     => CController::createUrl('location/district'),									
									))); ?></div>
	</div>
	<div class="row-fluid">	
		<div class="span12"><?php echo $form->textFieldRow($model,'address',array('class'=>'span12')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'number_acondicionamiento',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'number_envases',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'capacidad_envases',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'peso_estimado',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->datepickerRow($model,'fecha_cosecha',
						                          array(	
									  //'class'=>'input-medium span10',
									  //'prepend'=>'<i class="icon-calendar"></i>',
									  'options'=>array( 'format' => 'dd/mm/yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textAreaRow($model,'descripcion_secado',array('class'=>'span12','rows'=>5)); ?></div>
	</div>	 
	<div class="row-fluid">
		<div class="span12"><?php echo $form->dropDownListRow($model, 'disponibilidad', array('select','P','A','C','S'),array());?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'peso_ingreso',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'peso_salida',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'cantidad_lotes',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'cantidad_envases',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textFieldRow($model,'tipo_envase',array('class'=>'span4')); ?></div>
	</div>
	<div class="row-fluid">
		<div class="span4"><?php echo $form->textAreaRow($model,'descripcion',array('size'=>60,'maxlength'=>300,'class'=>'span12','rows'=>5)); ?></div>
		<div class="span4"><?php echo $form->textAreaRow($model,'operatividad',array('size'=>60,'maxlength'=>300,'class'=>'span12','rows'=>5)); ?></div>
		<div class="span4"><?php echo $form->textAreaRow($model,'limpieza',array('size'=>60,'maxlength'=>300,'class'=>'span12','rows'=>5)); ?></div>
	</div>
	
	

	


	

	<div class="row-fluid">
		<div class="span12">
			<div class="form-actions">
				<div class="span4">													  
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger','buttonType'=>'submit', 'label'=>'Cumple','htmlOptions'=>array('class'=>'span12',))); ?>		     
				</div>
				<div class="span4">														  
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'Primary','buttonType'=>'submit', 'label'=>'Condicional','htmlOptions'=>array('class'=>'span12',))); ?>															 
				</div>
				<div class="span4">														  
						  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>'No Cumple','htmlOptions'=>array('class'=>'span12',))); ?>																		 
				</div>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->