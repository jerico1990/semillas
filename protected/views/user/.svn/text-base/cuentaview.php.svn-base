<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar Usuarios', 'url'=>array('cuenta'),'active'=>true),      
    ),
));

?>



<h2>Usuario Productor <?php //echo $model->id; ?></h2>
<?php
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->district_id));
?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'type'=>array('striped'),
		'attributes'=>array(		
		'name',
		'ruc',		
		'legal_name',
		'first_name',
		'last_name',
		'registry',
		array(            // display 'create_time' using an expression
			'name'=>'Departamento',
			'value'=>$location->department,
		   ),
		array(            // display 'create_time' using an expression
			'name'=>'Provincia',
			'value'=>$location->province,
		   ),
		array(            // display 'create_time' using an expression
			'name'=>'Distrito',
			'value'=>$location->district,
		   ),
		'email',
		array(            // display 'create_time' using an expression
			'name'=>'Estado',
			'value'=>$model->estado($model->status),
		   ),
    ),
)); ?>
