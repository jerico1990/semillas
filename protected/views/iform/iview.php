<?php

$payments=Payment::model()->findAll('form_id=:formd_id and user_id=:user_id',array(
												':formd_id'=>$model->id,':user_id'=>$model->user_id));
//Inbox
$criteria0=new CDbCriteria;
$criteria0->condition='form_id=:form_id';
$criteria0->order='id ASC';
$criteria0->params=array(':form_id'=>$model->id);
$inboxs = Inbox::model()->findAll($criteria0);													 
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

$criteria3=new CDbCriteria;
$criteria3->condition='form_id=:form_id and user_id=:user_id';
//$criteria1->order='inspection_number DESC';
$criteria3->params=array(':form_id'=>$model->id,':user_id'=>$model->user_id);
$acond = Acondicionamiento::model()->find($criteria3);


//Tods ls acondicionamiento
$criteria4=new CDbCriteria;
$criteria4->condition='form_id=:form_id and user_id=:user_id';
//$criteria1->order='inspection_number DESC';
$criteria4->params=array(':form_id'=>$model->id,':user_id'=>$model->user_id);
$acondicionamientos = Acondicionamiento::model()->findAll($criteria4);
//Encontrar el max number_acondicionamiento
$criteria5=new CDbCriteria;
$criteria5->condition='form_id=:form_id and user_id=:user_id';
$criteria5->params=array(':form_id'=>$model->id,':user_id'=>$model->user_id);
$criteria5->select='max(acondicionamiento_number) as acondicionamiento_number';
$maxacond = Acondicionamiento::model()->find($criteria5);


$solicitud=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>1));
$campo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>4));
$acondicionamiento=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>12));

