<?php
/* @var $this MaizController */
/* @var $model Inspection */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inspection_number'); ?>
		<?php echo $form->textField($model,'inspection_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposed_time'); ?>
		<?php echo $form->textField($model,'proposed_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposed_date'); ?>
		<?php echo $form->textField($model,'proposed_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'established_date'); ?>
		<?php echo $form->textField($model,'established_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'established_time'); ?>
		<?php echo $form->textField($model,'established_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'real_date'); ?>
		<?php echo $form->textField($model,'real_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'real_time'); ?>
		<?php echo $form->textField($model,'real_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resultado'); ?>
		<?php echo $form->textField($model,'resultado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'recomendaciones'); ?>
		<?php echo $form->textField($model,'recomendaciones',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_fecha_siembra'); ?>
		<?php echo $form->textField($model,'maiz_fecha_siembra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_emergencia_fecha'); ?>
		<?php echo $form->textField($model,'maiz_emergencia_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_floracion'); ?>
		<?php echo $form->textField($model,'maiz_floracion',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_llenado_grano'); ?>
		<?php echo $form->textField($model,'maiz_llenado_grano',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_fecha_cosecha'); ?>
		<?php echo $form->textField($model,'maiz_fecha_cosecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_distanciamiento_surcos'); ?>
		<?php echo $form->textField($model,'maiz_distanciamiento_surcos',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_mata'); ?>
		<?php echo $form->textField($model,'maiz_mata',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_campo_comercial'); ?>
		<?php echo $form->textField($model,'maiz_campo_comercial',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_otra_especie'); ?>
		<?php echo $form->textField($model,'maiz_otra_especie',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_otro_cultivar'); ?>
		<?php echo $form->textField($model,'maiz_otro_cultivar',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_presencia_maleza'); ?>
		<?php echo $form->textField($model,'maiz_presencia_maleza',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_presencia_plagas'); ?>
		<?php echo $form->textField($model,'maiz_presencia_plagas',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_plantas_otras_especies'); ?>
		<?php echo $form->textField($model,'maiz_plantas_otras_especies',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maiz_plantas_fuera_tipo'); ?>
		<?php echo $form->textField($model,'maiz_plantas_fuera_tipo',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'form_id'); ?>
		<?php echo $form->textField($model,'form_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->