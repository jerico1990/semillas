<?php
/* @var $this AcondicionamientoController */
/* @var $model Acondicionamiento */

$this->breadcrumbs=array(
	'Acondicionamientos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Acondicionamiento', 'url'=>array('index')),
	array('label'=>'Create Acondicionamiento', 'url'=>array('create')),
	array('label'=>'View Acondicionamiento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Acondicionamiento', 'url'=>array('admin')),
);
?>

<div class="form row-fluid offset1">
    
<h2>REG-SEM-06-12: Informe de acondicionamiento de semillas(Excepto Papa)</h2>
    
</div>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>