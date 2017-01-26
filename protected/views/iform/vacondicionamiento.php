<?php
//Todos los inbox
//$inboxs=Inbox::model()->findAll('form_id=:form_id', array(':form_id'=>$model->id));
//Inbox
$criteria0=new CDbCriteria;
$criteria0->condition='form_id=:form_id';
$criteria0->order='id ASC';
$criteria0->params=array(':form_id'=>$model->id);
$inboxs = Inbox::model()->findAll($criteria0);	
//Toas ls inboxs

//Toas ls inspecciones
$criteria1=new CDbCriteria;
$criteria1->condition='form_id=:form_id and user_id=:user_id';
$criteria1->order='inspection_number ASC';
$criteria1->params=array(':form_id'=>$model->id,':user_id'=>$model->user_id);
$inspections = Inspection::model()->findAll($criteria1);

//Encontrar el max number_inspection
$criteria2=new CDbCriteria;
$criteria2->condition='form_id=:form_id and user_id=:user_id';
$criteria2->params=array(':form_id'=>$model->id,':user_id'=>$model->user_id);
$criteria2->select='max(inspection_number) as inspection_number';
$max = Inspection::model()->find($criteria2);

$acond=Acondicionamiento::model()->find('form_id=:form_id and user_id=:user_id ', array(':form_id'=>$model->id,':user_id'=>$model->user_id));
//Tods ls acondicionamiento
$criteria3=new CDbCriteria;
$criteria3->condition='form_id=:form_id and user_id=:user_id';
//$criteria1->order='inspection_number DESC';
$criteria3->params=array(':form_id'=>$model->id,':user_id'=>$model->user_id);
$acondicionamientos = Acondicionamiento::model()->findAll($criteria3);
//Encontrar el max number_acondicionamiento
$criteria4=new CDbCriteria;
$criteria4->condition='form_id=:form_id and user_id=:user_id';
$criteria4->params=array(':form_id'=>$model->id,':user_id'=>$model->user_id);
$criteria4->select='max(acondicionamiento_number) as acondicionamiento_number';
$maxacond = Acondicionamiento::model()->find($criteria4);

$step="";
$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$model->headquarter_id));
$solicitud=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>1));
$campo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>4));
$acondicionamiento=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>12));
if($headquarter->tipo_empresa=="1"){
    $muestreo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>12));
    $etiquetado=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>12));
}
else if ($headquarter->tipo_empresa=="2") {
    if($model->crop_id==15){
	$muestreo=null;
	$etiquetado=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>17));
    }
    else{
	$muestreo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>18));
	$etiquetado=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>24));
    }
}
$muestreos=Muestreo::model()->findAll('form_id=:form_id',array(':form_id'=>$model->id));
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>

<script>
$(function(){
    $('#Inspection_proposed_time').clockface();
    $('#Iform_time_proposed').clockface();
    $('#Acondicionamiento_proposed_time').clockface();
});
</script>
<br>
<div class="span12 row-fluid">
    <div class="span12">
	<!-- WIZARD -->
	    <?php   if($solicitud!==null ){
			$step='<li class="active"><span class="badge"></span>'.CHtml::link("Solicitud",array('vsolicitud', 'id'=>$model->id)).'<span class="prueba"></span></li>';
		    }
		    
		    if($campo!==null){
			$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Campo",array('vcampo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
		    }
		    if($acondicionamiento!==null)
		    {
			$step.='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Acondicionamiento",array('vacondicionamiento', 'id'=>$model->id)).'<span class="chevron"></span></li>';
		    }
		    if($muestreo!==null)
		    {
			$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Muestreo",array('vmuestreo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
		    }							
		    if($etiquetado!==null)
		    {
			$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Etiquetado",array('vetiquetado', 'id'=>$model->id)).'<span class="prueba"></span></li>';
		    }						
		    echo    '<div class="fuelux">
				<div id="MyWizard" class="wizard">
				    <ul class="steps">
					'.$step.'													 
				    </ul>										
				</div>
			    </div>';
	   ?>
    </div>
