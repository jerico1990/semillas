<?php
/* @var $this InboxController */
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
		'date',
		'form_id',
		'to',
		'status_id',
	),
)); ?>


<?php  echo CHtml::link('read more', $this->createAbsoluteUrl('inbox/pdf',array('id'=> $model->form_id)));?>

<?php

$inbox=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$model->form_id,':status_id'=>3));

if($inbox!==null)
{
	$form=Iform::model()->find('id=:id', array(':id'=>$inbox->form_id));

?>
<div class="view">
	<b>Inspector Asignado es:<?php echo $inbox->to?></b>
	</br>
</div>

<?php

	if($form->observacion_aprobado!=null && $form->observacion_notificado!=null)
	{
		echo "Notificacion de aprobacion de solicitud de inscripcion</br>";
		echo CHtml::link('read more', $this->createAbsoluteUrl('inbox/pdf',array('id'=> $model->form_id)));
	}
	elseif($form->observacion_aprobado!=null)
	{
		echo "Notificacion de rechazo de solicitud de inscripcion</br>";
		echo CHtml::link('read more', $this->createAbsoluteUrl('inbox/pdf',array('id'=> $model->form_id)));
	}
	elseif($form->observacion_notificado!=null)
	{
		echo "Notificacion de rechazo de solicitud de inscripcion</br>";
		echo CHtml::link('read more', $this->createAbsoluteUrl('inbox/pdf',array('id'=> $model->form_id)));
	}
	
	
	
	
	
?>


<?php
}
else
{
	
}
?>




