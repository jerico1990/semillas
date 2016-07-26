<?php

$etiquetados=Etiquetado::model()->find('id=:id',array(':id'=>(int)$myValue));

if($etiquetados!==null){
   $etiquetas=Etiquetas::model()->findAll('etiquetado_id=:etiquetado_id',array(':etiquetado_id'=>$etiquetados->id));
   $muestreo=Muestreo::model()->find('id=:id',array(':id'=>$etiquetados->muestreo_id));
}
?>
  
<!--Productor-->
<?php if($etiquetados!=null && Yii::app()->user->checkAccess('productor')){?>

   <?php if($muestreo->etiquetado_notificacion==0){?>
      <div class="row-fluid">
         <div class="span2"><?php echo $etiquetados->fecha_solicitud?></div>
         <div class="span4"><?php echo CHtml::link('Acta de entrega de etiquetas',array('pdf/actaentregaetiquetas','id'=>$etiquetados->id))?></div>
         <div class="span3">        
         </div>
      </div>
   <?php } ?>
   
   
   <?php if($muestreo->etiquetado_notificacion==0 && $etiquetados->solicitud==0){?>
		<div class="row-fluid">
			<div class="span2"><?php //echo $etiquetados->fecha_solicitud; ?></div>
			<div class="span10"><?php echo CHtml::link('Solicitar Verificación y Etiquetado',array('etiquetado/solicitud','id'=>$etiquetados->id))?></div>         
		</div>
	<?php }else if($etiquetados->solicitud==1){?>
		<div class="row-fluid">
			<div class="span2"><?php echo date('d-m-Y',strtotime($etiquetados->fecha_solicitud)); ?></div>
			<div class="span10"><b>Fecha Solicitada: <?php echo date('d-m-Y',strtotime($etiquetados->fecha_solicitud_etiquetado)).' '.date('h:m A',strtotime($etiquetados->hora_solicitud_etiquetado)); ?></b></div>         
		</div>
	<?php }?>
	<!--Fin de Solicitud-->
	
		
		<!--Notificado-->
		<?php if($etiquetados->notificado==1){ ?>
			<div class="row-fluid">
				<div class="span2"><?php echo date('d-m-Y',strtotime($etiquetados->fecha_notificado)); ?></div>
				<div class="span10"><?php echo CHtml::link('Acta de verificación de etiquetado de certificación de semillas',array('pdf/actaetiquetado','id'=>$etiquetados->id)) ?></div>         
			</div>		
		<?php }?>	
		<!--Fin de Notificado-->
		<?php if($etiquetados->informe==1){ ?>
			<div class="row-fluid">
				<div class="span2"><?php //echo date('d-m-Y',strtotime($etiquetados->fecha_notificado)); ?></div>
				<div class="span10"><?php echo CHtml::link('Constancia de Certificación de Semillas',array('pdf/constanciacertificacion','id'=>$etiquetados->id)) ?></div>         
			</div>
		<?php }?>
<?php }?>





