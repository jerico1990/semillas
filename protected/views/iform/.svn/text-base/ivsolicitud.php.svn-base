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
<br>
<div class="row-fluid span12">
	<div class="span12">
	 <!-- WIZARD -->
	 <?php
			if($solicitud!==null )
			{
				$step='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Solicitud",array('ivsolicitud', 'id'=>$model->id)).'<span class="chevron"></span></li>';
			}							
			if($campo!==null)
			{
				$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Campo",array('ivcampo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
			}
			
			if($acondicionamiento!==null)
			{
				$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Acondicionamiento",array('ivacondicionamiento', 'id'=>$model->id)).'<span class="prueba"></span></li>';
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
<div class="row-fluid span12 well">		  
		<div class="span12">
		  <!--Steps-->
				  
			<!--Fin Steps-->
		  
		  <!--Detalle de Solicitud-->
			
			<!--Fin Detalle de Solicitud-->
			</br>
			<!--1° Fila de la Solicutd-->
			<div class="row-fluid">
				<div class="span2">
					<?php
					foreach($inboxs as $inbox)
					{
						if($inbox->status_id==1)
						{
							echo date("d-m-Y", strtotime($inbox->date));
						}
					}
					?>
				</div>
				<div class="span10">
					<div class="row-fluid">										  
						<div class="span12">
								<?php echo CHtml::link("<b>Sol. de Insc. de Campo Semillero</b>",array('pdf/solicitud','id'=>$model->id)); ?>
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
						if($inbox->status_id==3)
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
						if($inbox->status_id==3)
						{
							echo "<b>Inspector(a) :</b>".$inbox->to0->fullname;
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
					if($inbox->status_id==3 && $inbox->estado==1)
					{	?>
						<div class="row-fluid">
								<div class="span2"></div>
								<div class="span10">
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
					 if($inbox->status_id==4)
					 { ?>
		  <div class="row-fluid">
					 <div class="span2">
								<?php   echo date("d-m-Y", strtotime($inbox->date));		?>
					 </div>
					 <div class="span10">
								<div class="row-fluid">										  
										  <div class="span12">								
													 <?php echo CHtml::link("<b>Notificacion de inscripción de campo semillero</b>",array('pdf/notificacion','id'=>$model->id,'identificador'=>1)); ?>
										  </div>
										 
								</div>
					 </div>
		  </div>
		  <?php }} ?>
		  
		  <!--Documento Desaprobado-->
		   <?php
					 foreach($inboxs as $inbox)
					 {
					 if($inbox->status_id==5 and $inbox->estado==1 )
					 { ?>
		  <div class="row-fluid">
					 <div class="span2">
								<?php   echo date("d-m-Y", strtotime($inbox->date));?>
					 </div>
					 <div class="span10">
								<div class="row-fluid">										  
										  <div class="span12">
													 <?php echo CHtml::link("<b>Notificacion de inscripción de campo semillero(Rechazo)</b>",array('pdf/notificacion','id'=>$model->id,'identificador'=>2)); ?>
										  </div>
										 
								</div>
					 </div>
		  </div>
		  <?php }} ?>
		  <!--Documento Observado-->
		   <?php
				foreach($inboxs as $inbox)
				{
					 if($inbox->status_id==6 and $inbox->estado==1 )
					{ ?>
		  <div class="row-fluid">
					 <div class="span2">
								<?php   echo date("d-m-Y", strtotime($inbox->date));?>
					 </div>
					 <div class="span10">
								<div class="row-fluid">										  
										  <div class="span12">
													 <?php echo CHtml::link("<b>Notificacion de inscripción de campo semillero(Observado)</b>",array('pdf/aprobacion','id'=>$model->id)); ?>
										  </div>									
								</div>
					 </div>
		  </div>
		  <?php 	}} ?>
		  
		  
<!--Revision de Documento-->
	<div id="myModal_doc" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							 <h4 id="myModalLabel">Revisión</h4>
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
									  array(
										'options'=>array( 'format' => 'dd-mm-yyyy', 
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
											'success' => "function(data){location.reload();}",
											),
										// 'url'=>'#',
								  'htmlOptions'=>array('data-dismiss'=>'modal',
															  'disabled'=>true,
												 'url' => Yii::app()->createUrl( 'iform/observacion' ),
												 ),
									)); ?>				    
									<?php /*$this->widget('bootstrap.widgets.TbButton', array(
								  'type'=>'primary',
								  'label'=>'Observar',				
								  'buttonType'=>'ajaxButton',
								  'url'=>Yii::app()->createUrl( 'iform/observacion' ),
								  'ajaxOptions'=>array(			     
											  'type'=>'POST',							
											  'data' => array( 'id'=>'2','form'=>$model->id,'observacion' => 'js:$("#observacion").val()' ),
											  'success' => "function( data ){ location.reload();}"
										  ),
								  'htmlOptions'=>array('data-dismiss'=>'modal','disabled'=>true,
													'url' => Yii::app()->createUrl( 'iform/observacion' ),
												 ),				
									));*/ ?>				    
									 <?php $this->widget('bootstrap.widgets.TbButton', array(
								  'type'=>'danger',
								  'label'=>'Rechazar',				
								  'buttonType'=>'ajaxButton',
								  'url'=>Yii::app()->createUrl( 'iform/observacion' ),
								  'ajaxOptions'=>array(			     
												'type'=>'POST',							
												'data' => array( 'id'=>'3','form'=>$model->id,'observacion' => 'js:$("#observacion").val()' ),
												'success' => "function(data){location.reload();}"
											),
								  'htmlOptions'=>array('data-dismiss'=>'modal',
													'url' => Yii::app()->createUrl( 'iform/observacion' ),
											),				
									)); ?>
						  </div>
	</div>
<!--Fin de Revision de Dcoument-->






<script>
	$('#myModal_doc').modal('hide');
	$('#myModal_toggle').on('click', function(){$('#myModal_doc').modal('show');})
	
	$('#myModal_notificar').modal('hide');
	$('#myModal_btnnotif').on('click', function(){$('#myModal_notificar').modal('show');})
	
	$('#myModal_notificar_acond').modal('hide');
	$('#myModal_btnnotifacon').on('click', function(){$('#myModal_notificar_acond').modal('show');})
	
</script>
		  








