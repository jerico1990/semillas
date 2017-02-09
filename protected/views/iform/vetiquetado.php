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

$solicitud=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>1));
$campo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>4));
$acondicionamiento=Inbox::model()->find('form_id=:form_id and status_id=:status_id',
										  array(':form_id'=>$model->id,':status_id'=>12));

$muestreos=Muestreo::model()->findAll('form_id=:form_id',array(':form_id'=>$model->id));
$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$model->headquarter_id));
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
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/clockface.css" />
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clockface.js');?>
<script>
$(function(){
	$('#Inspection_proposed_time').clockface();
	$('#Inspection_real_time').clockface();
	$('#Inspection_subsanacion_real_time').clockface();
	$('#Iform_time_proposed').clockface();
	
});
</script>
<br>
<div class="row-fluid span12">
			<div class="span12">
				<!-- WIZARD -->
				<?php
				  
					 if($solicitud!==null )
					 {
						 $step='<li class="active"><span class="badge"></span>'.CHtml::link("Solicitud",array('vsolicitud', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					 }							
					 if($campo!==null)
					 {
						 $step.='<li class="active"><span class="badge"></span>'.CHtml::link("Campo",array('vcampo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					 }
					 
					 if($acondicionamiento!==null)
					 {
						 $step.='<li class="active"><span class="badge"></span>'.CHtml::link("Acondicionamiento",array('vacondicionamiento', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					 }
					 if($muestreo!==null)
					 {
						 $step.='<li class="active"><span class="badge"></span>'.CHtml::link("Muestreo",array('vmuestreo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
					 }							
					 if($etiquetado!==null)
					 {
						 $step.='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Etiquetado",array('vetiquetado', 'id'=>$model->id)).'<span class="chevron"></span></li>';
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
<?php if($headquarter->tipo_empresa=="1" || $model->crop_id==15){ ?>
			<div class="row-fluid span12">		  
			    <div class="span12 well">
			    <!--1° Fila de la Solicutd-->	 
				<div class="row-fluid">				
				    <div class="span12">
					<div class="form">
					    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'muestreo-form',)); ?>
					    <?php echo CHtml::hiddenField('id',$model->id); ?>
					    <?php echo CHtml::hiddenField('bandera_etiquetado',$model->id); ?>
					    <div class="row-fluid">
						<div id="error" style="color: red"></div>
					    </div>
					    <div class="row-fluid">
						<?php //<div class="span3"> echo $form->textFieldRow($model,'lotes',array('class'=>'produccion span12')); </div>?>
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
							'beforeSend' => "js:function(request){
							    var error='';
							    if($('#Iform_peso_total').val()=='')
							    {
								error=error+'Debes ingresar el peso total <br>';
							    }
							    if($('#Iform_peso_envase').val()=='')
							    {
								error=error+'Debes ingresar el peso del envase <br>';
							    }
							    if($('#Iform_nro_envases').val()=='')
							    {
								error=error+'Debes ingresar el nro de envases <br>';
							    }
							    
							    if(error!='')
							    {
								$('#error').html(error);
								return false;
							    }
							    
							}",
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
				<?php
				foreach($muestreos as $muestre):
					if(Yii::app()->user->checkAccess('productor'))
								{
								echo "<div class='row-fluid'>
											<div class='span6'><b>Codigo de Lote:</b> ".CHtml::AjaxLink("$muestre->codigo_lote",array('iform/PupdateEtiquetado','id'=>$muestre->id),array('update' => '#data'))."</div>
											<div class='span6'></div>	
										</div>							
										";
								}
				endforeach;?>
			</div>	
			<div class="row-fluid span12">		  
				<div class="span12 well">
					<div id="data">
						<?php $this->renderPartial('_ajaxPetiquetado', array('myValue'=>$myValue)); ?>
					</div>
				</div>
			</div>
<?php }else {?>
	<div class="row-fluid span12 well">		  
	    <div class="span12">
	      </br>
	      <?php foreach($etiquetados as $etiquetado):
		      if(Yii::app()->user->checkAccess('productor'))
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
<script>
    /*$('.produccion').on('blur', function(){
	//$('#Iform_peso_total').val(numeral($('#Iform_peso_total').val()).format('0,0.00'));
	//$('#Iform_peso_envase').val(numeral($('#Iform_peso_envase').val()).format('0,0.00'));
	//$('#Iform_nro_envases').val(numeral($('#Iform_nro_envases').val()).format('0,0.00'));		
    });*/
</script>
