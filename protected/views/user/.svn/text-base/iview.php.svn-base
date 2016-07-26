<?php
/* @var $this UserController */
/* @var $model User */
/*
$this->breadcrumbs=array(
	'Users'=>array('iindex'),
	$model->name,
);
*/
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
	 //'htmlOptions'=>array('class'=>'nav pull-left','type'=>'success'),
    'items'=>array(
       // array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Administrar', 'url'=>array('iadmin'),'active'=>true,),      
    ),
	));
?>

<h1>Usuario <?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'name',
		'ruc',
		'legal_name',
		'first_name',
		'last_name',
		'registry',	
		'email',
	),
)); ?>
