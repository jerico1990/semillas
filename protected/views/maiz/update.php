<?php
/* @var $this MaizController */
/* @var $model Inspection */
/*
$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Maiz', 'url'=>array('index')),
	array('label'=>'Create Maiz', 'url'=>array('create')),
	array('label'=>'View Maiz', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Maiz', 'url'=>array('admin')),
);*/
?>

<div class="form row-fluid">
    
<h2>Informe de Inspección de Campo de Multiplicación de semillas de Maiz</h2>
    
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>