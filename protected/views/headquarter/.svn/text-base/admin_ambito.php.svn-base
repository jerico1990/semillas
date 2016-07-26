<?php
/* @var $this HeadquarterController */
/* @var $model Headquarter */
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$model->location_id));

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Crear Ambito', 'url'=>array('headquarter/create_ambito'), 'active'=>true),      
    ),
));

?>

<h2>Ambito de O.C. / E.E.</h2>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	 'id'=>'headquarter-grid',
    'dataProvider'=>$model->searcha(),
	 'filter'=>$model,
    'template'=>"{items}\n{pager}",
    'columns'=>array(
         //array('name'=>'id', 'header'=>'#'),
        array('name'=>'codigo_simple', 'header'=>'Nombre'),
		  //array('name'=>'tipo_empresa','value'=>'$data->descripciontempresa($data->tipo_empresa)', 'header'=>'Tipo Empresa'),
		  //array('name'=>'tipo_usuario','value'=>'$data->descripciontusuario($data->tipo_usuario)', 'header'=>'Tipo Usuario'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}  ',
				'buttons'=>array (
					'update'=> array(
						'url'=>'Yii::app()->createUrl("headquarter/update_ambito", array("id"=>$data->id))',			
					),
					'view'=> array(
						'url'=>'Yii::app()->createUrl("headquarter/view_ambito", array("id"=>$data->id))',			
					),
				),
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>


