<?php
/* @var $this MaizController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Maiz', 'url'=>array('index')),
	array('label'=>'Create Maiz', 'url'=>array('create')),
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

<h1>Manage Maiz</h1>

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
		'maiz_fecha_siembra',
		'maiz_emergencia_fecha',
		'maiz_floracion',
		'maiz_llenado_grano',
		'maiz_fecha_cosecha',
		'maiz_distanciamiento_surcos',
		'maiz_mata',
		'maiz_campo_comercial',
		'maiz_otra_especie',
		'maiz_otro_cultivar',
		'maiz_presencia_maleza',
		'maiz_presencia_plagas',
		'maiz_plantas_otras_especies',
		'maiz_plantas_fuera_tipo',		
		'user_id',
		'form_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
