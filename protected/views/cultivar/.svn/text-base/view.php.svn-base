<?php
/* @var $this CultivarController */
/* @var $model Crop */

$this->breadcrumbs=array(
	'Cultivar'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Cultivar', 'url'=>array('index')),
	array('label'=>'Crear Cultivar', 'url'=>array('create')),
	array('label'=>'Actualizar Cultivar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar Cultivar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Cultivar', 'url'=>array('admin')),
);
?>

<h1>Ver Cultivar <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'parents.name',
		'register',
		'applicant',
		'date',
		//'location_id',
		array(
		      'name'=>'Departamento',
		      'value'=>$model->location->department,
		      ),
		array(
		      'name'=>'Provincia',
		      'value'=>$model->location->province,
		      ),
		array(
		      'name'=>'Distrito',
		      'value'=>$model->location->district,
		      ),
		array(
		      'name'=>'status',
		      'value'=>$model->estado($model->status),
		      ),
	),
)); ?>
