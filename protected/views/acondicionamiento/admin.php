<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */

$this->breadcrumbs=array(
	'Acondicionamientos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Acondicionamiento', 'url'=>array('index')),
	array('label'=>'Create Acondicionamiento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#acondicionamiento-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Acondicionamientos</h1>

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
	'id'=>'acondicionamiento-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'form_id',
		'inspection_id',
		'number_envases',
		'capacidad_envases',
		/*
		'peso_estimado',
		'descripcion_secado',
		'peso_ingreso',
		'peso_salida',
		'cantidad_lotes',
		'cantidad_envases',
		'tipo_envase',
		'disponibilidad',
		'descripcion',
		'operatividad',
		'limpieza',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
