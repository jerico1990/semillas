<?php
/* @var $this UserController */
/* @var $model User */
/*
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);*/

/*
	$this->menu=array(
	array('label'=>'Listar Productor', 'url'=>array('index')),
	array('label'=>'Crear Productor', 'url'=>array('create')),
	);
*/
	/*$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
	 //'htmlOptions'=>array('class'=>'nav pull-left','type'=>'success'),
    'items'=>array(
       // array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear usuario', 'url'=>array('create'),'active'=>true,),      
    ),
	));*/
	


?>
<h2>Usuarios Productores</h2>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	 'id'=>'user-grid',
    'dataProvider'=>$model->searchproductor(),
	 'filter'=>$model,
    'template'=>"{items}\n{pager}",
    'columns'=>array(
        //array('name'=>'id', 'header'=>'#'),
			'name',
			'ruc',
         'email',
         'registry',
			'search_estado',
       
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}{delete} ',
            'htmlOptions'=>array('style'=>'width: 50px'),
				'buttons'=>array (
			    'update'=> array(
				'label'=>'',				
				'url'=>'Yii::app()->createUrl("user/cuentaupdate", array("id"=>$data->id))',
				//'visible'=>'!Yii::app()->user->checkAccess("estacion")',				
			    ),
			    'view'=>array(
				'label'=>'',				
				'url'=>'Yii::app()->createUrl("user/cuentaview", array("id"=>$data->id))',			
			    ),
			    
				),
        ),
    ),
)); ?>


