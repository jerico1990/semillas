<?php
/* @var $this ExcelController */
/* @var $model TempReporte */

$this->breadcrumbs=array(
	'Temp Reportes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TempReporte', 'url'=>array('index')),
	array('label'=>'Create TempReporte', 'url'=>array('create')),
	array('label'=>'Update TempReporte', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TempReporte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TempReporte', 'url'=>array('admin')),
);
?>

<h1>View TempReporte #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha_recepcion',
		'expediente',
		'productor',
		'cultivo',
		'cultivar',
		'categoria',
		'provincia',
		'distrito',
		'anexo',
		'nombre_predio',
		'area',
		'ins_num_1',
		'ins_num_2',
		'ins_num_3',
		'ins_num_4',
		'ins_num_5',
		'ins_fecha_1',
		'ins_fecha_2',
		'ins_fecha_3',
		'ins_fecha_4',
		'ins_fecha_5',
		'fecha_siembra',
		'fecha_siembra_1',
		'fecha_siembra_2',
		'fecha_siembra_3',
		'fecha_siembra_4',
		'fecha_siembra_5',
	),
)); ?>
