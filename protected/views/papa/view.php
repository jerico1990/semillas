<?php
$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Papa','url'=>array('index')),
array('label'=>'Create Papa','url'=>array('create')),
array('label'=>'Update Papa','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Papa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Papa','url'=>array('admin')),
);
?>

<h1>View Papa #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'inspection_number',
		'proposed_time',
		'proposed_date',
		'size',
		'established_date',
		'established_time',
		'real_date',
		'real_time',		
		'resultado',
		'observaciones',
		'recomendaciones',		
		'papa_campo_comercial',
		'papa_otra_especie',
		'papa_otro_cultivar',
		'papa_fecha_siembra',
		'papa_plagas',
		'user_id',
		'form_id',
),
)); ?>
