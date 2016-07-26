<?php
/* @var $this MuestreoController */
/* @var $data Muestreo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acondicionamiento_id')); ?>:</b>
	<?php echo CHtml::encode($data->acondicionamiento_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('form_id')); ?>:</b>
	<?php echo CHtml::encode($data->form_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_proposed')); ?>:</b>
	<?php echo CHtml::encode($data->date_proposed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_proposed')); ?>:</b>
	<?php echo CHtml::encode($data->time_proposed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_analisis')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_analisis); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_lote')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_lote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_muestreador')); ?>:</b>
	<?php echo CHtml::encode($data->name_muestreador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_real')); ?>:</b>
	<?php echo CHtml::encode($data->date_real); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_real')); ?>:</b>
	<?php echo CHtml::encode($data->time_real); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district_id')); ?>:</b>
	<?php echo CHtml::encode($data->district_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugar_ubicacion')); ?>:</b>
	<?php echo CHtml::encode($data->lugar_ubicacion); ?>
	<br />

	*/ ?>

</div>