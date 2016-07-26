<?php
/* @var $this ExcelController */
/* @var $model TempReporte */

$this->breadcrumbs=array(
	'Temp Reportes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TempReporte', 'url'=>array('index')),
	array('label'=>'Create TempReporte', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#temp-reporte-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Temp Reportes</h1>

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
	'id'=>'temp-reporte-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'fecha_recepcion',
		'expediente',
		'productor',
		'cultivo',
		'cultivar',
		/*
		'categoria',
		'provincia',
		'distrito',
		'anexo',
		'nombre_predio',
		'area',
		'ins_num_1',
		'ins_num_2',
		'ins_num_3',
		'ins_num_4',
		'ins_num_5',
		'ins_fecha_1',
		'ins_fecha_2',
		'ins_fecha_3',
		'ins_fecha_4',
		'ins_fecha_5',
		'fecha_siembra',
		'fecha_siembra_1',
		'fecha_siembra_2',
		'fecha_siembra_3',
		'fecha_siembra_4',
		'fecha_siembra_5',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
