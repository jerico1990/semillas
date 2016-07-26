<?php
$inbox=Inbox::model()->find('form_id=:form_id', array(':form_id'=>$data->id));
$inboxs=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$data->id,':status_id'=>3));
$maestro=Maestro::model()->find('codigo_detalle=:detalle and codigo=:codigo', array(':detalle'=>$data->category,':codigo'=>'005'));
?>


<div class="view">	
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('crop_id')); ?>:</b>
	<?php echo CHtml::encode($data->crop->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('variety_id')); ?>:</b>
	<?php echo CHtml::encode($data->variety->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($maestro->descripcion); ?>
	<br />
	
	<b><?php echo CHtml::encode($inbox->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($inbox->date); ?>
	<br />
	
	<?php
	if($inboxs===null)
	{
	?>
		<b><?php echo CHtml::encode($inbox->getAttributeLabel('status_id')); ?>:</b>
		<?php echo CHtml::encode($inbox->status->status_name); ?>
		<br />
	<?php
	}
	else
	{
		?>
		<b><?php echo CHtml::encode($inboxs->getAttributeLabel('status_id')); ?>:</b>
		<?php echo CHtml::encode($inboxs->status->status_name); ?>
		<br />
	<?php
	}
	
	?>
	
	<?php
	$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'ver','url'=>array('view', 'id'=>$data->id))); 
	
	if($inbox->status_id==1)
	{
	$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 'size'=>'small','type'=>'primary', 'label'=>'editar','url'=>array('update', 'id'=>$data->id)));
	$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 'size'=>'small','type'=>'primary', 'label'=>'enviar','url'=>Yii::app()->createUrl('inbox/mensaje',array('id'=>$inbox->id))));
	}
	
	?>
</div>