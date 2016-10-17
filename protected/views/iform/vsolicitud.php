<!---->


<?php
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

$headquarter=Headquarter::model()->find('id=:id',array(':id'=>$model->headquarter_id));

$step="";


$solicitud=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>1));
$campo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>4));
$acondicionamiento=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$model->id,':status_id'=>12));
if($headquarter->tipo_empresa=="1"){
$muestreo=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>12));
$etiquetado=Inbox::model()->find('form_id=:form_id and status_id=:status_id',array(':form_id'=>$model->id,':status_id'=>12));
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
$payment=Payment::model()->find('form_id=:form_id and concept_id=:concept_id',array(':form_id'=>$model->id,':concept_id'=>1));
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
<div class="row-fluid span12">
    <div class="span12">
	<!-- WIZARD -->
	<?php
	       
	    if($solicitud!==null )
	    {
		$step='<li style="background: #8DC641;" class="active"><span class="badge"></span>'.CHtml::link("Solicitud",array('vsolicitud', 'id'=>$model->id)).'<span class="chevron"></span></li>';
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
		$step.='<li class="active"><span class="badge"></span>'.CHtml::link("Etiquetado",array('vetiquetado', 'id'=>$model->id)).'<span class="prueba"></span></li>';
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
<div class="row-fluid span12 well">		  
		<div class="span12">
			<!--Fin Detalle de Solicitud-->
			</br>
			<!--1° Fila de la Solicutd-->
			<div class="row-fluid">
				<div class="span2">
				    <?php foreach($inboxs as $inbox) { ?>
					<?php if($inbox->status_id==1){ ?>
					    <?php echo date("d-m-Y", strtotime($inbox->date)); ?>
					<?php } ?>
				    <?php } ?>
				</div>
				<div class="span8">
					<div class="row-fluid">										  
						<div class="span7">							
						    <?php echo CHtml::link('<b>Sol. de Insc. de Campo Semillero</b>',array('pdf/solicitud','id'=>$model->id)); ?>
						</div>
						<div class="span5">
						  <?php								
							
								//para editar y enviar	6
								if( $model->headquarter->tipo_empresa==2 && $payment->pay_code==null)
								{												
									echo "<p style='color:#b94a48'>Debe Registrar el pago de la Solicitud<p>";
								}
								else
								{
									 echo " ";
								}
								if($solicitud->status_id==1 && $solicitud->estado==1 && $solicitud->to==$model->user_id && $model->headquarter->tipo_empresa==2 && $payment->pay_code!=null)
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
								else if($solicitud->status_id==1 && $solicitud->estado==1 && $solicitud->to==$model->user_id && $model->headquarter->tipo_empresa==1)
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
						  ?>							
						</div>
					</div>
				</div>
				
			<div class="span2">
			    <?php echo CHtml::link('<b>Archivos</b>',array('iform/files','id'=>$model->id)); ?>
			</div>
		    </div>
		    <!--Fin de 1° Fila de la Solicutd-->
		  
		    <div class="row-fluid">
			<div class="span2">
			    <?php foreach($inboxs as $inbox){
				    if($inbox->status_id==3)
				    {
					echo date("d-m-Y", strtotime($inbox->date));
				    }
				}
			    ?>
			</div>
			<div class="span10">
			    <?php foreach($inboxs as $inbox) { ?>
				<?php if($inbox->status_id==3) { ?>
				    <b>Inspector(a) :</b><?php echo $inbox->to0->fullname; ?>
				<?php } ?>
			    <?php } ?>
			</div>
				
		    </div>
		    <!--Documento Aprobado-->
		    <?php foreach($inboxs as $inbox) { ?>
			<?php if($inbox->status_id==4) { ?>
			    <div class="row-fluid">
				  <div class="span2">
				      <?php   echo date("d-m-Y", strtotime($inbox->date)); ?>
				  </div>
				  <div class="span10">
				      <div class="row-fluid">										  
					  <div class="span12">													 
					      <?php echo CHtml::link('<b>Notificacion de inscripción de campo semillero</b>',array('pdf/notificacion','id'=>$model->id,'identificador'=>1)); ?>
					  </div>										  
				      </div>
				  </div>
			    </div>
			<?php } ?>
		    <?php } ?>	
		  <!--Documento Desaprobado-->
		    <?php foreach($inboxs as $inbox){ ?>
			<?php if($inbox->status_id==5 and $inbox->estado==1 ) { ?>
			    <div class="row-fluid">
				<div class="span2">
				    <?php echo date("d-m-Y", strtotime($inbox->date)); ?>
				</div>
				<div class="span10">
				    <div class="row-fluid">										  
					<div class="span12">
					    <?php echo CHtml::link('<b>Notificacion de inscripción de campo semillero(Rechazado)</b>',array('pdf/notificacion','id'=>$model->id,'identificador'=>2)); ?>
					</div>
				    </div>
				</div>
			    </div>
			<?php } ?>
		    <?php } ?>
		    <?php foreach($inboxs as $inbox) { ?>
			<?php if($inbox->status_id==6 and $inbox->estado==1 ){ ?>
			    <div class="row-fluid">
				<div class="span2">
				    <?php	echo date("d-m-Y", strtotime($inbox->date));?>
				</div>
				<div class="span10">
				    <div class="row-fluid">										  
					<div class="span12">
					    <?php echo CHtml::link('<b>Notificacion de inscripción de campo semillero (Observado)</b>',array('pdf/aprobacion','id'=>$model->id)); ?>
					</div>							
				    </div>
				</div>
			    </div>
			<?php } ?>
		    <?php } ?>
		</div>
</div>

<!--Finnnnnnnnnnnn-->


<script>
	//Inspeccion
	$('#myModal_inspeccion').modal('hide');
	$('#myModal_btninsp').on('click', function(){$('#myModal_inspeccion').modal('show');})
	//Acondicionamiento
</script>

