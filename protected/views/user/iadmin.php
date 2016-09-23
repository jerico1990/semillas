<?php
/* @var $this UserController */
/* @var $model User */
/*
$this->breadcrumbs=array(
	'Usuario'=>array('index'),
	'Administrar',
);
*/
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
	 //'htmlOptions'=>array('class'=>'nav pull-left','type'=>'success'),
    'items'=>array(
       // array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear usuario E.E.', 'url'=>array('icreate'),'active'=>true,),      
    ),
	));


?>

<h2>Usuarios de E.E.</h2>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id'=>'headquarter-grid',
		'dataProvider'=>$model->searchproductoree(),
		'filter'=>$model,
		'template'=>"{items}\n{pager}",
		'columns'=>array(
		    'name',
		    'ruc',
		    'legal_name',
		    //'tipo_estacion_experimental',
		    array(
			'header' => 'Estación experimental',
			'type'=>'raw',
			'value' => '$data->getEstacionExperimental($data->tipo_estacion_experimental)',
		    ),
		    //array('name'=>'district_id','value'=>'$data->departamento($data->district_id)','header'=>'Departamento'),
		    array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}  ',
			'htmlOptions'=>array('style'=>'width: 50px'),
			    'buttons'=>array (
				'update'=> array(
					'label'=>'',
					'url'=>'Yii::app()->createUrl("user/iupdate", array("id"=>$data->id))',
				),
			    ),
		    ),
		),
	));
?>


