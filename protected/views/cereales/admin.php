<?php
/* @var $this CerealesController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cereales', 'url'=>array('index')),
	array('label'=>'Create Cereales', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inspection-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cereales</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inspection-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'inspection_number',
		'proposed_time',
		'proposed_date',
		'size',
		'established_date',
		/*
		'established_time',
		'real_date',
		'real_time',		
		'resultado',
		'observaciones',
		'recomendaciones',		
		'cer_fecha_siembra',
		'cer_floracion',
		'cer_maduracion',
		'cer_inflorecencias_otros_cultivares',
		'cer_inflorecencias_otros_cultivares_menores',
		'cer_carbon_apestoso',
		'cer_carbon_cubierto',
		'cer_carbon_volador',
		'cer_cornezuelo',
		'cer_mancha_foliar',
		'cer_escaldadura',
		'cer_presencia_maleza_nocivas',
		'cer_aspecto_general_poblacion',
		'cer_plagas',
		'cer_aislamiento',
		'cer_otra_cultivar',
		'cer_otra_categoria',		
		'user_id',
		'form_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
