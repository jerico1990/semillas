<?php


$inbox=Inbox::model()->find('form_id=:form_id', array(':form_id'=>$data->id));
$inboxs=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$data->id,':status_id'=>3));

$inboxers=Inbox::model()->findAll('t.form_id=:form_id and t.to=:to', array(':to'=>$data->user_id,':form_id'=>$data->id));
$maestro=Maestro::model()->find('codigo_detalle=:detalle and codigo=:codigo', array(':detalle'=>$data->category,':codigo'=>'005'));

?>
 


<div class="view">	
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('crop_id')); ?>:</b>
	<?php echo CHtml::encode($data->crop->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('variety_id')); ?>:</b>
	<?php echo CHtml::encode($data->variety->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($maestro->descripcion); ?>
	<br />
	
	<b><?php echo CHtml::encode($inbox->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($inbox->date); ?>
	<br />
	
	<?php
	if($inboxs===null)
	{
	?>
		<b><?php echo CHtml::encode($inbox->getAttributeLabel('status_id')); ?>:</b>
		<?php echo CHtml::encode($inbox->status->status_name); ?>
		<br />
	<?php
	}
	else
	{
		?>
		<b><?php echo CHtml::encode($inboxs->getAttributeLabel('status_id')); ?>:</b>
		<?php echo CHtml::encode($inboxs->status->status_name); ?>
		<br />
	<?php
	}
	
	?>
	
	<?php
	
	
	
	//Inspector
	if(Yii::app()->user->checkAccess('inspector'))
	{
		foreach($inboxers as $datas)
		{
			
			if($datas->status_id===4 )
			{
			$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'ver','url'=>array('acondicionamientoview', 'id'=>$data->id)));
				
			}
			
			
			$inboxsolicitada=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$data->id,':status_id'=>7));
			$inboxprogramada=Inbox::model()->find('form_id=:form_id and status_id=:status_id', array(':form_id'=>$data->id,':status_id'=>11));
			
			/*if($datas->status_id===4 && $datas->estado==1 && $inboxsolicitada!==null && $inboxprogramada===null)
			{					
			?>
					<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
						 
						<div class="modal-header">
						<a class="close" data-dismiss="modal">&times;</a>
						<h4>Modal header</h4>
						</div>				 
						<div class="modal-body">
						<p>
						<div class="form">						
						<?php 
						$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
						'id'=>'inbox-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array('validateOnSubmit'=>true),
						'htmlOptions'=>array('class'=>'well'),						   
						));						
						?>
						
						
						<?php echo $form->datepickerRow($data,'fecha_visita',
								  array('prepend'=>'<li class="icon-calendar"></li>',
									'options'=>array( 'format' => 'dd/mm/yyyy', 
									'weekStart'=> 1,
									'showButtonPanel' => true,
									'showAnim'=>'fold',))); ?>
						
						
						<?php $this->endWidget(); ?>				
						</div><!-- form -->					
						</p>
						</div>				 
						<div class="modal-footer">
						<?php $this->widget('bootstrap.widgets.TbButton', array(	
						'type'=>'primary',
						'label'=>'Aceptar',
						'buttonType'=>'ajaxButton',
						'url'=>Yii::app()->createUrl( 'inbox/inspeccion' ),
						'ajaxOptions'=>array(			     
						'type'=>'POST',	
						'data' => array( 'id'=>2,'form'=>$data->id,'fecha' => 'js:$("#Iform_fecha_visita").val()' ),
						//'success' => "function( data ){alert(data);}"
						),
						'htmlOptions'=>array('data-dismiss'=>'modal',
						'url' => Yii::app()->createUrl( 'inbox/inspeccion' ),
						),));
						?>						
						</div>				 
						<?php $this->endWidget(); ?>
						<?php $this->widget('bootstrap.widgets.TbButton', array(
						 'label'=>'Confirmar Visita',
						 'type'=>'primary',
						 'htmlOptions'=>array(
						 'data-toggle'=>'modal',
						 'data-target'=>'#myModal',
						 ),
						 ));
						 ?>
						 <?php
			}	*/
			
		}
	}
	
	
	
	
	
	//Productor
	if(Yii::app()->user->checkAccess('productor'))
	{
		foreach($inboxers as $datas)
		{		
			if($datas->status_id===4 )
			{
			$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>'ver','url'=>array('view', 'id'=>$data->id)));
				
			}					
		}
	}
	
	
	?>
</div>