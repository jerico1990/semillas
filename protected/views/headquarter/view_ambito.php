<?php
/* @var $this HeadquarterController */
/* @var $model Headquarter */
$location=Location::model()->find('departament_id=:departament_id',array(':departament_id'=>$model->location_id));

/*$this->breadcrumbs=array(
	'Headquarters'=>array('index'),
	$model->name,
);*/
/*
$this->menu=array(
	array('label'=>'Listar Estacion', 'url'=>array('index')),
	array('label'=>'Crear Estacion', 'url'=>array('create')),
	array('label'=>'Actualizar Estacion', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar Estacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar el elemento?')),
	array('label'=>'Administrar Estacion', 'url'=>array('admin')),
);*/
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Administrar', 'url'=>array('admin_ambito'),'active'=>true),      
    ),
));
?>

<h2>Ver Estacion </h2>




<?php $this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'type'=>array('striped'),
		'attributes'=>array(
		'name',	
		array(
		      'name'=>'Departamento',
		      'value'=>$location->department),
	
    ),
)); ?>
