<?php
/* @var $this CultivarController */
/* @var $model Crop */
/*
$this->breadcrumbs=array(
	'Cultivares'=>array('index'),
	'Administrar',
);*/

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear Cultivar', 'url'=>array('create'),'active'=>true),      
    ),
));

?>

<h2>Registro de Cultivares</h2>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id'=>'headquarter-grid',
		'dataProvider'=>$model->searchv(),
		'filter'=>$model,
		'template'=>"{items}\n{pager}",
		'columns'=>array(
			array(
		      'name'=>'parent',
		      'value'=>'$data->parents->name',
		      ),
			'name',
			'applicant',
			'search_estado',
			array(
				 'class'=>'bootstrap.widgets.TbButtonColumn',
				 'template'=>'{update}',
				 'htmlOptions'=>array('style'=>'width: 50px'),
			),
    ),
)); ?>

