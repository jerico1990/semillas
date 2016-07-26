<?php
/* @var $this AlgodonController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Algodon', 'url'=>array('index')),
	array('label'=>'Create Algodon', 'url'=>array('create')),
	array('label'=>'Update Algodon', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Algodon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Algodon', 'url'=>array('admin')),
);
?>

<h1>View Algodon #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'inspection_number',
		'proposed_time',
		'proposed_date',
		'size',
		'established_date',
		'established_time',
		'real_date',
		'real_time',
		'alg_fecha_siembra',
		'alg_deshije',
		'alg_floracion',
		'alg_bellotas',
		'alg_surcos',
		'alg_mata',
		'alg_campo_comercial',
		'alg_otra_especie',
		'alg_otra_cultivar',
		'alg_plantas_otra_especie',
		'alg_plantas_fuera_tipo',
		'resultado',
		'observaciones',
		'recomendaciones',		
		'user_id',
		'form_id',
	),
)); ?>
