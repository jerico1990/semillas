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

	<?php echo $form->errorSummary($model); ?>
	<?php echo CHtml::hiddenField('condicional_acondicionamientoa_id',$model->id); ?>
	<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
	
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
					 <div class="span12"><h4>Almacenamiento Previo al Acondicionamiento</h4></div>      
	</div> 
	<div class="row-fluid">
		<div class="span4"><?php echo $form->dropDownListRow($model, 'departament_id', $list,array('class'=>'span12','ajax' => array(
									'type'=>'GET', //request type
									'url'=>CController::createUrl('location/provinces'), //url to call.
									'update'=>'#Acondicionamiento_province_id', //selector to update
									'data'   => 'js:$("#Acondicionamiento_departament_id").val()'
									))); ?></div>
		<div class="span4"><?php echo $form->dropDownListRow($model, 'province_id', array(),array('class'=>'span12','ajax' => array(
									'type'=>'GET', //request type
									'url'=>CController::createUrl('location/districts'), //url to call.
									'update' => '#Acondicionamiento_district_id',
									'data'   => 'js:$("#Acondicionamiento_province_id").val()'
									))); ?></div>
		<div class="span4"><?php echo $form->dropDownListRow($model,'district_id',array(), array('class'=>'span12 general',)); ?></div>
	</div>
	<div class="row-fluid">	
		<div class="span12"><?php echo $form->textFieldRow($model,'address',array('class'=>'span9 general')); ?></div>
	</div>
	<div class="row-fluid">			
		<div class="span3"><?php echo $form->textFieldRow($model,'number_envases',array('class'=>'general span12')); ?></div>
		<div class="span3"><?php echo $form->textFieldRow($model,'capacidad_envases',array('class'=>'general span12')); ?></div>
		<div class="span3"><?php echo $form->textFieldRow($model,'peso_estimado',array('class'=>'general span12')); ?></div>
		<div class="span3"><?php echo $form->datepickerRow($model,'fecha_cosecha',
						                          array(
										'htmlOptions'=>array('class'=>'fechas span12'),
									  //'class'=>'input-medium span10',
									  //'prepend'=>'<i class="icon-calendar"></i>',
									  'options'=>array( 'format' => 'dd/mm/yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Condición de Secado</h4></div>      
	</div> 
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textAreaRow($model,'descripcion_secado',array('class'=>'span12 general','rows'=>5)); ?></div>
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Planta de Acondicionamiento</h4></div>      
	</div> 
	<div class="row-fluid">
		<div class="span4"><?php echo $form->dropDownListRow($model, 'disponibilidad', array('P','A','C','S'),array('class'=>'span12 general'));?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'peso_ingreso',array('class'=>'span12')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'registro_planta',array('class'=>'general span12')); ?></div> 
	</div>
	<div class="row-fluid">
		<div class="span4"><?php echo $form->textFieldRow($model,'cantidad_lotes',array('class'=>'general span12')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'cantidad_envases',array('class'=>'span12 general')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'tipo_envase',array('class'=>'span12 general')); ?></div>
	<div class="row-fluid">
					 <div class="span12"><h4>Intalaciones, Equipos y Semilla</h4></div>      
	</div> 
	<div class="row-fluid">
		<div class="span4"><?php echo $form->textAreaRow($model,'descripcion',array('size'=>60,'maxlength'=>300,'class'=>'span12 general','rows'=>5)); ?></div>
		<div class="span4"><?php echo $form->textAreaRow($model,'operatividad',array('size'=>60,'maxlength'=>300,'class'=>'span12 general','rows'=>5)); ?></div>
		<div class="span4"><?php echo $form->textAreaRow($model,'limpieza',array('size'=>60,'maxlength'=>300,'class'=>'span12 ','rows'=>5)); ?></div>
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Identificación del lote de Semilla</h4></div>      
	</div> 
	<div class="row-fluid">
		 <div class="span12">
			<?php echo $form->radioButtonListRow($model, 'identificacion_lote_semilla', array(
			'Cultivar',
			'Categoria',
			'N° de control',
			'Productor de Semillas'
			),array('class'=>'general')); ?>
		 <?php //echo $form->checkBoxListInlineRow($model, 'identificacion_lote_semilla', array('Cultivar', 'Categoria', 'N° de control','Productor de Semillas')); ?>
		 </div> 					 
	</div>
	
	
	<div class="row-fluid">
					 <div class="span12"><h4>Resultado</h4></div>      
	</div>
	<div class="row-fluid">
		<div class="span12"><?php echo $form->textAreaRow($model,'observacion',array('size'=>60,'maxlength'=>300,'class'=>'span12','rows'=>5)); ?></div>
	</div>
	
	<div class="row-fluid">
		<div class="span12">
			<div class="form-actions">
				<div class="span4">
					<!--Aprobado-->
						<!--<a id="myModal_btn_apro" role="button" class="btn btn-success span12">
							Cumple
						</a>-->
						<?php $this->widget('bootstrap.widgets.TbButton', array(
								'id'=>'btn_aprobado_si',								
								'type'=>'success',
								'label'=>'Cumple',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'acondicionamiento/cumple' ),
								'ajaxOptions'=>array(			     
								'type'=>'POST',	
								'data' => array(
											'general_distrito'=>'js:$("#Acondicionamiento_district_id").val()',
											'general_address'=>'js:$("#Acondicionamiento_address").val()',
											'general_number_envases'=>'js:$("#Acondicionamiento_number_envases").val()',
											'general_capacidad_envases'=>'js:$("#Acondicionamiento_capacidad_envases").val()',
											'general_peso_estimado'=>'js:$("#Acondicionamiento_peso_estimado").val()',
											'general_fecha_cosecha'=>'js:$("#Acondicionamiento_fecha_cosecha").val()',
											'general_descripcion_secado'=>'js:$("#Acondicionamiento_descripcion_secado").val()',
											'general_disponibilidad'=>'js:$("#Acondicionamiento_disponibilidad").val()',
											'general_peso_ingreso'=>'js:$("#Acondicionamiento_peso_ingreso").val()',
											'general_registro_planta'=>'js:$("#Acondicionamiento_registro_planta").val()',
											'general_cantidad_lotes'=>'js:$("#Acondicionamiento_cantidad_lotes").val()',
											'general_cantidad_envases'=>'js:$("#Acondicionamiento_cantidad_envases").val()',
											'general_tipo_envase'=>'js:$("#Acondicionamiento_tipo_envase").val()',
											'general_descripcion'=>'js:$("#Acondicionamiento_descripcion").val()',
											'general_operatividad'=>'js:$("#Acondicionamiento_operatividad").val()',
											'general_limpieza'=>'js:$("#Acondicionamiento_limpieza").val()',
											'general_identificacion_lote_semilla'=>'js:$("input[name=\'Acondicionamiento[identificacion_lote_semilla]\']:checked").val()',
											'general_observacion'=>'js:$("#Acondicionamiento_observacion").val()',											 
											'btn'=>'1',
											'id'=>$model->id,										
											),
								'success' => 'function(data){	location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());}'
								),								
								'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'span12','id'=>'btn_aprobado_si','name'=>'btn_aprobado_si',
								'url' => Yii::app()->createUrl( 'acondicionamiento/cumple' ),
								),));
								?>
					<!--Fin de Aprobado-->	
				</div>
				<div class="span4">
					<!--Condicional-->
						<a id="myModal_btn_condi" role="button" class="btn btn-primary span12">
							condicional
						</a>
					<!--Fin de Condicional-->							 										 
				</div>
				<!--Boton de No cumples-->
				<div class="span4">														  
						  <?php $this->widget('bootstrap.widgets.TbButton', array(
											'id'=>'myModal_btn_recha',
											'type'=>'danger',
											'buttonType'=>'ajaxButton',
											'label'=>'No Cumple',
											'url'=>Yii::app()->createUrl( 'acondicionamiento/rechazado' ),
											'ajaxOptions'=>array(
																		'type'=>'POST',
																		'data' => 'js:$("#acondicionamiento-form").serialize()',
																		'success' =>'function( data ){
																		location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());
																		}'
																		),													
											'htmlOptions'=>array('class'=>'span12',
																		'url' => Yii::app()->createUrl( 'acondicionamiento/rechazado' ),))); ?>																		 
				</div>
			</div>
		</div>
	</div>

	

