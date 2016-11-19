<?php
	$departments = Location::model()->findAll(array(
			  'select'   => 't.id, t.department, t.department_id',
			  'group'    => 't.id,t.department',
			  'order'    => 't.department ASC',
			  'distinct' => true
	)); 
	$list = CHtml::listData($departments,'departament_id','department');
?>


<div class="form well span12">

<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));*/
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('class'=>'well'),
   
));

?>
	<?php echo $form->errorSummary($model); ?>
		
		
		  <div class="row-fluid">		  
					 <div class="span12"><h4>Datos de Productor de Semillas</h4>
		  </div>					
		  </div>
		  <div class="row-fluid" >
					 <div class="span4"><?php echo $form->textFieldRow($model,'registry',array('class'=>'span12','size'=>30,'maxlength'=>30)); ?></div>
					 <div class="span8"></div>
		  </div>
		  <div class="row-fluid" >
					 <div class="span4"><?php echo $form->textFieldRow($model,'ruc',array('class'=>'span12','size'=>12,'maxlength'=>12)); ?></div>
					 <div class="span8"><?php echo $form->textFieldRow($model,'legal_name',array('class'=>'span12','size'=>60,'maxlength'=>120)); ?></div>
		  </div>
		  
		  <div class="row-fluid">		  
					 <div class="span12"><h4>Datos de Usuario Responsable</h4>
		  </div>
		  <div class="row-fluid" >
					 <div class="span4"><?php echo $form->textFieldRow($model,'document_number',array('class'=>'span12','size'=>12,'maxlength'=>12)); ?></div>
					 <div class="span8"></div>
		  </div>
		  <div class="row-fluid" >
					 <div class="span6"><?php echo $form->textFieldRow($model,'first_name',array('class'=>'span12','size'=>50,'maxlength'=>50)); ?></div>
					 <div class="span6"><?php echo $form->textFieldRow($model,'last_name',array('class'=>'span12','size'=>50,'maxlength'=>50)); ?></div>
		  </div>
		  <div class="row-fluid" >
					 <div class="span4"><?php echo $form->textFieldRow($model,'email',array('class'=>'span12','size'=>30,'maxlength'=>30)); ?></div>
					 <div class="span8"></div>
		  </div>
		  <div class="row-fluid"  >
					 <div class="span6"><?php echo $form->textFieldRow($model,'phone',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>
					 <div class="span6"><?php echo $form->textFieldRow($model,'fax',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?></div>
		  </div>
	
		
		  <div class="row-fluid" >
					 <div class="span12"><h4>Dirección del Productor de Semillas</h4>
		  </div>
		  </div>
		  <div class="row-fluid">		  
					 <div class="span4">
					 <?php echo $form->dropDownListRow($model,'department_id',$list,array(								
								'ajax' => array(
								'type'=>'GET', //request type
								'url'=>CController::createUrl('location/provinces'), //url to call.
								'update'=>'#User_province_id', //selector to update
								'data'   => 'js:$("#User_department_id").val()'
						))); ?>
					 </div>
					 <div class="span8">
					 </div>
		  </div>
		  <div class="row-fluid">		  
					 <div class="span8"> <?php echo $form->dropDownListRow($model,'province_id',array(),array(								
								'ajax' => array(
										 'type'=>'GET', //request type
										  'url'=>CController::createUrl('location/districts'), //url to call.
										  'update' => '#User_district_id',
										  'data'   => 'js:$("#User_province_id").val()'
									  ))); ?>
					 </div>
					 <div class="span4">
					 </div>
		  </div>
		  
		  <div class="row-fluid">		  
					 <div class="span8"> <?php echo $form->dropDownListRow($model,'district_id',array(), array()); ?>
					 </div>
					 <div class="span4">
					 </div>
		  </div>	
		  <div class="row-fluid">		  
					 <div class="span12"><?php echo $form->textFieldRow($model,'address',array('class'=>'span12','size'=>50,'maxlength'=>150)); ?>
					 </div>
		  </div>
		  <div class="row-fluid">		  
					 <div class="span12"><?php echo $form->textFieldRow($model,'reference',array('class'=>'span12','size'=>50,'maxlength'=>200)); ?>
					 </div>
		  </div>
		  <div class="row-fluid">
				<div class="span12">
					<div class="form-actions">																							 
						<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>$model->isNewRecord ? 'Enviar' : 'Guardar','htmlOptions' => array(),)); ?>
					</div>
				</div>
		  </div>


<?php $this->endWidget(); ?>

</div><!-- form -->
