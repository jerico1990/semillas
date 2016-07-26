<?php
/* @var $this MuestreoController */
/* @var $model Muestreo */

$this->breadcrumbs=array(
	'Muestreos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Muestreo', 'url'=>array('index')),
	array('label'=>'Create Muestreo', 'url'=>array('create')),
	array('label'=>'Update Muestreo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Muestreo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Muestreo', 'url'=>array('admin')),
);
?>

<h1>View Muestreo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'acondicionamiento_id',
		'form_id',
		'user_id',
		'date_proposed',
		'time_proposed',
		'tipo_analisis',
		'codigo_lote',
		'name_muestreador',
		'observacion',
		'date_real',
		'time_real',
		'district_id',
		'lugar_ubicacion',
	),
)); ?>
