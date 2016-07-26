<?php
/* @var $this LaboratoryController */
/* @var $model Laboratory */

$this->breadcrumbs=array(
	'Laboratories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Laboratory', 'url'=>array('index')),
	array('label'=>'Create Laboratory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#laboratory-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Laboratories</h1>

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
	'id'=>'laboratory-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'form_id',
		'peso_recibido',
		'date_recepcion',
		'date_termino_analisis',
		/*
		'number_analisis',
		'semilla_pura',
		'materia_inerte',
		'otras_semillas',
		'number_day',
		'plantulas_normales',
		'semillas_duras',
		'semillas_frescas',
		'plantulas_anormales',
		'semillas_muertas',
		'contenido_humedad',
		'clase_materia_inerte',
		'observacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
