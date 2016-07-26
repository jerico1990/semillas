<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('papa_campo_comercial')); ?>:</b>
	<?php echo CHtml::encode($data->papa_campo_comercial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('papa_otra_especie')); ?>:</b>
	<?php echo CHtml::encode($data->papa_otra_especie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('papa_otro_cultivar')); ?>:</b>
	<?php echo CHtml::encode($data->papa_otro_cultivar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('papa_fecha_siembra')); ?>:</b>
	<?php echo CHtml::encode($data->papa_fecha_siembra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('papa_plagas')); ?>:</b>
	<?php echo CHtml::encode($data->papa_plagas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('form_id')); ?>:</b>
	<?php echo CHtml::encode($data->form_id); ?>
	<br />

	*/ ?>

</div>