<?php
$forma=Iform::model()->find('id=:form_id',array(':form_id'=>$model->form_id));
$user=User::model()->find('id=:id',array(':id'=>$model->user_id));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$forma->location_id));
?>

<div class="form well span12" style="background: #FFFFFF">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inspection-form',
   
));  ?>
	<?php echo $form->errorSummary($model); ?>
	<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
	<?php echo CHtml::hiddenField('condicional_inspection_id',$model->id); ?>
			<div class="row-fluid">
				<div class="span12"><h4>Estado fenologico del cultivo</h4></div>      
			</div> 		  
			<div class="row-fluid">
				<div class="span6"><?php echo $form->checkBoxRow($model,'arz_siembra_directa',array('class'=>'arroz')); ?>
				</div>
				<div class="span6"><?php echo $form->checkBoxRow($model,'arz_transplante',array('class'=>'arroz')); ?></div>
			</div>
			<div class="row-fluid">
				<div class="span12"><h4>Campo de Multiplicación</h4></div>      
			</div> 
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->datepickerRow($model,'arz_fecha_siembra',
																 array(	
											 'htmlOptions'=>array('class'=>'arroz_fecha'),
											 'options'=>array( 'format' => 'dd-mm-yyyy', 
											 'weekStart'=> 1,
											 'showButtonPanel' => true,
											 'showAnim'=>'fold',))); ?>
				</div>
				<div class="span4">
				<?php echo $form->datepickerRow($model,'arz_fecha_almacigo',
																 array(	
											 'htmlOptions'=>array('class'=>'arroz_fecha'),
											 'options'=>array( 'format' => 'dd-mm-yyyy', 
											 'weekStart'=> 1,
											 'showButtonPanel' => true,
											 'showAnim'=>'fold',))); ?>
				</div>
				<div class="span4">
					 <?php echo $form->datepickerRow($model,'arz_fecha_transplante',
																 array(	
											 'htmlOptions'=>array('class'=>'arroz_fecha'),	
											 'options'=>array( 'format' => 'dd-mm-yyyy', 
											 'weekStart'=> 1,
											 'showButtonPanel' => true,
											 'showAnim'=>'fold',))); ?>
				</div>		 
			</div>
			<div class="row-fluid">
				<div class="span12">
				 <?php echo $form->textFieldRow($model,'arz_area_instalada',array('value'=>'0','size'=>18,'maxlength'=>18,'class'=>'arroz span6')); ?>
				</div>				  	 
			</div>
			
			<div class="row-fluid">
				<div class="span12"><h4>Evaluación</h4></div>      
			</div> 
			<div class="row-fluid">
				<div class="span12">
					<div class="row-fluid">
						<div class="span3"><?php echo $form->textFieldRow($model,'arz_fuera_tipo',array('size'=>18,'maxlength'=>18,'class'=>'arroz span12')); ?></div>
						<div class="span2"><?php echo $form->textFieldRow($model,'arz_rojo',array('size'=>18,'maxlength'=>18,'class'=>'arroz span12')); ?></div>
						<div class="span5"><?php echo $form->textFieldRow($model,'arz_plantas_sintomas',array('size'=>18,'maxlength'=>18,'class'=>'arroz span12')); ?></div>
						<div class="span2"> <?php echo $form->textFieldRow($model,'arz_aislamiento',array('value'=>'0','size'=>18,'maxlength'=>18,'class'=>'arroz span12')); ?></div>
					</div>
				</div>	    		  
			</div>
			
			<div class="row-fluid">
				<div class="span12"><h4>Observación</h4></div>      
			</div> 
			<div class="row-fluid">
				<div class="span12">
				<div class="row-fluid">
					<div class="span12"><?php echo $form->textAreaRow($model,'observaciones',array('size'=>60,'maxlength'=>300,'rows'=>6,'class'=>'arroz span12')); ?></div>		    
				</div>
				</div>	    		  
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
										  'arz_siembra_directa'=>'js:$("#Inspection_arz_siembra_directa").val()',
										  'arz_transplante'=>'js:$("#Inspection_arz_transplante").val()',
										  'arz_fecha_siembra'=>'js:$("#Inspection_arz_fecha_siembra").val()',
										  'arz_fecha_almacigo'=>'js:$("#Inspection_arz_fecha_almacigo").val()',
										  'arz_fecha_transplante'=>'js:$("#Inspection_arz_fecha_transplante").val()',
										  'arz_area_instalada'=>'js:$("#Inspection_arz_area_instalada").val()',
										  'arz_aislamiento'=>'js:$("#Inspection_arz_aislamiento").val()',
										  'arz_fuera_tipo'=>'js:$("#Inspection_arz_fuera_tipo").val()',
										  'arz_rojo'=>'js:$("#Inspection_arz_rojo").val()',
										  'arz_plantas_sintomas'=>'js:$("#Inspection_arz_plantas_sintomas").val()',										  									  
										  'observaciones'=>'js:$("#Inspection_observaciones").val()',						 
										  'btn'=>'js:$("#Inspection_select_id").val()',
										  'id'=>$model->id,
										  'fecha'=>'js:$("#Inspection_aprobado_fecha_propuesta").val()'
										  ),
								'success' => 'function(data){location.replace("'.Yii::app()->getRequest()->getHostInfo().'/peas/iform/iview/"+$("#formu").val());}'
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
	
	
	
	//$('#myModal_btn_condi').on('click', function(){$('#myModal_acond_cond').modal('show');})	
	
	
	//Fecha Formato
	$('.arroz_fecha').datepicker({
    format: 'dd-mm-yyyy',    
	})
	$('.arroz_fecha').datepicker()
	.on('changeDate', function(ev){		
		$('#Inspection_arz_area_instalada').trigger('keyup');

	});
	$('.arroz').on('blur', function(){
		$('#Inspection_arz_area_instalada').val(numeral($('#Inspection_arz_area_instalada').val()).format('0,0.00'));
		$('#Inspection_arz_aislamiento').val(numeral($('#Inspection_arz_aislamiento').val()).format('0,0.00'));
	});
	
	$('.arroz, .arroz_fecha').on('keyup', function(){
		console.log('trigger')		
		
		
		if ($('#Inspection_arz_fecha_siembra').val() != '' && $('#Inspection_arz_fecha_almacigo').val() != '' &&
			 $('#Inspection_arz_fecha_transplante').val() != '' && $('#Inspection_arz_area_instalada').val() != '' &&
			 $('#Inspection_arz_fuera_tipo').val() != '' && $('#Inspection_arz_rojo').val() != '' &&
			 $('#Inspection_arz_plantas_sintomas').val() != '' && $('#Inspection_arz_aislamiento').val() != ''		 
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