if(Yii::app()->user->checkAccess('estacion'))
{
$this->menu=array(
	array('label'=>'Listar Solicitud', 'url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('estacion')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Actualizar Solicitud', 'url'=>array('update')),
	array('label'=>'Eliminar Solicitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Administrar Solicitud', 'url'=>array('admin')),
);
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>
<script>
$(function(){
	$('#Inspection_proposed_time').clockface();
	$('#Inspection_real_time').clockface();
	$('#Inspection_subsanacion_real_time').clockface();
	
	
	$("#inbox-form input:checkbox").on('click', (function(){
		if ($(this).is(':checked')) {
			console.log('yes');
			$('#yw1').prop('disabled', false);
			$('#yw2').prop('disabled', false);
		}
		else
		{
			console.log('no');
			$('#yw1').prop('disabled', true);
			$('#yw2').prop('disabled', true);
		}	
	}));
	
	
	$("#yw4").on('click', (function(){
		
	}));
	
	
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
		  
		  <!--Detalle de Solicitud-->
			<div class="row-fluid">
				<div class="span12">
						  
				</div>
			</div>
			<!--Fin Detalle de Solicitud-->
			</br>
			<!--1° Fila de la Solicutd-->
			<div class="row-fluid">
				<div class="span5">
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
				<div class="span7">
					<div class="row-fluid">										  
						<div class="span7">
								<b>Solicitud de Certificación</b></br>
								<?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
						</div>
						<div class="span5"></div>
					</div>
				</div>
			</div>
		  <!--Fin de 1° Fila de la Solicutd-->
		  
		  <div class="row-fluid">
				<div class="span5">
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
				<div class="span7">
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
		  <!--<div class="row-fluid"><div class="span12"></div></div>-->
		  <!--Boton de Revisa Documento-->
			<?php
				foreach($inboxs as $inbox)
				{
					if($inbox->status_id===3 && $inbox->estado==1)
					{	?>
						<div class="row-fluid">
								<div class="span5"></div>
								<div class="span7">
									<!--Revision de Documentos-->
									<a id="myModal_toggle" role="button" class="btn btn-primary">Revisión de Documento</a>
									<!--Fin de Revision de Documentos-->
								</div>
						</div>
			<?php	}
				}
			?>
		 <!--Documento Aprobado-->
		  <?php
					 foreach($inboxs as $inbox)
					 {
					 if($inbox->status_id===4)
					 { ?>
		  <div class="row-fluid">
					 <div class="span5">
								<?php   echo date("d-m-Y", strtotime($inbox->date));		?>
					 </div>
					 <div class="span7">
								<div class="row-fluid">										  
										  <div class="span12">
													 <b>Notificacion de aprobacion de solicitud de inscripcion</b></br>													
													 <?php echo CHtml::link('Descargar',array('pdf/aprobacion','id'=>$model->id)); ?>
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
					 <div class="span5">
								<?php   echo date("d-m-Y", strtotime($inbox->date));?>
					 </div>
					 <div class="span7">
								<div class="row-fluid">										  
										  <div class="span7">
													 <b>Notificacion de Rechazo de solicitud de inscripcion</b></br>
													 <?php echo CHtml::link('Descargar',array('pdf/aprobacion','id'=>$model->id)); ?>
										  </div>
										  <div class="span5">
													 
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
					 <div class="span5">
								<?php   echo date("d-m-Y", strtotime($inbox->date));
								?>
					 </div>
					 <div class="span7">
								<div class="row-fluid">										  
										  <div class="span7">
													 <b>Notificacion de Observación de solicitud de inscripcion</b></br>
													 <?php echo CHtml::link('Descargar',array('pdf/aprobacion','id'=>$model->id)); ?>
										  </div>
										  <div class="span5">
													 
										  </div>
								</div>
					 </div>
		  </div>
		  <?php }} ?>
		  
		  
<!--Inspecciones Bucle-->
<?php 
foreach($inspections as $inspection)
{
	
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
			if($inbox->status_id===7 )
			{?>
				<div class="row-fluid">
					<div class="span5">											
					</div>
					<div class="span7">
						<div class="row-fluid">
							<div class="span12">
								<?php echo "<b>Solicitud de $texto Inspección: </b>".$inspection->proposed_date.' &nbsp &nbsp'.date("h:m A",strtotime($inspection->proposed_time))."<br>"
												.CHtml::link('Descargar',array('pdf/solicitudcampo','id'=>$model->id)); ?>
							</div>
						</div>						
					</div>
				</div>				  
			<?php
			}
		}
		foreach($inboxs as $inbox)
		{
			//Mostrar Ultima Inspeccion
			if($inbox->status_id===12 && $inspection->real_date!==null)
			{?>
				<div class="row-fluid">
					<div class="span5">
						<?php echo $inbox->date;//echo "Fecha Programada de $inspection->inspection_number Insp.: ";?>
					</div>
					<div class="span7">
						<?php echo "<b>Notificación de $texto Inspección:</b> ".$inspection->real_date."&nbsp &nbsp".$inspection->real_time."<br>".
										CHtml::link('Descargar',array('pdf/solicitudcampo','id'=>$model->id));?>
					</div>
				</div>			
				<!--Aprobado Inspeccion-->			
				<!--Subsanacion-->
				<?php if($inspection->subsanacion==1) {?>
				<div class="row-fluid">
					<div class="span5">
					</div>
					<div class="span7">
						<div class="row-fluid">									
								<b><?php echo "Informe de $texto Inspeción de Campo: Condicional"; ?></b></br>
								<b>Estado :</b> Observada</br>
								<?php echo CHtml::link('Descargar',array('pdf/solicitudcampo','id'=>$model->id)); ?>
								<div class="row-fluid">
									<div class="span12"><?php echo "<b>Solicitud de $texto Inspección: </b>".$inspection->proposed_date."&nbsp &nbsp".date("h:m A",strtotime($inspection->proposed_time)); ?></div>
								</div>
								<div class="row-fluid">
									<div class="span12"><?php echo CHtml::link('Descargar',array('pdf/solicitudcampo','id'=>$model->id)); ?></div>
								</div>
						</div>							
					</div>
				</div>
				<?php } ?>				
			<?php				
			}
		}
		foreach($inboxs as $inbox)
		{
			if($inbox->status_id===7 && $inspection->real_date===null && $inspection->proposed_time!==null)
			{ ?>
			<!--NOTIFICAR VISITA-->
				<div class="row-fluid">
					
				</div>
				<div class="row-fluid">
					<div class="span5"></div>
					<div class="span7">
						<!--Solicitar Notificar-->
							<a id="myModal_btnnotif" role="button" class="btn btn-primary">
								Validar solicitud de Inspección
							</a>
						<!--Fin de Solicitar Notificar-->
						<!--Notificar Visita-->
							<div id="myModal_notificar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 id="myModalLabel">Validar solicitud de Inspección</h4>
								</div>
								<div class="modal-body">
									<p>
										<div class="form">
												<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
																							array(
																									'id'=>'inbox-form',
																									'enableClientValidation'=>true,
																									'clientOptions'=>array('validateOnSubmit'=>true),
																									'htmlOptions'=>array('class'=>'well'),
																									));?>
												<?php echo $form->datepickerRow($inspection,'real_date',
																						  array(//'prepend'=>'<li class="icon-calendar"></li>',
																								  'value'=>date("d-m-Y",strtotime($inspection->proposed_date)),
																								  'options'=>
																									array( 'format' => 'dd-mm-yyyy',
																										'weekStart'=> 1,
																										'showButtonPanel' => true,
																										'showAnim'=>'fold',))); ?>
																										<?php echo $form->textFieldRow($inspection,'real_time',
																																				array(
																																				'value'=>date("h:m A",strtotime($inspection->proposed_time)),
																																				'data-format'=>'hh:mm A',
																																				'class'=>'input-small'));	?>
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
																							 'data' => array( 'ninspeccion'=>$inspection->inspection_number,
																												  'id'=>8,
																												  'form'=>$inbox->form_id,
																												  'hora'=>'js:$("#Inspection_real_time").val()',
																												  'observacion'=>'observacion',
																												  'fecha' => 'js:$("#Inspection_real_date").val()' ),
																							 'success' => "function( data ){location.reload();}"
																							 ),
																 'htmlOptions'=>array('data-dismiss'=>'modal',
																							 'url' => Yii::app()->createUrl( 'iform/observacion' ),
																							 ),)); ?>
									</div>
							</div>
						<!--Fin de Notificar Visita-->
					</div>
				</div>
			<?php
			}
			
			if($inbox->status_id==11 && $inspection->real_date!==null && $acond===null &&
				$inspection->subsanacion==0 && $inspection->rechazado==0)
			{  
				echo '<div class="row-fluid">
						<div class="span5"></div><div class="span7">';
				if($model->crop_id===1)//Arroz
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('arroz/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id===2)//Algodon
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('algodon/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id===3 || $model->crop_id===4 || $model->crop_id===5)//Trigo,cebada,avena cereales
				{	
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('cereales/update', 'id'=>$inspection->id)));
				}			
				if($model->crop_id===6 || $model->crop_id===7 || $model->crop_id===8 || $model->crop_id===9 || $model->crop_id===10 ||$model->crop_id===11)//Frijol,haba,pallar,lenteja,caupi,soya, leguminosas
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('leguminosas/update', 'id'=>$inspection->id)));
				}			
				if($model->crop_id===12)//Maiz
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('maiz/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id===13)//Papa
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('papa/update', 'id'=>$inspection->id)));
				}
				echo '</div></div>';
			}
			
			//Subsanacion
			if($inbox->status_id==11 && $inspection->real_date!==null && $acond===null &&
				$inspection->subsanacion==1 && $inspection->rechazado==0 && $inspection->subsanacion_real_date!==null)
			{  
				echo '<div class="row-fluid">
						<div class="span5"></div><div class="span7">';
				if($model->crop_id===1)//Arroz
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('arroz/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id===2)//Algodon
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('algodon/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id===3 || $model->crop_id===4 || $model->crop_id===5)//Trigo,cebada,avena cereales
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('cereales/update', 'id'=>$inspection->id)));
				}			
				if($model->crop_id===6 || $model->crop_id===7 || $model->crop_id===8 || $model->crop_id===9 || $model->crop_id===10 ||$model->crop_id===11)//Frijol,haba,pallar,lenteja,caupi,soya, leguminosas
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('leguminosas/update', 'id'=>$inspection->id)));
				}			
				if($model->crop_id===12)//Maiz
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('maiz/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id===13)//Papa
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('papa/update', 'id'=>$inspection->id)));
				}
				echo '</div></div>';
			}	
		}
		foreach($inboxs as $inbox)
		{			
			if($inbox->status_id===12 )
			{?>
						<!--Fecha Programada-->
						<div class="row-fluid">
							<div class="span5">
								<?php //echo $inbox->date; ?>
							</div>
							<div class="span7">
								<?php echo "<b>Informe de $texto Inspección:</b> </br>".//.$inspection->real_date."&nbsp &nbsp".$inspection->real_time."</br>".
												CHtml::link('Descargar',array('pdf/solicitudcampo','id'=>$model->id));?>
							</div>
						</div>											
				
			<?php
			}
		}
		
		if($inspection->subsanacion_date!==null && $inspection->subsanacion_time!==null && $inspection->subsanacion==1 &&
			$inspection->subsanacion_real_date===null)
			{ ?>
			<!--NOTIFICAR VISITA SUBSANACION-->
				<div class="row-fluid">
					<div class="span5">						
					</div>
					<div class="span7">
						<div class="row-fluid">
							<div class="span12"><?php echo "<b>Subsanar $texto Inspección :</b>".$inspection->subsanacion_date."&nbsp &nbsp".date("h:m A",strtotime($inspection->subsanacion_time)); ?></div>
						</div>						
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5"></div>
					<div class="span7">
						<!--Solicitar Notificar SUBSANACION-->
							<a id="myModal_btnnotif" role="button" class="btn btn-primary">
								Notificar Visita de Subsanación
							</a>
						<!--Fin de Solicitar Notificar SUBSANACION-->
						<!--Notificar Visita DE SUBSANACION-->
							<div id="myModal_notificar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 id="myModalLabel">Notificar Visita de Subsanación</h4>
								</div>
								<div class="modal-body">
									<p>
										<div class="form">
												<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
																							array(
																									'id'=>'inbox-form',
																									'enableClientValidation'=>true,
																									'clientOptions'=>array('validateOnSubmit'=>true),
																									'htmlOptions'=>array('class'=>'well'),
																									));?>
												<?php echo $form->datepickerRow($inspection,'subsanacion_real_date',
																						  array(//'prepend'=>'<li class="icon-calendar"></li>',
																								  'value'=>date("d-m-Y",strtotime($inspection->subsanacion_date)),
																								  'options'=>
																									array( 'format' => 'dd-mm-yyyy',
																										'weekStart'=> 1,
																										'showButtonPanel' => true,
																										'showAnim'=>'fold',))); ?>
												<?php echo $form->textFieldRow($inspection,'subsanacion_real_time',
																						array(
																						'value'=>date("h:m A",strtotime($inspection->subsanacion_time)),
																						'data-format'=>'hh:mm A',
																						'class'=>'input-small'));	?>
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
																							 'data' => array(
																											'ninspeccion'=>$inspection->inspection_number,																											
																											'id'=>12,
																											'form'=>$inspection->form_id,
																											'hora'=>'js:$("#Inspection_subsanacion_real_time").val()',
																											'observacion'=>'observacion',
																											'fecha' => 'js:$("#Inspection_subsanacion_real_date").val()' ),
																							 'success' => "function( data ){location.reload();}"
																							 ),
																 'htmlOptions'=>array('data-dismiss'=>'modal',
																							 'url' => Yii::app()->createUrl( 'iform/observacion' ),
																							 ),)); ?>
									</div>
							</div>
						<!--Fin de Notificar Visita DE SUBSANACION-->
					</div>
				</div>
			<?php
			}
		
		if($inspection->rechazado==1)
		{ ?>
			<div class="row-fluid">
					<div class="span5"></div>
					<div class="span7">
						<b>Informe de <?php echo $texto ?> Inspección Rechazado</b><br>
						<?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
					</div>
				</div>
		<?php			
		}
		
		if($inspection->subsanacion==1 && $inspection->subsanacion_real_date!==null)
		{ ?>
			<!--Fecha Programada Subsanacion-->
						<div class="row-fluid">
							<div class="span5">
								<?php echo $inbox->date;?>
							</div>
							<div class="span7">
								<?php echo "Fecha Programada de Subs. $texto Insp.: ".$inspection->subsanacion_real_date."&nbsp &nbsp".$inspection->subsanacion_real_time;?>
							</div>
						</div>
						
		<?php			
		}
		
	}
	else
	{?>		 
		<?php if($inspection->subsanacion==0){ ?>
		<div class="row-fluid">
			<div class="span5">
			</div>
			<div class="span7">
				<b><?php echo "Informe de $texto Inspeción de Campo: "; ?></b></br>
				<?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
			</div>
		</div>
		<?php } ?>
				
<?php 
	}		  
}
?>
<!--Fin de Inspeccion-->


