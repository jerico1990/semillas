<?php
$forma=Iform::model()->find('id=:form_id',array(':form_id'=>$model->form_id));
$user=User::model()->find('id=:id',array(':id'=>$model->user_id));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$forma->location_id));
?>



<div class="form well span12" style="background: #FFFFFF">

<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'inspection-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inspection-form',
   // 'htmlOptions'=>array('class'=>'well span13'),
   
));
?>


	<?php echo $form->errorSummary($model); ?>
	<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
	<?php echo CHtml::hiddenField('condicional_inspection_id',$model->id); ?>

		 
		  <div class="row-fluid">
					 <div class="span12"><h4>Campo de Multiplicación</h4></div>      
		  </div> 
		  <div class="row-fluid">		      
					 <div class="span3"><?php echo $form->textFieldRow($model,'size',array('class'=>'algodon span12')); ?></div>			 
					 <div class="span9">
				     <?php echo $form->datepickerRow($model,'alg_fecha_siembra',
						                          array(	
									  'htmlOptions'=>array('class'=>'algodon_fecha span10'),
									  //'prepend'=>'<i class="icon-calendar"></i>',
									  'options'=>array( 'format' => 'dd-mm-yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?>		     		        				     
					 </div>
		  </div>
		  <div class="row-fluid">
					 <div class="span12"><h4>Etapa/Estado fenológico del cultivo</h4></div>      
		  </div> 
		  <div class="row-fluid">						 
					 <div class="span4">
					 <?php echo $form->datepickerRow($model,'alg_deshije',
																array(	
																'htmlOptions'=>array('class'=>'algodon_fecha span10'),
																//'prepend'=>'<i class="icon-calendar"></i>',
																'options'=>array( 'format' => 'dd-mm-yyyy', 
																'weekStart'=> 1,
																'showButtonPanel' => true,
																'showAnim'=>'fold',))); ?></div>
					 <div class="span4"><?php echo $form->textFieldRow($model,'alg_floracion',array('size'=>18,'maxlength'=>18,'class'=>'algodon span12')); ?></div>
					 <div class="span4"><?php echo $form->textFieldRow($model,'alg_bellotas',array('size'=>18,'maxlength'=>18 ,'class'=>'algodon span12')); ?></div>
		  </div>
		  <div class="row-fluid">
					 <div class="span12"><h4>Distanciamiento</h4></div>      
		  </div> 
		  <div class="row-fluid">
					 <div class="row-fluid">
								<div class="span3"><?php echo $form->textFieldRow($model,'alg_surcos',array('size'=>18,'maxlength'=>18,'class'=>'algodon span9')); ?></div>
								<div class="span9"><?php echo $form->textFieldRow($model,'alg_mata',array('size'=>18,'maxlength'=>18,'class'=>'algodon span3')); ?></div>			    
					 </div>
		  </div>
		  <div class="row-fluid">
					 <div class="span12"><h4>Aislamiento</h4></div>      
		  </div>
        <div class="row-fluid">
					 <div class="span4"><?php echo $form->textFieldRow($model,'alg_campo_comercial',array('size'=>18,'maxlength'=>18,'class'=>'algodon span12')); ?></div>
					 <div class="span4"><?php echo $form->textFieldRow($model,'alg_otra_especie',array('size'=>18,'maxlength'=>18,'class'=>'algodon span12')); ?></div>
					 <div class="span4"><?php echo $form->textFieldRow($model,'alg_otra_cultivar',array('size'=>18,'maxlength'=>18,'class'=>'algodon span12')); ?></div>
		  </div>
		  <div class="row-fluid">
					 <div class="span12"><h4>Plantas</h4></div>      
		  </div>
		  <div class="row-fluid">
			 <div class="span6"><?php echo $form->textAreaRow($model,'alg_plantas_otra_especie',array('size'=>60,'maxlength'=>300,'class'=>'algodon span12','rows'=>8)); ?></div>
			 <div class="span6"><?php echo $form->textAreaRow($model,'alg_plantas_fuera_tipo',array('size'=>60,'maxlength'=>300,'class'=>'algodon span12','rows'=>8)); ?></div>		  
		  </div>
		  <div class="row-fluid">
					 <div class="span12"><h4>Datos</h4></div>      
		  </div>
		  <div class="row-fluid">
			 <div class="span12"><?php echo $form->textFieldRow($model,'alg_malvacearum',array('size'=>18,'maxlength'=>18,'class'=>'algodon span2')); ?></div>
		  </div>
		  <div class="row-fluid">
					 <div class="span12"><h4>Resultados</h4></div>      
		  </div>
		  <div class="row-fluid">
			 <div class="span12"><?php echo $form->textAreaRow($model,'observaciones',array('size'=>60,'maxlength'=>300,'class'=>'algodon span12','rows'=>8)); ?></div>
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
																				location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/iview/"+$("#formu").val());
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
							 <h4 id="myModalLabel"></h4>
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
										  'alg_fecha_siembra'=>'js:$("#Inspection_alg_fecha_siembra").val()',
										  'alg_deshije'=>'js:$("#Inspection_alg_deshije").val()',
										  'alg_floracion'=>'js:$("#Inspection_alg_floracion").val()',
										  'alg_bellotas'=>'js:$("#Inspection_alg_bellotas").val()',
										  'alg_surcos'=>'js:$("#Inspection_alg_surcos").val()',
										  'alg_mata'=>'js:$("#Inspection_alg_mata").val()',
										  'alg_campo_comercial'=>'js:$("#Inspection_alg_campo_comercial").val()',
										  'alg_otra_especie'=>'js:$("#Inspection_alg_otra_especie").val()',
										  'alg_otra_cultivar'=>'js:$("#Inspection_alg_otra_cultivar").val()',
										  'alg_plantas_otra_especie'=>'js:$("#Inspection_alg_plantas_otra_especie").val()',
										  'alg_plantas_fuera_tipo'=>'js:$("#Inspection_alg_plantas_fuera_tipo").val()',
										  'alg_malvacearum'=>'js:$("#Inspection_alg_malvacearum").val()',										  
										  'observaciones'=>'js:$("#Inspection_observaciones").val()',
										  'btn'=>'js:$("#Inspection_select_id").val()',
										  'id'=>$model->id,
										  'fecha'=>'js:$("#Inspection_aprobado_fecha_propuesta").val()'),
								'success' => 'function(data){location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/iview/"+$("#formu").val());}'
								),
								
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'inspection/cumple' ),
								),));
								?>
								 <!--Boton de No cumple-->
												
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
								location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/iview/"+$("#formu").val());
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
	$('.algodon_fecha').datepicker({
    format: 'dd-mm-yyyy',    
	})
	/*$('.algodon_fecha').datepicker()
	.on('changeDate', function(ev){		
		$('#Inspection_arz_area_instalada').trigger('keyup');

	});*/
	$('.algodon').on('blur', function(){
		$('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
		$('#Inspection_alg_surcos').val(numeral($('#Inspection_alg_surcos').val()).format('0,0.00'));
		$('#Inspection_alg_mata').val(numeral($('#Inspection_alg_mata').val()).format('0,0.00'));
		$('#Inspection_alg_campo_comercial').val(numeral($('#Inspection_alg_campo_comercial').val()).format('0,0.00'));
		$('#Inspection_alg_otra_especie').val(numeral($('#Inspection_alg_otra_especie').val()).format('0,0.00'));
		$('#Inspection_alg_otra_cultivar').val(numeral($('#Inspection_alg_otra_cultivar').val()).format('0,0.00'));
		$('#Inspection_alg_floracion').val(numeral($('#Inspection_alg_floracion').val()).format('0,0.00'));
		$('#Inspection_alg_bellotas').val(numeral($('#Inspection_alg_bellotas').val()).format('0,0.00'));
	});
	
	
	$('.algodon, .algodon_fecha').on('keyup', function(){
		console.log('trigger')		
		
	
		
		if ($('#Inspection_size').val() != '' && $('#Inspection_alg_fecha_siembra').val()!='' &&
			 $('#Inspection_alg_deshije').val()!=''  && $('#Inspection_alg_floracion').val() != '' &&
			 $('#Inspection_alg_bellotas').val()!='' && $('#Inspection_alg_floracion').val() != '' &&		 
			 $('#Inspection_alg_surcos').val() != '' && $('#Inspection_alg_mata').val() != '' &&
			 $('#Inspection_alg_campo_comercial').val()!='' && $('#Inspection_alg_otra_especie').val() != '' &&
			 $('#Inspection_alg_otra_cultivar').val()!='' && $('#Inspection_alg_plantas_otra_especie').val() != '' &&
			 $('#Inspection_alg_plantas_fuera_tipo').val()!='' && $('#Inspection_alg_plantas_otra_especie').val() != '' &&
			 $('#Inspection_alg_malvacearum').val()!='' 
			  
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


