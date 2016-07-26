<?php
/* @var $this ProducerController */
/* @var $model Producer */
/*
$this->breadcrumbs=array(
	'Productores'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Productor', 'url'=>array('index')),
	array('label'=>'Administrar Productor', 'url'=>array('admin')),
);
*/
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar Productor', 'url'=>array('admin'),'active'=>true),      
    ),
));

?>

<h2>Crear Productor</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>