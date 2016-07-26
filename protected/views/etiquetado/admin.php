<?php
/* @var $this EtiquetadoController */
/* @var $model Etiquetado */

$this->breadcrumbs=array(
	'Etiquetados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Etiquetado', 'url'=>array('index')),
	array('label'=>'Create Etiquetado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#etiquetado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Etiquetados</h1>

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
	'id'=>'etiquetado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'form_id',
		'muestreo_id',
		'fecha_solicitud',
		'solicitud',
		/*
		'cantidad',
		'fecha_notificado',
		'notificado',
		'fecha_informe',
		'informe',
		'fecha_rechazado',
		'rechazado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
