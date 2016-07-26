<?php /*
$this->breadcrumbs=array(
	'Inspections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Papa','url'=>array('index')),
	array('label'=>'Create Papa','url'=>array('create')),
	array('label'=>'View Papa','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Papa','url'=>array('admin')),
	);*/
	?>

<div class="row-fluid">
    <h2>Informe de Inspección de Campo de Multiplicación de semillas de Papa</h2> 
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>