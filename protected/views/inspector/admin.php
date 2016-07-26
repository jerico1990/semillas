<?php

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear Inspector', 'url'=>array('create'), 'active'=>true),      
    ),
));
?>

<h2>Usuarios Inspectores</h2>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	 'id'=>'headquarter-grid',
    'dataProvider'=>$model->searchi(),
	 'filter'=>$model,
    'template'=>"{items}\n{pager}",
    'columns'=>array(
         //array('name'=>'id', 'header'=>'#'),
			array('name'=>'name', 'header'=>'Nombre'),
			array('name'=>'document_number', 'header'=>'N° de Documento'),
			array('name'=>'search_oc_ee', 'header'=>'Estación E.'),
			array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update} ',
				'buttons'=>array (
					'update'=> array(
						'url'=>'Yii::app()->createUrl("inspector/update", array("id"=>$data->id))',			
					),
					'view'=> array(
						'url'=>'Yii::app()->createUrl("inspector/view", array("id"=>$data->id))',			
					),
				),
				
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
