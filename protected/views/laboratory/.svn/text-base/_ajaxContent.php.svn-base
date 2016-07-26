<?php
$laboratorio=Laboratory::model()->find('id=:id',array(':id'=>(int)$id));
$user=User::model()->find('cruge_user_id=:cruge_user_id',array(':cruge_user_id'=>Yii::app()->user->id));
if($laboratorio!==null){
   $inbox=Inbox::model()->find('t.to=:to and form_id=:form_id and status_id=:status_id',
                            array(':to'=>$user->id,':form_id'=>$laboratorio->form_id,':status_id'=>23));
   $muestreo=Muestreo::model()->find('id=:id',array(':id'=>$laboratorio->muestreo_id));
}
else
{
   $inbox=null;  
}


?>
<?php if($laboratorio!==null){?>
   <?php  echo "<b>Codigo Lote: </b>".$muestreo->codigo_lote."<br>";  ?>
<?php } ?>
<?php if($laboratorio!==null){?>
<div class="row-fluid">
   <div class="span2">
      <?php  echo $inbox->date;  ?>
   </div>
   <div class="span3">
      <?php echo CHtml::link('Informe de Muestreo',array('pdf/informemuestreo','id'=>$laboratorio->muestreo_id))?>
   </div>
   <?php if($laboratorio->informe==0){?>
   <div class="span7">
      <?php echo CHtml::link('Informe de Laboratorio',array('update','id'=>$laboratorio->id))?>
   </div>
   <?php }?>
</div>
<?php if($laboratorio->informe==1){?>
   <div class="row-fluid">
      <div class="span2">
         <?php  echo $laboratorio->fecha_informe;  ?>
      </div>
      <div class="span10">
         <?php echo CHtml::link('Informe de Laboratorio',array('pdf/informelaboratorio','id'=>$laboratorio->id))?>
      </div>
   </div>
<?php } ?>
<?php } ?>