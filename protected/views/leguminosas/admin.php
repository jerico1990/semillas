<?php
/* @var $this LeguminosasController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Leguminosas', 'url'=>array('index')),
	array('label'=>'Create Leguminosas', 'url'=>array('create')),
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

<h1>Manage Leguminosas</h1>

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
		'leg_fecha_siembra',
		'leg_emergencia_fecha',
		'leg_floracion',
		'leg_llenado_grano',
		'leg_fecha_cosecha',
		'leg_distanciamiento_surcos',
		'leg_mata',
		'leg_campo_comercial',
		'leg_otra_especie',
		'leg_otro_cultivar',
		'leg_presencia_maleza',
		'leg_presencia_plagas',
		'leg_plantas_otras_especies',
		'leg_plantas_fuera_tipo',		
		'user_id',
		'form_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
