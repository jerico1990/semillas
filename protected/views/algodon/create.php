<?php
/* @var $this AlgodonController */
/* @var $model Inspection */

$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Algodon', 'url'=>array('index')),
	array('label'=>'Manage Algodon', 'url'=>array('admin')),
);
?>

<h1>Create Algodon</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>