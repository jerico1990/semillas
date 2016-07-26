<?php
/* @var $this InspectionController */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_fecha_siembra')); ?>:</b>
	<?php echo CHtml::encode($data->alg_fecha_siembra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_deshije')); ?>:</b>
	<?php echo CHtml::encode($data->alg_deshije); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_floracion')); ?>:</b>
	<?php echo CHtml::encode($data->alg_floracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_bellotas')); ?>:</b>
	<?php echo CHtml::encode($data->alg_bellotas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_surcos')); ?>:</b>
	<?php echo CHtml::encode($data->alg_surcos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_mata')); ?>:</b>
	<?php echo CHtml::encode($data->alg_mata); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_campo_comercial')); ?>:</b>
	<?php echo CHtml::encode($data->alg_campo_comercial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_otra_especie')); ?>:</b>
	<?php echo CHtml::encode($data->alg_otra_especie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_otra_cultivar')); ?>:</b>
	<?php echo CHtml::encode($data->alg_otra_cultivar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_plantas_otra_especie')); ?>:</b>
	<?php echo CHtml::encode($data->alg_plantas_otra_especie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alg_plantas_fuera_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->alg_plantas_fuera_tipo); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('arz_siembra_directa')); ?>:</b>
	<?php echo CHtml::encode($data->arz_siembra_directa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arz_transplante')); ?>:</b>
	<?php echo CHtml::encode($data->arz_transplante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arz_fecha_siembra')); ?>:</b>
	<?php echo CHtml::encode($data->arz_fecha_siembra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arz_fecha_almacigo')); ?>:</b>
	<?php echo CHtml::encode($data->arz_fecha_almacigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arz_fecha_transplante')); ?>:</b>
	<?php echo CHtml::encode($data->arz_fecha_transplante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arz_area_instalada')); ?>:</b>
	<?php echo CHtml::encode($data->arz_area_instalada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arz_aislamiento')); ?>:</b>
	<?php echo CHtml::encode($data->arz_aislamiento); ?>
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

	*/ ?>

</div>