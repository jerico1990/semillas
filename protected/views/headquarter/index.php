<?php
/* @var $this HeadquarterController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Estaciones',
);
*/
/*
$this->menu=array(
	array('label'=>'Crear Estacion', 'url'=>array('create')),
	array('label'=>'Administrar Estacion', 'url'=>array('admin')),
);*/

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Crear', 'url'=>array('create'), 'active'=>true),
        array('label'=>'Administrar', 'url'=>array('admin')),      
    ),
));
?>

<h2>Estaciones</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
