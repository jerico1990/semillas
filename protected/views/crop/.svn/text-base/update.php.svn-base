<?php
/* @var $this CropController */
/* @var $model Crop */
/*
$this->breadcrumbs=array(
	'Crops'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);
*/
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar Cultivos', 'url'=>array('admin'),'active'=>true),      
    ),
));

?>

<h1>Editar Cultivo <?php //echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>