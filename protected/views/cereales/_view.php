<?php
/* @var $this CerealesController */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_fecha_siembra')); ?>:</b>
	<?php echo CHtml::encode($data->cer_fecha_siembra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_floracion')); ?>:</b>
	<?php echo CHtml::encode($data->cer_floracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_maduracion')); ?>:</b>
	<?php echo CHtml::encode($data->cer_maduracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_inflorecencias_otros_cultivares')); ?>:</b>
	<?php echo CHtml::encode($data->cer_inflorecencias_otros_cultivares); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_inflorecencias_otros_cultivares_menores')); ?>:</b>
	<?php echo CHtml::encode($data->cer_inflorecencias_otros_cultivares_menores); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_carbon_apestoso')); ?>:</b>
	<?php echo CHtml::encode($data->cer_carbon_apestoso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_carbon_cubierto')); ?>:</b>
	<?php echo CHtml::encode($data->cer_carbon_cubierto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_carbon_volador')); ?>:</b>
	<?php echo CHtml::encode($data->cer_carbon_volador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_cornezuelo')); ?>:</b>
	<?php echo CHtml::encode($data->cer_cornezuelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_mancha_foliar')); ?>:</b>
	<?php echo CHtml::encode($data->cer_mancha_foliar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_escaldadura')); ?>:</b>
	<?php echo CHtml::encode($data->cer_escaldadura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_presencia_maleza_nocivas')); ?>:</b>
	<?php echo CHtml::encode($data->cer_presencia_maleza_nocivas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_aspecto_general_poblacion')); ?>:</b>
	<?php echo CHtml::encode($data->cer_aspecto_general_poblacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_plagas')); ?>:</b>
	<?php echo CHtml::encode($data->cer_plagas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_aislamiento')); ?>:</b>
	<?php echo CHtml::encode($data->cer_aislamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_otra_cultivar')); ?>:</b>
	<?php echo CHtml::encode($data->cer_otra_cultivar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_otra_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->cer_otra_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('form_id')); ?>:</b>
	<?php echo CHtml::encode($data->form_id); ?>
	<br />

	*/ ?>

</div>