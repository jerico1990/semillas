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

$muestreos=Muestreo::model()->findAll('form_id=:form_id',array(':form_id'=>$model->id));

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
$payment=Payment::model()->find('form_id=:form_id and pay_code is null and concept_id in (1,2,3)',array(':form_id'=>$model->id));
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
<div class="row-fluid span12" >
	 <div class="span12">
		 <!-- WIZARD -->
		 <?php
			
				if($solicitud!==null )
				{
					$step='<li class="active"><span class="badge"></span>'.CHtml::link("Solicitud",array('asolicitud', 'id'=>$model->id)).'<span class="prueba"></span></li>';
				}							
				if($campo!==null)
				{
					$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Campo",array('acampo', 'id'=>$model->id)).'<span class="prueba"></span></li>';
				}
				
				if($acondicionamiento!==null)
				{
					$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Acondicionamiento",array('aacondicionamiento', 'id'=>$model->id)).'<span class="prueba"></span></li>';
				}
				if($muestreo!==null)
				{
					$step.='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Muestreo",array('amuestreo', 'id'=>$model->id)).'<span class="chevron"></span></li>';
				}							
				if($etiquetado!==null)
				{
					$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Etiquetado",array('aetiquetado', 'id'=>$model->id)).'<span class="prueba"></span></li>';
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
<div class="row-fluid span12 well">		  
		<div class="span12">
					  
		  
<br>	
	<br>
	<?php
foreach($muestreos as $muestreo):

				echo "<div class='row-fluid'>
							<div class='span6'><b>Codigo de Lote:</b> ".CHtml::AjaxLink("$muestreo->codigo_lote",array('iform/UpdateMuestreo','id'=>$muestreo->id),array('update' => '#data'))."</div>
							<div class='span6'></div>						
													
						</div>";
				
endforeach;?>
		
		</div>
</div>

<!--Finnnnnnnnnnnn-->

	<div class="row-fluid span12 well">		  
		<div class="span12">
			<div id="data">
				<?php $this->renderPartial('_ajaxContent', array('myValue'=>$myValue)); ?>
			</div>
		</div>
	</div>



