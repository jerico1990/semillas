<?php
/* @var $this HeadquarterController */
/* @var $model Headquarter */
/*
$this->breadcrumbs=array(
	'Estaciones'=>array('index'),
	'Crear',
);
*/

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar Laboratorios', 'url'=>array('admin_laboratorio'),'active'=>true),      
    ),
));

?>

<h2>Crear Laboratorio</h2>

<?php $this->renderPartial('_form_laboratorio', array('model'=>$model)); ?>