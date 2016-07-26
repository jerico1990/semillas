<?php
$inbox=Inbox::model()->find('form_id=:form_id', array(':form_id'=>$model->id));
$inboxs=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$model->id,'status_id'=>3));



$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Solicitud', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Actualizar Solicitud', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Solicitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Administrar Solicitud', 'url'=>array('admin')),
);
?>

<h1>Ver Solicitud </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'headquarter_id',
		'crop_id',
		'variety_id',
		'category',
		'source_crop_code',
		'quantity',
		'location_id',
		'location_name',
		'location_annex',
		'area',
		'location_lon',
		'location_lat',
		'seed_date',
		'sow_estimate_quantity',
		'last_crop',
		'farmers_id',
		'registry_date',
	),
)); ?>

<?php
if($inbox->status_id!=1)
{
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'pdf','url'=>array('inbox/pdf', 'id'=>$model->id))); 	

}

if($inboxs!==null)
{
	echo "</br>";	
	echo "Inspector Asignado: ". $inboxs->to0->crugeuser->username;
	echo "</br>";	

?>
<?php
	if(($model->observacion_notificado===null && $model->observacion_aprobado===null) || ($model->observacion_notificado!==null &&  $model->observacion_aprobado===null) )
	{
?>
		<!--Button de Revision de Documentos-->
		
		<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
		 
		<div class="modal-header">
		    <a class="close" data-dismiss="modal">&times;</a>
		    <h4>Modal header</h4>
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
			
				<?php echo $form->textAreaRow($model, 'observacion', array('id'=>'observacion','rows'=>10,'class'=>'span5')); ?>
							 
				<?php $this->endWidget(); ?>
		
			</div><!-- form -->	 
			 
			
		    </p>
		</div>
		 
		<div class="modal-footer">
		    <?php $this->widget('bootstrap.widgets.TbButton', array(	
			'type'=>'primary',
			'label'=>'Aprobar',
			'buttonType'=>'ajaxButton',
			'url'=>Yii::app()->createUrl( 'inboxinspector/observacion' ),
			'ajaxOptions'=>array(			     
						'type'=>'POST',	
						/*'success' => "function( data )
							     {
							       // handle return data
							       alert( data );
		
							     }",*/
						'data' => array( 'id'=>'1','form'=>$model->id,'observacion' => 'js:$("#observacion").val()' )
		
					     ),
		       // 'url'=>'#',
			'htmlOptions'=>array('data-dismiss'=>'modal',
					     'url' => Yii::app()->createUrl( 'form/observacion' ),
					     ),
		    )); ?>
		    
		    
		    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Notificar',
		
			'buttonType'=>'ajaxButton',
			'url'=>Yii::app()->createUrl( 'inboxinspector/observacion' ),
			'ajaxOptions'=>array(			     
						'type'=>'POST',	
						/*'success' => "function( data )
							     {
							       // handle return data
							       alert( data );
							     }",*/
						'data' => array( 'id'=>'2','form'=>$model->id,'observacion' => 'js:$("#observacion").val()' )
					),
			'htmlOptions'=>array('data-dismiss'=>'modal',
					       'url' => Yii::app()->createUrl( 'form/observacion' ),
					     ),
		
		    )); ?>
		</div>
		 
		<?php $this->endWidget(); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Revisar Doc.',
		    'type'=>'primary',
		    'htmlOptions'=>array(
			'data-toggle'=>'modal',
			'data-target'=>'#myModal',
		    ),
		)); ?>
		
		<!--Fin de Button de Revision de Documentos-->
<?php
	}
}
?>
