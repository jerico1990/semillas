<?php
/* @var $this ConceptController */
/* @var $model Concept */

$this->breadcrumbs=array(
	'Concepts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Concept', 'url'=>array('index')),
	array('label'=>'Create Concept', 'url'=>array('create')),
	array('label'=>'Update Concept', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Concept', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Concept', 'url'=>array('admin')),
);
?>

<h1>View Concept #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'concept',
		'price',
	),
)); ?>
