<?php
		  $departments = Location::model()->findAll(array(
					 'select'   => 't.id, t.department, t.departament_id',
					 'group'    => 't.id,t.department',
					 'order'    => 't.department DESC',
					 'distinct' => true
		  )); 
		  $list = CHtml::listData($departments,'departament_id','department');
		  
		  $heard = Headquarter::model()->findAll('parent_id is null');
		  $heardlist = CHtml::listData($heard,'id','name');
		  
		  
		  $tipoempresa=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'008'));
		  $lista_empresa=CHtml::listData($tipoempresa,'codigo_detalle','descripcion');
		  
		  $usuarioempresa=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'009'));
		  $lista_usuario=CHtml::listData($usuarioempresa,'codigo_detalle','descripcion');
?>

<div class="form well span12">

<?php 
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('class'=>'well'),
   
));

?>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid" >
		  <div class="span12"><h3>Datos Empresa</h3>
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'ruc',array('size'=>12,'maxlength'=>12,'class'=>'span12')); ?>
		  </div>
		  <div class="span8">
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'legal_name',array('size'=>12,'maxlength'=>12,'class'=>'span12')); ?>
		  </div>
		  <div class="span8">
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span4"><?php echo $form->dropDownListRow($model,'tipo_empresa',$lista_empresa); ?>
		  
		  </div>
		  <div class="span8">
		  </div>
</div>
<div class="row-fluid" >
		  <div class="span4"><?php echo $form->dropDownListRow($model,'tipo_usuario',$lista_usuario); ?>
		  </div>
		  <div class="span8">
		  </div>
</div>
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
		  <div class="span12"><h3>Dirección</h3>
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
		  <div class="span8"><?php //echo $form->dropDownListRow($model,'headquarter_id',$heardlist); ?>
		  </div>
		  <div class="span4">
		  </div>
</div>		

<div class="row-fluid">
		  <div class="span12">
					 <div class="form-actions">																							 
								<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>$model->isNewRecord ? 'Crear' : 'Guardar','htmlOptions' => array('class'=>''),)); ?>
					 </div>
		  </div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
