<?php
$location=Location::model()->find('id=:id', array(':id'=>$data->location_id));
?>

<div class="view">

	<?php /*<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />*/
	?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parents->name); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />	

	<b><?php echo CHtml::encode($data->getAttributeLabel('register')); ?>:</b>
	<?php echo CHtml::encode($data->register); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicant')); ?>:</b>
	<?php echo CHtml::encode($data->applicant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
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
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->estado($data->status)); ?>
	<br />

</div>