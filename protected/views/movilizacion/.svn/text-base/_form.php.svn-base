<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */

$criteria1=new CDbCriteria;
$criteria1->condition='form_id=:form_id';
$criteria1->params=array(':form_id'=>$id);
$movilizaciones = Movilizacion::model()->findAll($criteria1);
?>

<div class="row-fluid well">
	<div class='row-fluid'>
		<div class='span2'>Fecha</div>
		<div class='span2'>Cantidad(kg)</div>
		<div class='span6'></div>
	</div>
	<?php
		foreach($movilizaciones as $movilizacion){
			echo "<div class='row-fluid'>
					<div class='span2'>".date('d-m-Y',strtotime($movilizacion->fecha))."</div>
					<div class='span2'>$movilizacion->cantidad_movilizar</div>
					<div class='span6'>".CHtml::link('Descargar',array('pdf/movilizacion','id'=>$movilizacion->id))."</div>
				</div>";
			//echo $produccion->area." ".$produccion->produccion." ".$produccion->fecha_cosecha."</br>";		
		}
	?>
</div>


<div class="form well span12" >





<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'acondicionamiento-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));

?>
<?php echo CHtml::hiddenField('form_id',$id); ?>
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
					 <div class="span12"><h4>Semilla a movilizar</h4></div>      
	</div> 
   <div class="row-fluid">
      <div class="span3"><?php echo $form->textFieldRow($model,'cantidad_envases',array('class'=>'movilizacion span12')); ?></div>
      <div class="span3"><?php echo $form->textFieldRow($model,'capacidad_envases',array('class'=>'movilizacion span12')); ?></div>
      <div class="span3"><?php echo $form->textFieldRow($model,'cantidad_movilizar',array('class'=>'movilizacion span12')); ?></div>
      <div class="span3"><?php echo $form->datepickerRow($model,'fecha',
						                          array(	
									  'htmlOptions'=>array('class'=>'span12'),
									  //'prepend'=>'<i class="icon-calendar"></i>',
									  'options'=>array( 'format' => 'dd-mm-yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>
	</div>								  
	 <div class="row-fluid">
					 <div class="span12"><h4>Origen de la movilización</h4></div>      
	</div>
   <div class="row-fluid">
		<div class="span12">					 
			<?php echo $form->radioButtonListRow($model, 'origen', array(
			'Planta de acondicionamiento',
			'Almacén',
			'Campo de multiplicación',
			)); ?>
			
		   <?php //echo $form->checkBoxListInlineRow($model, 'movilizacion_origen', array('Planta de acondicionamiento', 'Almacén', 'Campo de multiplicación'),array('name'=>'check')); ?>
		</div >
	</div>
	<div class="row-fluid">
      <div class="span12"></div>     
	</div>
	<div class="row-fluid">
      <div class="span12"><?php echo $form->textFieldRow($model,'origen_nombre_predio',array('class'=>'span6')); ?></div>
	</div>
   <div class="row-fluid">     
      <div class="span4">Región<?php echo CHtml::dropDownList('odepartment_id','', $list,
																		  array(
																					 'class'=>'span12',
																					 'ajax' => array(
																							 'type'=>'GET', //request type
																							 'url'=>CController::createUrl('location/provinces'), //url to call.
																							 'update'=>'#oprovince_id', //selector to update
																							 'data'   => 'js:$("#odepartment_id").val()'
																							 )));?></div>
      <div class="span4">Provincia<?php  echo CHtml::dropDownList('oprovince_id','', array(),
						    array(
								'class'=>'span12',
							   'ajax' => array(
									'type'=>'GET', //request type
									'url'=>CController::createUrl('location/districts'), //url to call.
									'update' => '#Movilizacion_origen_district_id',
									'data'   => 'js:$("#oprovince_id").val()'
									)));?></div>
      <div class="span4"><?php echo $form->dropDownListRow($model,'origen_district_id',array(), array('class'=>'span12',));?></div>
	</div> 
   <div class="row-fluid">
					 <div class="span12"><h4>Destino de la movilización</h4></div>      
	</div>
   <div class="row-fluid">
      <div id="destino" class="span12">
		<?php echo $form->radioButtonListRow($model, 'destino', array(
			'Planta de acondicionamiento',
			'Almacén',
			'Campo de multiplicación',
			)); ?>
			
		<?php //echo $form->checkBoxListInlineRow($model, 'movilizacion_destino', array('Planta de acondicionamiento', 'Almacén'),array()); ?>
		</div>
		<div id="destino" class="span12">
			
		</div>
		
	
	</div>
	
	<div class="row-fluid">
      <div class="span6"><?php echo $form->textFieldRow($model,'destino_nombre_predio',array('class'=>'span12')); ?></div>
		<div class="span6">
		<?php //echo $form->textFieldRow($model,'destino_registro',array('class'=>'span12')); ?>
		<?php echo $form->labelEx($model,'destino_registro');?>
		<?php $this->widget('bootstrap.widgets.TbTypeahead', array(
                     'model'=>$model, // instance of model 'User'
                     'name'=>'destino_registro',
                     //'attribute'=>'destino_registro', // foreign key field
                     'options'=>array(
                         'source'=>CJSON::decode($plantas),                        
                         'items'=>3,
                         'matcher'=>"js:function(item) {return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
                         ),                     )
                 );
                 ?>
		</div>
	</div>
   <div class="row-fluid">     
      <div class="span4">Departamento<?php echo CHtml::dropDownList('ddepartment_id','', $list,
																		  array(
																					 'class'=>'span12',
																					 'ajax' => array(
																							 'type'=>'GET', //request type
																							 'url'=>CController::createUrl('location/provinces'), //url to call.
																							 'update'=>'#dprovince_id', //selector to update
																							 'data'   => 'js:$("#ddepartment_id").val()'
																							 )));?></div>
      <div class="span4">Provincia<?php  echo CHtml::dropDownList('dprovince_id','', array(),
						    array(
								'class'=>'span12',
							   'ajax' => array(
									'type'=>'GET', //request type
									'url'=>CController::createUrl('location/districts'), //url to call.
									'update' => '#Movilizacion_destino_district_id',
									'data'   => 'js:$("#dprovince_id").val()'
									)));?></div>
      <div  class="span4"><?php echo $form->dropDownListRow($model,'destino_district_id',array(), array('class'=>'span12',));?></div>
	<?php echo CHtml::hiddenField('id_acondicionamiento',$model->id); ?>
	<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
	</div>
	
		  <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <div class="span4">                             
                  </div>
                  <div class="span4">
						
							
                  </div>
                  <div class="span4">														  
                       <?php $this->widget('bootstrap.widgets.TbButton',
															  array('type'=>'success',
																	  'buttonType'=>'submit',
																	  'label'=>$model->isNewRecord ? 'Reportar' : 'Aceptar',
																	  'htmlOptions'=>array('class'=>'span12 ',))); ?>
						</div>
               </div>
            </div>
        </div>
	
	
<?php $this->endWidget(); ?>

</div><!-- form -->



<script>
	$('.movilizacion').on('blur', function(){
		$('#Movilizacion_cantidad_envases').val(numeral($('#Movilizacion_cantidad_envases').val()).format('0,0.00'));
		$('#Movilizacion_capacidad_envases').val(numeral($('#Movilizacion_capacidad_envases').val()).format('0,0.00'));
		$('#Movilizacion_cantidad_movilizar').val(numeral($('#Movilizacion_cantidad_movilizar').val()).format('0,0.00'));
	
	});
	
	
	
</script>
