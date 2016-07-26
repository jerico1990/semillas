<?php
/* @var $this HeadquarterController */
/* @var $model Headquarter */
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear O.C. / E.E.', 'url'=>array('headquarter/create'), 'active'=>true),      
    ),
));

?>

<h2>Organismos Certificadores / Estaciones Experimentales</h2>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	 'id'=>'headquarter-grid',
    'dataProvider'=>$model->search(),
	 'filter'=>$model,
    'template'=>"{items}\n{pager}",
    'columns'=>array(
         //array('name'=>'id', 'header'=>'#'),
        array('name'=>'name', 'header'=>'Nombre'),
		  'name'=>'search_tipo_empresa',
		 // array('name'=>'tipo_usuario','value'=>'$data->descripciontusuario($data->tipo_usuario)', 'header'=>'Tipo Usuario'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}  ',
				'buttons'=>array (
					'update'=> array(
						'url'=>'Yii::app()->createUrl("headquarter/update", array("id"=>$data->id))',			
					),
					'view'=> array(
						'url'=>'Yii::app()->createUrl("headquarter/view", array("id"=>$data->id))',			
					),
				),
				
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>