</div>

<?php if($headquarter->tipo_empresa=="1") { ?>
<div class="row-fluid span12">		  
    <div class="span12 well">
    <!--1° Fila de la Solicutd-->	 
	<div class="row-fluid">				
	    <div class="span12">
		<div class="form">
		    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'muestreo-form',)); ?>
		    <?php echo CHtml::hiddenField('id',$model->id); ?>
		    <?php echo CHtml::hiddenField('bandera_acondicionamiento','1'); ?>
		    <div class="row-fluid">
			<div class="span4"><?php echo $form->textFieldRow($model,'peso_total',array('class'=>'produccion span12')); ?></div>
			<div class="span4"><?php echo $form->textFieldRow($model,'peso_envase',array('class'=>'produccion span12')); ?></div>
			<div class="span4"><?php echo $form->textFieldRow($model,'nro_envases',array('class'=>'produccion span12')); ?></div>
		    </div>  
		    <div class="row-fluid">
			<?php $this->widget('bootstrap.widgets.TbButton', array(	
					    'type'=>'primary',
					    'label'=>'Aceptar',
					    'buttonType'=>'ajaxButton',
					    'url'=>Yii::app()->createUrl( 'muestreo/lotes' ),
					    'ajaxOptions'=>array(	  
					    'type'=>'POST',	
					    'data' => "js:$('#muestreo-form').serializeArray()",
					    'success' =>"function( data ){location.reload();}"
					    ),
					    'htmlOptions'=>array('data-dismiss'=>'modal',
					    'url' => Yii::app()->createUrl( 'muestreo/lotes' ),
					    ),));
				    ?>		
		      
		    </div>         
		    <?php $this->endWidget(); ?>
		</div><!-- form -->
	    </div>
	</div>
    </div>
</div>
<div class='row-fluid span12 well'>
    <?php foreach($muestreos as $muestre){
	    if(Yii::app()->user->checkAccess('productor'))
				    {
				    echo "<div class='row-fluid'>
							    <div class='span6'><b>Codigo de Lote:</b> ".CHtml::AjaxLink("$muestre->codigo_lote",array('iform/PupdateAcondicionamiento','id'=>$muestre->id),array('update' => '#data'))."</div>
							    <div class='span6'></div>	
						    </div>							
						    ";
				    }
    } ?>
</div>	
<div class="row-fluid span12">		  
	<div class="span12 well">
		<div id="data">
			<?php $this->renderPartial('_ajaxPacondicionamiento', array('myValue'=>$myValue)); ?>
		</div>
	</div>
