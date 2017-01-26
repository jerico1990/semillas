<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
/*
$this->menu=array(
	array('label'=>'Listar Solicitud', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Ver Solicitud', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Administrar Solicitud', 'url'=>array('admin')),
);*/
?>

<h2>Editar Solicitud <?php //echo $model->id; ?></h2>

<?php $this->renderPartial('_form_update', array('model'=>$model,'headquarter'=>$headquarter,'cultivares'=>$cultivares,'cultivaresAnteriores'=>$cultivaresAnteriores,'ubigeo'=>$ubigeo,'fuentesOrigen'=>$fuentesOrigen,'agricultores'=>$agricultores,'deshabilitar'=>$deshabilitar)); ?>