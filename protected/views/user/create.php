



<?php

if($tipo=='externo')
{


 if(Yii::app()->user->hasFlash('create')): 

    echo '<div class="flash-success">';
        echo Yii::app()->user->getFlash('create'); 
    echo '</div>';

else:
 
    echo   '<div class="container span12">
            <h2>Solicitud de Cuenta de Usuario</h2>
            </div>';            
            $this->renderPartial('_form', array('model'=>$model)); 
endif;
}

if($tipo=='interno')
{
    $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
	 //'htmlOptions'=>array('class'=>'nav pull-left','type'=>'success'),
    'items'=>array(
       // array('label'=>'Listar', 'url'=>array('index'), 'active'=>true),
        array('label'=>'Listar E.E.', 'url'=>array('iadmin'),'active'=>true,),      
    ),
    ));
    
    echo '<div class="row-fluid">';		  
        echo '<div class="span12"><h2>Crear usuario de E.E.</h3></div>';				
    echo '</div>';
    $this->renderPartial('i_form', array('model'=>$model,'departamentos'=>$departamentos,'estaciones'=>$estaciones));   
}

if($tipo=='inspector')
{
   
    $this->renderPartial('ins_form', array('model'=>$model));   
}

?>