<?php
/* @var $this ExcelController */
/* @var $model TempReporte */

$this->breadcrumbs=array(
	'Temp Reportes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TempReporte', 'url'=>array('index')),
	array('label'=>'Create TempReporte', 'url'=>array('create')),
	array('label'=>'View TempReporte', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TempReporte', 'url'=>array('admin')),
);
?>

<h1>Update TempReporte <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>