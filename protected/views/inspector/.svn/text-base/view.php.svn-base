<?php
/* @var $this InspectorController */
/* @var $model User */

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Admin', 'url'=>array('admin'), 'active'=>true),      
    ),
));
?>

<h2>Ver Inspector</h2>


<?php $this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'type'=>array('striped'),
		'attributes'=>array(		
		'name',
		'ruc',
		'legal_name',
		'first_name',
		'last_name',
		'email',
    ),
)); ?>
