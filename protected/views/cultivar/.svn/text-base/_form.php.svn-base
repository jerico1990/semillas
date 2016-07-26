<?php
/* @var $this CultivarController */
/* @var $model Crop */
/* @var $form CActiveForm */
if(isset($_REQUEST['id']))
{
	$departments = Location::model()->findAll(array(
				'select'   => 't.id, t.department, t.departament_id',
				//'condition' => 'departament_id = ' .$model->departamento,
				'group'    => 't.id,t.department',
				'order'    => 't.department ASC',
				'distinct' => true
			)); 
	$dpts = CHtml::listData($departments,'departament_id','department');
			
	$provinces = Location::model()->findAll(array(
	'select'    => 't.id, t.province, t.province_id',
	'condition' => 'departament_id = ' . $model->departamento,
	'group'    => 't.id,t.province',			
	'order'		=>	't.province ASC',
	'distinct' => true
	));
	
	$prvs = CHtml::listData($provinces,'province_id','province');
	
	$districts = Location::model()->findAll(array(
	'select'    => 't.id, t.district, t.district_id',
	'condition' => 'departament_id = ' . $model->departamento.' and province_id='. $model->provincia,
	'group'    => 't.id,t.district',			
	'order'		=>	't.district ASC',
	'distinct' => true
	));
	$dsts = CHtml::listData($districts,'district_id','district');
}
else
{
	$departments = Location::model()->findAll(array(
				'select'   => 't.id, t.department, t.departament_id',
				'group'    => 't.id,t.department',
				'order'    => 't.department ASC',
				'distinct' => true
	)); 
	$dpts = CHtml::listData($departments,'departament_id','department');	
	$prvs=array();
	$dsts=array();
}


?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'cultivar-form',
    'htmlOptions'=>array('class'=>'well'),
   
));  ?>

	<?php echo $form->errorSummary($model); ?>

		<?php
			$crop = Crop::model()->findAll('parent is null and status=1'); 
			$lists = CHtml::listData($crop,'id','name');			    
			echo $form->dropDownListRow($model, 'parent', $lists, array('empty'=>'Seleccionar..')); ?>
			
		<?php echo $form->textFieldRow($model,'name',array('size'=>30,'maxlength'=>30)); ?>		
		
		<?php echo $form->textFieldRow($model,'applicant',array('size'=>60,'maxlength'=>150)); ?>
		
		<?php echo $form->datepickerRow($model,'date',
						     array(//'prepend'=>'<li class="icon-calendar"></li>',
								
								'options'=>array( 'format' => 'dd-mm-yyyy', 
								'weekStart'=> 1,
								'showButtonPanel' => true,
								'showAnim'=>'fold',)))
		?>
		
		<?php
		echo $form->dropDownListRow($model,'departamento',$dpts,
							array( 'ajax' => array(
				'type'=>'GET', //request type
				'url'=>CController::createUrl('location/provinces'), //url to call.
				'update'=>'#Crop_provincia', //selector to update
				'data'   => 'js:$("#Crop_departamento").val()'
		)));
		
		echo $form->dropDownListRow($model,'provincia', $prvs,
							array(
								 'ajax' => array(
									 'type'=>'GET', //request type
			'url'=>CController::createUrl('location/districts'), //url to call.
			'update' => '#Crop_location_id',
			'data'   => 'js:$("#Crop_provincia").val()'
		)));	
		echo $form->dropDownListRow($model,'location_id',$dsts, array());
		?>
		
		<?php echo $form->dropDownListRow($model, 'status', array('1'=>'Habilitado','2'=>'Deshabilitado'), array('empty'=>'Seleccionar..')); ?>
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Crear' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->