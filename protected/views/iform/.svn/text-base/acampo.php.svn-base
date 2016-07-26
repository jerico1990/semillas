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
$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$model->headquarter_id));

$solicitud=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>1));
$campo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>4));
$acondicionamiento=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>12));

if($headquarter->tipo_empresa=="1"){										  
$muestreo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>12));
$etiquetado=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>12));
}
else if ($headquarter->tipo_empresa=="2") {	
	if($model->crop_id==15){
	$muestreo=null;
	$etiquetado=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
											  array(':form_id'=>$model->id,':status_id'=>17));
		
	}
	else
	{
	$muestreo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
											  array(':form_id'=>$model->id,':status_id'=>18));
	$etiquetado=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
											  array(':form_id'=>$model->id,':status_id'=>24));
	}
}	

//Pagos
$paymentcriteria=new CDbCriteria;
$paymentcriteria->condition='form_id=:form_id and user_id=:user_id and pay_code is null';
$paymentcriteria->params=array(':form_id'=>$model->id,':user_id'=>$model->user_id);
$paymentcriteria->select='count(form_id) as form_id';
$cantidadpayment = Payment::model()->find($paymentcriteria);
?>


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>

<script>

$(function(){
    $('#Inspection_proposed_time').clockface();
	 $('#Acondicionamiento_proposed_time').clockface();

});
</script>
<br>
<!--Steps-->
<div class="row-fluid span12">
	 <div class="span12">
		 <!-- WIZARD -->
		 <?php
			
			  if($solicitud!==null )
			  {
				  $step='<li class="active"><span class="badge"></span>'.CHtml::link("Solicitud",array('asolicitud', 'id'=>$model->id)).'<span class="prueba"></span></li>';
			  }							
			  if($campo!==null)
			  {
				  $step.='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Campo",array('acampo', 'id'=>$model->id)).'<span class="chevron"></span></li>';
			  }
			  
			  if($acondicionamiento!==null)
			  {
				  $step.='<li class="active"><span class="badge"></span>'.CHtml::link("Acondicionamiento",array('aacondicionamiento', 'id'=>$model->id)).'<span class="prueba"></span></li>';
			  }
			  if($muestreo!==null)
			  {
				  $step.='<li class="active"><span class="badge"></span>'.CHtml::link("Muestreo",array('amuestreo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
			  }							
			  if($etiquetado!==null)
			  {
				  $step.='<li class="active"><span class="badge"></span>'.CHtml::link("Etiquetado",array('aetiquetado', 'id'=>$model->id)).'<span class="prueba"></span></li>';
			  }						
			
				//$step1.=$step;
			
			
				//Imprime Step
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
<div class="row-fluid span12 well">		  
		<div class="span12">
			
			<!--Fin Detalle de Solicitud-->
			</br>
			<!--1° Fila de la Solicutd-->
			
	<!--Inspecciones-->
	<?php	  foreach($inspections as $inspection )
	{     //Ultima Inspeccion
		switch ($inspection->inspection_number)
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
												
			
		  if($inspection->inspection_number==$max->inspection_number)
		  {
					foreach($inboxs as $inbox)
					{
								//Demas Inspecciones
								if($inbox->status_id==4 && $inspection->proposed_time==null && $acond==null )//Acondicionamientos
								{?>
									<div class="row-fluid">
										<div class="span2">											 
										</div>						  
										<div class="span9">
											<?php echo "Fecha Sugerida de $inspection->inspection_number Inspección: ".date("d-m-Y", strtotime($inspection->proposed_date)); ?>												
										</div>
									</div>
								<?php										  
								}
					}
					foreach($inboxs as $inbox)
					{
					 if($inbox->status_id==7 && $inspection->proposed_time!==null) //&& $inspection->real_date==null && $inspection->proposed_time!==null)
					 {?>
						 <div class="row-fluid">
							 <div class="span2">
								<?php echo date("d-m-Y", strtotime($inbox->date));?>
							 </div>
							 <div class="span10">
								 <div class="row-fluid">
									 <div class="span12"><?php echo CHtml::link("<b>Solicitud de $texto Inspección: </b>",array('pdf/solicitudcampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->proposed_date)).' &nbsp &nbsp'.date("h:m A",strtotime($inspection->proposed_time))."<br>"; ?>
									 </div>
								 </div>											
							 </div>
						 </div>							
					 <?php
					 }
					}
					foreach($inboxs as $inbox)
					{			
						if($inbox->status_id==11 && $inspection->real_date!==null)
						{?>
									<!--Fecha Programada-->
									<div class="row-fluid">
										<div class="span2">
											<?php echo date("d-m-Y", strtotime($inbox->date)); ?>
										</div>
										<div class="span10">
											<?php echo CHtml::link("<b>Notificación de $texto Inspección:</b> ",array('pdf/notificacioncampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->real_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->real_time))."</br>";?>
										</div>
									</div>							
						<?php
						}
					}
					foreach($inboxs as $inbox)
					{			
						if($inbox->status_id==12 )
						{?>
									<!--Fecha Programada-->
									<div class="row-fluid">
										<div class="span2">
											<?php echo date("d-m-Y", strtotime($inbox->date)); ?>
										</div>
										<div class="span10">
											<?php echo CHtml::link("<b>Informe de $texto Inspección</b> </br>",array('pdf/Semilla','id'=>$model->id,'idinspect'=>$idinspect));?>
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
											<div class="span12"><?php echo "<b>Solicitud de $texto Inspección: </b><br>".date("d-m-Y", strtotime($inspection->proposed_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->proposed_time)); ?></div>
										</div>
										<div class="row-fluid">
											<div class="span12"><?php echo CHtml::link('Descargar',array('pdf/solicitudcampo','id'=>$model->id)); ?></div>
										</div>								
							</div>
						</div>
					<?php } 
					
					if($inspection->subsanacion==1 && $inspection->subsanacion_time==null)
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
						$inspection->subsanacion_time!==null && $inspection->subsanacion_real_date==null)
					{?>
						<div class="row-fluid">
							<div class="span2">								
							</div>
							<div class="span10">														
								<div class="row-fluid">
									<div class="span12"><?php echo "<b>Subsanar $texto Inspección :</b>".date("d-m-Y", strtotime($inspection->subsanacion_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->subsanacion_time)); ?></div>
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
								<?php echo date("d-m-Y", strtotime($inbox->date));?>
							</div>
							<div class="span10">
								<?php echo "Fecha Programada de Subs. $texto Insp.: ".date("d-m-Y", strtotime($inspection->subsanacion_real_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->subsanacion_real_time));?>
							</div>
						</div>					
						
					<?php
					}
					
		  }
		  else //N-1 Inspecciones enconstradas
		  { ?>
				<?php foreach($inboxs as $inbox)
					{
					 if($inbox->status_id==7) //&& $inspection->real_date==null && $inspection->proposed_time!==null)
					 {?>
						 <div class="row-fluid">
							 <div class="span2">
								<?php echo date("d-m-Y", strtotime($inbox->date));?>
							 </div>
							 <div class="span10">
								 <div class="row-fluid">
									 <div class="span12"><?php echo CHtml::link("<b>Solicitud de $texto Inspección: </b>",array('pdf/solicitudcampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->proposed_date)).' &nbsp &nbsp'.date("h:m A",strtotime($inspection->proposed_time))."<br>"; ?>
									 </div>
								 </div>											
							 </div>
						 </div>							
					 <?php
					 }
					}
				?>
				<?php foreach($inboxs as $inbox)
					{			
						if($inbox->status_id==11 && $inspection->real_date!==null)
						{?>
									<!--Fecha Programada-->
									<div class="row-fluid">
										<div class="span2">
											<?php echo date("d-m-Y", strtotime($inbox->date)); ?>
										</div>
										<div class="span10">
											<?php echo CHtml::link("<b>Notificación de $texto Inspección:</b> ",array('pdf/notificacioncampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->real_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->real_time))."</br>";?>
										</div>
									</div>							
						<?php
						}
					}
				?>
				<?php foreach($inboxs as $inbox)
					{			
						if($inbox->status_id==11 && $inspection->size!==null )
						{?>
									<!--Fecha Programada-->
									<div class="row-fluid">
										<div class="span2">
											<?php echo date("d-m-Y", strtotime($inbox->date)); ?>
										</div>
										<div class="span10">
											<?php echo CHtml::link("<b>Informe de $texto Inspección</b> </br>",array('pdf/Semilla','id'=>$model->id,'idinspect'=>$idinspect));?>
										</div>
									</div>											
							
						<?php
						}
					}
				?>
				
		  <?php 
		  }
	} ?>
	<!--Fin Inspección-->
		 
		 
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

