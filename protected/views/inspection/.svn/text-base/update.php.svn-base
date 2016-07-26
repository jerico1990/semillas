<?php
/* @var $this InspectionController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Inspection', 'url'=>array('index')),
	array('label'=>'Create Inspection', 'url'=>array('create')),
	array('label'=>'View Inspection', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Inspection', 'url'=>array('admin')),
);
?>

<h1>Update Inspection <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>