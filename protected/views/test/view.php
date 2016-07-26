<?php
/* @var $this TestController */
/* @var $model Form */

$this->breadcrumbs=array(
	'Forms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Create Form', 'url'=>array('create')),
	array('label'=>'Update Form', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Form', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Form', 'url'=>array('admin')),
);
?>

<h1>View Form #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'headquarter_id',
		'crop_id',
		'variety_id',
		'category',
		'source_crop_code',
		'quantity',
		'location_id',
		'location_name',
		'location_annex',
		'area',
		'location_lon',
		'location_lat',
		'seed_date',
		'sow_estimate_quantity',
		'last_crop',
		'farmers_id',
		'registry_date',
		'application_ok',
		'last_area',
		'observacion_aprobado',
		'observacion_notificado',
	),
)); ?>
