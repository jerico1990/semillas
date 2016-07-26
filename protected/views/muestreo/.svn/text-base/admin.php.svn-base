<?php
/* @var $this MuestreoController */
/* @var $model Muestreo */

$this->breadcrumbs=array(
	'Muestreos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Muestreo', 'url'=>array('index')),
	array('label'=>'Create Muestreo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#muestreo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Muestreos</h1>

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
	'id'=>'muestreo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'acondicionamiento_id',
		'form_id',
		'user_id',
		'date_proposed',
		'time_proposed',
		/*
		'tipo_analisis',
		'codigo_lote',
		'name_muestreador',
		'observacion',
		'date_real',
		'time_real',
		'district_id',
		'lugar_ubicacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
