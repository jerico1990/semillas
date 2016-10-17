
<?php
$forma=Iform::model()->find('id=:form_id',array(':form_id'=>$model->form_id));
$user=User::model()->find('id=:id',array(':id'=>$model->user_id));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$forma->location_id));
?>

<div class="form well span12" style="background: #FFFFFF">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'inspection-form',
	//'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
));

?>

<?php echo $form->errorSummary($model); ?>
<?php echo CHtml::hiddenField('formu',$model->form_id); ?>
<?php echo CHtml::hiddenField('condicional_inspection_id',$model->id); ?>

		  <div class="row-fluid">
					 <div class="span12"><h4>Campo de Multiplicación</h4></div>      
		  </div> 
		  <div class="row-fluid">
			  <div class="span3"><?php echo $form->textFieldRow($model,'size',array('class'=>'papa span12')); ?></div>
		     <div class="span9"><?php echo $form->datepickerRow($model,'papa_fecha_siembra',
																 array(	
																'htmlOptions'=>array('class'=>'papa_fecha'),
																'options'=>array( 'format' => 'dd-mm-yyyy', 
																'weekStart'=> 1,
																'showButtonPanel' => true,
																'showAnim'=>'fold',))); ?></div>
		  </div>
		  <div class="row-fluid">
					 <div class="span12"><h4>Aislamiento</h4></div>      
		  </div> 
		  <div class="row-fluid">
			  <div class="span4"><?php echo $form->textFieldRow($model,'papa_campo_comercial',array('class'=>'papa span12','maxlength'=>18)); ?></div>
			  <div class="span4"><?php echo $form->textFieldRow($model,'papa_otra_especie',array('class'=>'papa span12','maxlength'=>18)); ?></div>
			  <div class="span4"><?php echo $form->textFieldRow($model,'papa_otro_cultivar',array('class'=>'papa span12','maxlength'=>18)); ?></div>
		  </div>
		  <div class="row-fluid">
			  <div class="span12" >			
			     <table width="744" height="344" border="1px">
			
               <tr>
                 <td colspan="7">PLAGAS EN EL CULTIVO</td>
               </tr>
               <tr>
                 <td width="223" rowspan="2">Plagas</td>
                 <td width="125" rowspan="2">Factor Importancia</td>
                 <td width="26" rowspan="2">Por</td>
                 <td height="29" colspan="2">Evaluación</td>
                <?php // <td colspan="2">Segunda Evaluación</td>?>
               </tr>
               <tr>
                 <td width="123" height="28">%PI. Afectadas</td>
                 <td width="58">Puntos</td>
               <?php /*  <td width="98">%PI. Afectadas</td>
                 <td width="45">Puntos</td>*/?>
               </tr>
               <tr>
                 <td>Enrollamiento (PLRV) y  Mozaico Severo (PYV)</td>
                 <td align="right">10</td>
                 <td>X</td>
                 <td><?php echo $form->textFieldRow($model,'afectadas_enrollamiento',array('class'=>'papa span12')); ?></td>
                 <td>&nbsp;</td>
              <?php /*   <td>&nbsp;</td>
                 <td>&nbsp;</td> */ ?>
               </tr>
               <tr>
                 <td>Mozaico suave (PVS y PVX) y Rhizoctonia</td>
                 <td>4</td>
                 <td>X</td>
                 <td><?php echo $form->textFieldRow($model,'afectadas_mozaico',array('class'=>'papa span12')); ?></td>
                 <td>&nbsp;</td>
              <?php   //   <td>&nbsp;</td> ?>
              <?php   //<td>&nbsp;</td> ?>
               </tr>
               <tr>
                 <td>Otros virus</td>
                 <td>2</td>
                 <td>X</td>
                 <td><?php echo $form->textFieldRow($model,'afectadas_otros_virus',array('class'=>'papa span12')); ?></td>
                 <td>&nbsp;</td>
              <?php /*  <td>&nbsp;</td>
                 <td>&nbsp;</td> */ ?>
               </tr>
               <tr>
                 <td>Erwinia</td>
                 <td>6</td>
                 <td>X</td>
                 <td><?php echo $form->textFieldRow($model,'afectadas_erwinia',array('class'=>'papa span12')); ?></td>
                 <td>&nbsp;</td>
              <?php /*  <td>&nbsp;</td>
                 <td>&nbsp;</td> */ ?>
               </tr>
               <tr>
                 <td>Mezcla</td>
                 <td>1</td>
                 <td>X</td>
                 <td><?php echo $form->textFieldRow($model,'afectadas_mezclas',array('class'=>'papa span12')); ?></td>
                 <td>&nbsp;</td>
             <?php /*    <td>&nbsp;</td>
                 <td>&nbsp;</td> */ ?>
               </tr>
               <tr>
                 <td height="29" colspan="3">&nbsp;</td>
                 <td>Total</td>
                 <td>&nbsp;</td>
            <?php /*     <td>Total</td>
                 <td>&nbsp;</td> */ ?>
               </tr>
             </table>
			  </div>
		  </div>
		  
		  <div class="row-fluid">
					<div class="span12"><h4>Puntaje Máximo de Tolerancia</h4></div>      
		  </div>
		  <div class="row-fluid">
					<div class="span4">
								<b><u>Categoria de semilla</u></b><br>
								Certificada o Autorizada<br>
								Registrada<br>
								Básica
					</div>
					<div class="span4">
								<b><u>Puntaje Límite(1ra Insp.)</u></b><br>
							   150<br>
								100<br>
								60
					</div>
					<div class="span4">
								<b><u>Puntaje Límite(2da Insp.)</u></b><br>
							   80<br>
								60<br>
								30	
					</div>
		  </div>
		  
		  <div class="row-fluid">
					<div class="span12"><h4>Enfermedades que no se permiten</h4></div>      
		  </div> 
		  <div class="row-fluid">
					 <div class="span12">	 
								<b><u>Virus de Amarillamiento de las venas de la papa</u></b><br>			  
								- No debe existir ninguna planta con sintomalogia del virus
								- En caso de detectarse plantas con sintomalogía, el campo será rechazado como semillero e inspeccionar todo el <br>
								  campo, determinando el grado de incidencia y notificar al SENASA de la juridicción.<br>
								Marchitez bacteriana.....
					 </div>
		  </div>		  
		  <div class="row-fluid">
					 <div class="span12"><h4>Observaciones </h4></div>      
		  </div> 
		  <div class="row-fluid">
			  <div class="span12"><?php echo $form->textAreaRow($model,'observaciones',array('class'=>'papa span12','maxlength'=>300,'rows'=>6)); ?></div>		
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
											'papa_fecha_siembra'=>'js:$("#Inspection_papa_fecha_siembra").val()',
											'papa_campo_comercial'=>'js:$("#Inspection_papa_campo_comercial").val()',
											'papa_otra_especie'=>'js:$("#Inspection_papa_otra_especie").val()',
											'papa_otro_cultivar'=>'js:$("#Inspection_papa_otro_cultivar").val()',
											'afectadas_enrollamiento'=>'js:$("#Inspection_afectadas_enrollamiento").val()',
											'afectadas_mozaico'=>'js:$("#Inspection_afectadas_mozaico").val()',
											'afectadas_otros_virus'=>'js:$("#Inspection_afectadas_otros_virus").val()',
											'afectadas_erwinia'=>'js:$("#Inspection_afectadas_erwinia").val()',
											'afectadas_mezclas'=>'js:$("#Inspection_afectadas_mezclas").val()',
											'observaciones'=>'js:$("#Inspection_observaciones").val()',				 
										   'btn'=>'js:$("#Inspection_select_id").val()',
										   'id'=>$model->id,
										   'fecha'=>'js:$("#Inspection_aprobado_fecha_propuesta").val()'
										  ),
								'success' => 'function(data){location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/iview/"+$("#formu").val());}'
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
								'success' =>'function( data ){location.replace("'.Yii::app()->getRequest()->getHostInfo().'/semillas/iform/iview/"+$("#formu").val());}'
								),
								'htmlOptions'=>array('data-dismiss'=>'modal',
								'url' => Yii::app()->createUrl( 'inspection/condicional' ),
								),));
								?>		
								 				
						  </div>
	</div>
	<!--Fin de botones-->