<!--Inspector-->
<?php if($etiquetados!=null && Yii::app()->user->checkAccess('inspector')){?>
      <?php if($muestreo->etiquetado_notificacion==1){?>
		<div class='row-fluid'>
			<div class='span2'></div>
			<div class='span10'><?php echo CHtml::link('Emitir Etiquetas',array('etiquetado/vista','id'=>$etiquetados->id)) ?></div>						
		</div>
		 <?php } ?>
      <?php if($muestreo->etiquetado_notificacion==0){?>
      <div class="row-fluid">
         <div class="span2"><?php echo $etiquetados->fecha_solicitud?></div>
         <div class="span4"><?php echo CHtml::link('Acta de entrega de etiquetas',array('pdf/actaentregaetiquetas','id'=>$etiquetados->id))?></div>
         <div class="span3">        
         </div>
      </div>
   <?php } ?>
   <?php if($etiquetados->solicitud==1){?>
			<div class="row-fluid">
				<div class="span2"><?php echo date('d-m-Y',strtotime($etiquetados->fecha_solicitud)); ?></div>
				<div class="span10"><b>Fecha Solicitada: <?php echo date('d-m-Y',strtotime($etiquetados->fecha_solicitud_etiquetado)).' '.date('h:m A',strtotime($etiquetados->hora_solicitud_etiquetado)); ?></b></div>         
			</div>
				
		
		<?php  if($etiquetados->notificado==0 ){?>      
		<div class="row-fluid">
			<div class="span2"><?php //echo date('d-m-Y',strtotime($etiquetados->fecha_solicitud)); ?></div>
			<div class="span10"><?php echo CHtml::link('Notificacion de Verificación y Etiquetado',array('etiquetado/notificacion','id'=>$etiquetados->id)) ?></div>         
		</div>
		<?php }elseif($etiquetados->notificado==1){ ?>
		<div class="row-fluid">
			<div class="span2"><?php echo date('d-m-Y',strtotime($etiquetados->fecha_notificado)); ?></div>
			<div class="span10"><?php echo CHtml::link('Acta de verificación de etiquetado de certificación de semillas',array('pdf/actaetiquetado','id'=>$etiquetados->id)) ?></div>         
		</div>
		<?php }?>	
		
		<?php if($etiquetados->informe==1){ ?>
		<div class="row-fluid">
			<div class="span2"><?php //echo date('d-m-Y',strtotime($etiquetados->fecha_notificado)); ?></div>
			<div class="span10"><?php echo CHtml::link('Constancia de Certificación de Semillas',array('pdf/constanciacertificacion','id'=>$etiquetados->id)) ?></div>         
		</div>
		<?php } ?>
	<?php }?>
<?php }?>






  
<!--EE OC-->
<?php if($etiquetados!=null && Yii::app()->user->checkAccess('estacion')){?>

   <?php if($muestreo->etiquetado_notificacion==0){?>
      <div class="row-fluid">
         <div class="span2"><?php echo date('d-m-Y',strtotime($etiquetados->fecha_solicitud))?></div>
         <div class="span4"><?php echo CHtml::link('Acta de entrega de etiquetas',array('pdf/actaentregaetiquetas','id'=>$etiquetados->id))?></div>
         <div class="span3">        
         </div>
      </div>
   <?php } ?>
   
   
   <?php if($muestreo->etiquetado_notificacion==0 && $etiquetados->solicitud==0){?>
		<div class="row-fluid">
			<div class="span2"><?php //echo $etiquetados->fecha_solicitud; ?></div>
			<div class="span10"><?php echo CHtml::link('Solicitar Verificación y Etiquetado',array('etiquetado/solicitud','id'=>$etiquetados->id))?></div>         
		</div>
	<?php }else if($etiquetados->solicitud==1){?>
		<div class="row-fluid">
			<div class="span2"><?php echo date('d-m-Y',strtotime($etiquetados->fecha_solicitud)); ?></div>
			<div class="span10"><b>Fecha Solicitada: <?php echo date('d-m-Y',strtotime($etiquetados->fecha_solicitud_etiquetado)).' '.date('h:m A',strtotime($etiquetados->hora_solicitud_etiquetado)); ?></b></div>         
		</div>
	<?php }?>
	<!--Fin de Solicitud-->
	
		
		<!--Notificado-->
		<?php if($etiquetados->notificado==1){ ?>
			<div class="row-fluid">
				<div class="span2"><?php echo date('d-m-Y',strtotime($etiquetados->fecha_notificado)); ?></div>
				<div class="span10"><?php echo CHtml::link('Acta de verificación de etiquetado de certificación de semillas',array('pdf/actaetiquetado','id'=>$etiquetados->id)) ?></div>         
			</div>		
		<?php }?>	
		<!--Fin de Notificado-->
		<?php if($etiquetados->informe==1){ ?>
			<div class="row-fluid">
				<div class="span2"><?php //echo date('d-m-Y',strtotime($etiquetados->fecha_notificado)); ?></div>
				<div class="span10"><?php echo CHtml::link('Constancia de Certificación de Semillas',array('pdf/constanciacertificacion','id'=>$etiquetados->id)) ?></div>         
			</div>
		<?php }?>
<?php }?>