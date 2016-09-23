<?php


$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        //array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar O.C. / E.E.', 'url'=>array('admin_ambito'),'active'=>true),      
    ),
));
?>

<h2>Editar Ambito O.C. / E.E.</h2>

<?php $this->renderPartial('_form_ambito', array('model'=>$model)); ?>