<?php $this->endWidget(); ?>
</div>




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
	$('.papa_fecha').datepicker({
    format: 'dd-mm-yyyy',    
	})
	$('.papa_fecha').datepicker()
	.on('changeDate', function(ev){		
		$('#Inspection_afectadas_mezclas').trigger('keyup');

	});
	$('.papa').on('blur', function(){
		$('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
		$('#Inspection_papa_campo_comercial').val(numeral($('#Inspection_papa_campo_comercial').val()).format('0,0.00'));
		$('#Inspection_papa_otra_especie').val(numeral($('#Inspection_papa_otra_especie').val()).format('0,0.00'));
		$('#Inspection_papa_otro_cultivar').val(numeral($('#Inspection_papa_otro_cultivar').val()).format('0,0.00'));
		$('#Inspection_afectadas_enrollamiento').val(numeral($('#Inspection_afectadas_enrollamiento').val()).format('0,0.00'));
		$('#Inspection_afectadas_mozaico').val(numeral($('#Inspection_afectadas_mozaico').val()).format('0,0.00'));
		$('#Inspection_afectadas_otros_virus').val(numeral($('#Inspection_afectadas_otros_virus').val()).format('0,0.00'));
		$('#Inspection_afectadas_erwinia').val(numeral($('#Inspection_afectadas_erwinia').val()).format('0,0.00'));
		$('#Inspection_afectadas_mezclas').val(numeral($('#Inspection_afectadas_mezclas').val()).format('0,0.00'));	
	})
	
	$('.papa, .papa_fecha').on('keyup', function(){
		console.log('trigger')		
		
		
		
		if ($('#Inspection_size').val() != '' && $('#Inspection_papa_fecha_siembra').val() != '' &&
			 $('#Inspection_papa_campo_comercial').val() != '' && $('#Inspection_papa_otra_especie').val() != '' &&
			 $('#Inspection_papa_otro_cultivar').val() != '' && $('#Inspection_afectadas_enrollamiento').val() != '' &&
			 $('#Inspection_afectadas_mozaico').val() != '' && $('#Inspection_afectadas_otros_virus').val() != '' &&
			 $('#Inspection_afectadas_erwinia').val() != '' && $('#Inspection_afectadas_mezclas').val() != ''

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

