<?php
/* @var $this LeguminosasController */
/* @var $model Inspection */
/*
$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Leguminosas', 'url'=>array('index')),
	array('label'=>'Create Leguminosas', 'url'=>array('create')),
	array('label'=>'View Leguminosas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Leguminosas', 'url'=>array('admin')),
);*/
?>

<div class="row-fluid">
    <h2>Informe de Inspección de Campo de Multiplicación de semillas de Leguminosas de Grano</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>