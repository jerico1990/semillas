<?php
$muestreo=Muestreo::model()->find('id=:id',array(':id'=>(int)$myValue));
if($muestreo!==null)
{
	$laboratory=Laboratory::model()->find('muestreo_id=:muestreo_id',array(':muestreo_id'=>$muestreo->id));
}

//$notificaciones=Muestreo::model()->findAll('notificacion=:notificacion and id=:id',array(':solicitud'=>TRUE,':id'=>(int)$myValue));
//$informes=Muestreo::model()->findAll('informe=:informe and id=:id',array(':solicitud'=>TRUE,':id'=>(int)$myValue));
//$rechazo=Muestreo::model()->findAll('rechazo=:rechazo and id=:id',array(':solicitud'=>TRUE,':id'=>(int)$myValue));
?>
<?php
	if($muestreo!==null)
	{
		echo "<b>$muestreo->codigo_lote</b>";
	}
?>
<!--Productor-->
<?php if($muestreo!==null && Yii::app()->user->checkAccess('productor')){?>

   <?php if($muestreo->notificacion==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_notificacion)); ?></div>
         <div class="span10"><?php echo CHtml::link('Notificacion de Muestreo',array('pdf/notificacionmuestreo','id'=>$muestreo->id))?></div> 
      </div>
   <?php } ?>
   
   
   <?php if($muestreo->informe==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_informe)); ?></div>
         <div class="span3"><?php echo CHtml::link('Informe de Muestreo',array('pdf/informemuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
   
   <?php if($muestreo->rechazo==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_rechazo)); ?></div>
			<div class="span3"><?php echo CHtml::link('Informe de rechazo',array('pdf/informemuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
   
	<?php if($laboratory!==null){?>
	<?php if($laboratory->informe==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($laboratory->fecha_informe)); ?></div>
			<div class="span3"><?php echo CHtml::link('Informe de Laboratorio',array('pdf/informelaboratorio','id'=>$laboratory->id))?></div>
      </div>
   <?php } }?>
	
	 <?php if($muestreo->tecnico==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_tecnico)); ?></div>
			<div class="span10"><?php echo CHtml::link('Informe Análisis Muestreo',array('pdf/informeanalisis','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
	
	<?php if($muestreo->tecnico_rechazo==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_tecnico_rechazo)); ?></div>
			<div class="span10"><?php echo CHtml::link('Informe de rechazo Tecnico',array('pdf/rechazomuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
	
<?php } ?>




<!--Inspector-->
<?php if($muestreo!==null && Yii::app()->user->checkAccess('inspector')){?>

   <?php if($muestreo->notificacion==0){ ?>
      <div class="row-fluid">
         <div class="span2"><?php //echo $muestreo->fecha_solicitud; ?></div>
         <div class="span4"><?php
				
					echo CHtml::link('Validar Solicitud',array('muestreo/notificacion','id'=>$muestreo->id));
					
				?></div>
         <div class="span6">
								
         </div>
      </div>
      
   <?php } ?>
   
   
   <?php if($muestreo->notificacion==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_notificacion)); ?></div>
         <div class="span3"><?php echo CHtml::link('Notificacion de Muestreo',array('pdf/notificacionmuestreo','id'=>$muestreo->id))?></div>
			<div class="span7">
				<?php
				if($muestreo->informe==0 && $muestreo->rechazo==0)
				{
					echo CHtml::link('Muestrear',array('muestreo/update','id'=>$muestreo->id));
				}	
				?>				
         </div>
		</div>
   <?php } ?>
   
   
   <?php if($muestreo->informe==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_informe)); ?></div>
			<div class="span3"><?php echo CHtml::link('Informe de Muestreo',array('pdf/informemuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
   
   <?php if($muestreo->rechazo==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_rechazo)); ?></div>
			<div class="span3"><?php echo CHtml::link('Informe de rechazo',array('pdf/informemuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
	
	<?php if($laboratory!==null){?>
	<?php if($laboratory->informe==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($laboratory->fecha_informe)); ?></div>
			<div class="span3"><?php echo CHtml::link('Informe de Laboratorio',array('pdf/informelaboratorio','id'=>$laboratory->id))?></div>
			
			<?php if($muestreo->tecnico_rechazo==0 and $muestreo->tecnico==0){ ?>
			<div class="span3"><?php //echo CHtml::link('Emitir Análisis',array('muestreo/tecnico','id'=>$muestreo->id))?></div>
			<?php } ?>
			
      </div>
   <?php } }?>
	
	 <?php if($muestreo->tecnico==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_tecnico)); ?></div>
			<div class="span10"><?php echo CHtml::link('Informe Análisis Muestreo',array('pdf/informeanalisis','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
	
	 <?php if($muestreo->tecnico_rechazo==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_tecnico_rechazo)); ?></div>
			<div class="span10"><?php echo CHtml::link('Informe de rechazo Tecnico',array('pdf/rechazomuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
   
<?php } ?>



<!--EE OC-->
<?php if($muestreo!==null && Yii::app()->user->checkAccess('estacion')){?>

   <?php if($muestreo->notificacion==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_notificacion)); ?></div>
         <div class="span10"><?php echo CHtml::link('Notificacion de Muestreo',array('pdf/notificacionmuestreo','id'=>$muestreo->id))?></div> 
      </div>
   <?php } ?>
   
   
   <?php if($muestreo->informe==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_informe)); ?></div>
         <div class="span3"><?php echo CHtml::link('Informe de Muestreo',array('pdf/informemuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
   
   <?php if($muestreo->rechazo==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_rechazo)); ?></div>
			<div class="span3"><?php echo CHtml::link('Informe de rechazo',array('pdf/informemuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
   
	<?php if($laboratory!==null){?>
	<?php if($laboratory->informe==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($laboratory->fecha_informe)); ?></div>
			<div class="span3"><?php echo CHtml::link('Informe de Laboratorio',array('pdf/informelaboratorio','id'=>$laboratory->id))?></div>
      </div>
   <?php } }?>
	
	 <?php if($muestreo->tecnico==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_tecnico)); ?></div>
			<div class="span10"><?php echo CHtml::link('Informe Análisis Muestreo',array('pdf/informeanalisis','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
	
	<?php if($muestreo->tecnico_rechazo==1){ ?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($muestreo->fecha_tecnico_rechazo)); ?></div>
			<div class="span10"><?php echo CHtml::link('Informe de rechazo Tecnico',array('pdf/rechazomuestreo','id'=>$muestreo->id))?></div>
      </div>
   <?php } ?>
	
<?php } ?>




