<?php
/* @var $this ConceptController */
/* @var $model Concept */

$this->breadcrumbs=array(
	'Concepts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Concept', 'url'=>array('index')),
	array('label'=>'Manage Concept', 'url'=>array('admin')),
);
?>

<h1>Create Concept</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>