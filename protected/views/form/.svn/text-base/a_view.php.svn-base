<?php

$inbox=Inbox::model()->find('form_id=:form_id', array(':form_id'=>$data->id));
$maestro=Maestro::model()->find('codigo_detalle=:detalle and codigo=:codigo', array(':detalle'=>$data->category,':codigo'=>'005'));

if($inbox->status_id>=2)
{
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
	
	<b><?php echo CHtml::encode($inbox->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($inbox->status->status_name); ?>
	<br />
	
	
	<?php
	
	$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'ver','url'=>array('aview', 'id'=>$data->id))); 
	
	
	?>
</div>
<?php
}

?>
