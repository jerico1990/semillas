<?php
$location=Location::model()->find('id=:id', array(':id'=>$data->location_id));

?>

<div class="view">

	<?php /*<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />*/
	?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('registry')); ?>:</b>
	<?php echo CHtml::encode($data->registry); ?>
	<br />	

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	
	<b><?php echo CHtml::encode($location->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($data->location->department); ?>
	<br />
	
	<b><?php echo CHtml::encode($location->getAttributeLabel('province')); ?>:</b>
	<?php echo CHtml::encode($data->location->province); ?>
	<br />
	
	<b><?php echo CHtml::encode($location->getAttributeLabel('district')); ?>:</b>
	<?php echo CHtml::encode($data->location->district); ?>
	<br />
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('document_number')); ?>:</b>
	<?php echo CHtml::encode($data->document_number); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	

</div>