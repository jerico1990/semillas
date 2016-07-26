<?php
/* @var $this LeguminosasController */
/* @var $data Inspection */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inspection_number')); ?>:</b>
	<?php echo CHtml::encode($data->inspection_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposed_time')); ?>:</b>
	<?php echo CHtml::encode($data->proposed_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposed_date')); ?>:</b>
	<?php echo CHtml::encode($data->proposed_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('established_date')); ?>:</b>
	<?php echo CHtml::encode($data->established_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('established_time')); ?>:</b>
	<?php echo CHtml::encode($data->established_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('real_date')); ?>:</b>
	<?php echo CHtml::encode($data->real_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real_time')); ?>:</b>
	<?php echo CHtml::encode($data->real_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resultado')); ?>:</b>
	<?php echo CHtml::encode($data->resultado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recomendaciones')); ?>:</b>
	<?php echo CHtml::encode($data->recomendaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_fecha_siembra')); ?>:</b>
	<?php echo CHtml::encode($data->leg_fecha_siembra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_emergencia_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->leg_emergencia_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_floracion')); ?>:</b>
	<?php echo CHtml::encode($data->leg_floracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_llenado_grano')); ?>:</b>
	<?php echo CHtml::encode($data->leg_llenado_grano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_fecha_cosecha')); ?>:</b>
	<?php echo CHtml::encode($data->leg_fecha_cosecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_distanciamiento_surcos')); ?>:</b>
	<?php echo CHtml::encode($data->leg_distanciamiento_surcos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_mata')); ?>:</b>
	<?php echo CHtml::encode($data->leg_mata); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_campo_comercial')); ?>:</b>
	<?php echo CHtml::encode($data->leg_campo_comercial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_otra_especie')); ?>:</b>
	<?php echo CHtml::encode($data->leg_otra_especie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_otro_cultivar')); ?>:</b>
	<?php echo CHtml::encode($data->leg_otro_cultivar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_presencia_maleza')); ?>:</b>
	<?php echo CHtml::encode($data->leg_presencia_maleza); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_presencia_plagas')); ?>:</b>
	<?php echo CHtml::encode($data->leg_presencia_plagas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_plantas_otras_especies')); ?>:</b>
	<?php echo CHtml::encode($data->leg_plantas_otras_especies); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leg_plantas_fuera_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->leg_plantas_fuera_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('form_id')); ?>:</b>
	<?php echo CHtml::encode($data->form_id); ?>
	<br />

	*/ ?>

</div>