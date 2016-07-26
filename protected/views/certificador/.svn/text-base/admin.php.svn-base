<?php
/* @var $this CertificadorController */
/* @var $model User */
/*
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	array('label'=>'Listar Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('user/estcreate')),
);

?>

<h1>Administrar Org. Certificadora</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->searcho(),	
	'filter'=>$model,
	'columns'=>array(		
		'name',
		'ruc',
		//'cruge_user_id',
		//'type_id',
		array(
			
			'class'=>'CButtonColumn',
			'template'=>'{update} {view}',
			//'visible'=>$model->status_id=='1',
			'buttons'=>array (
				
			    'update'=> array(
				'label'=>'',
				//'imageUrl'=>'',
				'url'=>'Yii::app()->createUrl("user/iupdate", array("id"=>$data->id))',
				//'visible'=>'!Yii::app()->user->checkAccess("estacion")',
				//'options'=>array( 'class'=>'icon-edit' ),
			    ),
			    'view'=>array(
				'label'=>'',
				//'imageUrl'=>'',
				'url'=>'Yii::app()->createUrl("user/iview", array("id"=>$data->id))',
				//'options'=>array( 'class'=>'icon-search' ),
			    ),
			   /* 'delete'=>array(
				'label'=>'',
				//'imageUrl'=>'',
				'url'=>'Yii::app()->createUrl("user/idelete", array("id"=>$data->id))',
				//'options'=>array( 'class'=>'icon-delete' ),
			    ),*/	
			),
		),
	),
)); ?>
