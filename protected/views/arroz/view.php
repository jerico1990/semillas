<?php
/* @var $this ArrozController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Arroz', 'url'=>array('index')),
	array('label'=>'Create Arroz', 'url'=>array('create')),
	array('label'=>'Update Arroz', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Arroz', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Arroz', 'url'=>array('admin')),
);
?>

<h1>View Arroz #<?php echo $model->id; ?></h1>

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
		'resultado',
		'observaciones',
		'recomendaciones',
		'arz_siembra_directa',
		'arz_transplante',
		'arz_fecha_siembra',
		'arz_fecha_almacigo',
		'arz_fecha_transplante',
		'arz_area_instalada',
		'arz_aislamiento',		
		'user_id',
		'form_id',
	),
)); ?>
