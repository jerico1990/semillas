<?php
/* @var $this InspectionController */
/* @var $model Inspection */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inspection-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'inspection_number'); ?>
		<?php echo $form->textField($model,'inspection_number'); ?>
		<?php echo $form->error($model,'inspection_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposed_time'); ?>
		<?php echo $form->textField($model,'proposed_time'); ?>
		<?php echo $form->error($model,'proposed_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposed_date'); ?>
		<?php echo $form->textField($model,'proposed_date'); ?>
		<?php echo $form->error($model,'proposed_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'established_date'); ?>
		<?php echo $form->textField($model,'established_date'); ?>
		<?php echo $form->error($model,'established_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'established_time'); ?>
		<?php echo $form->textField($model,'established_time'); ?>
		<?php echo $form->error($model,'established_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'real_date'); ?>
		<?php echo $form->textField($model,'real_date'); ?>
		<?php echo $form->error($model,'real_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'real_time'); ?>
		<?php echo $form->textField($model,'real_time'); ?>
		<?php echo $form->error($model,'real_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_fecha_siembra'); ?>
		<?php echo $form->textField($model,'alg_fecha_siembra'); ?>
		<?php echo $form->error($model,'alg_fecha_siembra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_deshije'); ?>
		<?php echo $form->textField($model,'alg_deshije'); ?>
		<?php echo $form->error($model,'alg_deshije'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_floracion'); ?>
		<?php echo $form->textField($model,'alg_floracion',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'alg_floracion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_bellotas'); ?>
		<?php echo $form->textField($model,'alg_bellotas',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'alg_bellotas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_surcos'); ?>
		<?php echo $form->textField($model,'alg_surcos',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'alg_surcos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_mata'); ?>
		<?php echo $form->textField($model,'alg_mata',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'alg_mata'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_campo_comercial'); ?>
		<?php echo $form->textField($model,'alg_campo_comercial',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'alg_campo_comercial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_otra_especie'); ?>
		<?php echo $form->textField($model,'alg_otra_especie',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'alg_otra_especie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_otra_cultivar'); ?>
		<?php echo $form->textField($model,'alg_otra_cultivar',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'alg_otra_cultivar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_plantas_otra_especie'); ?>
		<?php echo $form->textField($model,'alg_plantas_otra_especie',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'alg_plantas_otra_especie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alg_plantas_fuera_tipo'); ?>
		<?php echo $form->textField($model,'alg_plantas_fuera_tipo',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'alg_plantas_fuera_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resultado'); ?>
		<?php echo $form->textField($model,'resultado'); ?>
		<?php echo $form->error($model,'resultado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recomendaciones'); ?>
		<?php echo $form->textField($model,'recomendaciones',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'recomendaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arz_siembra_directa'); ?>
		<?php echo $form->checkBox($model,'arz_siembra_directa'); ?>
		<?php echo $form->error($model,'arz_siembra_directa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arz_transplante'); ?>
		<?php echo $form->checkBox($model,'arz_transplante'); ?>
		<?php echo $form->error($model,'arz_transplante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arz_fecha_siembra'); ?>
		<?php echo $form->textField($model,'arz_fecha_siembra'); ?>
		<?php echo $form->error($model,'arz_fecha_siembra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arz_fecha_almacigo'); ?>
		<?php echo $form->textField($model,'arz_fecha_almacigo'); ?>
		<?php echo $form->error($model,'arz_fecha_almacigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arz_fecha_transplante'); ?>
		<?php echo $form->textField($model,'arz_fecha_transplante'); ?>
		<?php echo $form->error($model,'arz_fecha_transplante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arz_area_instalada'); ?>
		<?php echo $form->textField($model,'arz_area_instalada',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'arz_area_instalada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arz_aislamiento'); ?>
		<?php echo $form->textField($model,'arz_aislamiento',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'arz_aislamiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_fecha_siembra'); ?>
		<?php echo $form->textField($model,'cer_fecha_siembra'); ?>
		<?php echo $form->error($model,'cer_fecha_siembra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_floracion'); ?>
		<?php echo $form->textField($model,'cer_floracion',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'cer_floracion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_maduracion'); ?>
		<?php echo $form->textField($model,'cer_maduracion',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'cer_maduracion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_inflorecencias_otros_cultivares'); ?>
		<?php echo $form->textField($model,'cer_inflorecencias_otros_cultivares',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_inflorecencias_otros_cultivares'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_inflorecencias_otros_cultivares_menores'); ?>
		<?php echo $form->textField($model,'cer_inflorecencias_otros_cultivares_menores',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_inflorecencias_otros_cultivares_menores'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_carbon_apestoso'); ?>
		<?php echo $form->textField($model,'cer_carbon_apestoso',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_carbon_apestoso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_carbon_cubierto'); ?>
		<?php echo $form->textField($model,'cer_carbon_cubierto',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_carbon_cubierto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_carbon_volador'); ?>
		<?php echo $form->textField($model,'cer_carbon_volador',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_carbon_volador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_cornezuelo'); ?>
		<?php echo $form->textField($model,'cer_cornezuelo',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_cornezuelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_mancha_foliar'); ?>
		<?php echo $form->textField($model,'cer_mancha_foliar',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_mancha_foliar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_escaldadura'); ?>
		<?php echo $form->textField($model,'cer_escaldadura',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_escaldadura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_presencia_maleza_nocivas'); ?>
		<?php echo $form->textField($model,'cer_presencia_maleza_nocivas',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_presencia_maleza_nocivas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_aspecto_general_poblacion'); ?>
		<?php echo $form->textField($model,'cer_aspecto_general_poblacion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_aspecto_general_poblacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_plagas'); ?>
		<?php echo $form->textField($model,'cer_plagas',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cer_plagas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->