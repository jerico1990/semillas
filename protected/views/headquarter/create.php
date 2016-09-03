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
        array('label'=>'Listar O.C. / E.E.', 'url'=>array('admin'),'active'=>true),      
    ),
));

?>

<h2>Crear O.C. / E.E.</h2>

<?php $this->renderPartial('_form', array('model'=>$model,'departamentos'=>$departamentos)); ?>