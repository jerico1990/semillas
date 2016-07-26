<?php
/* @var $this FarmersController */
/* @var $model Farmers */

$this->breadcrumbs=array(
	'Farmers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Farmers', 'url'=>array('index')),
	array('label'=>'Create Farmers', 'url'=>array('create')),
	array('label'=>'Update Farmers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Farmers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Farmers', 'url'=>array('admin')),
);
?>

<h1>View Farmers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'form_id',
		'name',
		'last_name',
		'document_number',
	),
)); ?>
