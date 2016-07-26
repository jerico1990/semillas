<?php
/* @var $this CerealesController */
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
		<?php echo $form->label($model,'cer_fecha_siembra'); ?>
		<?php echo $form->textField($model,'cer_fecha_siembra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_floracion'); ?>
		<?php echo $form->textField($model,'cer_floracion',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_maduracion'); ?>
		<?php echo $form->textField($model,'cer_maduracion',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_inflorecencias_otros_cultivares'); ?>
		<?php echo $form->textField($model,'cer_inflorecencias_otros_cultivares',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_inflorecencias_otros_cultivares_menores'); ?>
		<?php echo $form->textField($model,'cer_inflorecencias_otros_cultivares_menores',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_carbon_apestoso'); ?>
		<?php echo $form->textField($model,'cer_carbon_apestoso',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_carbon_cubierto'); ?>
		<?php echo $form->textField($model,'cer_carbon_cubierto',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_carbon_volador'); ?>
		<?php echo $form->textField($model,'cer_carbon_volador',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_cornezuelo'); ?>
		<?php echo $form->textField($model,'cer_cornezuelo',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_mancha_foliar'); ?>
		<?php echo $form->textField($model,'cer_mancha_foliar',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_escaldadura'); ?>
		<?php echo $form->textField($model,'cer_escaldadura',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_presencia_maleza_nocivas'); ?>
		<?php echo $form->textField($model,'cer_presencia_maleza_nocivas',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_aspecto_general_poblacion'); ?>
		<?php echo $form->textField($model,'cer_aspecto_general_poblacion',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_plagas'); ?>
		<?php echo $form->textField($model,'cer_plagas',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_aislamiento'); ?>
		<?php echo $form->textField($model,'cer_aislamiento',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_otra_cultivar'); ?>
		<?php echo $form->textField($model,'cer_otra_cultivar',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_otra_categoria'); ?>
		<?php echo $form->textField($model,'cer_otra_categoria',array('size'=>18,'maxlength'=>18)); ?>
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