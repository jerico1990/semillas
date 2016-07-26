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

$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$model->headquarter_id));
$muestreos=Muestreo::model()->findAll('form_id=:form_id',array(':form_id'=>$model->id));
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
	$('#Acondicionamiento_real_time').clockface();
	$('#Inspection_real_time').clockface();
	$('#Inspection_subsanacion_real_time').clockface();

	
	
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
						$step='<li class="active"><span class="badge"></span>'.CHtml::link("Solicitud",array('ivsolicitud', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					}							
					if($campo!==null)
					{
						$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Campo",array('ivcampo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					}					
					if($acondicionamiento!==null)
					{
						$step.='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Acondicionamiento",array('ivacondicionamiento', 'id'=>$model->id)).'<span class="chevron"></span></li>';
					}
					if($muestreo!==null)
					{
						$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Muestreo",array('ivmuestreo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					}
					if($etiquetado!==null)
					{
						$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Etiquetado",array('ivetiquetado', 'id'=>$model->id)).'<span class="prueba"></span></li>';
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
		
			<!--Fin Detalle de Solicitud-->
			</br>
			<!--1° Fila de la Solicutd-->
			

<?php if($headquarter->tipo_empresa=="1"){?>
<div class="row-fluid span12 well">		  
		<div class="span12">
</br>
<?php
foreach($muestreos as $muestreo):
	if(Yii::app()->user->checkAccess('inspector'))
				{
				echo "<div class='row-fluid'>
							<div class='span6'><b>Codigo de Lote:</b> ".CHtml::AjaxLink("$muestreo->codigo_lote",array('iform/PupdateAcondicionamiento','id'=>$muestreo->id),array('update' => '#data'))."</div>
							<div class='span6'></div>						
						</div>";
				}
endforeach;?>

</div>
</div>


	<div class="row-fluid span12 well">		  
		<div class="span12">
			<div id="data">
				<?php $this->renderPartial('_ajaxPacondicionamiento', array('myValue'=>$myValue,'update_acondicionamiento'=>$update_acondicionamiento)); ?>
			</div>
		</div>
	</div>
	
<?php } else{ ?>

<div class="row-fluid span12 well">		  
		<div class="span12">
		  
<!--Acondicionamientos Bucle-->
<?php 
foreach($acondicionamientos as $acondicionamiento)
{
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
			if($inbox->status_id==13) //&& $acondicionamiento->real_date==null && $acondicionamiento->proposed_time!==null)
			{?>
				<div class="row-fluid">
					<div class="span2">
						<?php echo $inbox->date;?>
					</div>
					<div class="span10">
						<div class="row-fluid">
							<div class="span12"><?php echo CHtml::link("<b>Solicitud de $texto Acondicionamiento: </b>",array('pdf/solicitudacondicionamiento','id'=>$model->id)).$acondicionamiento->proposed_date." ".date("h:m A",strtotime($acondicionamiento->proposed_time))."</br>" ; ?></div>
						</div>											
					</div>
				</div>					  
			<?php }
		}
		foreach($inboxs as $inbox)
		{
			
			//Mostrar Ultima Acondicionamiento
			if($inbox->status_id==13 && $acondicionamiento->real_date!==null)
			{?>
				<div class="row-fluid">
					<div class="span2">
						<?php echo $inbox->date;//echo "Fecha Programada de $acondicionamiento->acondicionamiento_number Insp.: ";?>
					</div>
					<div class="span10">
						<?php echo CHtml::link("<b>Notificación de $texto Acond.: </b>",array('pdf/notificacionacondicionamiento','id'=>$model->id,'identificador'=>2)).$acondicionamiento->real_date." ".$acondicionamiento->real_time."</br>";?>
					</div>
				</div>				
				<!--Aprobado Acondicionamiento-->
				
			<?php
				
			}
		}
		foreach($inboxs as $inbox)
		{			
			if($inbox->status_id==13 && $acondicionamiento->real_date==null && $acondicionamiento->proposed_time!==null)
			{ ?>
			<!--NOTIFICAR VISITA-->
				
				<div class="row-fluid">
					<div class="span2"></div>
					<div class="span10">
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
			if($inbox->status_id==15 && $acondicionamiento->rechazado==1)
			{ ?>
				<div class="row-fluid">
						<div class="span2"><?php echo $inbox->date; ?></div>
						<div class="span10">
							<?php echo CHtml::link("<b>Documento de $texto Acondicionamiento Rechazado</b>",array('pdf/solicitud','id'=>$model->id)); ?>
						</div>
					</div>
			<?php			
			}
			//Subsanacion-->
			if($inbox->status_id==16 && $acondicionamiento->subsanacion==1)
			{?>
				<div class="row-fluid">
					<div class="span2"><?php echo $inbox->date;?>
					</div>
					<div class="span10">
						<div class="row-fluid">
							<div class=""></div>
							<div class=""></div>
						<?php echo CHtml::link("Informe de $texto Acond. de Campo: Observada",array('pdf/solicitud','id'=>$model->id)); ?>
						</div>
					</div>
				</div>
				<?php
			} 
				
			if($inbox->status_id==17 && $inbox->estado==1 && $acondicionamiento->real_date!==null  &&
				$acondicionamiento->subsanacion==0 && $acondicionamiento->rechazado==0)
			{  
				echo '<div class="row-fluid">
						<div class="span2"></div><div class="span10">';
				if($model->crop_id==1 || $model->crop_id==2 || $model->crop_id==3 || $model->crop_id==4 || $model->crop_id==5 ||
					$model->crop_id==6 || $model->crop_id==7 || $model->crop_id==8 || $model->crop_id==9 ||
					$model->crop_id==10 ||$model->crop_id==11 || $model->crop_id==12 || $model->crop_id==13)
				{
				$this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'link',
								'size'=>'small',
								'type'=>'primary',
								'label'=>'Realizar Acondiconamiento',
								'url'=>array('acondicionamiento/general',
												 'id'=>$acondicionamiento->id)));
				}			
				
				if($model->crop_id==15)//Papa
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
						<div class="span2"></div><div class="span10">';
				if($model->crop_id==1 || $model->crop_id==2 || $model->crop_id==3 || $model->crop_id==4 || $model->crop_id==5 ||
					$model->crop_id==6 || $model->crop_id==7 || $model->crop_id==8 || $model->crop_id==9 ||
					$model->crop_id==10 ||$model->crop_id==11 || $model->crop_id==12 || $model->crop_id==13
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
				
				if($model->crop_id==15)//Papa
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
			if($inbox->status_id==18)
			{?>
				<div class="row-fluid">
					<div class="span2"><?php echo $inbox->date;?></div>
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
		}
		
		if($acondicionamiento->subsanacion_date!==null && $acondicionamiento->subsanacion_time!==null && $acondicionamiento->subsanacion==1 &&
			$acondicionamiento->subsanacion_real_date==null)
		{ ?>
		<!--NOTIFICAR VISITA SUBSANACION-->
			<div class="row-fluid">
				<div class="span2">					
				</div>
				<div class="span10">
					<div class="row-fluid">
						<div class="span12"><?php echo CHtml::link("<b>Notificación de $texto Subsanación</b>",array('pdf/solicitud','id'=>$model->id)).$acondicionamiento->proposed_date."&nbsp".date("h:m A",strtotime($acondicionamiento->proposed_time)); ?></div>
					</div>					
				</div>
			</div>
			<div class="row-fluid">
				<div class="span2"></div>
				<div class="span10">
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
							<div class="span2">							
							</div>							
						</div>
						<div class="row-fluid">							
							<div class="span10">
								<?php echo "Notificación de Subs. $texto Acond. : ".$acondicionamiento->subsanacion_real_date." ".$acondicionamiento->subsanacion_real_time;?>
							</div>
						</div>
		<?php			
		}
		
	}
	else
	{?>
		 
		 <?php if($acondicionamiento->subsanacion==0){ ?>
		 <div class="row-fluid">
			 <div class="span2">
			 </div>
			 <div class="span10">				
				 <?php echo CHtml::link("Informe de $texto Acond.: ",array('pdf/solicitud','id'=>$model->id)); ?>
			 </div>
		 </div>
		 <?php } ?>
				
<?php 
	}		  
}
?>
<!--Fin de Acondicionamient-->
<?php } ?>


<script>
	$('#myModal_doc').modal('hide');
	$('#myModal_toggle').on('click', function(){$('#myModal_doc').modal('show');})
	
	$('#myModal_notificar').modal('hide');
	$('#myModal_btnnotif').on('click', function(){$('#myModal_notificar').modal('show');})
	
	$('#myModal_notificar_acond').modal('hide');
	$('#myModal_btnnotifacon').on('click', function(){$('#myModal_notificar_acond').modal('show');})
	
</script>
		  








