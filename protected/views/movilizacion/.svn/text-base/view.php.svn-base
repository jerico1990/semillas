<?php
/* @var $this MovilizacionController */
/* @var $model Movilizacion */

$this->breadcrumbs=array(
	'Movilizacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Movilizacion', 'url'=>array('index')),
	array('label'=>'Create Movilizacion', 'url'=>array('create')),
	array('label'=>'Update Movilizacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Movilizacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Movilizacion', 'url'=>array('admin')),
);
?>

<h1>View Movilizacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cantidad_envases',
		'capacidad_envases',
		'cantidad_movilizar',
		'fecha',
		'origen',
		'origen_nombre_predio',
		'origen_district_id',
		'destino',
		'destino_nombre_predio',
		'destino_registro',
		'destino_district_id',
		'iform_id',
	),
)); ?>
