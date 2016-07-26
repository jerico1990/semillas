<?php
/* @var $this InboxinspectorController */
/* @var $model Inbox */

$this->breadcrumbs=array(
	'Inboxes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Inbox', 'url'=>array('index')),
	array('label'=>'Create Inbox', 'url'=>array('create')),
	array('label'=>'Update Inbox', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Inbox', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Inbox', 'url'=>array('admin')),
);
?>

<h1>View Inbox #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'form_id',
		'to',
		'status_id',
	),
)); ?>


<!--Visualizacion del Inspector-->
<?php

$user=User::model()->find('id=:id', array(':id'=>$model->to));

if($user!==null)
{
	$cruge=Cruge::model()->find('iduser=:iduser', array(':iduser'=>$user->cruge_user_id));
	

?>
<div class="view">
	<b>Inspector Asignado es:<?php echo $cruge->username?></b>
	</br>
</div>
<?php
}
else
{
	
}
?>
<!--Fin de Visualizacion del Inspector-->









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
				'data' => array( 'id'=>'1','form'=>$model->form_id,'observacion' => 'js:$("#observacion").val()' )

			     ),
       // 'url'=>'#',
	'htmlOptions'=>array('data-dismiss'=>'modal',
			     'url' => Yii::app()->createUrl( 'inboxinspector/observacion' ),
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
				'data' => array( 'id'=>'2','form'=>$model->form_id,'observacion' => 'js:$("#observacion").val()' )
			),
        'htmlOptions'=>array('data-dismiss'=>'modal',
			       'url' => Yii::app()->createUrl( 'inboxinspector/observacion' ),
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

