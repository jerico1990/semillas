<?php

$payments=Payment::model()->findAll('form_id=:formd_id and user_id=:user_id',array(
												':formd_id'=>$model->id,':user_id'=>$model->user_id));
//Inbox
$criteria0=new CDbCriteria;
$criteria0->condition='form_id=:form_id';
$criteria0->order='id ASC';
$criteria0->params=array(':form_id'=>$model->id);
$inboxs = Inbox::model()->findAll($criteria0);

$etiquetados=Etiquetado::model()->findAll('form_id=:form_id',array(':form_id'=>$model->id));

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
	$('#Inspection_proposed_time').clockface();
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
						$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Acondicionamiento",array('ivacondicionamiento', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					}
					if($muestreo!==null)
					{
						$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Muestreo",array('ivmuestreo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					}
					if($etiquetado!==null)
					{
						$step.='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Etiquetado",array('ivetiquetado', 'id'=>$model->id)).'<span class="chevron"></span></li>';
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

		 
<br>

<!--Etiquetado-->

<?php if($headquarter->tipo_empresa=="1" || $model->crop_id==15){?>
<div class="row-fluid span12 well">		  
		<div class="span12">
</br>
<?php
foreach($muestreos as $muestreo):
	if(Yii::app()->user->checkAccess('inspector'))
				{
				echo "<div class='row-fluid'>
							<div class='span6'><b>Codigo de Lote:</b> ".CHtml::AjaxLink("$muestreo->codigo_lote",array('iform/PupdateEtiquetado','id'=>$muestreo->id),array('update' => '#data'))."</div>
							<div class='span6'></div>						
						</div>";
				}
endforeach;?>

</div>
</div>


	<div class="row-fluid span12 well">		  
		<div class="span12">
			<div id="data">
				<?php $this->renderPartial('_ajaxPetiquetado', array('myValue'=>$myValue)); ?>
			</div>
		</div>
	</div>
	
<?php } else{ ?>
<div class="row-fluid span12 well">		  
		<div class="span12">
<?php
foreach($etiquetados as $etiquetado):
				if(Yii::app()->user->checkAccess('inspector') )
				{
					echo "<div class='row-fluid'>
							<div class='span4'><b>Codigo de Lote:</b> ".CHtml::AjaxLink($etiquetado->muestreo->codigo_lote,array('iform/UpdateEtiquetado','id'=>$etiquetado->id),array('update' => '#data'))."</div>					
						</div>";
				}
endforeach;?>

	</div>
</div>
	<div class="row-fluid span12 well">		  
		<div class="span12">
			<div id="data">
				<?php $this->renderPartial('_ajaxContentaetiquetado', array('myValue'=>$myValue)); ?>
			</div>
		</div>
	</div>
<?php } ?>
	








