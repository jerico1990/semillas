<?php
/* @var $this ProducerController */
/* @var $model Producer */
/*
$this->breadcrumbs=array(
	'Productor'=>array('index'),
	$model->name,
);
$this->menu=array(
	array('label'=>'Listar Productor', 'url'=>array('index')),
	array('label'=>'Crear Productor', 'url'=>array('create')),
	array('label'=>'Actualizar Productor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Productor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estas seguro que quieres eliminar el elemento?')),
	array('label'=>'Administrar Productor', 'url'=>array('admin')),
);
*/
$estado = Maestro::model()->find('id=:id',array(':id'=>$model->status_admin));	
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Administrar', 'url'=>array('admin'),'active'=>true),      
    ),
));

?>

<h2>Ver Productor <?php //echo $model->id; ?></h2>


<?php $this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'type'=>array('striped'),
		'attributes'=>array(
		'registry',		
		'libro',
		'folio',
		'name',
		'address',
		array(
		      'name'=>'Departamento',
		      'value'=>$location->department,
		      ),
		array(
		      'name'=>'Provincia',
		      'value'=>$location->province,
		      ),
		array(
		      'name'=>'Distrito',
		      'value'=>$location->district,
		      ),
		'document_number',
		array(
		      'name'=>'Estado',
		      'value'=>$estado->descripcion,
		      ),
	
    ),
)); ?>