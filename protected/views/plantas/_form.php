<?php
/* @var $this ConditioningLabController */
/* @var $model ConditioningLab */
/* @var $form CActiveForm */
if(isset($_REQUEST['id']))
{
	$departments = Location::model()->findAll(array(
				'select'   => 't.id, t.department, t.department_id',
				//'condition' => 'departament_id = ' .$model->departamento,
				'group'    => 't.id,t.department',
				'order'    => 't.department ASC',
				'distinct' => true
			)); 
	$dpts = CHtml::listData($departments,'department_id','department');
			
	$provinces = Location::model()->findAll(array(
	'select'    => 't.id, t.province, t.province_id',
	'condition' => 'department_id = ' . $model->departamento,
	'group'    => 't.id,t.province',			
	'order'		=>	't.province ASC',
	'distinct' => true
	));
	
	$prvs = CHtml::listData($provinces,'province_id','province');
	
	$districts = Location::model()->findAll(array(
	'select'    => 't.id, t.district, t.district_id',
	'condition' => 'department_id = ' . $model->departamento.' and province_id='. $model->provincia,
	'group'    => 't.id,t.district',			
	'order'		=>	't.district ASC',
	'distinct' => true
	));
	$dsts = CHtml::listData($districts,'district_id','district');
}
else
{
	$departments = Location::model()->findAll(array(
				'select'   => 't.id, t.department, t.department_id',
				'group'    => 't.id,t.department',
				'order'    => 't.department ASC',
				'distinct' => true
	)); 
	$dpts = CHtml::listData($departments,'department_id','department');	
	$prvs=array();
	$dsts=array();
}
?>

<div class="form well span12">

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'plantas-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('class'=>'well'),
   
));
?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'registry',array('size'=>50,'maxlength'=>50)); ?>
		  </div>
		  <div class="span8">
		  </div>
	</div>
	
	<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		  </div>
		  <div class="span8">
		  </div>
	</div>
	
	<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'document_number',array('size'=>50,'maxlength'=>50)); ?>
		  </div>
		  <div class="span8">
		  </div>
	</div>
	
	<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'address',array('size'=>60,'maxlength'=>250)); ?>
		  </div>
		  <div class="span8">
		  </div>
	</div>
	
	<div class="row-fluid" >
		  <div class="span4"><?php echo $form->datepickerRow($model,'date',
																 array(	
											 'htmlOptions'=>array('class'=>''),
											 'options'=>array( 'format' => 'dd-mm-yyyy', 
											 'weekStart'=> 1,
											 'showButtonPanel' => true,
											 'showAnim'=>'fold',))); ?>
		  </div>
		  <div class="span8">
		  </div>
	</div>
	
	
	

	<?php
			echo $form->dropDownListRow($model,'departamento', $dpts,
                        array( 'ajax' => array(
					'type'=>'GET', //request type
					'url'=>CController::createUrl('location/provinces'), //url to call.
					'update'=>'#Plantas_provincia', //selector to update
					'data'   => 'js:$("#Plantas_departamento").val()'
			)));      
			   
			echo $form->dropDownListRow($model,'provincia', $prvs,
                        array(
                            'ajax' => array(
                               'type'=>'GET', //request type
				'url'=>CController::createUrl('location/districts'), //url to call.
				'update' => '#Plantas_location_id',
				'data'   => 'js:$("#Plantas_provincia").val()'
			)));
		    
			echo $form->dropDownListRow($model,'location_id',$dsts, array());
		?>


	<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'crops',array('size'=>60,'maxlength'=>200)); ?>
		  </div>
		  <div class="span8">
		  </div>
	</div>

	<div class="row-fluid" >
		  <div class="span4"><?php echo $form->dropDownListRow($model,'status_admin',array('1'=>'Habilitado','2'=>'Deshabilitado'),array()); ?>
		  </div>
		  <div class="span8">
		  </div>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Crear' : 'Guardar')); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->