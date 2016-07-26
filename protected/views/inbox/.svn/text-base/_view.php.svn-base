<?php
	/*Yii::app()->getClientScript()->registerScript( "radioScrip",
	"
		$(document).ready(function() {
		      
				$('#lista').click(function()
				{
					var divId = $(this).attr('id');
					alert(divId);
				});
			    
		 });
	"
	,CClientScript::POS_END);*/
?>
<?php
/* @var $this InboxController */
/* @var $data Inbox */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('form_id')); ?>:</b>
	<?php echo CHtml::encode($data->form_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to')); ?>:</b>
	<?php echo CHtml::encode($data->to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	<?php  echo CHtml::link('read more', $this->createAbsoluteUrl('inbox/pdf',array('id'=> $data->form_id)));?>
	
	
	<?php
	 /*
		
			$user = User::model()->findAll(); 
		
			echo CHtml::activeDropDownList($data, 'id',CHtml::listData($user, 'id', 'name'), array('id'=>'lista','option selected'=>$data->id));	
			
	*/	
	
	 ?>
	 
	 <?php
		$inbox=Inbox::model()->findAll('form_id=:form_id', array(':form_id'=>CHtml::encode($data->form_id)));
		
			
	
	 ?>
	 
	 
	 
	 
	 
	 
	 

</div>