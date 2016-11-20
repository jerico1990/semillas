<?php

//$data=Location::model()->find('id=:id', array(':id'=>$model->id));

	
	$maestros = Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'007'));			 
	$listp = CHtml::listData($maestros,'id','descripcion');
	
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

<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'producer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));*/
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'producer-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('class'=>'well'),
   
));
?>
	<?php echo $form->errorSummary($model); ?>
		
			<div class="row-fluid" >
				<div class="span12"><h3>Datos Generales</h3></div>
			</div>
		  
			<div class="row-fluid" >
				<div class="span12"><?php echo $form->textFieldRow($model,'registry',array('class'=>'span6','size'=>50,'maxlength'=>50)); ?></div>
			</div>
			<div class="row-fluid" >
				<div class="span6"><?php echo $form->textFieldRow($model,'libro',array('class'=>'span12')); ?></div>
				<div class="span6"><?php echo $form->textFieldRow($model,'folio',array('class'=>'span12')); ?></div>
			</div>
			<div class="row-fluid" >
				<div class="span6"><?php echo $form->textFieldRow($model,'document_number',array('size'=>15,'maxlength'=>15,'class'=>'span12')); ?></div>
				<div class="span6"><?php echo $form->textFieldRow($model,'name',array('class'=>'span10','size'=>60,'maxlength'=>120,'class'=>'span12')); ?></div>
			</div>
		  
			<div class="row-fluid" >
				<div class="span12"><h3>Dirección</h3></div>
			</div>
		  
			<div class="row-fluid" >
				<div class="span12">
			<?php
				echo $form->dropDownListRow($model,'departamento',$dpts,
									array( 'ajax' => array(
						'type'=>'GET', //request type
						'url'=>CController::createUrl('location/provinces'), //url to call.
						'update'=>'#Producer_provincia', //selector to update
						'data'   => 'js:$("#Producer_departamento").val()'
				))); ?></div>
				
			</div>	
			<div class="row-fluid" >
				<div class="span12">
				<?php echo $form->dropDownListRow($model,'provincia', $prvs,
							array(
								 'ajax' => array(
									 'type'=>'GET', //request type
				'url'=>CController::createUrl('location/districts'), //url to call.
				'update' => '#Producer_location_id',
				'data'   => 'js:$("#Producer_provincia").val()'
			))); ?>
			</div>				
			</div>
		  
			<div class="row-fluid" >
				<div class="span12">
				<?php echo  $form->dropDownListRow($model,'location_id',$dsts, array('class'=>'span4')); ?>
			</div>				
			</div>
			<div class="row-fluid" >
					 <div class="span12">
					 <?php echo $form->textFieldRow($model,'address',array('class'=>'span8','size'=>60,'maxlength'=>250)); ?>
					 </div>				
			</div>	
			<div class="row-fluid" >
					 <div class="span12">
					 <?php echo $form->dropDownListRow($model, 'status_admin', $listp, array('empty'=>'Seleccionar..')); ?>
					 </div>				
			</div>		
			<div class="row-fluid" >
					<div class="span8">
					</div>
						<div class="span4">
							<div class="form-actions">										  
									  <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','htmlOptions'=>array('class'=>'span12',),'buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Crear' : 'Guardar')); ?>
							</div>
					 </div>
			</div>
<?php $this->endWidget(); ?>
</div><!-- form -->