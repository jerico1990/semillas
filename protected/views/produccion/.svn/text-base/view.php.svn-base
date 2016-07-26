<?php
/* @var $this ProduccionController */
/* @var $model Produccion */

$this->breadcrumbs=array(
	'Produccions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Produccion', 'url'=>array('index')),
	array('label'=>'Create Produccion', 'url'=>array('create')),
	array('label'=>'Update Produccion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Produccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Produccion', 'url'=>array('admin')),
);
?>

<h1>View Produccion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'area',
		'produccion',
		'fecha_cosecha',
		'iform_id',
	),
)); ?>
