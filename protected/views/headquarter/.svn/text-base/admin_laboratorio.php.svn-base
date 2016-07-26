<?php
/* @var $this HeadquarterController */
/* @var $model Headquarter */
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear Laboratorio', 'url'=>array('headquarter/create_laboratorio'), 'active'=>true),      
    ),
));

?>

<h2>Entidades de Laboratorio</h2>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	 'id'=>'headquarter-grid',
    'dataProvider'=>$model->searchl(),
	 'filter'=>$model,
    'template'=>"{items}\n{pager}",
    'columns'=>array(
         //array('name'=>'id', 'header'=>'#'),
        array('name'=>'name', 'header'=>'Nombre'),
		  array('name'=>'tipo_empresa','value'=>'$data->descripciontempresa($data->tipo_empresa)', 'header'=>'Tipo Empresa'),
		
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}  ',
				'buttons'=>array (
					'update'=> array(
						'url'=>'Yii::app()->createUrl("headquarter/update_laboratorio", array("id"=>$data->id))',			
					),
					'view'=> array(
						'url'=>'Yii::app()->createUrl("headquarter/view_laboratorio", array("id"=>$data->id))',			
					),
				),
				
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>


