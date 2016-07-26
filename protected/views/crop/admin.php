<?php
/* @var $this CropController */
/* @var $model Crop */
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear Cultivo', 'url'=>array('create'),'active'=>true),      
    ),
));

?>

<h1>Registro de Cultivos</h1>



<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id'=>'headquarter-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'template'=>"{items}\n{pager}",
		'columns'=>array(
			'name',
			'search_estado',			
			array(
				 'class'=>'bootstrap.widgets.TbButtonColumn',
				 'template'=>'{update}',
				 'htmlOptions'=>array('style'=>'width: 50px'),
			),
    ),
)); ?>

