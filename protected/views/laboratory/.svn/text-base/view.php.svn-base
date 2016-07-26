<?php
/* @var $this LaboratoryController */
/* @var $model Laboratory */

$this->breadcrumbs=array(
	'Laboratories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Laboratory', 'url'=>array('index')),
	array('label'=>'Create Laboratory', 'url'=>array('create')),
	array('label'=>'Update Laboratory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Laboratory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Laboratory', 'url'=>array('admin')),
);
?>

<h1>View Laboratory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'form_id',
		'peso_recibido',
		'date_recepcion',
		'date_termino_analisis',
		'number_analisis',
		'semilla_pura',
		'materia_inerte',
		'otras_semillas',
		'number_day',
		'plantulas_normales',
		'semillas_duras',
		'semillas_frescas',
		'plantulas_anormales',
		'semillas_muertas',
		'contenido_humedad',
		'clase_materia_inerte',
		'observacion',
	),
)); ?>
