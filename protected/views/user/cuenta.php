<?php
/* @var $this UserController */
/* @var $model User */

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
	//'name',
	'ruc',
        'email',
        'registry',
	//'fecha_registro',
	array(
	    'header' => 'Fecha Registro',
	    'type'=>'raw',
	    'value' => 'date("d-m-Y",strtotime($data->fecha_registro))',
	),
	array(
	    'header' => 'Estado',
	    'type'=>'raw',
	    'value'=>'$data->search_estado',
	    'filter'=>'	<select name="User[status]">
			    <option>Seleccionar</option>
			    <option value=1>Inactivo</option>
			    <option value=2>Activo</option>
			    <option value=3>Suspendido</option>
			</select>'
	),
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


