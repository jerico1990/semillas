<?php
/* @var $this ProduccionController */
/* @var $model Produccion */
/*
$this->breadcrumbs=array(
	'Produccions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Produccion', 'url'=>array('index')),
	array('label'=>'Create Produccion', 'url'=>array('create')),
	array('label'=>'View Produccion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Produccion', 'url'=>array('admin')),
);*/
?>

<h2>Producción</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>