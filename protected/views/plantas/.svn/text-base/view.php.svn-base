<?php
/* @var $this ConditioningLabController */
/* @var $model ConditioningLab */

$this->breadcrumbs=array(
	'Conditioning Labs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Plantas', 'url'=>array('index')),
	array('label'=>'Crear Plantas', 'url'=>array('create')),
	array('label'=>'Actualizar Plantas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Plantas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Plantas', 'url'=>array('admin')),
);
?>

<h1>View ConditioningLab #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'registry',
		'date',
		'name',
		'document_number',
		'address',
		'location_id',
		'crops',
		'status_admin',
	),
)); ?>
