<?php
/* @var $this EtiquetadoController */
/* @var $model Etiquetado */

$this->breadcrumbs=array(
	'Etiquetados'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Etiquetado', 'url'=>array('index')),
	array('label'=>'Create Etiquetado', 'url'=>array('create')),
	array('label'=>'View Etiquetado', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Etiquetado', 'url'=>array('admin')),
);
?>

<h1>Update Etiquetado <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>