<!--Botones-->
	<!--Aprobado-->
	<div id="myModal_acond_apro" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							 <h4 id="myModalLabel">Pasar a Inspeccion de Acondicionamiento</h4>
						  </div>
						  <div class="modal-body">
							 <p>
									<div class="form">							
									<?php echo $form->datepickerRow($model,'aprobado_fecha_propuesta',
															array(
															 'options'=>array( 'format' => 'dd/mm/yyyy', 
															 'weekStart'=> 1,
															 'showButtonPanel' => true,
															 'showAnim'=>'fold',))); ?>
									<?php echo CHtml::hiddenField('formu',$model->form_id); ?>										
									</div><!-- form -->															  
							 </p>
						 
						  <div class="modal-footer">
								
								 <!--Boton de No cumple-->
								<?php $this->widget('bootstrap.widgets.TbButton', array(
								'id'=>'btn_aprobado_no',
								'type'=>'primary',
								'label'=>'No',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'acondicionamiento/cumple' ),
								'ajaxOptions'=>array(	  
								'type'=>'POST',
								//'data' => "js:$('#inspection-form').serializeArray()",
								'data' => array(
								//Parametros
								'general_distrito'=>'js:$("#Acondicionamiento_district_id").val()',
								'general_address'=>'js:$("#Acondicionamiento_address").val()',
								'general_number_envases'=>'js:$("#Acondicionamiento_number_envases").val()',
								'general_capacidad_envases'=>'js:$("#Acondicionamiento_capacidad_envases").val()',
								'general_peso_estimado'=>'js:$("#Acondicionamiento_peso_estimado").val()',
								'general_fecha_cosecha'=>'js:$("#Acondicionamiento_fecha_cosecha").val()',
								'general_descripcion_secado'=>'js:$("#Acondicionamiento_descripcion_secado").val()',
								'general_disponibilidad'=>'js:$("#Acondicionamiento_disponibilidad").val()',
								'general_peso_ingreso'=>'js:$("#Acondicionamiento_peso_ingreso").val()',
								'general_registro_planta'=>'js:$("#Acondicionamiento_registro_planta").val()',
								'general_cantidad_lotes'=>'js:$("#Acondicionamiento_cantidad_lotes").val()',
								'general_cantidad_envases'=>'js:$("#Acondicionamiento_cantidad_envases").val()',
								'general_tipo_envase'=>'js:$("#Acondicionamiento_tipo_envase").val()',
								'general_descripcion'=>'js:$("#Acondicionamiento_descripcion").val()',
								'general_operatividad'=>'js:$("#Acondicionamiento_operatividad").val()',
								'general_limpieza'=>'js:$("#Acondicionamiento_limpieza").val()',
								'general_identificacion_lote_semilla'=>'js:$("input[name=\'Acondicionamiento[identificacion_lote_semilla]\']:checked").val()',
								'general_observacion'=>'js:$("#Acondicionamiento_observacion").val()',						
								'btn'=>'2',
								'id'=>$model->id,								
								'fecha'=>'js:$("#Inspection_aprobado_fecha_propuesta").val()'
								),
								'success' => 'function( ){
													location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());
																}'
								),
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'acondicionamiento/cumple' ),
								),));
								?>						
						  </div>
						</div>
	</div>
	
	
	<!--Boton Condicional-->	
	<div id="myModal_acond_conda" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							 <h4 id="myModalLabel">Fecha sugerida de Subsanación</h4>
						  </div>
						  <div class="modal-body">
							 <p>
												
								<?php echo $form->datepickerRow($model,'subsanacion_date',
														array(
														 'options'=>array( 'format' => 'dd-mm-yyyy', 
														 'weekStart'=> 1,
														 'showButtonPanel' => true,
														 'showAnim'=>'fold',))); ?>
														 
							 </p>
						  </div>
						  <div class="modal-footer">
								 <!--Boton de Condicional-->
								<?php $this->widget('bootstrap.widgets.TbButton', array(	
								'type'=>'primary',
								'label'=>'Enviar',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'acondicionamiento/condicional' ),
								'ajaxOptions'=>array(
								//'dataType'=> 'jsonp',		  
								'type'=>'POST',	
								'data' => "js:$('#acondicionamiento-form').serializeArray()",
								'success' =>'function( data ){
								location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());
								}'
								),
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'acondicionamiento/condicional' ),
								),));
								?>		
								 				
						  </div>
	</div>
