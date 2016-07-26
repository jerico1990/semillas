<?php
		  $departments = Location::model()->findAll(array(
					 'select'   => 't.id, t.department, t.departament_id',
					 'group'    => 't.id,t.department',
					 'distinct' => true
		  )); 
		  $list = CHtml::listData($departments,'departament_id','department');
		  
		  $heard = Headquarter::model()->findAll('tipo_usuario=:tipo_usuario',array(':tipo_usuario'=>'2'));
		  $heardlist = CHtml::listData($heard,'id','name');
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
	'id'=>'users-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('class'=>'well'),
   
));
?>
<?php echo $form->errorSummary($model); ?>		
<div class="row-fluid" >
		  <div class="span12"><h3>Datos Personales</h3>
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'document_number',array('size'=>12,'maxlength'=>12,'class'=>'span12')); ?>
		  </div>
		  <div class="span8">
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span8"><?php echo $form->textFieldRow($model,'first_name',array('size'=>50,'maxlength'=>50,'class'=>'span12')); ?>
		  </div>
		  <div class="span4">
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span8"><?php echo $form->textFieldRow($model,'last_name',array('size'=>50,'maxlength'=>50,'class'=>'span12')); ?>
		  </div>
		  <div class="span4">
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span12"><h3>Cuenta</h3>
</div>
</div>
<div class="row-fluid">		  
		  <div class="span4"><?php echo $form->textFieldRow($model,'username',array('size'=>30,'maxlength'=>30,'class'=>'span12')); ?>
		  </div>
		  <div class="span8">
		  </div>
</div>
<div class="row-fluid">		  
		  <div class="span8"><?php echo $form->textFieldRow($model,'email',array('size'=>30,'maxlength'=>30,'class'=>'span12')); ?>
		  </div>
		  <div class="span4">
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span12"><h3>Estación</h3>
		  </div>
</div>
<div class="row-fluid">		  
		  <div class="span8"><?php echo $form->dropDownListRow($model,'headquarter_id',$heardlist); ?>
		  </div>
		  <div class="span4">
		  </div>
</div>
<div class="row-fluid">
		  <div class="span12">
					 <div class="form-actions">																							 
								<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>$model->isNewRecord ? 'Crear' : 'Guardar','htmlOptions' => array('class'=>'ui-button-primary'),)); ?>
					 </div>
		  </div>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->