</div>
				
	<?php }	else { ?>
	<div class="row-fluid span12 well">		  
		<div class="span12">
			</br>
			<?php	  foreach($acondicionamientos as $acondicionamiento )
			{     //Ultimo Acondicionamiento
				switch ($acondicionamiento->acondicionamiento_number)
				{
					case 1:
						 $texto="1ra";
						 $idinspect=1;
						 break;
					case 2:
						 $texto="2da";
						  $idinspect=2;
						 break;
					case 3:
						 $texto="3ra";
						  $idinspect=3;
						 break;
				}
				
				  if($acondicionamiento->acondicionamiento_number==$acond->acondicionamiento_number)
				  {			
						foreach($inboxs as $inbox)
						{
							//Demas Acondicionamiento sol
							if($inbox->status_id==12 && $acondicionamiento->proposed_time==null  )//Acondicionamientos
							{
								echo '<div class="row-fluid">';
								echo '<div class="span2">';	
								echo date('d-m-Y',strtotime($inbox->date));
								echo "</div>";									
								?>
								<div class="span10">
								<div class="row-fluid">
									<div class="span12">
											  <?php echo "Fecha Sugerida de $acondicionamiento->acondicionamiento_number Acondicionamiento: <br>".date("d-m-Y", strtotime($acondicionamiento->proposed_date)); ?>
									</div>
								</div>
								<div class="row-fluid">
								<div class="span12">
								<!--Solicitar Acondicionamiento-->
								<!--<a id="myModal_btnacond" role="button" class="btn">
									<?php //echo 'Solicitar '.$acondicionamiento->acondicionamiento_number.' Acondicionamiento'?>
								</a>-->
								<?php echo CHtml::hiddenField('formu',$model->id); ?>
								
								<!--Habilitar o Deshabilkitar Boton de Acondiocionamiento-->
								<?php
								//var_dump($model->id);die;
								$produccion=Produccion::model()->find('form_id=:form_id',array('form_id'=>$model->id));
								$movilizacion=Movilizacion::model()->find('form_id=:form_id',array('form_id'=>$model->id));
								$payment=Payment::model()->findAll('form_id=:form_id and concept_id=:concept_id and pay_code is null',array(':form_id'=>$model->id,':concept_id'=>3));
								
								if($produccion!=null && $movilizacion!=null)
								{?>
									<!--Solicitar Acondicionamiento-->
									<a id="myModal_btnacond" role="button" class="btn btn-primary">
										<?php echo 'Solicitar '.$acondicionamiento->acondicionamiento_number.' Acondicionamiento' ?>
									</a>
								<!--Fin de Solicitar Acondicionamiento-->	
									
								<?php	
								}
								else
								{
									
								    $this->widget('bootstrap.widgets.TbButton', array(
																			'id'=>'btn_acon',
																			'type'=>'primary',
																			'label'=>'Solicitar '.$acondicionamiento->acondicionamiento_number.' Acondicionamiento',
																			'buttonType'=>'ajaxLink',
																			'disabled'=>'disabled',
																			'htmlOptions'=>array('rel'=>'tooltip', 'title'=>'Registre Producción y Movilización'),
																		
																		  ));
								}
								?>		
								<!--Fin de Solicitar Acondicionamiento-->							
								
	<!--Solicitar Acondicionamiento-->
	<div id="myModal_acondicionamiento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <?php $observacion=CController::createUrl('iform/observacion'); ?>
	    <?php 
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'inbox-form',
		'action'=>$observacion,
		'enableClientValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true),					   
		));						
	    ?>
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 id="myModalLabel">Solicitar Acondicionamiento</h4>
	    </div>
	    <div class="modal-body">
		<p>
		    <div class="form">					
			
			<label for="Acondicionamiento_proposed_date">Fecha solicitada</label>
			<input type="text" name="fecha" id="Acondicionamiento_proposed_date">
			<?php /*echo $form->datepickerRow($acondicionamiento,'proposed_date',
					       array(
						'htmlOptions'=>array('value'=>date('d-m-Y', strtotime($acondicionamiento->proposed_date)),),																								  
						'options'=>array( 'format' => 'dd-mm-yyyy',																								
						'startDate'=>'',
						'weekStart'=> 1,
						'showButtonPanel' => true,
						'showAnim'=>'fold',)));*/ ?>
			<label for="Acondicionamiento_proposed_time">Hora solicitada</label>
			<input data-format="hh:mm A" class="input-small" name="hora" id="Acondicionamiento_proposed_time" type="text">
			<?php //echo  $form->textFieldRow($acondicionamiento,'proposed_time',array('value'=>date("h:m A",strtotime($acondicionamiento->proposed_time)),'data-format'=>'hh:mm A','class'=>'input-small'));	?>	
			<input type="hidden" name="id" value=10>
			<input type="hidden" name="acondicionamiento" value="<?= $acondicionamiento->id ?>">
			<input type="hidden" name="form" value="<?= $inbox->form_id ?>">
			<input type="hidden" name="observacion" value="observacion">
		    </div><!-- form -->													  
		</p>
	    </div>
	    <div class="modal-footer">
		<button  class="btn btn-primary" id="yw1" type="submit">Aceptar</button>
		<?php /*$this->widget('bootstrap.widgets.TbButton', array(	
					    'type'=>'primary',
					    'label'=>'Aceptar',
					    'buttonType'=>'ajaxButton',
					    'url'=>Yii::app()->createUrl( 'iform/observacion' ),
					    'ajaxOptions'=>array(			     
					    'type'=>'POST',	
					    'data' => array( 'id'=>10,
						'acondicionamiento'=>$acondicionamiento->id,
						'hora'=>'js:$("#Acondicionamiento_proposed_time").val()',
						'form'=>$inbox->form_id,
						'observacion'=>"observacion",
						'fecha' => 'js:$("#Acondicionamiento_proposed_date").val()' ),
					    'success' => "function( data ){location.reload();}"
					    ),
					    'htmlOptions'=>array('data-dismiss'=>'modal',
					    'url' => Yii::app()->createUrl( 'iform/observacion' ),
					    ),)); */
					    ?>							
	    </div>
	    <?php $this->endWidget(); ?>
	</div>
	<!--Fin de Solicitar Acondicionamiento-->
								</div>
								</div>
								</div>
								</div>
							<?php										  
							}
							
							if($inbox->status_id==13) //&& $acondicionamiento->real_date==null && $acondicionamiento->proposed_time!==null)
							{?>
								<div class="row-fluid">
									<div class="span2">
											<?php echo date('d-m-Y',strtotime($inbox->date));?>
									</div>
									<div class="span10">
										<div class="row-fluid">
											<div class="span12"><?php echo CHtml::link("<b>Solicitud de $texto Acondicionamiento: </b>",array('pdf/solicitudacondicionamiento','id'=>$model->id)).date("d-m-Y",strtotime($acondicionamiento->proposed_date))." ".date("h:m A",strtotime($acondicionamiento->proposed_time))."</br>"; ?></div>
										</div>											
									</div>
								</div>
									  
									  
							<?php }
										//Subsanacion
							if($inbox->status_id==16 && $acondicionamiento->subsanacion==1 && $acondicionamiento->subsanacion_time==null)
							{?>
								<div class="row-fluid">
									<div class="span2"> <?php echo date('d-m-Y',strtotime($inbox->date));?>
									</div>
									<div class="span10">
										<div class="row-fluid">
											<div class=""></div>
											<div class=""></div>
										<?php echo CHtml::link("<b>Notificación de $texto Acond. de Campo(Observada) <b>",array('pdf/notificacionacondicionamiento','id'=>$model->id,'identificador'=>2)); ?>
										</div>
									</div>
								</div>
								
								<div class="row-fluid">
									<div class="span2"></div>
									<div class="span10">
										<a id="myModal_btn_subs_acond" role="button" class="btn btn-primary">
											<?php echo 'Solicitar Subsanación de '.$texto.' Acondicionamiento'?>
										</a>
									<!--Revisar-->	
									<div id="myModal_acond_subs_acond" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											  <h4 id="myModalLabel">Solicitar Subsanación</h4>
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
													<?php echo $form->datepickerRow($acondicionamiento,'subsanacion_date',
															  array(
																'htmlOptions'=>array('value'=>date("d-m-Y", strtotime($acondicionamiento->proposed_date))),
																'options'=>array( 'format' => 'dd-mm-yyyy',
																'startDate'=>'',
																'weekStart'=> 1,
																'showButtonPanel' => true,
																'showAnim'=>'fold',))); ?>
													<?php echo	$form->textFieldRow($acondicionamiento,'subsanacion_time',array('value'=>date("h:m A",strtotime($acondicionamiento->proposed_time)),'data-format'=>'hh:mm A','class'=>'input-small'));	?>	
													
													<?php $this->endWidget(); ?>				
													</div><!-- form -->
												</p>
											</div>
											<div class="modal-footer">
												<?php $this->widget('bootstrap.widgets.TbButton', array(	
													'type'=>'primary',
													'label'=>'Aceptar',
													'buttonType'=>'ajaxButton',
													'url'=>Yii::app()->createUrl( 'iform/observacion' ),
													'ajaxOptions'=>array(			     
													'type'=>'POST',	
													'data' => array( 'id'=>13,
																		 'acondicionamiento'=>$acondicionamiento->id,
																		 'hora'=>'js:$("#Acondicionamiento_subsanacion_time").val()',
																		 'form'=>$inbox->form_id,
																		 'observacion'=>'observacion',
																		 'fecha' => 'js:$("#Acondicionamiento_subsanacion_date").val()' ),
													'success' => "function( data ){location.reload();}"
													),
													'htmlOptions'=>array('data-dismiss'=>'modal',
													'url' => Yii::app()->createUrl( 'iform/observacion' ),
													),));
													?>	 
											</div>
									</div>
									</div>
								</div>
								<!--Solicitar Subsanacion-->
								<?php
							} 							
							
							if($inbox->status_id==17 && $acondicionamiento->real_date!==null)
							{?>
										<!--Fecha Programada-->
										<div class="row-fluid">
											<div class="span2">
												<?php echo date('d-m-Y',strtotime($inbox->date));//echo "Fecha Programada de $acondicionamiento->acondicionamiento_number Insp.: ";?>
											</div>
											<div class="span10">
												<?php echo CHtml::link("<b>Notificación de $texto Acond.: </b>",array('pdf/notificacionacondicionamiento','id'=>$model->id,'identificador'=>2)).date('d-m-Y',strtotime($acondicionamiento->real_date))." ".date('h:m A',strtotime($acondicionamiento->real_time))."</br>";?>
											</div>
										</div>
										<!--Fin Fecha Programada-->
							<?php  }
							
							if($inbox->status_id==18)
							{?>
								<div class="row-fluid">
									<div class="span2"><?php echo date('d-m-Y',strtotime($inbox->date));?></div>
									<div class="span10">
										<?php if($model->crop_id==15){?>
										<?php echo CHtml::link("<b>Informe de $texto Acondicionamiento",array('pdf/informeacondicionamientopapa','id'=>$acondicionamiento->id,'identificador'=>2)); ?>
										<?php }else{?>
										<?php echo CHtml::link("<b>Informe de $texto Acondicionamiento",array('pdf/informeacondicionamientootros','id'=>$acondicionamiento->id,'identificador'=>2)); ?>
										<?php }?>
									</div>
								</div>									
							<?php
							}
							
							//Rechazadoo Acondicionamiento
							if($inbox->status_id==15 && $acondicionamiento->rechazado==1)
							{?>
								<div class="row-fluid">
									<div class="span2"><?php echo date('d-m-Y',strtotime($inbox->date));?></div>
									<div class="span10">											
										<?php echo CHtml::link("<b>Informe de $texto Acondicionamiento Rechazado",array('pdf/solicitud','id'=>$model->id)); ?>
									</div>
								</div>									
							<?php
							}
								
						}
					
						if($acondicionamiento->subsanacion==1 && $acondicionamiento->subsanacion_date!==null &&
							$acondicionamiento->subsanacion_time!==null && $acondicionamiento->subsanacion_real_date==null)
						{?>
							<div class="row-fluid">
								<div class="span2">								
								</div>
								<div class="span10">
									<div class="row-fluid">
										<div class="span12"><?php echo CHtml::link("Informe de $acondicionamiento->acondicionamiento_number Subsanación:",array('pdf/solicitud','id'=>$model->id)).date('d-m-Y',strtotime($acondicionamiento->subsanacion_date))." ".date("h:m A",strtotime($acondicionamiento->subsanacion_time)); ?></div>
									</div>								
								</div>
							</div>
							
						<?php
						}
						if($acondicionamiento->subsanacion==1 && $acondicionamiento->subsanacion_real_date!==null)
						{?>
							<!--Fecha Programada Subsanacion-->
							<div class="row-fluid">
								<div class="span2">
									<?php echo date('d-m-Y',strtotime($inbox->date));//echo "Fecha Programada de Subs. $acondicionamiento->acondicionamiento_number Acond.: ";?>
								</div>
								<div class="span10">
									<?php echo "Notificación de Subs. $acondicionamiento->acondicionamiento_number Acond.: ".date('d-m-Y',strtotime($acondicionamiento->subsanacion_real_date))." ".date('h:m A',strtotime($acondicionamiento->subsanacion_real_time));?>
								</div>
							</div>					
						<?php
						}
							
				  }
				  else //N-1 Acondicionamientos enconstradas
				  { ?>
						<?php if($acondicionamiento->subsanacion==1 && $acondicionamiento->subsanacion_real_date!==null)
							{?>
								<!--Fecha Programada Subsanacion-->
								<div class="row-fluid">
									<div class="span2"></div>
									<div class="span10">							
										<?php echo CHtml::link("<b>Informe de Subsanación $acondicionamiento->acondicionamiento_number Acondicionamiento</b>",array('pdf/solicitud','id'=>$model->id)); ?>
									</div>
								</div>
								
							<?php
							} ?>
				  
				  <!--Fecha Programada-->
						
						<div class="row-fluid">
							<div class="span2"></div>
							<div class="span10">							
								<?php echo CHtml::link("<b>Informe de Notificación $acondicionamiento->acondicionamiento_number Acondicionamiento</b>",array('pdf/notificacionacondicionamiento','id'=>$model->id,'identificador'=>2)); ?>
							</div>
						</div>
						
						
						<?php if($acondicionamiento->subsanacion==0) {?>
						<div class="row-fluid">
							<div class="span2">
							</div>
							<div class="span10">					
								<?php echo CHtml::link("<b>Informe de $acondicionamiento->acondicionamiento_number Acond. de Campo: </b>",array('pdf/solicitud','id'=>$model->id)); ?>
							</div>
						</div>
						<?php } ?>
					<!--Fin Fecha Programada-->
				  <?php 
				  }
			} ?>
			<!--Fin Acondicionamiento-->
	
	<?php }?>
		</div>
