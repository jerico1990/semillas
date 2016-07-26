<?php
/* @var $this HeadquarterController */
/* @var $data Headquarter */
$location=Location::model()->find('district_id=:district',array(':district'=>$data->location_id));


?>

<div class="view">

	<?php /*<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	*/?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($location->getAttributeLabel('district')); ?>:</b>
	<?php echo CHtml::encode($location->district); ?>
	<br />
	
	<b><?php echo CHtml::encode($location->getAttributeLabel('province')); ?>:</b>
	<?php echo CHtml::encode($location->province); ?>
	<br />
	
	<b><?php echo CHtml::encode($location->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($location->department); ?>
	<br />

</div>