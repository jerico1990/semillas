<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
?>


<div class="form well span12" style="background: #FFFFFF">

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'acondicionamiento-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));

?>
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
      <div class="span3"><?php echo $form->textFieldRow($model,'number_envases',array('class'=>'span12')); ?></div>
      <div class="span3"><?php echo $form->textFieldRow($model,'capacidad_envases',array('class'=>'movilizacion span12')); ?></div>
      <div class="span3"><?php echo $form->textFieldRow($model,'movilizacion_cantidad',array('class'=>'movilizacion span12')); ?></div>
      <div class="span3"><?php echo $form->datepickerRow($model,'movilizacion_fecha',
						                          array(	
									  'htmlOptions'=>array('class'=>'span12'),
									  //'prepend'=>'<i class="icon-calendar"></i>',
									  'options'=>array( 'format' => 'dd/mm/yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>
	</div>								  
	 <div class="row-fluid">
					 <div class="span12"><h4>Origen de la movilización</h4></div>      
	</div>
   <div class="row-fluid">
		<div class="span12">					 
			<?php echo $form->radioButtonListRow($model, 'movilizacion_origen', array(
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
      <div class="span12"><?php echo $form->textFieldRow($model,'movilizacion_origen_predio',array('class'=>'span6')); ?></div>
	</div>
   <div class="row-fluid">     
      <div class="span4">Departamento<?php echo CHtml::dropDownList('odepartment_id','', $list,
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
									'update' => '#Acondicionamiento_movilizacion_origen_distrito',
									'data'   => 'js:$("#oprovince_id").val()'
									)));?></div>
      <div class="span4"><?php echo $form->dropDownListRow($model,'movilizacion_origen_distrito',array(), array('class'=>'span12',));?></div>
	</div> 
   <div class="row-fluid">
					 <div class="span12"><h4>Destino de la movilización</h4></div>      
	</div>
   <div class="row-fluid">
      <div id="destino" class="span12">
		<?php echo $form->radioButtonListRow($model, 'movilizacion_destino', array(
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
      <div class="span6"><?php echo $form->textFieldRow($model,'movilizacion_destino_predio',array('class'=>'span12')); ?></div>
		<div class="span6"><?php echo $form->textFieldRow($model,'registro_planta',array('class'=>'span12')); ?></div>
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
									'update' => '#Acondicionamiento_movilizacion_destino_distrito',
									'data'   => 'js:$("#dprovince_id").val()'
									)));?></div>
      <div  class="span4"><?php echo $form->dropDownListRow($model,'movilizacion_destino_distrito',array(), array('class'=>'span12',));?></div>
	<?php echo CHtml::hiddenField('id_acondicionamiento',$model->id); ?>
	<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
	</div>	
		  <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <div class="span4">                             
                  </div>
                  <div class="span4">
							<?php $this->widget('bootstrap.widgets.TbButton',
											array('type'=>'success',
												'buttonType'=>'ajaxButton',
												'label'=>'Aceptar',
												'url'=>Yii::app()->createUrl( 'acondicionamiento/movilizaciona' ),
												'ajaxOptions'=>array(			     
												'type'=>'POST',	
												'data' => 'js:$("#acondicionamiento-form").serialize()',
												'success' => 'function(data){
																				location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/view/"+$("#formu").val());
																				}'
												)
												,
												'htmlOptions'=>array('class'=>'span12',
												'url'=>Yii::app()->createUrl( 'acondicionamiento/movilizaciona' ),)
											)); ?>
							
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton',
															 array(
																	'type'=>'danger',
																	'buttonType'=>'ajaxButton',
																	'label'=>'Cancelar',
																	'ajaxOptions'=>array(
																		'success' => 'function(){
																		location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/iview/"+$("#formu").val());
																		}'	),
																	'htmlOptions'=>array('class'=>'span12',))); ?>
						</div>
               </div>
            </div>
        </div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$('.movilizacion').on('keyup', function(){
		$('#Acondicionamiento_capacidad_envases').val(numeral($('#Acondicionamiento_capacidad_envases').val()).format('0,0'));
		$('#Acondicionamiento_movilizacion_cantidad').val(numeral($('#Acondicionamiento_movilizacion_cantidad').val()).format('0,0'));
	
	});
	
</script>