<!--Fin de botones-->
<?php $this->endWidget(); ?>

</div><!-- form -->



<script>
	//yw3
	
	$('#myModal_btn_apro').addClass('disabled');//Aprobado
	$('#myModal_btn_condi').addClass('disabled');//Condicional
	$('#myModal_btn_recha').addClass('disabled');//Rechazado
	
	
	$('#myModal_btn_apro').modal('hide');//Aprobado
	$('#myModal_btn_condi').modal('hide');//condicional
	
	$('#myModal_btn_condi').on('click', function(){
		if (!$('#myModal_btn_condi').hasClass('disabled')) {
			$('#myModal_acond_conda').modal('show');
		}	
	
	})
	
	$('#myModal_btn_apro').on('click', function(){
		if (!$('#myModal_btn_apro').hasClass('disabled')) {
			$('#myModal_acond_apro').modal('show');
		}		
	})
	
	//Fecha Formato
	$('.fechas').datepicker({
	format: 'dd-mm-yyyy',    
	})
	$('.fechas').datepicker()
	.on('changeDate', function(ev){		
		$('#Acondicionamiento_cantidad_lotes').trigger('keyup');

	});
	$('.general').on('blur', function(){
		//alert($("input[type='radio']:checked").val());
		//alert($('#Acondicionamiento_identificacion_lote_semilla').val('checked'));
		$('#Acondicionamiento_number_envases').val(numeral($('#Acondicionamiento_number_envases').val()).format('0,0.00'));
		$('#Acondicionamiento_capacidad_envases').val(numeral($('#Acondicionamiento_capacidad_envases').val()).format('0,0.00'));
		$('#Acondicionamiento_peso_estimado').val(numeral($('#Acondicionamiento_peso_estimado').val()).format('0,0.00'));
		$('#Acondicionamiento_cantidad_lotes').val(numeral($('#Acondicionamiento_cantidad_lotes').val()).format('0,0.00'));
		$('#Acondicionamiento_peso_ingreso').val(numeral($('#Acondicionamiento_peso_ingreso').val()).format('0,0.00'));
		$('#Acondicionamiento_cantidad_envases').val(numeral($('#Acondicionamiento_cantidad_envases').val()).format('0,0.00'));
		
		
	});
	$('.general').on('keyup', function(){
		
		
		
		if ($('#Acondicionamiento_registro_planta').val() != '' && $('#Acondicionamiento_cantidad_lotes').val() != '' &&
				$('#Acondicionamiento_number_envases').val() !='' && $('#Acondicionamiento_capacidad_envases').val()!='' &&
				$('#Acondicionamiento_peso_estimado').val()!=''
			)
		{		
			$('#myModal_btn_apro').removeClass('disabled');
			$('#myModal_btn_condi').removeClass('disabled');
			$('#myModal_btn_recha').removeClass('disabled');
			
		}
		else {
			$('#myModal_btn_apro').addClass('disabled');
			$('#myModal_btn_condi').addClass('disabled');
			$('#myModal_btn_recha').addClass('disabled');
			
		}
	});
</script>
