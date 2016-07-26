<?php
/* @var $this EtiquetadoController */
/* @var $model Etiquetado */

$this->breadcrumbs=array(
	'Etiquetados'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Etiquetado', 'url'=>array('index')),
	array('label'=>'Create Etiquetado', 'url'=>array('create')),
	array('label'=>'Update Etiquetado', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Etiquetado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Etiquetado', 'url'=>array('admin')),
);
?>

<h1>View Etiquetado #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'form_id',
		'muestreo_id',
		'fecha_solicitud',
		'solicitud',
		'cantidad',
		'fecha_notificado',
		'notificado',
		'fecha_informe',
		'informe',
		'fecha_rechazado',
		'rechazado',
	),
)); ?>
