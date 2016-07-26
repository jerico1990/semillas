<?php 
/* @var $this FormController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Solicitud',
);
if(Yii::app()->user->checkAccess('estacion'))
{
$this->menu=array(
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	//array('label'=>'Administrar Solicitud', 'url'=>array('admin')),
);
}
?>

<h1>Expedientes</h1>
 
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'i_view',
));*/ ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id'=>'headquarter-grid',
		'dataProvider'=>$model->searchi(),
		'filter'=>$model,
		'template'=>"{items}\n{pager}",
		'columns'=>array(
			 array('name'=>'crop_id','value'=>'$data->crop->name',),		
			//'location_id',
			'form_number',
			array('name'=>'user_id','value'=>'$data->usera->fullname',),
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{view}',
				'htmlOptions'=>array('style'=>'width: 50px'),
				'buttons'=>array(			 
					'view'=>array(
						'label'=>'',				
						'url'=>'Yii::app()->createUrl("iform/ivsolicitud", array("id"=>$data->id))',
					),			    
				),
			),
    ),
)); ?>