<!--Revision de Documento-->
	<div id="myModal_doc" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							 <h4 id="myModalLabel">Revisión de documento</h4>
						  </div>
						  <div class="modal-body">
							 <p>
								<div class="form">						
								<?php 
								$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
									'id'=>'inbox-form',
									'enableClientValidation'=>true,
									'clientOptions'=>array('validateOnSubmit'=>true),
									'htmlOptions'=>array('class'=>'well span12'),						   
								));						
								?>					
									<?php echo $form->textAreaRow($model, 'observacion', array('id'=>'observacion','rows'=>9,'class'=>'span12')); ?>
								
									<?php echo $form->datepickerRow($model,'fecha_visita',
									  array(//'prepend'=>'<li class="icon-calendar"></li>',
										'options'=>array( 'format' => 'dd/mm/yyyy', 
										'weekStart'=> 1,
										'showButtonPanel' => true,
										'showAnim'=>'fold',))); ?>
									<?php echo $form->checkboxRow($model, 'validainsp'); ?>	
										
								<?php $this->endWidget(); ?>				
							</div><!-- form -->
							 </p>
						  </div>
						  <div class="modal-footer">
								<?php $this->widget('bootstrap.widgets.TbButton', array(	
								  'type'=>'success',
								  'label'=>'Aprobar',						
								  'buttonType'=>'ajaxButton',
								  'url'=>Yii::app()->createUrl( 'iform/observacion' ),
								  'ajaxOptions'=>array(			     
										  'type'=>'POST',	
										  'data' => array( 'id'=>'1','form'=>$model->id,'observacion' => 'js:$("#observacion").val()' ,
																'fecha_visita' => 'js:$("#Iform_fecha_visita").val()' , 'pago'=>'js:$("#Iform_validainsp").val()','hora'=>'js:$("#t1").val()' ),
								  
										  'success' => "function(data){
										  
													 location.reload();
													 }",
										  ),
										// 'url'=>'#',
								  'htmlOptions'=>array('data-dismiss'=>'modal',
															  'disabled'=>true,
												 'url' => Yii::app()->createUrl( 'iform/observacion' ),
												 ),
									)); ?>				    
									<?php $this->widget('bootstrap.widgets.TbButton', array(
								  'type'=>'primary',
								  'label'=>'Observar',				
								  'buttonType'=>'ajaxButton',
								  'url'=>Yii::app()->createUrl( 'iform/observacion' ),
								  'ajaxOptions'=>array(			     
											  'type'=>'POST',							
											  'data' => array( 'id'=>'2','form'=>$model->id,'observacion' => 'js:$("#observacion").val()' ),
											  'success' => "function( data )
																	{
																	  location.reload();
																	}"
										  ),
								  'htmlOptions'=>array('data-dismiss'=>'modal','disabled'=>true,
													'url' => Yii::app()->createUrl( 'iform/observacion' ),
												 ),				
									)); ?>				    
									 <?php $this->widget('bootstrap.widgets.TbButton', array(
								  'type'=>'danger',
								  'label'=>'Rechazar',				
								  'buttonType'=>'ajaxButton',
								  'url'=>Yii::app()->createUrl( 'iform/observacion' ),
								  'ajaxOptions'=>array(			     
											  'type'=>'POST',							
											  'data' => array( 'id'=>'3','form'=>$model->id,'observacion' => 'js:$("#observacion").val()' ),
											  'success' => "function( data )
																	{
																	  location.reload();
																	}"
										  ),
								  'htmlOptions'=>array('data-dismiss'=>'modal',
													'url' => Yii::app()->createUrl( 'iform/observacion' ),
												 ),				
									)); ?>
						  </div>
	</div>
