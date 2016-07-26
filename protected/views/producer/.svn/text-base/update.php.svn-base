<?php
/* @var $this ProducerController */
/* @var $model Producer */
/*
$this->breadcrumbs=array(
	'Producers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);*/


$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar productores', 'url'=>array('admin'),'active'=>true),      
    ),
));


?>

<h2>Editar Productor </h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>