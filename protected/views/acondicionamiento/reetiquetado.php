<?php
/* @var $this AlgodonController */
/* @var $model Inspection */
/*
$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Algodon', 'url'=>array('index')),
	array('label'=>'Create Algodon', 'url'=>array('create')),
	array('label'=>'View Algodon', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Algodon', 'url'=>array('admin')),
);*/
?>

<div class="row-fluid"> 
   <h2>Reetiquetado</h2>
</div>

<?php $this->renderPartial('_reetiquetado', array('model'=>$model)); ?>