<!--Fin de Revision de Dcoument-->









		  
<!--Acondicionamientos Bucle-->
<?php 
foreach($acondicionamientos as $acondicionamiento)
{
	if($acondicionamiento->acondicionamiento_number===$acond->acondicionamiento_number)
	{
		foreach($inboxs as $inbox)
		{
			if($inbox->status_id===13) //&& $acondicionamiento->real_date===null && $acondicionamiento->proposed_time!==null)
			{?>
				<div class="row-fluid">
					<div class="span5">											
					</div>
					<div class="span7">
						<div class="row-fluid">
							<div class="span12"><?php echo "<b>Solicitud de $acondicionamiento->acondicionamiento_number Acondicionamiento: </b>".$acondicionamiento->proposed_date." ".date("h:m A",strtotime($acondicionamiento->proposed_time))."</br>".
																			CHtml::link('Descargar',array('pdf/solicitudcampo','id'=>$model->id)); ?></div>
						</div>											
					</div>
				</div>
					  
					  
			<?php }
		}
		foreach($inboxs as $inbox)
		{
			
			//Mostrar Ultima Acondicionamiento
			if($inbox->status_id===13 && $acondicionamiento->real_date!==null)
			{?>
				<div class="row-fluid">
					<div class="span5">
						<?php echo $inbox->date;//echo "Fecha Programada de $acondicionamiento->acondicionamiento_number Insp.: ";?>
					</div>
					<div class="span7">
						<?php echo "<b>Notificación de $acondicionamiento->acondicionamiento_number Acond.: </b>".$acondicionamiento->real_date." ".$acondicionamiento->real_time."</br>".
									CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id));?>
					</div>
				</div>				
				<!--Aprobado Acondicionamiento-->
				<?php /*if($acondicionamiento->subsanacion==0) {?>
				<div class="row-fluid">
					<div class="span5">
					</div>
					<div class="span7">
						<b><?php echo "Informe de $acondicionamiento->acondicionamiento_number Acond. de Campo: "; ?></b></br>
						<?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
					</div>
				</div>
				<?php }*/ ?>
				
				
			<?php
				
			}
		}
		foreach($inboxs as $inbox)
		{			
			if($inbox->status_id===13 && $acondicionamiento->real_date===null && $acondicionamiento->proposed_time!==null)
			{ ?>
			<!--NOTIFICAR VISITA-->
				
				<div class="row-fluid">
					<div class="span5"></div>
					<div class="span7">
						<!--Solicitar Notificar-->
							<a id="myModal_btnnotifacon" role="button" class="btn btn-primary">
								Validar Solicitud de Acondicionamiento
							</a>
						<!--Fin de Solicitar Notificar-->
						<!--Notificar Visita-->
							<div id="myModal_notificar_acond" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 id="myModalLabel">Solicitud de Acondicionamiento</h4>
								</div>
								<div class="modal-body">
									<p>
										<div class="form">
												<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
																							array(
																									'id'=>'inbox-form',
																									'enableClientValidation'=>true,
																									'clientOptions'=>array('validateOnSubmit'=>true),
																									'htmlOptions'=>array('class'=>'well'),
																									));?>
												<?php echo $form->datepickerRow($acondicionamiento,'real_date',
																						  array(//'prepend'=>'<li class="icon-calendar"></li>',
																								  'value'=>date("d-m-Y",strtotime($acondicionamiento->proposed_date)),
																								  'options'=>
																									array( 'format' => 'dd-mm-yyyy',
																										'weekStart'=> 1,
																										'showButtonPanel' => true,
																										'showAnim'=>'fold',))); ?>
																										<?php echo $form->textFieldRow($acondicionamiento,'real_time',
																																				array(
																																				'value'=>date("h:m A",strtotime($acondicionamiento->proposed_time)),
																																				'data-format'=>'hh:mm A',
																																				'class'=>'input-small'));	?>
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
																							 'data' => array('acondicionamiento'=>$acondicionamiento->id,
																													'acondicionamiento_number'=>$acondicionamiento->acondicionamiento_number,
																													'id'=>11,
																													'form'=>$inbox->form_id,
																													'hora'=>'js:$("#Acondicionamiento_real_time").val()',
																													'observacion'=>'observacion',
																													'fecha' => 'js:$("#Acondicionamiento_real_date").val()' ),
																							 'success' => "function( data ){location.reload();}"
																							 ),
																 'htmlOptions'=>array('data-dismiss'=>'modal',
																							 'url' => Yii::app()->createUrl( 'iform/observacion' ),
																							 ),)); ?>
									</div>
							</div>
						<!--Fin de Notificar Visita-->
					</div>
				</div>
			<?php
			}
			//Rechazado Acondicionamiento
			if($inbox->status_id===15 && $acondicionamiento->rechazado==1)
			{ ?>
				<div class="row-fluid">
						<div class="span5"><?php echo $inbox->date; ?></div>
						<div class="span7">
							<b>Documento de <?php echo $acondicionamiento->acondicionamiento_number ?> Acondicionamiento Rechazado</b><br>
							<?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
						</div>
					</div>
			<?php			
			}
			//Subsanacion-->
			if($inbox->status_id===16 && $acondicionamiento->subsanacion==1)
			{?>
				<div class="row-fluid">
					<div class="span5"><?php echo $inbox->date;?>
					</div>
					<div class="span7">
						<div class="row-fluid">
							<div class=""></div>
							<div class=""></div>
						<b><?php echo "Informe de $acondicionamiento->acondicionamiento_number Acond. de Campo: Condicional"; ?></b></br>
						<b>Estado :</b> Observada</br>
						<?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
						</div>
					</div>
				</div>
				<?php
			} 
				
			if($inbox->status_id===17 && $inbox->estado==1 && $acondicionamiento->real_date!==null  &&
				$acondicionamiento->subsanacion==0 && $acondicionamiento->rechazado==0)
			{  
				echo '<div class="row-fluid">
						<div class="span5"></div><div class="span7">';
				if($model->crop_id===1 || $model->crop_id===2 || $model->crop_id===3 || $model->crop_id===4 || $model->crop_id===5 ||
					$model->crop_id===6 || $model->crop_id===7 || $model->crop_id===8 || $model->crop_id===9 ||
					$model->crop_id===10 ||$model->crop_id===11 || $model->crop_id===12 )
				{
				$this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'link',
								'size'=>'small',
								'type'=>'primary',
								'label'=>'Realizar Acondiconamiento',
								'url'=>array('acondicionamiento/general',
												 'id'=>$acondicionamiento->id)));
				}			
				
				if($model->crop_id===13)//Papa
				{
				$this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'link',
								'size'=>'small',
								'type'=>'primary',
								'label'=>'Realizar Acondicionamiento',
								'url'=>array('acondicionamiento/papa',
												 'id'=>$acondicionamiento->id)));
				}
				echo '</div></div>';
			}
			
			//Subsanacion
			if($inbox->status_id==17 && $acondicionamiento->real_date!==null  &&
				$acondicionamiento->subsanacion==1 && $acondicionamiento->rechazado==0 && $acondicionamiento->subsanacion_real_date!==null)
			{  
				echo '<div class="row-fluid">
						<div class="span5"></div><div class="span7">';
				if($model->crop_id===1 || $model->crop_id===2 || $model->crop_id===3 || $model->crop_id===4 || $model->crop_id===5 ||
					$model->crop_id===6 || $model->crop_id===7 || $model->crop_id===8 || $model->crop_id===9 ||
					$model->crop_id===10 ||$model->crop_id===11 || $model->crop_id===12
					)
				{
				$this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'link',
								'size'=>'small',
								'type'=>'primary',
								'label'=>'Realizar Acondiconamiento',
								'url'=>array('acondicionamiento/general',
												 'id'=>$acondicionamiento->id)));
				}			
				
				if($model->crop_id===13)//Papa
				{
				$this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'link',
								'size'=>'small',
								'type'=>'primary',
								'label'=>'Realizar Acondicionamiento',
								'url'=>array('acondicionamiento/papa',
												 'id'=>$acondicionamiento->id)));
				}
				echo '</div></div>';
			}
			
			
		}
		
		
		if($acondicionamiento->subsanacion_date!==null && $acondicionamiento->subsanacion_time!==null && $acondicionamiento->subsanacion==1 &&
			$acondicionamiento->subsanacion_real_date===null)
		{ ?>
		<!--NOTIFICAR VISITA SUBSANACION-->
			<div class="row-fluid">
				<div class="span5">
					<div class="row-fluid">
						<div class="span12"><?php echo "<b>Fecha de Subsanación $acondicionamiento->acondicionamiento_number Acond. :</b>" ?></div>
					</div>
					<div class="row-fluid">
						<div class="span12"><?php echo "<b>Hora de Subsanación $acondicionamiento->acondicionamiento_number Acond.:</b>" ?></div>
					</div>
				</div>
				<div class="span7">
					<div class="row-fluid">
						<div class="span12"><?php echo $acondicionamiento->proposed_date; ?></div>
					</div>
					<div class="row-fluid">
						<div class="span12"><?php echo date("h:m A",strtotime($acondicionamiento->proposed_time)); ?></div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5"></div>
				<div class="span7">
					<!--Solicitar Notificar SUBSANACION-->
						<a id="myModal_btnnotif" role="button" class="btn btn-primary">
							Notificar Visita de Subsanación
						</a>
					<!--Fin de Solicitar Notificar SUBSANACION-->
					<!--Notificar Visita DE SUBSANACION-->
						<div id="myModal_notificar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 id="myModalLabel">Notificar Visita de Subsanación</h4>
							</div>
							<div class="modal-body">
								<p>
									<div class="form">
											<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
																						array(
																								'id'=>'inbox-form',
																								'enableClientValidation'=>true,
																								'clientOptions'=>array('validateOnSubmit'=>true),
																								'htmlOptions'=>array('class'=>'well'),
																								));?>
											<?php echo $form->datepickerRow($acondicionamiento,'subsanacion_real_date',
																					  array(//'prepend'=>'<li class="icon-calendar"></li>',
																							  'value'=>date("d-m-Y",strtotime($acondicionamiento->subsanacion_date)),
																							  'options'=>
																								array( 'format' => 'dd-mm-yyyy',
																									'weekStart'=> 1,
																									'showButtonPanel' => true,
																									'showAnim'=>'fold',))); ?>
											<?php echo $form->textFieldRow($acondicionamiento,'subsanacion_real_time',
																					array(
																					'value'=>date("h:m A",strtotime($acondicionamiento->subsanacion_time)),
																					'data-format'=>'hh:mm A',
																					'class'=>'input-small'));	?>
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
																						 'data' => array(
																										'nacondicionamiento'=>$acondicionamiento->acondicionamiento_number,																											
																										'id'=>14,
																										'form'=>$acondicionamiento->form_id,
																										'hora'=>'js:$("#Acondicionamiento_subsanacion_real_time").val()',
																										'observacion'=>'observacion',
																										'fecha' => 'js:$("#Acondicionamiento_subsanacion_real_date").val()' ),
																						 'success' => "function( data ){location.reload();}"
																						 ),
															 'htmlOptions'=>array('data-dismiss'=>'modal',
																						 'url' => Yii::app()->createUrl( 'iform/observacion' ),
																						 ),)); ?>
								</div>
						</div>
					<!--Fin de Notificar Visita DE SUBSANACION-->
				</div>
			</div>
		<?php
		}
			
			
		if($acondicionamiento->subsanacion==1 && $acondicionamiento->subsanacion_real_date!==null)
		{ ?>
			<!--Fecha Programada Subsanacion-->
						<div class="row-fluid">
							<div class="span5">
								<?php //echo "Fecha Programada de Subs. $acondicionamiento->acondicionamiento_number Insp.: ";?>
							</div>
							<div class="span7">
								<?php echo "Fecha Programada de Subs. $acondicionamiento->acondicionamiento_number Acond.: ".$acondicionamiento->subsanacion_real_date;?>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span5">
								<?php //echo "Hora Programada de Subs. $acondicionamiento->acondicionamiento_number Insp. : "; ?>
							</div>
							<div class="span7">
								<?php echo "Hora Programada de Subs. $acondicionamiento->acondicionamiento_number Acond. : ".$acondicionamiento->subsanacion_real_time;?>
							</div>
						</div>
		<?php			
		}
		
	}
	else
	{?>
		 
		 <?php if($acondicionamiento->subsanacion==0){ ?>
		 <div class="row-fluid">
			 <div class="span5">
			 </div>
			 <div class="span7">
				 <b><?php echo "Informe de $acondicionamiento->acondicionamiento_number Acond.: "; ?></b></br>
				 <?php echo CHtml::link('Descargar',array('pdf/solicitud','id'=>$model->id)); ?>
			 </div>
		 </div>
		 <?php } ?>
				
<?php 
	}		  
}
?>
<!--Fin de Acondicionamient-->


<script>
	$('#myModal_doc').modal('hide');
	$('#myModal_toggle').on('click', function(){$('#myModal_doc').modal('show');})
	
	$('#myModal_notificar').modal('hide');
	$('#myModal_btnnotif').on('click', function(){$('#myModal_notificar').modal('show');})
	
	$('#myModal_notificar_acond').modal('hide');
	$('#myModal_btnnotifacon').on('click', function(){$('#myModal_notificar_acond').modal('show');})
	
</script>
		  








