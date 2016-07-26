<!---->


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


$solicitud=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>1));
$campo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>4));
$acondicionamiento=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>12));
$muestreo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>18));
?>


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>

<script>

$(function(){
    $('#Inspection_proposed_time').clockface();
	 $('#Acondicionamiento_proposed_time').clockface();

});
</script>

<div class="row-fluid span12 well">		  
		<div class="span12">
			<!--Steps-->
			<div class="row-fluid">
				 <div class="span12">
					 <!-- WIZARD -->
					 <?php
						
							if($solicitud!==null )
							{
								$step='<li class="active"><span class="badge"></span>'.CHtml::link("Solicitud",array('vsolicitud', 'id'=>$model->id)).'<span class="chevron"></span></li>';
							}							
							if($campo!==null)
							{
								$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Campo",array('vcampo', 'id'=>$model->id)).'<span class="chevron"></span></li>';
							}
							
							if($acondicionamiento!==null)
							{
								$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Acondicionamiento",array('vacondicionamiento', 'id'=>$model->id)).'<span class="chevron"></span></li>';
							}
							if($muestreo!==null)
							{
								$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Muestreo",array('vmuestreo', 'id'=>$model->id)).'<span class="chevron"></span></li>';
							}							
						
						 echo
						 '<div class="fuelux">
							 <div id="MyWizard" class="wizard">
								 <ul class="steps">
									  '.$step.'													 
								 </ul>										
							 </div>
						 </div>
						 ';
					 ?>
				 </div>
			</div>	  
			<!--Fin Steps-->
			<!--Fin Detalle de Solicitud-->
			</br>
			<!--1° Fila de la Solicutd-->
			<div class="row-fluid">
				<div class="span2">
					<?php
					foreach($inboxs as $inbox)
					{
						if($inbox->status_id===1)
						{
							echo date("d-m-Y", strtotime($inbox->date));
						}
					}
					?>
				</div>
				<div class="span10">
					<div class="row-fluid">										  
					 <div class="span7">						
						 <?php echo CHtml::link('<b>Solicitud de Certificación</b>',array('pdf/solicitud','id'=>$model->id)); ?>
					 </div>
						<div class="span5">
							<?php								
							foreach($inboxs as $inbox)
							{
								//para editar y enviar	6
								if($inbox->status_id===1 && $inbox->estado==1 && $inbox->to===$model->user_id)
								{								
									$this->widget('bootstrap.widgets.TbButton',
										array('buttonType'=>'link',
										'size'=>'small',
										'type'=>'primary',
										'label'=>'enviar',
										'url'=>Yii::app()->createUrl('inbox/mensaje',array('id'=>$inbox->id))));
									echo "</br>";
									echo "</br>";
								}
							}
							?>
							
						</div>
					</div>
				</div>
			</div>
			<!--Fin de 1° Fila de la Solicutd-->
		  
			<div class="row-fluid">
				<div class="span2">
					<?php
					foreach($inboxs as $inbox)
					{
						if($inbox->status_id===3)
						{
							 echo date("d-m-Y", strtotime($inbox->date));
						}
					}
					?>
				</div>
				<div class="span10">
					<?php
					foreach($inboxs as $inbox)
					{
						if($inbox->status_id===3)
						{
							 echo "<b>Inspector Asignado :</b>".$inbox->to0->fullname;
						}
					}
					?>
				</div>
				
		  </div>
		  <!--Documento Aprobado-->
		  <?php
					 foreach($inboxs as $inbox)
					 {
					 if($inbox->status_id===4)
					 { ?>
		  <div class="row-fluid">
					 <div class="span2">
								<?php   echo date("d-m-Y", strtotime($inbox->date));
								?>
					 </div>
					 <div class="span10">
								<div class="row-fluid">										  
										  <div class="span12">
													 <?php echo CHtml::link('<b>Notificacion de aprobacion de solicitud de inscripcion</b>',array('pdf/aprobacion','id'=>$model->id)); ?>
										  </div>
										  
								</div>
					 </div>
		  </div>
		  <?php }} ?>			  
		  <!--Documento Desaprobado-->
		  <?php
					 foreach($inboxs as $inbox)
					 {
					 if($inbox->status_id===5 and $inbox->estado==1 )
					 { ?>
		  <div class="row-fluid">
					 <div class="span2">
								<?php   echo date("d-m-Y", strtotime($inbox->date));
								?>
					 </div>
					 <div class="span10">
								<div class="row-fluid">										  
										  <div class="span12">
													 <?php echo CHtml::link(' <b>Notificacion de Rechazo de solicitud de inscripcion</b>',array('pdf/aprobacion','id'=>$model->id)); ?>
										  </div>
								</div>
					 </div>
		  </div>
		  <?php }} ?>
		  <!--Documento Observado-->
		  <?php
			foreach($inboxs as $inbox)
			{
				if($inbox->status_id===6 and $inbox->estado==1 )
				{ ?>
					<div class="row-fluid">
						<div class="span2">
							<?php   echo date("d-m-Y", strtotime($inbox->date));?>
						</div>
						<div class="span10">
							<div class="row-fluid">										  
								<div class="span12">
									<?php echo CHtml::link('<b>Notificacion de Observación de solicitud de inscripcion</b>',array('pdf/aprobacion','id'=>$model->id)); ?>
								</div>								
							</div>
						</div>
					</div>
		  <?php
				}
			} ?>
		  
	<!--Inspecciones-->
	<?php	  foreach($inspections as $inspection )
	{     //Ultima Inspeccion
		switch ($inspection->inspection_number)
		{
			case 1:
				 $texto="1ra";
				 break;
			case 2:
				 $texto="2da";
				 break;
			case 3:
				 $texto="3ra";
				 break;
		}
												
			
		  if($inspection->inspection_number===$max->inspection_number)
		  {
					foreach($inboxs as $inbox)
					{
								//Demas Inspecciones
								if($inbox->status_id==4 && $inspection->proposed_time===null && $acond===null )//Acondicionamientos
								{
										  echo '<div class="row-fluid">';
										  echo '<div class="span5">';											 
										  echo "</div>";									
										  ?>
										  <div class="span7">
										  <div class="row-fluid">
													 <div class="span12">
																<?php echo "Fecha Sugerida de $inspection->inspection_number Inspección: ".date("d-m-Y", strtotime($inspection->proposed_date)); ?>
													 </div>
										  </div>
										  <div class="row-fluid">
										  <div class="span12">
											
											<!--Solicitar Inspección-->
											<a id="myModal_btninsp" role="button" class="btn btn-primary">
												
												<?php echo 'Solicitar '.$texto.' Inspección'?>
											</a>
											<!--Fin de Solicitar Inspección-->							
											
											<!--Solicitar Inspeccion-->
												<div id="myModal_inspeccion" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	  <div class="modal-header">
																		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																		 <h4 id="myModalLabel">Solicitar Inspección</h4>
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
																					  <?php echo $form->datepickerRow($inspection,'proposed_date',
																								 array(
																								  'htmlOptions'=>array('value'=>date('d-m-Y', strtotime($inspection->proposed_date)),),																								  
																								  'options'=>array( 'format' => 'dd-mm-yyyy',																								
																								  'startDate'=>'',
																								  'weekStart'=> 1,
																								  'showButtonPanel' => true,
																								  'showAnim'=>'fold',))); ?>
																					  <?php echo	$form->textFieldRow($inspection,'proposed_time',array('value'=>date("h:m A",strtotime($inspection->proposed_time)),'data-format'=>'hh:mm A','class'=>'input-small'));	?>	
																					  
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
																					  'data' => array( 'id'=>7,
																											'inspeccion'=>$inspection->inspection_number,
																											'hora'=>'js:$("#Inspection_proposed_time").val()',
																											'form'=>$inbox->form_id,
																											'observacion'=>"observacion",
																											'fecha' => 'js:$("#Inspection_proposed_date").val()' ),
																					  'success' => "function( data ){location.reload();}"
																					  ),
																					  'htmlOptions'=>array('data-dismiss'=>'modal',
																					  'url' => Yii::app()->createUrl( 'iform/observacion' ),
																					  ),));
																					  ?>							
																	  </div>
												</div>
											<!--Fin de Solicitar Inspeccion-->
										  </div>
										  </div>
										  </div>
										  </div>
								<?php										  
								}
					}
					foreach($inboxs as $inbox)
					{
						if($inbox->status_id===7) //&& $inspection->real_date===null && $inspection->proposed_time!==null)
						{?>
							<div class="row-fluid">
								<div class="span2">											
								</div>
								<div class="span10">
									<div class="row-fluid">
										<div class="span12"><?php echo CHtml::link("<b>Solicitud de $texto Inspección: </b>",array('pdf/solicitudcampo','id'=>$model->id)).$inspection->proposed_date.' &nbsp &nbsp'.date("h:m A",strtotime($inspection->proposed_time))."<br>"; ?>
										</div>
									</div>											
								</div>
							</div>
								  
								  
						<?php
						}
					}
					foreach($inboxs as $inbox)
					{			
						if($inbox->status_id===11 && $inspection->real_date!==null)
						{?>
									<!--Fecha Programada-->
									<div class="row-fluid">
										<div class="span2">
											<?php echo $inbox->date; ?>
										</div>
										<div class="span10">
											<?php echo CHtml::link("<b>Notificación de $texto Inspección:</b> ",array('pdf/solicitudcampo','id'=>$model->id)).$inspection->real_date."&nbsp &nbsp".$inspection->real_time."</br>";?>
										</div>
									</div>							
						<?php
						}
					}
					foreach($inboxs as $inbox)
					{			
						if($inbox->status_id===12 )
						{?>
									<!--Fecha Programada-->
									<div class="row-fluid">
										<div class="span2">
											<?php //echo $inbox->date; ?>
										</div>
										<div class="span10">
											<?php echo CHtml::link("<b>Informe de $texto Inspección:</b> </br>",array('pdf/solicitudcampo','id'=>$model->id));?>
										</div>
									</div>											
							
						<?php
						}
					}
					if($inspection->rechazado==1)
					{?>
						<div class="row-fluid">
							<div class="span2"></div>
							<div class="span10">
								<?php echo CHtml::link("<b>Informe de  $texto Inspección Rechazado</b>",array('pdf/solicitud','id'=>$model->id)); ?>
							</div>
						</div>
						
					<?php }
					  
					if($inspection->subsanacion==1) {?>
						<div class="row-fluid">
							<div class="span2">
							</div>
							<div class="span10">
								<div class="row-fluid">	
										<?php echo CHtml::link("<b>Informe de $texto Inspeción de Campo: Observada</b>",array('pdf/solicitudcampo','id'=>$model->id)); ?>
										<div class="row-fluid">
											<div class="span12"><?php echo "<b>Solicitud de $texto Inspección: </b><br>".$inspection->proposed_date."&nbsp &nbsp".date("h:m A",strtotime($inspection->proposed_time)); ?></div>
										</div>
										<div class="row-fluid">
											<div class="span12"><?php echo CHtml::link('Descargar',array('pdf/solicitudcampo','id'=>$model->id)); ?></div>
										</div>								
							</div>
						</div>
					<?php } 
					
					if($inspection->subsanacion==1 && $inspection->subsanacion_time===null)
					{?>
				
					<div class="row-fluid">
						<div class="span5"></div>
						<div class="span7">
							<a id="myModal_btn_subs" role="button" class="btn btn-primary">
								<?php echo 'Solicitar Subsanación de '.$texto.' Inspección'?>
							</a>
						<!--Revisar-->	
						<div id="myModal_inspec_subs" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
										<?php echo $form->datepickerRow($inspection,'subsanacion_date',
												  array(
													'htmlOptions'=>array('value'=>date("d-m-Y", strtotime($inspection->proposed_date))),
													'options'=>array( 'format' => 'dd-mm-yyyy',
													'startDate'=>'',
													'weekStart'=> 1,
													'showButtonPanel' => true,
													'showAnim'=>'fold',))); ?>
										<?php echo	$form->textFieldRow($inspection,'subsanacion_time',array('value'=>date("h:m A",strtotime($inspection->proposed_time)),'data-format'=>'hh:mm A','class'=>'input-small'));	?>	
										
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
										'data' => array( 'id'=>9,
															 'inspeccion'=>$inspection->id,
															 'hora'=>'js:$("#Inspection_subsanacion_time").val()',
															 'form'=>$inbox->form_id,
															 'observacion'=>'observacion',
															 'fecha' => 'js:$("#Inspection_subsanacion_date").val()' ),
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
			<?php }
					if($inspection->subsanacion==1 && $inspection->subsanacion_date!==null &&
						$inspection->subsanacion_time!==null && $inspection->subsanacion_real_date===null)
					{?>
						<div class="row-fluid">
							<div class="span2">								
							</div>
							<div class="span10">														
								<div class="row-fluid">
									<div class="span12"><?php echo "<b>Subsanar $texto Inspección :</b>".$inspection->subsanacion_date."&nbsp &nbsp".date("h:m A",strtotime($inspection->subsanacion_time)); ?></div>
								</div>							
							</div>
						</div>
						
					<?php
					}
					if($inspection->subsanacion==1 && $inspection->subsanacion_real_date!==null)
					{?>
						<!--Fecha Programada Subsanacion-->
						<div class="row-fluid">
							<div class="span2">
								<?php echo $inbox->date;?>
							</div>
							<div class="span10">
								<?php echo "Fecha Programada de Subs. $texto Insp.: ".$inspection->subsanacion_real_date."&nbsp &nbsp".$inspection->subsanacion_real_time;?>
							</div>
						</div>						
						
					<?php
					}
					
		  }
		  else //N-1 Inspecciones enconstradas
		  { ?>
				<?php if($inspection->subsanacion==1 && $inspection->subsanacion_real_date!==null)
					{?>
						<!--Fecha Programada Subsanacion-->
						<div class="row-fluid">
							<div class="span2"></div>
							<div class="span10">
								<?php echo CHtml::link("<b>Documento de Subsanacion $texto Inspección</b>",array('pdf/solicitud','id'=>$model->id)); ?>
							</div>
						</div>
						
					<?php
					} ?>
		  
		  <!--Fecha Programada-->
				
						<div class="row-fluid">
							<div class="span2"></div>
							<div class="span10">
								<?php echo CHtml::link("<b>Documento de  $texto Inspección</b>",array('pdf/solicitud','id'=>$model->id)); ?>
							</div>
						</div>		
				
				
				<?php if($inspection->subsanacion==0) {?>
				<div class="row-fluid">
					<div class="span2">
					</div>
					<div class="span10">
						<?php echo CHtml::link("<b>Informe de $texto Inspeción de Campo: </b>",array('pdf/solicitud','id'=>$model->id)); ?>
					</div>
				</div>
				<?php } ?>
			<!--Fin Fecha Programada-->
		  <?php 
		  }
	} ?>
	<!--Fin Inspección-->
		 
		 
		 
		 
		 
		 
		 
		 
		 
		  
	<!--Acondicionamiento-->
	<?php	  foreach($acondicionamientos as $acondicionamiento )
	{     //Ultimo Acondicionamiento
		  if($acondicionamiento->acondicionamiento_number===$acond->acondicionamiento_number)
		  {
					foreach($inboxs as $inbox)
					{
								//Demas Acondicionamiento sol
								if($inbox->status_id==12 && $acondicionamiento->proposed_time===null  )//Acondicionamientos
								{
										  echo '<div class="row-fluid">';
										  echo '<div class="span2">';	
										  //echo //"Fecha Sugerida de $acondicionamiento->acondicionamiento_number Acondicionamiento: ";
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
											$produccion=Produccion::model()->find('form_id=:form_id',array('form_id'=>$model->id));
											$movilizacion=Movilizacion::model()->find('form_id=:form_id',array('form_id'=>$model->id));
											
											if($produccion!==null && $movilizacion!==null)
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
																	  <div class="modal-header">
																		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																		 <h4 id="myModalLabel">Solicitar Acondicionamiento</h4>
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
																					  <?php echo $form->datepickerRow($acondicionamiento,'proposed_date',
																								 array(
																								  'htmlOptions'=>array('value'=>date('d-m-Y', strtotime($acondicionamiento->proposed_date)),),																								  
																								  'options'=>array( 'format' => 'dd-mm-yyyy',																								
																								  'startDate'=>'',
																								  'weekStart'=> 1,
																								  'showButtonPanel' => true,
																								  'showAnim'=>'fold',))); ?>
																					  <?php echo	$form->textFieldRow($acondicionamiento,'proposed_time',array('value'=>date("h:m A",strtotime($acondicionamiento->proposed_time)),'data-format'=>'hh:mm A','class'=>'input-small'));	?>	
																					  
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
																					  ),));
																					  ?>							
																	  </div>
												</div>
											<!--Fin de Solicitar Acondicionamiento-->
										  </div>
										  </div>
										  </div>
										  </div>
								<?php										  
								}
								
								if($inbox->status_id===13) //&& $acondicionamiento->real_date===null && $acondicionamiento->proposed_time!==null)
								{?>
									<div class="row-fluid">
										<div class="span2">											
										</div>
										<div class="span10">
											<div class="row-fluid">
												<div class="span12"><?php echo CHtml::link("<b>Solicitud de $texto Acondicionamiento: </b>",array('pdf/solicitudcampo','id'=>$model->id)).$acondicionamiento->proposed_date." ".date("h:m A",strtotime($acondicionamiento->proposed_time))."</br>"; ?></div>
											</div>											
										</div>
									</div>
										  
										  
								<?php }
											//Subsanacion
								if($inbox->status_id===16 && $acondicionamiento->subsanacion==1 && $acondicionamiento->subsanacion_time===null)
								{?>
									<div class="row-fluid">
										<div class="span2"> <?php echo $inbox->date;?>
										</div>
										<div class="span10">
											<div class="row-fluid">
												<div class=""></div>
												<div class=""></div>
											<?php echo CHtml::link("<b>Notificación de $acondicionamiento->acondicionamiento_number Acond. de Campo: Observada <b>",array('pdf/solicitud','id'=>$model->id)); ?>
											</div>
										</div>
									</div>
									
									<div class="row-fluid">
										<div class="span2"></div>
										<div class="span10">
											<a id="myModal_btn_subs_acond" role="button" class="btn btn-primary">
												<?php echo 'Solicitar Subsanación de '.$acondicionamiento->acondicionamiento_number.' Acondicionamiento'?>
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
								
								if($inbox->status_id===17 && $acondicionamiento->real_date!==null)
								{?>
											<!--Fecha Programada-->
											<div class="row-fluid">
												<div class="span2">
													<?php echo $inbox->date;//echo "Fecha Programada de $acondicionamiento->acondicionamiento_number Insp.: ";?>
												</div>
												<div class="span10">
													<?php echo CHtml::link("<b>Notificación de $acondicionamiento->acondicionamiento_number Acond.: </b>",array('pdf/solicitud','id'=>$model->id)).$acondicionamiento->real_date." ".$acondicionamiento->real_time."</br>";?>
												</div>
											</div>
											
											<?php /* if($acondicionamiento->subsanacion==0){ ?>
											<div class="row-fluid">
												<div class="span5">
												</div>
												<div class="span7">
													<b><?php echo "Informe de $acondicionamiento->acondicionamiento_number Acond. de Campo: "; ?></b></br>
													<?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
												</div>
											</div>
											<?php } */?>
											
											<!--Fin Fecha Programada-->
								<?php  }
								
								//Rechazadoo Acondicionamiento
								if($inbox->status_id===15 && $acondicionamiento->rechazado==1)
								{?>
									<div class="row-fluid">
										<div class="span2"><?php echo $inbox->date;?></div>
										<div class="span10">											
											<?php echo CHtml::link("<b>Informe de $acondicionamiento->acondicionamiento_number Acondicionamiento Rechazado",array('pdf/solicitud','id'=>$model->id)); ?>
										</div>
									</div>									
								<?php
								}
							
					}
				
					if($acondicionamiento->subsanacion==1 && $acondicionamiento->subsanacion_date!==null &&
						$acondicionamiento->subsanacion_time!==null && $acondicionamiento->subsanacion_real_date===null)
					{?>
						<div class="row-fluid">
							<div class="span2">								
							</div>
							<div class="span10">
								<div class="row-fluid">
									<div class="span12"><?php echo CHtml::link("Informe de $acondicionamiento->acondicionamiento_number Subsanación:",array('pdf/solicitud','id'=>$model->id)).$acondicionamiento->subsanacion_date." ".date("h:m A",strtotime($acondicionamiento->subsanacion_time)); ?></div>
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
								<?php echo $inbox->date;//echo "Fecha Programada de Subs. $acondicionamiento->acondicionamiento_number Acond.: ";?>
							</div>
							<div class="span10">
								<?php echo "Notificación de Subs. $acondicionamiento->acondicionamiento_number Acond.: ".$acondicionamiento->subsanacion_real_date." ".$acondicionamiento->subsanacion_real_time;?>
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
								<?php echo CHtml::link("<b>Informe de Notificación $acondicionamiento->acondicionamiento_number Acondicionamiento</b>",array('pdf/solicitud','id'=>$model->id)); ?>
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
			
		  
		  
		</div>
</div>

<!--Finnnnnnnnnnnn-->








<script>
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

	
</script>

