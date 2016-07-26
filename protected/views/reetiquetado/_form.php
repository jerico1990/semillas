<?php
/* @var $this ReetiquetadoController */
/* @var $model Acondicionamiento */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acondicionamiento-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'form_id'); ?>
		<?php echo $form->textField($model,'form_id'); ?>
		<?php echo $form->error($model,'form_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inspection_id'); ?>
		<?php echo $form->textField($model,'inspection_id'); ?>
		<?php echo $form->error($model,'inspection_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number_envases'); ?>
		<?php echo $form->textField($model,'number_envases'); ?>
		<?php echo $form->error($model,'number_envases'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'capacidad_envases'); ?>
		<?php echo $form->textField($model,'capacidad_envases',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'capacidad_envases'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'peso_estimado'); ?>
		<?php echo $form->textField($model,'peso_estimado',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'peso_estimado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_secado'); ?>
		<?php echo $form->textField($model,'descripcion_secado',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'descripcion_secado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'peso_ingreso'); ?>
		<?php echo $form->textField($model,'peso_ingreso',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'peso_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'peso_salida'); ?>
		<?php echo $form->textField($model,'peso_salida',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'peso_salida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_lotes'); ?>
		<?php echo $form->textField($model,'cantidad_lotes',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'cantidad_lotes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_envases'); ?>
		<?php echo $form->textField($model,'cantidad_envases'); ?>
		<?php echo $form->error($model,'cantidad_envases'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_envase'); ?>
		<?php echo $form->textField($model,'tipo_envase'); ?>
		<?php echo $form->error($model,'tipo_envase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disponibilidad'); ?>
		<?php echo $form->textField($model,'disponibilidad'); ?>
		<?php echo $form->error($model,'disponibilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operatividad'); ?>
		<?php echo $form->textField($model,'operatividad',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'operatividad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'limpieza'); ?>
		<?php echo $form->textField($model,'limpieza',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'limpieza'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number_acondicionamiento'); ?>
		<?php echo $form->textField($model,'number_acondicionamiento'); ?>
		<?php echo $form->error($model,'number_acondicionamiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district_id'); ?>
		<?php echo $form->textField($model,'district_id'); ?>
		<?php echo $form->error($model,'district_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province_id'); ?>
		<?php echo $form->textField($model,'province_id'); ?>
		<?php echo $form->error($model,'province_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departament_id'); ?>
		<?php echo $form->textField($model,'departament_id'); ?>
		<?php echo $form->error($model,'departament_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address'); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_cosecha'); ?>
		<?php echo $form->textField($model,'fecha_cosecha'); ?>
		<?php echo $form->error($model,'fecha_cosecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?>
		<?php echo $form->textField($model,'observacion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'observacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afectadas_erwinia'); ?>
		<?php echo $form->textField($model,'afectadas_erwinia',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'afectadas_erwinia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afectadas_fusarium'); ?>
		<?php echo $form->textField($model,'afectadas_fusarium',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'afectadas_fusarium'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afectadas_rhizoctoniasis'); ?>
		<?php echo $form->textField($model,'afectadas_rhizoctoniasis',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'afectadas_rhizoctoniasis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afectadas_mezcla_varietal'); ?>
		<?php echo $form->textField($model,'afectadas_mezcla_varietal',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'afectadas_mezcla_varietal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afectadas_fuera_tamano'); ?>
		<?php echo $form->textField($model,'afectadas_fuera_tamano',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'afectadas_fuera_tamano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movilizacion_fecha'); ?>
		<?php echo $form->textField($model,'movilizacion_fecha'); ?>
		<?php echo $form->error($model,'movilizacion_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movilizacion_cantidad'); ?>
		<?php echo $form->textField($model,'movilizacion_cantidad',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'movilizacion_cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movilizacion_origen_distrito'); ?>
		<?php echo $form->textField($model,'movilizacion_origen_distrito'); ?>
		<?php echo $form->error($model,'movilizacion_origen_distrito'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movilizacion_destino_distrito'); ?>
		<?php echo $form->textField($model,'movilizacion_destino_distrito'); ?>
		<?php echo $form->error($model,'movilizacion_destino_distrito'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movilizacion_origen'); ?>
		<?php echo $form->textField($model,'movilizacion_origen'); ?>
		<?php echo $form->error($model,'movilizacion_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movilizacion_destino'); ?>
		<?php echo $form->textField($model,'movilizacion_destino'); ?>
		<?php echo $form->error($model,'movilizacion_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movilizacion_destino_predio'); ?>
		<?php echo $form->textField($model,'movilizacion_destino_predio',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'movilizacion_destino_predio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movilizacion_origen_predio'); ?>
		<?php echo $form->textField($model,'movilizacion_origen_predio',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'movilizacion_origen_predio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registro_planta'); ?>
		<?php echo $form->textField($model,'registro_planta',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'registro_planta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'identificacion_lote_semilla'); ?>
		<?php echo $form->textField($model,'identificacion_lote_semilla'); ?>
		<?php echo $form->error($model,'identificacion_lote_semilla'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reetiquetado_mezclar_categorias'); ?>
		<?php echo $form->textField($model,'reetiquetado_mezclar_categorias'); ?>
		<?php echo $form->error($model,'reetiquetado_mezclar_categorias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reetiquetado_campana'); ?>
		<?php echo $form->textField($model,'reetiquetado_campana',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'reetiquetado_campana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reetiquetado_categoria_resultante'); ?>
		<?php echo $form->textField($model,'reetiquetado_categoria_resultante',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'reetiquetado_categoria_resultante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reetiquetado_control_resultante'); ?>
		<?php echo $form->textField($model,'reetiquetado_control_resultante',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'reetiquetado_control_resultante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reetiquetado_motivo'); ?>
		<?php echo $form->textField($model,'reetiquetado_motivo',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'reetiquetado_motivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reetiquetado_analisis_semilla'); ?>
		<?php echo $form->textField($model,'reetiquetado_analisis_semilla'); ?>
		<?php echo $form->error($model,'reetiquetado_analisis_semilla'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reetiquetado_observacion'); ?>
		<?php echo $form->textField($model,'reetiquetado_observacion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'reetiquetado_observacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->