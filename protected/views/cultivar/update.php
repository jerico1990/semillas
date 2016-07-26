<?php
/* @var $this CultivarController */
/* @var $model Crop */
/*
$this->breadcrumbs=array(
	'Crops'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);*/

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar Cultivares', 'url'=>array('admin'),'active'=>true),      
    ),
));
?>

<h2>Editar Cultivar</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>