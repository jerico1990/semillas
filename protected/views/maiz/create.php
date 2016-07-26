<?php
/* @var $this MaizController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Maiz', 'url'=>array('index')),
	array('label'=>'Manage Maiz', 'url'=>array('admin')),
);
?>

<h1>Create Maiz</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>