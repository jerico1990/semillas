<?php 
$inbox=Inbox::model()->find('form_id=:form_id', array(':form_id'=>$data->id));
$form=Iform::model()->find('id=:id',array(':id'=>$data->id));
$maestro=Maestro::model()->find('codigo_detalle=:detalle and codigo=:codigo', array(':detalle'=>$form->category,':codigo'=>'005'));
$location=Location::model()->find('district_id=:district_id',array(':district_id'=>$form->location_id));


$ulcriteria = new CDBCriteria;
$ulcriteria->condition ='form_id =' . $form->id;
$ulcriteria->order = 't.id DESC';
$ulcriteria->limit =1 ;
$etiquetas =Inbox::model()->with('status')->findAll($ulcriteria);

$user=User::model()->find('cruge_user_id=:cruge_user_id',array(':cruge_user_id'=>Yii::app()->user->id));


?>
<br>

<div class="row-fluid well span12">			  
		 
		  <div class="row-fluid">
				 <div class="span12">
					<?php echo CHtml::link($data->form_number,array('produccion/create', 'id'=>$data->id)); ?>
					<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','size'=>'small','type'=>'primary', 'label'=>$data->id,'url'=>array('produccion/create', 'id'=>$data->id)));  ?>		
				 </div>
		  </div>
		  <div class="row-fluid">		 
					 <div class="span7">
								<div class="row-fluid">
										  <div class="span6"><b><?php echo CHtml::encode($form->getAttributeLabel('crop_id')." / ".$form->getAttributeLabel('variety_id')); ?>:</b>
										  </div>
										  <div class="span6"><?php echo CHtml::encode($form->crop->name." / ".$form->variety->name); ?>
										  </div>
								</div>
								<div class="row-fluid">
										  <div class="span4"><b><?php echo CHtml::encode($form->getAttributeLabel('category')); ?>:</b>
										  </div>
										  <div class="span8"><?php echo CHtml::encode($maestro->descripcion); ?>
										  </div>
								</div>
					 </div>
					 <div class="span5">
								<div class="row-fluid">
										  <div class="span12">
													 <?php   foreach($etiquetas as $etiqueta){
													 //Etiqueta de View productor
													 if($etiqueta->to==$user->id)
													 {
																$this->widget('bootstrap.widgets.TbLabel', array(
																					 'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
																					 'label'=>$etiqueta->status->status_name,
																					// 'htmlOptions'=>array('class'=>'span12')
																				));
													 }
													 else
													 {
																$this->widget('bootstrap.widgets.TbLabel', array(
																					 'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
																					 'label'=>$etiqueta->status->status_name,
																					// 'htmlOptions'=>array('class'=>'span12')
																				));
													 }
													 }?>
										  </div>										  
								</div>
								<div class="row-fluid">
										  <div class="span4"><b><?php echo CHtml::encode($inbox->getAttributeLabel('date')); ?>:</b>
										  </div>
										  <div class="span8"><?php echo CHtml::encode($inbox->date); ?>
										  </div>
								</div>								
					 </div>
			  </div>
		  
		  <div class="row-fluid">
					 <div class="span12">
								<div class="span2"><b>Ubicación:</b>
								</div>
								<div class="span10"><?php echo CHtml::encode($location->department." / ".$location->province." / ".$location->district); ?>
								</div>
					 </div>
		  </div>
		  	  
</div>
	
	
	
	
	
	
	
	
</div> 

