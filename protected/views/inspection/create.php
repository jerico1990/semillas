<?php
/* @var $this InspectionController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Inspection', 'url'=>array('index')),
	array('label'=>'Manage Inspection', 'url'=>array('admin')),
);
?>

<h1>Create Inspection</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>