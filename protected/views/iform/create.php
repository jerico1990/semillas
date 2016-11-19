<?php
/* @var $this FormController */
/* @var $model Form */
/*
$this->breadcrumbs=array(
	'Solicitud'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Solicitud', 'url'=>array('index')),
	//array('label'=>'Administrar Solicitud', 'url'=>array('admin')),
);*/
?>

<h1>Solicitud de Inscripción de campo semillero</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'ubigeo'=>$ubigeo)); ?>