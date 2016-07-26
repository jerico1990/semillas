<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */

$this->breadcrumbs=array(
	'Acondicionamientos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Acondicionamiento', 'url'=>array('index')),
	array('label'=>'Create Acondicionamiento', 'url'=>array('create')),
	array('label'=>'Update Acondicionamiento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Acondicionamiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acondicionamiento', 'url'=>array('admin')),
);
?>

<h1>View Acondicionamiento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'form_id',
		'inspection_id',
		'number_envases',
		'capacidad_envases',
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
	),
)); ?>
