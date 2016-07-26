<?php
/* @var $this MovilizacionController */
/* @var $model Movilizacion */

$this->breadcrumbs=array(
	'Movilizacions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Movilizacion', 'url'=>array('index')),
	array('label'=>'Create Movilizacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#movilizacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Movilizacions</h1>

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
	'id'=>'movilizacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cantidad_envases',
		'capacidad_envases',
		'cantidad_movilizar',
		'fecha',
		'origen',
		/*
		'origen_nombre_predio',
		'origen_district_id',
		'destino',
		'destino_nombre_predio',
		'destino_registro',
		'destino_district_id',
		'iform_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