</div>







<script>
    $('#Acondicionamiento_proposed_date').datepicker({format: 'dd-mm-yyyy'})
    $('.produccion').on('blur', function(){
	$('#Iform_peso_total').val(numeral($('#Iform_peso_total').val()).format('0,0.00'));
	$('#Iform_peso_envase').val(numeral($('#Iform_peso_envase').val()).format('0,0.00'));
	$('#Iform_nro_envases').val(numeral($('#Iform_nro_envases').val()).format('0,0.00'));		
    });
    //Inspeccion
    $('#myModal_inspeccion').modal('hide');
    $('#myModal_btninsp').on('click', function(){$('#myModal_inspeccion').modal('show');})
    //Acondicionamiento
    $('#myModal_acondicionamiento').modal('hide');
    $('#myModal_btnacond').on('click', function(){$('#myModal_acondicionamiento').modal('show');})
    
    $('#myModal_inspec_subs').modal('hide');
    $('#myModal_btn_subs').on('click', function(){$('#myModal_inspec_subs').modal('show');})
    
    $('#myModal_acond_subs_acond').modal('hide');
    $('#myModal_btn_subs_acond').on('click', function(){$('#myModal_acond_subs_acond').modal('show');})

    $('#yw1').on('click', function(){
	var error='';
	if ($('#Acondicionamiento_proposed_date').val()=='') {
	    error=error+'Debe ingresar la Fecha propuesta para el acondicionamiento\n';
	}
	if ($('#Acondicionamiento_proposed_time').val()=='') {
	    error=error+'Debe ingresar la hora propuesta para el acondicionamiento\n';
	}
	if (error!='') {
	    //alert(error);
	    alert(error);
	    //$('#error').html(error);
	    return false;
	}
	
	return true;
    });
	
</script>

