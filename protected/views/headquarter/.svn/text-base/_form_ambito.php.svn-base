<?php
/* @var $this HeadquarterController */
/* @var $model Headquarter */
/* @var $form CActiveForm */

	$ee=Headquarter::model()->findAll('parent_id is null and tipo_usuario=:tipo_usuario',array(':tipo_usuario'=>'2'));
	$lista_ee=CHtml::listData($ee,'id','name');
	
	$departments = Location::model()->findAll(array(
				'select'   => 't.id, t.department, t.departament_id',
				'group'    => 't.id,t.department',
				'order'	  => 't.department ASC',
				//'condition'=> 't.departament_id='.substr($ee->location_id,0,2),
				'distinct' => true
			)); 
	$list = CHtml::listData($departments,'departament_id','department');
	
?>
<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'headquarter-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'htmlOptions'=>array('class'=>'well'),
   
)); ?>

	<?php echo $form->errorSummary($model); ?>
		<?php //echo $form->textFieldRow($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		
		<div class="row-fluid" >
		  <div class="span4"><?php echo $form->dropDownListRow($model,'parent_id',$lista_ee,array('empty'=>' ')); ?>
		  </div>
		  <div class="span8">
		  </div>
		</div>
		
		<div class="row-fluid" >
		  <div class="span4"><?php echo $form->dropDownListRow($model,'location_id',$list,array('empty'=>' ')); ?>
		  </div>
		  <div class="span8">
		  </div>
		</div>
		
	<div class="row-fluid" >
		  <div class="span4"><?php echo $form->textFieldRow($model,'codigo_simple',array('size'=>10,'maxlength'=>50,'class'=>'span12')); ?>
		  </div>
		  <div class="span8">
		  </div>
	</div>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Crear' : 'Guardar')); ?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->