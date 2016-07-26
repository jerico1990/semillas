<?php
/* @var $this ConditioningLabController */
/* @var $model ConditioningLab */

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar', 'url'=>array('admin'),'active'=>true),      
    ),
));

?>

<h2>Editar planta de Acondicionamiento </h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>