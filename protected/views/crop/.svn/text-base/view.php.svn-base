<?php
/* @var $this CropController */
/* @var $model Crop */

$this->breadcrumbs=array(
	'Crops'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Cultivo', 'url'=>array('index')),
	array('label'=>'Crear Cultivo', 'url'=>array('create')),
	array('label'=>'Actualizar Cultivo', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar Cultivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Cultivo', 'url'=>array('admin')),
);
?>

<h1>Ver Cultivo <?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'name',
		array(            // display 'create_time' using an expression
			'name'=>'status',
			'value'=>$model->estado($model->status),
		    ),
	),
)); ?>
