<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ruc')); ?>:</b>
	<?php echo CHtml::encode($data->ruc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->crugeuser->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->typea->name); ?>
	<br />

	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('legal_name')); ?>:</b>
	<?php echo CHtml::encode($data->legal_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />
        */?>
	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('district_id')); ?>:</b>
	<?php echo CHtml::encode($data->district_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />
	*/ ?>

</div>