<?php
/* @var $this CerealesController */
/* @var $model Inspection */
/* @var $form CActiveForm */
$forma=Iform::model()->find('id=:form_id',array(':form_id'=>$model->form_id));
$user=User::model()->find('id=:id',array(':id'=>$model->user_id));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$forma->location_id));

$paymentcriteria=new CDbCriteria;
$paymentcriteria->condition='form_id=:form_id and user_id=:user_id and pay_code is null and concept_id=:concepto_id';
$paymentcriteria->params=array(':form_id'=>$forma->id,':user_id'=>$forma->user_id,':concepto_id'=>2);
$paymentcriteria->select='count(form_id) as form_id';
$cantidadpayment = Payment::model()->find($paymentcriteria);
?>



<div class="form well span12" style="background: #FFFFFF">
	
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inspection-form',
   // 'htmlOptions'=>array('class'=>'well span13'),   
)); ?>

	

	<?php echo $form->errorSummary($model); ?>
	<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
	<?php echo CHtml::hiddenField('condicional_inspection_id',$model->id); ?>
		  
			<div class="row-fluid">
					  <div class="span12"><h4>Campo de Multiplicación</h4></div>      
			</div>
			<div class="row-fluid">			
				  <div class="span3"><?php echo $form->textFieldRow($model,'size',array('class'=>'cereales span12')); ?></div>
				  <div class="span9">
							<?php echo $form->datepickerRow($model,'cer_fecha_siembra',
																  array(	
											  'htmlOptions'=>array('class'=>'cereales_fecha span10'),
											  //'prepend'=>'<i class="icon-calendar"></i>',
											  'options'=>array( 'format' => 'dd-mm-yyyy', 
											  'weekStart'=> 1,
											  'showButtonPanel' => true,
											  'showAnim'=>'fold',))); ?>
						</div>
			</div>
			<div class="row-fluid">
					  <div class="span12"><h4>Etapa / Estado fenológico de cultivo</h4></div>      
			</div>  
			<div class="row-fluid">					
					  <div class="span6"><?php echo $form->textFieldRow($model,'cer_floracion',array('size'=>18,'maxlength'=>18,'class'=>'cereales span6')); ?></div>
					  <div class="span6"><?php echo $form->textFieldRow($model,'cer_maduracion',array('size'=>18,'maxlength'=>18,'class'=>'cereales span6')); ?></div>
			</div>
			<div class="row-fluid">
					  <div class="span12"><h4>Cantidad de Semillas (kg)</h4></div>      
			</div>  
			<div class="row-fluid">
					  <div class="spa12"><?php echo $form->textFieldRow($model,'cer_cantidad_semilla',array('size'=>18,'maxlength'=>18,'class'=>'cereales span2')); ?></div>
			</div>
			
			<div class="row-fluid">
					  <div class="span12"><h4>Mezcla</h4></div>      
			</div> 
			<div class="row-fluid">
					  <div class="span6"><?php echo $form->textAreaRow($model,'cer_inflorecencias_otros_cultivares',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
					  <div class="span6"><?php echo $form->textAreaRow($model,'cer_inflorecencias_otros_cultivares_menores',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
			</div>
			
			<div class="row-fluid">
					  <div class="span12"><h4>Enfermedades transmisibles por semilla</h4></div>      
			</div>	  		  
			<div class="row-fluid">
					  <div class="span4"><?php echo $form->textAreaRow($model,'cer_carbon_apestoso',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
					  <div class="span4"><?php echo $form->textAreaRow($model,'cer_carbon_cubierto',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
					  <div class="span4"><?php echo $form->textAreaRow($model,'cer_carbon_volador',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
			</div>
			<div class="row-fluid">
						<div class="span4"><?php echo $form->textAreaRow($model,'cer_cornezuelo',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
						<div class="span4"><?php echo $form->textAreaRow($model,'cer_mancha_foliar',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
						<div class="span4"><?php echo $form->textAreaRow($model,'cer_escaldadura',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
			</div>
			<div class="row-fluid">
					  <div class="span12"><h4>Estado del Campo</h4></div>      
			</div>
			<div class="row-fluid">
				  <div class="span6"><?php echo $form->textAreaRow($model,'cer_presencia_maleza_nocivas',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
				  <div class="span6"><?php echo $form->textAreaRow($model,'cer_aspecto_general_poblacion',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>		 
			</div>
			<div class="row-fluid">
				  <div class="span12"><?php echo $form->textAreaRow($model,'cer_plagas',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>5)); ?></div>
					  
			</div>
			
			<div class="row-fluid">
					  <div class="span12"><h4>Aislamiento</h4></div>      
			</div>
			 <div class="row-fluid">
						<div class="span4"><?php echo $form->textFieldRow($model,'cer_aislamiento',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12')); ?></div>
						<div class="span4"><?php echo $form->textFieldRow($model,'cer_otra_cultivar',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12')); ?></div>
						<div class="span4"><?php echo $form->textFieldRow($model,'cer_otra_categoria',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12')); ?></div>
			</div>
			
			<div class="row-fluid">
					 <div class="span12"><h4>Datos</h4></div>      
			</div>
			<div class="row-fluid">
				<div class="span6"><?php echo $form->textFieldRow($model,'cer_plantas_fuera_tipo',array('size'=>18,'maxlength'=>18,'class'=>'cereales span12')); ?></div>		 
				<div class="span6"><?php echo $form->textFieldRow($model,'cer_otras_especies',array('size'=>18,'maxlength'=>18,'class'=>'cereales span12')); ?></div>
			</div>
			
			
			<div class="row-fluid">
					 <div class="span12"><h4>Observaciones</h4></div>      
			</div>
			<div class="row-fluid">
				 <div class="span12"><?php echo $form->textAreaRow($model,'observaciones',array('size'=>60,'maxlength'=>300,'class'=>'cereales span12','rows'=>6)); ?></div>		 
			</div>
			  
			<div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <div class="span4">
							<!--Aprobado-->
								<a id="myModal_btn_apro" role="button" class="btn btn-success span12">
									Cumple
								</a>
							<!--Fin de Aprobado-->	
                  </div>
                  <div class="span4">
							<!--Condicional-->
								<a id="myModal_btn_condi" role="button" class="btn btn-primary span12">
									condicional
								</a>
							<!--Fin de Condicional-->							 										 
                  </div>
						<div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array(
													'id'=>'myModal_btn_recha',
													'type'=>'danger',
													'buttonType'=>'ajaxButton',
													'label'=>'No Cumple',
													'url'=>Yii::app()->createUrl( 'inspection/rechazado' ),
													'ajaxOptions'=>array(
																				'type'=>'POST',
																				'data' => 'js:$("#inspection-form").serialize()',
																				'success' =>'function( data ){
																				location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());
																				}'
																				),													
													'htmlOptions'=>array('class'=>'span12',
																				'url' => Yii::app()->createUrl( 'inspection/rechazado' ),))); ?>																		 
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
										<?php 
										$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
											'id'=>'inbox-form',
										
										));						
										?>	
										<div class="row-fluid">
											<div class="span5">Continuar con la Inspección de</div>
											<div class="span7"><?php echo $form->dropDownListRow($model,'select_id', array('1'=>'Acondicionamiento','2'=>'Campo'),array('empty'=>' ','class'=>'validar')); ?></div>
										</div>
										<div class="row-fluid">
											<div class="span5">Fecha propuesta</div>
											<div class="span7"><?php echo $form->datepickerRow($model,'aprobado_fecha_propuesta',
																array(
																 'htmlOptions'=>array('class'=>'validar'),
																 'options'=>array( 'format' => 'dd-mm-yyyy', 
																 'weekStart'=> 1,
																 'showButtonPanel' => true,
																 'showAnim'=>'fold',))); ?>
											</div>
										</div>
										<?php $this->endWidget(); ?>	
																		
									</div><!-- form -->															  
								</p>
						  <div class="modal-footer">
								<!--Boton de Si cumple-->
								
								
								<?php $this->widget('bootstrap.widgets.TbButton', array(
								'id'=>'btn_aprobado_si',
								'type'=>'primary',
								'label'=>'Aceptar',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'inspection/cumple' ),
								'ajaxOptions'=>array(			     
								'type'=>'POST',	
								'data' => array(
										  'size'=>'js:$("#Inspection_size").val()',
										  'cer_fecha_siembra'=>'js:$("#Inspection_cer_fecha_siembra").val()',
										  'cer_floracion'=>'js:$("#Inspection_cer_floracion").val()',
										  'cer_maduracion'=>'js:$("#Inspection_cer_maduracion").val()',
										  'cer_cantidad_semilla'=>'js:$("#Inspection_cer_cantidad_semilla").val()',
										  'cer_inflorecencias_otros_cultivares'=>'js:$("#Inspection_cer_inflorecencias_otros_cultivares").val()',
										  'cer_inflorecencias_otros_cultivares_menores'=>'js:$("#Inspection_cer_inflorecencias_otros_cultivares_menores").val()',
										  'cer_carbon_apestoso'=>'js:$("#Inspection_cer_carbon_apestoso").val()',
										  'cer_carbon_cubierto'=>'js:$("#Inspection_cer_carbon_cubierto").val()',
										  'cer_carbon_volador'=>'js:$("#Inspection_cer_carbon_volador").val()',
										  'cer_cornezuelo'=>'js:$("#Inspection_cer_cornezuelo").val()',
										  'cer_mancha_foliar'=>'js:$("#Inspection_cer_mancha_foliar").val()',
										  'cer_escaldadura'=>'js:$("#Inspection_cer_escaldadura").val()',
										  'cer_presencia_maleza_nocivas'=>'js:$("#Inspection_cer_presencia_maleza_nocivas").val()',
										  'cer_aspecto_general_poblacion'=>'js:$("#Inspection_cer_aspecto_general_poblacion").val()',
										  'cer_plagas'=>'js:$("#Inspection_cer_plagas").val()',
										  'cer_aislamiento'=>'js:$("#Inspection_cer_aislamiento").val()',
										  'cer_otra_cultivar'=>'js:$("#Inspection_cer_otra_cultivar").val()',
										  'cer_otra_categoria'=>'js:$("#Inspection_cer_otra_categoria").val()',
										  'cer_plantas_fuera_tipo'=>'js:$("#Inspection_cer_plantas_fuera_tipo").val()',
										  'cer_otras_especies'=>'js:$("#Inspection_cer_otras_especies").val()',
										  
										  'observaciones'=>'js:$("#Inspection_observaciones").val()', 
										  'btn'=>'js:$("#Inspection_select_id").val()',
										  'id'=>$model->id,
										  'fecha'=>'js:$("#Inspection_aprobado_fecha_propuesta").val()'),
								'success' => 'function(data){location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());}'
								),
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'inspection/cumple' ),
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
			'url'=>Yii::app()->createUrl( 'inspection/condicional' ),
			'ajaxOptions'=>array(
			//'dataType'=> 'jsonp',		  
			'type'=>'POST',	
			'data' => "js:$('#inspection-form').serializeArray()",
			'success' =>'function( data ){
			location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());
			}'
			),
			'htmlOptions'=>array('data-dismiss'=>'modal',
			'url' => Yii::app()->createUrl( 'inspection/condicional' ),
			),));
			?>		
							 
	</div>
	</div>
<!--Fin de botones-->	
<?php $this->endWidget(); ?>

</div><!-- form -->







<script>
	
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
	
	$('.cereales_fecha').datepicker({
    format: 'dd-mm-yyyy',
	});
	/*$('.algodon_fecha').datepicker()
	.on('changeDate', function(ev){		
		$('#Inspection_arz_area_instalada').trigger('keyup');

	});*/
	
	$('.cereales').on('blur', function(){
		$('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
		$('#Inspection_cer_aislamiento').val(numeral($('#Inspection_cer_aislamiento').val()).format('0,0.00'));
		$('#Inspection_cer_otra_cultivar').val(numeral($('#Inspection_cer_otra_cultivar').val()).format('0,0.00'));
		$('#Inspection_cer_otra_categoria').val(numeral($('#Inspection_cer_otra_categoria').val()).format('0,0.00'));
		$('#Inspection_cer_cantidad_semilla').val(numeral($('#Inspection_cer_cantidad_semilla').val()).format('0,0.00'));
		$('#Inspection_cer_floracion').val(numeral($('#Inspection_cer_floracion').val()).format('0.0'));
		$('#Inspection_cer_maduracion').val(numeral($('#Inspection_cer_maduracion').val()).format('0.0'));
	
	});
	
	$('.cereales,.cereales_fecha').on('keyup', function(){
		console.log('trigger')	
		
		if ($('#Inspection_size').val() != '' && $('#Inspection_cer_fecha_siembra').val() != '' &&
			 $('#Inspection_cer_floracion').val()!='' && $('#Inspection_cer_maduracion').val()!=''  &&
			 $('#Inspection_cer_cantidad_semilla').val()!='' && $('#Inspection_cer_inflorecencias_otros_cultivares').val() != '' &&
			 $('#Inspection_cer_inflorecencias_otros_cultivares_menores').val()!='' && $('#Inspection_cer_carbon_apestoso').val() != '' &&
			 $('#Inspection_cer_carbon_cubierto').val()!='' && $('#Inspection_cer_carbon_volador').val()!='' &&
			 $('#Inspection_cer_cornezuelo').val()!='' && $('#Inspection_cer_mancha_foliar').val()!='' &&
			 $('#Inspection_cer_escaldadura').val()!='' && $('#Inspection_cer_presencia_maleza_nocivas').val()!='' &&
			 $('#Inspection_cer_aspecto_general_poblacion').val()!='' && $('#Inspection_cer_plagas').val()!='' &&
			 $('#Inspection_cer_aislamiento').val() != '' && $('#Inspection_cer_otra_cultivar').val() != '' &&
			 $('#Inspection_cer_otra_categoria').val()!='' &&  $('#Inspection_cer_plantas_fuera_tipo').val()!='' &&
			 $('#Inspection_cer_otras_especies').val()!='' && $('#Inspection_cer_otras_especies').val()!=''
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
	})
</script>





















