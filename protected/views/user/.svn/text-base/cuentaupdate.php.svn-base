<?php

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
	 //'htmlOptions'=>array('class'=>'nav pull-left','type'=>'success'),
    'items'=>array(
       // array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar Usuarios', 'url'=>array('cuenta'),'active'=>true,),      
    ),
	));
?>

<h2>Usuario Productor <?php //echo $model->id; ?></h2>

<?php $this->renderPartial('cuenta_form', array('model'=>$model)); ?>