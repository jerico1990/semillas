<?php
/* @var $this LeguminosasController */
/* @var $model Inspection */
/* @var $form CActiveForm */

$forma=Iform::model()->find('id=:form_id',array(':form_id'=>$model->form_id));
$user=User::model()->find('id=:id',array(':id'=>$model->user_id));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$forma->location_id));
?>


<div class="form well span12" style="background: #FFFFFF">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inspection-form',
    //'htmlOptions'=>array('class'=>'well'),
   
)); ?>

	<?php echo $form->errorSummary($model); ?>
   <?php echo CHtml::hiddenField('formu',$model->form_id); ?>
	<?php echo CHtml::hiddenField('condicional_inspection_id',$model->id); ?>
	
	<div class="row-fluid">
					 <div class="span12"><h4>Campo de Multiplicación</h4></div>      
	</div>
	<div class="row-fluid">		  
		  <div class="span3"><?php echo $form->textFieldRow($model,'size',array('class'=>'leguminosas span12')); ?></div>
		  <div class="span9"><?php echo $form->datepickerRow($model,'leg_fecha_siembra',
						                          array(	
									 'htmlOptions'=>array('class'=>'leguminosas_fecha span10'),
									  'options'=>array( 'format' => 'dd-mm-yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>
   </div>
	<div class="row-fluid">
					 <div class="span12"><h4>Etapa / Estado fenológico de cultivo</h4></div>      
	</div> 
	<div class="row-fluid">
				<div class="span4"><?php echo $form->datepickerRow($model,'leg_emergencia_fecha',
						                          array(	
									  'htmlOptions'=>array('class'=>'leguminosas_fecha span10'),										
									  'options'=>array( 'format' => 'dd-mm-yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>
				<div class="span8">
					 <div class="row-fluid">
					 <div class="span6"><?php echo $form->textFieldRow($model,'leg_floracion',array('class'=>'leguminosas span12')); ?></div>				
					 <div class="span6"><br><?php echo $form->datepickerRow($model,'leg_floracion_fecha',
																array(	
											'htmlOptions'=>array('class'=>'leguminosas_fecha span10'),											
											'options'=>array( 'format' => 'dd-mm-yyyy', 
											'weekStart'=> 1,
											'showButtonPanel' => true,
											'showAnim'=>'fold',))); ?></div>
					 </div>
				</div>
	</div>
	<div class="row-fluid">
				<div class="span4"><?php echo $form->textFieldRow($model,'leg_llenado_grano',array('class'=>'leguminosas span12')); ?></div>
				<div class="span8"><?php echo $form->datepickerRow($model,'leg_fecha_cosecha',
						                          array(	
									  'htmlOptions'=>array('class'=>'leguminosas_fecha span10'),									 
									  'options'=>array( 'format' => 'dd-mm-yyyy', 
									  'weekStart'=> 1,
									  'showButtonPanel' => true,
									  'showAnim'=>'fold',))); ?></div>		 
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Distanciamiento</h4></div>      
	</div> 
	<div class="row-fluid">
		<div class="span6"><?php echo $form->textFieldRow($model,'leg_distanciamiento_surcos',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12')); ?></div>
		<div class="span6"><?php echo $form->textFieldRow($model,'leg_mata',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12')); ?></div>
	</div>
	
	<div class="row-fluid">
					 <div class="span12"><h4>Aislamiento</h4></div>      
	</div> 
	<div class="row-fluid">
		<div class="span4"><?php echo $form->textFieldRow($model,'leg_campo_comercial',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'leg_otra_especie',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12')); ?></div>
		<div class="span4"><?php echo $form->textFieldRow($model,'leg_otro_cultivar',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12')); ?></div>	
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Presencias</h4></div>      
	</div>
	<div class="row-fluid">
		  <div class="span6"><?php echo $form->textAreaRow($model,'leg_presencia_maleza',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12','rows'=>6)); ?></div>
		  <div class="span6"><?php echo $form->textAreaRow($model,'leg_presencia_plagas',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12','rows'=>6)); ?></div>		  
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Plantas</h4></div>      
	</div> 	
	<div class="row-fluid">
		  <div class="span6"><?php echo $form->textAreaRow($model,'leg_plantas_otras_especies',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12','rows'=>6)); ?></div>
		  <div class="span6"><?php echo $form->textAreaRow($model,'leg_plantas_fuera_tipo',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12','rows'=>6)); ?></div>		  
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Datos</h4></div>      
	</div> 	
	<div class="row-fluid">
		  <div class="span3"><?php echo $form->textFieldRow($model,'leg_mosaicos',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12','rows'=>6)); ?></div>
		  <div class="span4"><?php echo $form->textFieldRow($model,'leg_moteado',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12','rows'=>6)); ?></div>
		  <div class="span2"><?php echo $form->textFieldRow($model,'leg_bacteriosis',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12','rows'=>6)); ?></div>
		  <div class="span3"><?php echo $form->textFieldRow($model,'leg_mancha_angular',array('size'=>18,'maxlength'=>18,'class'=>'leguminosas span12','rows'=>6));?></div>		  
	</div>
	<div class="row-fluid">
					 <div class="span12"><h4>Observación</h4></div>      
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
										  'leg_fecha_siembra'=>'js:$("#Inspection_leg_fecha_siembra").val()',
										  'leg_emergencia_fecha'=>'js:$("#Inspection_leg_emergencia_fecha").val()',
										  'leg_floracion'=>'js:$("#Inspection_leg_floracion").val()',
										  'leg_floracion_fecha'=>'js:$("#Inspection_leg_floracion_fecha").val()',
										  'leg_llenado_grano'=>'js:$("#Inspection_leg_llenado_grano").val()',
										  'leg_fecha_cosecha'=>'js:$("#Inspection_leg_fecha_cosecha").val()',
										  'leg_distanciamiento_surcos'=>'js:$("#Inspection_leg_distanciamiento_surcos").val()',
										  'leg_mata'=>'js:$("#Inspection_leg_mata").val()',
										  'leg_campo_comercial'=>'js:$("#Inspection_leg_campo_comercial").val()',
										  'leg_otra_especie'=>'js:$("#Inspection_leg_otra_especie").val()',
										  'leg_otro_cultivar'=>'js:$("#Inspection_leg_otro_cultivar").val()',
										  'leg_presencia_maleza'=>'js:$("#Inspection_leg_presencia_maleza").val()',
										  'leg_presencia_plagas'=>'js:$("#Inspection_leg_presencia_plagas").val()',
										  'leg_plantas_otras_especies'=>'js:$("#Inspection_leg_plantas_otras_especies").val()',
										  'leg_plantas_fuera_tipo'=>'js:$("#Inspection_leg_plantas_fuera_tipo").val()',
										  'leg_mosaicos'=>'js:$("#Inspection_leg_mosaicos").val()',
										  'leg_moteado'=>'js:$("#Inspection_leg_moteado").val()',
										  'leg_bacteriosis'=>'js:$("#Inspection_leg_bacteriosis").val()',
										  'leg_mancha_angular'=>'js:$("#Inspection_leg_mancha_angular").val()',
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
	$('.leguminosas_fecha').datepicker({
    format: 'dd-mm-yyyy',    
	})
	$('.leguminosas_fecha').datepicker()
	.on('changeDate', function(ev){		
		$('#Inspection_size').trigger('keyup');

	});
	
	$('.leguminosas').on('blur', function(){
		$('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
		$('#Inspection_leg_distanciamiento_surcos').val(numeral($('#Inspection_leg_distanciamiento_surcos').val()).format('0,0.00'));
		$('#Inspection_leg_mata').val(numeral($('#Inspection_leg_mata').val()).format('0,0.00'));
		$('#Inspection_leg_campo_comercial').val(numeral($('#Inspection_leg_campo_comercial').val()).format('0,0.00'));
		$('#Inspection_leg_otra_especie').val(numeral($('#Inspection_leg_otra_especie').val()).format('0,0.00'));
		$('#Inspection_leg_otro_cultivar').val(numeral($('#Inspection_leg_otro_cultivar').val()).format('0,0.00'));
		$('#Inspection_leg_floracion').val(numeral($('#Inspection_leg_floracion').val()).format('0,0.00'));
		$('#Inspection_leg_llenado_grano').val(numeral($('#Inspection_leg_llenado_grano').val()).format('0,0.00'));
		$('#Inspection_leg_mosaicos').val(numeral($('#Inspection_leg_mosaicos').val()).format('0,0.00'));
		$('#Inspection_leg_moteado').val(numeral($('#Inspection_leg_moteado').val()).format('0,0.00'));
		$('#Inspection_leg_bacteriosis').val(numeral($('#Inspection_leg_bacteriosis').val()).format('0,0.00'));
		$('#Inspection_leg_mancha_angular').val(numeral($('#Inspection_leg_mancha_angular').val()).format('0,0.00'));		
	})
	
	$('.leguminosas, .leguminosas_fecha').on('keyup', function(){
		console.log('trigger')		
		
		
		if ($('#Inspection_size').val() != '' && $('#Inspection_leg_fecha_siembra').val() != '' &&
			 $('#Inspection_leg_emergencia_fecha').val() != '' && $('#Inspection_leg_floracion').val() != '' &&
			 $('#Inspection_leg_floracion_fecha').val() != '' && $('#Inspection_leg_llenado_grano').val() != '' &&
			 $('#Inspection_leg_fecha_cosecha').val() != '' && $('#Inspection_leg_distanciamiento_surcos').val() != '' &&
			 $('#Inspection_leg_mata').val() != '' && $('#Inspection_leg_campo_comercial').val() != '' &&
			 $('#Inspection_leg_otra_especie').val() != '' && $('#Inspection_leg_otro_cultivar').val() != '' &&
			 $('#Inspection_leg_presencia_maleza').val() != '' && $('#Inspection_leg_presencia_plagas').val() != '' &&
			 $('#Inspection_leg_plantas_otras_especies').val() != '' && $('#Inspection_leg_plantas_fuera_tipo').val() != '' &&
			 $('#Inspection_leg_mosaicos').val() != '' && $('#Inspection_leg_moteado').val() != '' &&
			 $('#Inspection_leg_bacteriosis').val() != '' && $('#Inspection_leg_mancha_angular').val() != '' 
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


















<?php /*


<div class="span4">													  
                        <!--APROBADO-->													
								<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
											  
								<div class="modal-header">
								<a class="close" data-dismiss="modal">&times;</a>
								<h4>Solicitar Inspección</h4>
								</div>				 
								<div class="modal-body">
								<p>
								<div class="form">						
								<?php 
								$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
								'id'=>'inbox-form',
								'enableClientValidation'=>true,
								'clientOptions'=>array('validateOnSubmit'=>true),
								'htmlOptions'=>array('class'=>'well'),						   
								));						
								?>
								
							
								
								<?php echo	$form->textFieldRow($model,'nhora_propuesta',array('value'=>date("h:m A",strtotime($model->proposed_time)),'data-format'=>'hh:mm A','class'=>'input-small'));	?>	
								<?php $this->endWidget(); ?>				
								</div><!-- form -->					
								</p>
								</div>				 
								<div class="modal-footer">
								  <!--Boton de Si cumple-->
								<?php $this->widget('bootstrap.widgets.TbButton', array(	
								'type'=>'primary',
								'label'=>'Si',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'inspection/cumple' ),
								'ajaxOptions'=>array(			     
								'type'=>'POST',	
								'data' => array(
										  'size'=>'js:$("#Inspection_size").val()',
										  'leg_fecha_siembra'=>'js:$("#Inspection_leg_fecha_siembra").val()',
										  'leg_emergencia_fecha'=>'js:$("#Inspection_leg_emergencia_fecha").val()',
										  'leg_floracion'=>'js:$("#Inspection_leg_floracion").val()',
										  'leg_floracion_fecha'=>'js:$("#Inspection_leg_floracion_fecha").val()',
										  'leg_llenado_grano'=>'js:$("#Inspection_leg_llenado_grano").val()',
										  'leg_fecha_cosecha'=>'js:$("#Inspection_leg_fecha_cosecha").val()',
										  'leg_distanciamiento_surcos'=>'js:$("#Inspection_leg_distanciamiento_surcos").val()',
										  'leg_mata'=>'js:$("#Inspection_leg_mata").val()',
										  'leg_campo_comercial'=>'js:$("#Inspection_leg_campo_comercial").val()',
										  'leg_otra_especie'=>'js:$("#Inspection_leg_otra_especie").val()',
										  'leg_otro_cultivar'=>'js:$("#Inspection_leg_otro_cultivar").val()',
										  'leg_presencia_maleza'=>'js:$("#Inspection_leg_presencia_maleza").val()',
										  'leg_presencia_plagas'=>'js:$("#Inspection_leg_presencia_plagas").val()',
										  'leg_plantas_otras_especies'=>'js:$("#Inspection_leg_plantas_otras_especies").val()',
										  'leg_plantas_fuera_tipo'=>'js:$("#Inspection_leg_plantas_fuera_tipo").val()',
										  'btn'=>'1',
										  'id'=>$model->id,
										  ),
								//'success' => "function( data ){alert(data);}"
								),
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'inspection/cumple' ),
								),));
								?>
								 <!--Boton de No cumple-->
								<?php $this->widget('bootstrap.widgets.TbButton', array(	
								'type'=>'primary',
								'label'=>'No',
								'buttonType'=>'ajaxButton',
								'url'=>Yii::app()->createUrl( 'inspection/cumple' ),
								'ajaxOptions'=>array(			     
								'type'=>'POST',	
								'data' => array(
										  'size'=>'js:$("#Inspection_size").val()',
										  'leg_fecha_siembra'=>'js:$("#Inspection_leg_fecha_siembra").val()',
										  'leg_emergencia_fecha'=>'js:$("#Inspection_leg_emergencia_fecha").val()',
										  'leg_floracion'=>'js:$("#Inspection_leg_floracion").val()',
										  'leg_floracion_fecha'=>'js:$("#Inspection_leg_floracion_fecha").val()',
										  'leg_llenado_grano'=>'js:$("#Inspection_leg_llenado_grano").val()',
										  'leg_fecha_cosecha'=>'js:$("#Inspection_leg_fecha_cosecha").val()',
										  'leg_distanciamiento_surcos'=>'js:$("#Inspection_leg_distanciamiento_surcos").val()',
										  'leg_mata'=>'js:$("#Inspection_leg_mata").val()',
										  'leg_campo_comercial'=>'js:$("#Inspection_leg_campo_comercial").val()',
										  'leg_otra_especie'=>'js:$("#Inspection_leg_otra_especie").val()',
										  'leg_otro_cultivar'=>'js:$("#Inspection_leg_otro_cultivar").val()',
										  'leg_presencia_maleza'=>'js:$("#Inspection_leg_presencia_maleza").val()',
										  'leg_presencia_plagas'=>'js:$("#Inspection_leg_presencia_plagas").val()',
										  'leg_plantas_otras_especies'=>'js:$("#Inspection_leg_plantas_otras_especies").val()',
										  'leg_plantas_fuera_tipo'=>'js:$("#Inspection_leg_plantas_fuera_tipo").val()',
										
										  
										  		 
										  'btn'=>'2',
										  'id'=>$model->id,
										  'hora'=>'js:$("#Inspection_nhora_propuesta").val()',
										  'fecha'=>'js:$("#Inspection_nfecha_propuesta").val()' ,
										  ),
								//'success' => "function( data ){alert(data);}"
								),
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'inspection/cumple' ),
								),));
								?>		
								</div>				 
								<?php $this->endWidget(); ?>
								<?php $this->widget('bootstrap.widgets.TbButton', array(
								'label'=>'Cumple',
								'type'=>'success',
								'htmlOptions'=>array(
								'class'=>'span12',
								'data-toggle'=>'modal',
								'data-target'=>'#myModal',
								),
								));
								?>  	     
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'submit', 'label'=>'Condicional','htmlOptions'=>array('class'=>'span12',))); ?>															 
                  </div>
                  <div class="span4">														  
                          <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger','buttonType'=>'submit', 'label'=>'No Cumple','htmlOptions'=>array('class'=>'span12',))); ?>																		 
                  </div>  */ ?>