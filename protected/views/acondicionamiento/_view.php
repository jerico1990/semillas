<?php
/* @var $this AcondicionamientoController */
/* @var $data Acondicionamiento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('form_id')); ?>:</b>
	<?php echo CHtml::encode($data->form_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inspection_id')); ?>:</b>
	<?php echo CHtml::encode($data->inspection_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_envases')); ?>:</b>
	<?php echo CHtml::encode($data->number_envases); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capacidad_envases')); ?>:</b>
	<?php echo CHtml::encode($data->capacidad_envases); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_estimado')); ?>:</b>
	<?php echo CHtml::encode($data->peso_estimado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_secado')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_secado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->peso_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_salida')); ?>:</b>
	<?php echo CHtml::encode($data->peso_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_lotes')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_lotes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_envases')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_envases); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_envase')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_envase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disponibilidad')); ?>:</b>
	<?php echo CHtml::encode($data->disponibilidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operatividad')); ?>:</b>
	<?php echo CHtml::encode($data->operatividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('limpieza')); ?>:</b>
	<?php echo CHtml::encode($data->limpieza); ?>
	<br />

	*/ ?>

</div>