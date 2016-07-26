<?php
/* @var $this ReetiquetadoController */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_acondicionamiento')); ?>:</b>
	<?php echo CHtml::encode($data->number_acondicionamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district_id')); ?>:</b>
	<?php echo CHtml::encode($data->district_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('province_id')); ?>:</b>
	<?php echo CHtml::encode($data->province_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departament_id')); ?>:</b>
	<?php echo CHtml::encode($data->departament_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_cosecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_cosecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('afectadas_erwinia')); ?>:</b>
	<?php echo CHtml::encode($data->afectadas_erwinia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('afectadas_fusarium')); ?>:</b>
	<?php echo CHtml::encode($data->afectadas_fusarium); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('afectadas_rhizoctoniasis')); ?>:</b>
	<?php echo CHtml::encode($data->afectadas_rhizoctoniasis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('afectadas_mezcla_varietal')); ?>:</b>
	<?php echo CHtml::encode($data->afectadas_mezcla_varietal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('afectadas_fuera_tamano')); ?>:</b>
	<?php echo CHtml::encode($data->afectadas_fuera_tamano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movilizacion_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->movilizacion_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movilizacion_cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->movilizacion_cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movilizacion_origen_distrito')); ?>:</b>
	<?php echo CHtml::encode($data->movilizacion_origen_distrito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movilizacion_destino_distrito')); ?>:</b>
	<?php echo CHtml::encode($data->movilizacion_destino_distrito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movilizacion_origen')); ?>:</b>
	<?php echo CHtml::encode($data->movilizacion_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movilizacion_destino')); ?>:</b>
	<?php echo CHtml::encode($data->movilizacion_destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movilizacion_destino_predio')); ?>:</b>
	<?php echo CHtml::encode($data->movilizacion_destino_predio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movilizacion_origen_predio')); ?>:</b>
	<?php echo CHtml::encode($data->movilizacion_origen_predio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registro_planta')); ?>:</b>
	<?php echo CHtml::encode($data->registro_planta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identificacion_lote_semilla')); ?>:</b>
	<?php echo CHtml::encode($data->identificacion_lote_semilla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reetiquetado_mezclar_categorias')); ?>:</b>
	<?php echo CHtml::encode($data->reetiquetado_mezclar_categorias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reetiquetado_campana')); ?>:</b>
	<?php echo CHtml::encode($data->reetiquetado_campana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reetiquetado_categoria_resultante')); ?>:</b>
	<?php echo CHtml::encode($data->reetiquetado_categoria_resultante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reetiquetado_control_resultante')); ?>:</b>
	<?php echo CHtml::encode($data->reetiquetado_control_resultante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reetiquetado_motivo')); ?>:</b>
	<?php echo CHtml::encode($data->reetiquetado_motivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reetiquetado_analisis_semilla')); ?>:</b>
	<?php echo CHtml::encode($data->reetiquetado_analisis_semilla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reetiquetado_observacion')); ?>:</b>
	<?php echo CHtml::encode($data->reetiquetado_observacion); ?>
	<br />

	*/ ?>

</div>