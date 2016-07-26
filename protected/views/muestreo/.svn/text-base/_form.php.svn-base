<?php
/* @var $this MuestreoController */
/* @var $model Muestreo */
/* @var $form CActiveForm */

$departments = Location::model()->findAll(array(
					 'select'   => 't.id, t.department, t.departament_id',
					 'group'    => 't.id,t.department',
					 'order'    => 't.department ASC',
					 'distinct' => true
		  )); 
$listdeparts = CHtml::listData($departments,'departament_id','department');


$maestro=Maestro::model()->findAll('codigo=:codigo',array(':codigo'=>'011'));
$lista=CHtml::listData($maestro,'codigo_detalle','descripcion');

$laboratorios=User::model()->findAll('type_id=:type_id',array(':type_id'=>6));
$lista_laboratorios=CHtml::listData($laboratorios,'id','legal_name');
?>

<div class="form well span12">

<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
               'id'=>'muestreo-form',
            ));
?>

	

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row-fluid">
		<div class="span12"><h4>Datos del Muestreo</h4></div>      
	</div>
	<div class="row-fluid">			 				
		<div class="span4"><?php echo $form->textFieldRow($model,'name_muestreador',array('size'=>60,'maxlength'=>150)); ?></div>
		<div class="span4"><?php echo $form->datepickerRow($model,'fecha_muestreo',
																				 array(	
																					  //'class'=>'input-medium span10',
																					  //'prepend'=>'<i class="icon-calendar"></i>',
																					  'htmlOptions'=>array('class'=>'produccion','value'=>''),
																					  'options'=>array( 'format' => 'dd-mm-yyyy', 
																					  'weekStart'=> 1,
																					  'showButtonPanel' => true,
																					  'showAnim'=>'fold',))); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'peso_muestra',array('size'=>18,'maxlength'=>18)); ?></div>
	</div>
	<div class="row-fluid">			 				
		<div class="span12"><?php echo $form->textFieldRow($model,'lugar_ubicacion',array('size'=>60,'maxlength'=>300,'class'=>'span8')); ?></div>		
	</div>
		
		
	<div class="row-fluid">		  
		<div class="span4">
		<?php echo $form->dropDownListRow($model,'department_id',$listdeparts,array(								
				  'ajax' => array(
				  'type'=>'GET', //request type
				  'url'=>CController::createUrl('location/provinces'), //url to call.
				  'update'=>'#Muestreo_province_id', //selector to update
				  'data'   => 'js:$("#Muestreo_department_id").val()'
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
							 'update' => '#Muestreo_district_id',
							 'data'   => 'js:$("#Muestreo_province_id").val()'
						 ))); ?></div>
		<div class="span4"></div>
	</div>
	
	<div class="row-fluid">		  
		<div class="span8"><?php echo $form->dropDownListRow($model,'district_id',array(), array()); ?></div>
		<div class="span4"></div>
	</div>
	
	<div class="row-fluid">			 				
		<div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_germinacion'); ?></div>
		<div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_humedad'); ?></div>
		<div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_pureza'); ?></div>
		<div class="span3"><?php echo $form->checkboxRow($model, 'tipo_analisis_otras_especies'); ?></div>
	</div>

	<div class="row-fluid">			 				
		<div class="span8"><?php echo $form->textAreaRow($model,'observacion',array('size'=>60,'maxlength'=>300,'rows'=>'6','class'=>'span12')); ?></div>
	</div>
	<div class="row-fluid">		  
		<div class="span8"><?php echo $form->dropDownListRow($model,'laboratorio_id',$lista_laboratorios, array('empty'=>' ')); ?></div>
		<div class="span4"></div>
	</div>
	
	<div class="row-fluid">
		<div class="span12">
			<div class="form-actions">																							 
				<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>$model->isNewRecord ? 'Crear' : 'Aceptar','htmlOptions' => array('name'=>'btn','value'=>'aceptar'),)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'danger','buttonType'=>'submit','label'=>$model->isNewRecord ? :'Rechazar','htmlOptions' => array('name'=>'btn','value'=>'rechazar'),)); ?>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->