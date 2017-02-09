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
						$step.='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Campo",array('ivcampo', 'id'=>$model->id)).'<span class="chevron"></span></li>';
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
	<!--Fin Steps-->
<div class="row-fluid span12 well">		  
		<div class="span12">
		  
		  
		  <!--Detalle de Solicitud-->
			
			<!--Fin Detalle de Solicitud-->
			</br>
			<!--1° Fila de la Solicutd-->
			
<!--Inspecciones Bucle-->
<?php 
foreach($inspections as $inspection)
{
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
			if($inbox->status_id==7 and $inspection->proposed_time!==null && $headquarter->tipo_empresa==2)
			{?>
				<div class="row-fluid">
					<div class="span2">
								<?php echo date("d-m-Y", strtotime($inbox->date));?>
					</div>
					<div class="span10">
						<div class="row-fluid">
							<div class="span12">
								<?php echo CHtml::link("<b>Solicitud de $texto Inspección: </b>",array('pdf/solicitudcampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->proposed_date)).' &nbsp &nbsp'.date("h:m A",strtotime($inspection->proposed_time))."<br>"; ?>
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
			if($inbox->status_id==11 && $inspection->real_date!==null)
			{?>
				<div class="row-fluid">
					<div class="span2">
						<?php echo date("d-m-Y", strtotime($inbox->date));//echo "Fecha Programada de $inspection->inspection_number Insp.: ";?>
					</div>
					<div class="span10">
						<?php echo CHtml::link("<b>Notificación de $texto Inspección:</b> ",array('pdf/notificacioncampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->real_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->real_time))."<br>";?>
					</div>
				</div>			
				<!--Aprobado Inspeccion-->			
				<!--Subsanacion-->
				<?php if($inspection->subsanacion==1) {?>
				<div class="row-fluid">
					<div class="span2">
						<?php echo date("d-m-Y", strtotime($inbox->date));?>
					</div>
					<div class="span10">
						<div class="row-fluid">
								<?php echo CHtml::link("Informe de $texto Inspeción de Campo: Condicional",array('pdf/Semilla','id'=>$model->id,'idinspect'=>$idinspect,'identificador'=>2)); ?>
								<?php //echo CHtml::link("Informe de $texto Inspeción de Campo: Condicional",array('pdf/solicitudcampo','id'=>$model->id)); ?>
								<div class="row-fluid">
								    <?php //echo CHtml::link("<b>Solicitud de $texto Inspeccióncc: </b>",array('pdf/Semilla','id'=>$model->id,'idinspect'=>$idinspect,'identificador'=>2)); ?>
								    <?php //echo CHtml::link("<b>Solicitud de $texto Inspección: </b>",array('pdf/solicitudcampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->proposed_date)).' &nbsp &nbsp'.date("h:m A",strtotime($inspection->proposed_time))."<br>"; ?>
								    <div class="span12"><?php echo CHtml::link("<b>Solicitud de $texto Inspección: </b>",array('pdf/solicitudcampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->proposed_date)).' &nbsp &nbsp'.date("h:m A",strtotime($inspection->proposed_time))."<br>"; ?></div>
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
			if($inbox->status_id==7 && $inspection->real_date==null && $inspection->proposed_time!==null)
			{ ?>
			<!--NOTIFICAR VISITA-->
				<div class="row-fluid">
					
				</div>
				<div class="row-fluid">
					<div class="span2"></div>
					<div class="span10">
						<?php if($headquarter->tipo_empresa==2) {?>
						<!--Solicitar Notificar-->
							<a id="myModal_btnnotif" role="button" class="btn btn-primary">
								Validar solicitud de Inspección
							</a>
						<!--Fin de Solicitar Notificar-->
						<?php }else {?>
							<a id="myModal_btnnotif" role="button" class="btn btn-primary">
								Notificar Inspección
							</a>
						<?php }?>
						<!--Notificar Visita-->
							<div id="myModal_notificar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 id="myModalLabel">
										<?php if($headquarter->tipo_empresa==2) {?>
											Validar solicitud de Inspección
										<?php }else {?>
											Notificar Inspección
										<?php }?>
									</h4>
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
											    <button id="aceptar_solicitud_inspeccion" class="btn btn-primary">Aceptar</button>
											  <?php /*$this->widget('bootstrap.widgets.TbButton', array(
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
																							 ),));*/ ?>
									</div>
							</div>
						<!--Fin de Notificar Visita-->
					</div>
				</div>
			<?php
			}
			
			if($inbox->status_id==11 && $inspection->real_date!==null && $acond==null &&
				$inspection->subsanacion==0 && $inspection->rechazado==0)
			{  
				echo '<div class="row-fluid">
						<div class="span2"></div><div class="span10">';
				if($model->crop_id==1)//Arroz
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('arroz/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id==2)//Algodon
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('algodon/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id==3 || $model->crop_id==4 || $model->crop_id==5)//Trigo,cebada,avena cereales
				{	
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('cereales/update', 'id'=>$inspection->id)));
				}			
				if($model->crop_id==6 || $model->crop_id==7 || $model->crop_id==8 || $model->crop_id==9 || $model->crop_id==10 ||$model->crop_id==11 ||$model->crop_id==12)//Frijol,haba,pallar,lenteja,caupi,soya, leguminosas
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('leguminosas/update', 'id'=>$inspection->id)));
				}			
				if($model->crop_id==13)//Maiz
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('maiz/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id==15)//Papa
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('papa/update', 'id'=>$inspection->id)));
				}
				echo '</div></div>';
			}
			
			//Subsanacion
			if($inbox->status_id==11 && $inspection->real_date!==null && $acond==null &&
				$inspection->subsanacion==1 && $inspection->rechazado==0 && $inspection->subsanacion_real_date!==null)
			{  
				echo '<div class="row-fluid">
						<div class="span2"></div><div class="span10">';
				if($model->crop_id==1)//Arroz
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('arroz/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id==2)//Algodon
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('algodon/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id==3 || $model->crop_id==4 || $model->crop_id==5)//Trigo,cebada,avena cereales
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('cereales/update', 'id'=>$inspection->id)));
				}			
				if($model->crop_id==6 || $model->crop_id==7 || $model->crop_id==8 || $model->crop_id==9 || $model->crop_id==10 ||$model->crop_id==11 ||$model->crop_id==12)//Frijol,haba,pallar,lenteja,caupi,soya, leguminosas
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('leguminosas/update', 'id'=>$inspection->id)));
				}			
				if($model->crop_id==13)//Maiz
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('maiz/update', 'id'=>$inspection->id)));
				}
				if($model->crop_id==15)//Papa
				{
				$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'Realizar Inspeccion','url'=>array('papa/update', 'id'=>$inspection->id)));
				}
				echo '</div></div>';
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
						<?php echo CHtml::link("<b>Informe de $texto Inspección</b>",array('pdf/Semilla','id'=>$model->id,'idinspect'=>$idinspect,'identificador'=>1));?>
					</div>
				</div>											
				
			<?php
			}
		}
		
		if($inspection->subsanacion_date!==null && $inspection->subsanacion_time!==null && $inspection->subsanacion==1 &&
			$inspection->subsanacion_real_date==null)
			{ ?>
			<!--NOTIFICAR VISITA SUBSANACION-->
				<div class="row-fluid">
					<div class="span2">						
					</div>
					<div class="span10">
						<div class="row-fluid">
							<div class="span12"><?php echo "<b>Subsanar $texto Inspección :</b>".date("d-m-Y", strtotime($inspection->subsanacion_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->subsanacion_time)); ?></div>
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
					<div class="span2"></div>
					<div class="span10">
						<?php echo CHtml::link("<b>Informe de  $texto Inspección Rechazado</b>",array('pdf/solicitud','id'=>$model->id,'idinspect'=>$idinspect,'identificador'=>3)); ?>
					</div>
				</div>
		<?php			
		}
		
		if($inspection->subsanacion==1 && $inspection->subsanacion_real_date!==null)
		{ ?>
			<!--Fecha Programada Subsanacion-->
						<div class="row-fluid">
							<div class="span2">
								<?php echo date("d-m-Y", strtotime($inbox->date));?>
							</div>
							<div class="span10">
								<?php echo "Notificación de Subs. $texto Insp.: ".date("d-m-Y", strtotime($inspection->subsanacion_real_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->subsanacion_real_time));?>
							</div>
						</div>
						
		<?php			
		}
		
	}
	else
	{
		
		
		//N Inspecciones
		foreach($inboxs as $inbox)
		{
			if($inbox->status_id==7 && $headquarter->tipo_empresa==2)
			{?>
				<div class="row-fluid">
					<div class="span2">
								<?php echo date("d-m-Y", strtotime($inbox->date));?>
					</div>
					<div class="span10">
						<div class="row-fluid">
							<div class="span12">
								<?php echo CHtml::link("<b>Solicitud de $texto Inspección: </b>",array('pdf/solicitudcampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->proposed_date)).' &nbsp &nbsp'.date("h:m A",strtotime($inspection->proposed_time))."<br>"; ?>
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
			if($inbox->status_id==11 && $inspection->real_date!==null)
			{?>
				<div class="row-fluid">
					<div class="span2">
						<?php echo date("d-m-Y", strtotime($inbox->date));//echo "Fecha Programada de $inspection->inspection_number Insp.: ";?>
					</div>
					<div class="span10">
						<?php echo CHtml::link("<b>Notificación de $texto Inspección:</b> ",array('pdf/notificacioncampo','id'=>$model->id,'idinspect'=>$idinspect)).date("d-m-Y", strtotime($inspection->real_date))."&nbsp &nbsp".date("h:m A",strtotime($inspection->real_time))."<br>";?>
					</div>
				</div>			
				<!--Aprobado Inspeccion-->			
							
			<?php				
			}
			if($inbox->status_id==11)
			{?>				
				<!--Fecha Programada-->
						<div class="row-fluid">
							<div class="span2">
								<?php echo date("d-m-Y", strtotime($inbox->date)); ?>
							</div>
							<div class="span10">
								<?php echo CHtml::link("<b>Informe de $texto Inspección</b>",array('pdf/Semilla','id'=>$model->id,'idinspect'=>$idinspect,'identificador'=>1));?>
							</div>
						</div>		
				<!--Aprobado Inspeccion-->						
			<?php				
			}
		
		}
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
<?php 
$aceptar=CController::createUrl('iform/observacion');
?>
<script>
    $('#myModal_doc').modal('hide');
    $('#myModal_toggle').on('click', function(){$('#myModal_doc').modal('show');})
    $('#myModal_notificar').modal('hide');
    $('#myModal_btnnotif').on('click', function(){$('#myModal_notificar').modal('show');})
    $('#myModal_notificar_acond').modal('hide');
    $('#myModal_btnnotifacon').on('click', function(){$('#myModal_notificar_acond').modal('show');})
    
    $('#aceptar_solicitud_inspeccion').click(function(){
	var error='';
	if ($('#Inspection_real_date').val()=='') {
	    error=error+'Debe ingresar la fecha programada\n';
	}
	if ($('#Inspection_real_time').val()=='') {
	    error=error+'Debe ingresar la hora programada';
	}
	if (error!='') {
	    alert(error);
	    return false;
	}
	$.ajax({
            url: '<?= $aceptar ?>',
            type: 'POST',
            data: {'ninspeccion':<?= $inspection->inspection_number ?>,'id':8,'form':<?= $inbox->form_id ?>,'hora':$("#Inspection_real_time").val(),'observacion':'observacion','fecha':$("#Inspection_real_date").val()},
            success: function(data){
                location.reload();
            }
        });
	return true;
    });
</script>