<?php
/* @var $this ConditioningLabController */
/* @var $model ConditioningLab */



$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear Planta', 'url'=>array('create'),'active'=>true),      
    ),
));

?>

<h2>Administrar plantas de Acondicionamiento</h2>



<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id'=>'plantas-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'template'=>"{items}\n{pager}",
		'columns'=>array(
			'registry',
			'date',
			'name',
			'document_number',
			'address',
			//array('name'=>'status','value'=>'$data->estado($data->status)',),
			
			array(
				 'class'=>'bootstrap.widgets.TbButtonColumn',
				 'template'=>'{update}',
				 'htmlOptions'=>array('style'=>'width: 50px'),
			),
    ),
)); ?>
