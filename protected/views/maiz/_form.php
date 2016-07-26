<?php
/* @var $this MaizController */
/* @var $model Inspection */
/* @var $form CActiveForm */

$forma=Iform::model()->find('id=:form_id',array(':form_id'=>$model->form_id));
$user=User::model()->find('id=:id',array(':id'=>$model->user_id));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$forma->location_id));


?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>
<script>
$(function(){
    $('#Inspection_proposed_time').clockface();  
});
</script>

<div class="form well span12" style="background: #FFFFFF">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inspection-form',
	  //'action'=>Yii::app()->createUrl('inspection/cumple'),
   // 'htmlOptions'=>array('class'=>'well span13'),
   
)); ?>


	<?php echo $form->errorSummary($model); ?>
	<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
	<?php echo CHtml::hiddenField('condicional_inspection_id',$model->id); ?>
	
	<div class="row-fluid">
					 <div class="span12"><h4>Campo de Multiplicación</h4></div>      
	</div> 
	<div class="row-fluid">
      <div class="span3"><?php echo $form->textFieldRow($model,'size',array('class'=>'maiz span12')); ?></div>		
	   <div class="span9"><?php echo $form->datepickerRow($model,'maiz_fecha_siembra',
						                          array(	
									  'htmlOptions'=>array('class'=>'maiz_fecha'),									 
									  'options'=>array( 'format' => 'dd-mm-yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Etapa / Estado fenológico del cultivo</h4></div>      
	</div>
	<div class="row-fluid">
		<div class="span4"><?php echo $form->datepickerRow($model,'maiz_emergencia_fecha',
						                          array(	
										'htmlOptions'=>array('class'=>'maiz_fecha'),
										'options'=>array( 'format' => 'dd-mm-yyyy', 
										'weekStart'=> 1,
										'showButtonPanel' => true,
										'showAnim'=>'fold',))); ?></div>
		
		<div class="span8">
		  <div class="row-fluid">
					 <div class="span6"><?php echo $form->textFieldRow($model,'maiz_floracion',array('size'=>18,'maxlength'=>18,'class'=>'maiz span12')); ?></div>
					 <div class="span6"><br><?php echo $form->datepickerRow($model,'maiz_floracion_fecha',
																		array(	
													'htmlOptions'=>array('class'=>'maiz_fecha'),
													'options'=>array( 'format' => 'dd-mm-yyyy', 
													'weekStart'=> 1,
													'showButtonPanel' => true,
													'showAnim'=>'fold',))); ?></div>
		  </div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6 "><?php echo $form->textFieldRow($model,'maiz_llenado_grano',array('size'=>18,'maxlength'=>18,'class'=>'maiz span12')); ?></div>
		<div class="span6 "><?php echo $form->datepickerRow($model,'maiz_fecha_cosecha',
						                          array(	
									  'htmlOptions'=>array('class'=>'maiz_fecha'),
									  'options'=>array( 'format' => 'dd-mm-yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>		
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Distancionamiento</h4></div>      
	</div>
	<div class="row-fluid">
		<div class="span6"><?php echo $form->textFieldRow($model,'maiz_distanciamiento_surcos',array('size'=>18,'maxlength'=>18,'class'=>'maiz span12')); ?></div>
		<div class="span6"><?php echo $form->textFieldRow($model,'maiz_mata',array('size'=>18,'maxlength'=>18,'class'=>'maiz span12')); ?></div>
   </div>
	
	<div class="row-fluid">
					 <div class="span12"><h4>Aislamiento</h4></div>      
	</div>
	<div class="row-fluid">
	   <div class="span4"><?php echo $form->textFieldRow($model,'maiz_campo_comercial',array('size'=>18,'maxlength'=>18,'class'=>'maiz span12')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'maiz_otra_especie',array('size'=>18,'maxlength'=>18,'class'=>'maiz span12')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'maiz_otro_cultivar',array('size'=>18,'maxlength'=>18,'class'=>'maiz span12')); ?></div>	
	</div>
	
	<div class="row-fluid">
					 <div class="span12"><h4>Presencia</h4></div>      
	</div>
	<div class="row-fluid">
		<div class="span6"><?php echo $form->textAreaRow($model,'maiz_presencia_maleza',array('size'=>60,'maxlength'=>300,'class'=>'maiz span12','rows'=>5)); ?></div>
		<div class="span6"><?php echo $form->textAreaRow($model,'maiz_presencia_plagas',array('size'=>60,'maxlength'=>300,'class'=>'maiz span12','rows'=>5)); ?></div>
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Plantas</h4></div>      
	</div>
	<div class="row-fluid">
		<div class="span6"><?php echo $form->textAreaRow($model,'maiz_plantas_otras_especies',array('size'=>60,'maxlength'=>300,'class'=>'maiz span12','rows'=>5)); ?></div>
		<div class="span6"><?php echo $form->textAreaRow($model,'maiz_plantas_fuera_tipo',array('size'=>60,'maxlength'=>300,'class'=>'maiz span12','rows'=>5)); ?></div>
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Datos</h4></div>      
	</div>
	<div class="row-fluid">		 
		<div class="span12"><?php echo $form->textFieldRow($model,'maiz_tolerancias',array('size'=>18,'maxlength'=>18,'class'=>'maiz span12')); ?></div>
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Resultado</h4></div>      
	</div>
	<div class="row-fluid">		 
		<div class="span12"><?php echo $form->textAreaRow($model,'observaciones',array('size'=>60,'maxlength'=>300,'class'=>'maiz span12','rows'=>5)); ?></div>
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
						<!--Boton de No cumples-->
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
																				'url' => Yii::app()->createUrl( 'iform/rechazado' ),))); ?>																		 
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
										  'maiz_fecha_siembra'=>'js:$("#Inspection_maiz_fecha_siembra").val()',
										  'maiz_emergencia_fecha'=>'js:$("#Inspection_maiz_emergencia_fecha").val()',
										  'maiz_floracion'=>'js:$("#Inspection_maiz_floracion").val()',
										  'maiz_floracion_fecha'=>'js:$("#Inspection_maiz_floracion_fecha").val()',
										  'maiz_llenado_grano'=>'js:$("#Inspection_maiz_llenado_grano").val()',
										  'maiz_fecha_cosecha'=>'js:$("#Inspection_maiz_fecha_cosecha").val()',
										  'maiz_distanciamiento_surcos'=>'js:$("#Inspection_maiz_distanciamiento_surcos").val()',
										  'maiz_mata'=>'js:$("#Inspection_maiz_mata").val()',
										  'maiz_campo_comercial'=>'js:$("#Inspection_maiz_campo_comercial").val()',
										  'maiz_otra_especie'=>'js:$("#Inspection_maiz_otra_especie").val()',
										  'maiz_otro_cultivar'=>'js:$("#Inspection_maiz_otro_cultivar").val()',
										  'maiz_presencia_maleza'=>'js:$("#Inspection_maiz_presencia_maleza").val()',
										  'maiz_presencia_plagas'=>'js:$("#Inspection_maiz_presencia_plagas").val()',
										  'maiz_plantas_otras_especies'=>'js:$("#Inspection_maiz_plantas_otras_especies").val()',
										  'maiz_plantas_fuera_tipo'=>'js:$("#Inspection_maiz_plantas_fuera_tipo").val()',
										  'maiz_tolerancias'=>'js:$("#Inspection_maiz_tolerancias").val()',
										  
										  'observaciones'=>'js:$("#Inspection_observaciones").val()',					 
										  'btn'=>'js:$("#Inspection_select_id").val()',
										  'id'=>$model->id,
										  'fecha'=>'js:$("#Inspection_aprobado_fecha_propuesta").val()'
										  ),
								'success' => 'function(data){
																location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());
																}'
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
	$('.maiz_fecha').datepicker({
    format: 'dd-mm-yyyy',    
	})
	$('.maiz_fecha').datepicker()
	.on('changeDate', function(ev){		
		$('#Inspection_size').trigger('keyup');

	});
	$('.maiz').on('blur', function(){
		$('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
		$('#Inspection_maiz_distanciamiento_surcos').val(numeral($('#Inspection_maiz_distanciamiento_surcos').val()).format('0,0.00'));
		$('#Inspection_maiz_mata').val(numeral($('#Inspection_maiz_mata').val()).format('0,0.00'));
		$('#Inspection_maiz_campo_comercial').val(numeral($('#Inspection_maiz_campo_comercial').val()).format('0,0.00'));
		$('#Inspection_maiz_otra_especie').val(numeral($('#Inspection_maiz_otra_especie').val()).format('0,0.00'));
		$('#Inspection_maiz_otro_cultivar').val(numeral($('#Inspection_maiz_otro_cultivar').val()).format('0,0.00'));
		$('#Inspection_maiz_floracion').val(numeral($('#Inspection_maiz_floracion').val()).format('0,0.00'));
		$('#Inspection_maiz_llenado_grano').val(numeral($('#Inspection_maiz_llenado_grano').val()).format('0,0.00'));
		
	})
	
	$('.maiz, .maiz_fecha').on('keyup', function(){
		console.log('trigger')			
		if ($('#Inspection_size').val() != '' && $('#Inspection_maiz_fecha_siembra').val() != '' &&
			 $('#Inspection_maiz_emergencia_fecha').val() != '' && $('#Inspection_maiz_floracion').val() != '' &&
			 $('#Inspection_maiz_floracion_fecha').val() != '' && $('#Inspection_maiz_llenado_grano').val() != '' &&
			 $('#Inspection_maiz_fecha_cosecha').val() != '' && $('#Inspection_maiz_distanciamiento_surcos').val() != '' &&
			 $('#Inspection_maiz_mata').val() != '' && $('#Inspection_maiz_campo_comercial').val() != '' &&
			 $('#Inspection_maiz_otra_especie').val() != '' && $('#Inspection_maiz_otro_cultivar').val() != '' &&
			 $('#Inspection_maiz_presencia_maleza').val() != '' && $('#Inspection_maiz_presencia_plagas').val() != '' &&
			 $('#Inspection_maiz_plantas_otras_especies').val() != '' && $('#Inspection_maiz_plantas_fuera_tipo').val() != '' &&
			 $('#Inspection_maiz_tolerancias').val() != ''			 
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


