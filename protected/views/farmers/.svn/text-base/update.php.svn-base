<?php
/* @var $this FarmersController */
/* @var $model Farmers */

$this->breadcrumbs=array(
	'Farmers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Farmers', 'url'=>array('index')),
	array('label'=>'Create Farmers', 'url'=>array('create')),
	array('label'=>'View Farmers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Farmers', 'url'=>array('admin')),
);
?>

<h1>Update Farmers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>