<?php
/* @var $this ConceptController */
/* @var $model Concept */

$this->breadcrumbs=array(
	'Concepts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Concept', 'url'=>array('index')),
	array('label'=>'Create Concept', 'url'=>array('create')),
	array('label'=>'View Concept', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Concept', 'url'=>array('admin')),
);
?>

<h1>Update Concept <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>