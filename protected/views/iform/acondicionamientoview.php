	<?php
		
	if(Yii::app()->user->checkAccess('inspector'))
	{
		if($model->crop_id===1 || $model->crop_id===2 || $model->crop_id===3 || $model->crop_id===4 || $model->crop_id===5 ||
			$model->crop_id===6 || $model->crop_id===7 || $model->crop_id===8 || $model->crop_id===9 || $model->crop_id===10 ||
			$model->crop_id===11 || $model->crop_id===12)
		{
			$this->widget('bootstrap.widgets.TbMenu', array(
					'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
					'stacked'=>false, // whether this is a stacked menu
					'items'=>array(
						 array('label'=>'Crear', 'url'=>array('acondicionamiento/creategeneral','id'=>$model->id),'active'=>true),      
					),
				));
		}
		else
		{
			$this->widget('bootstrap.widgets.TbMenu', array(
							'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
							'stacked'=>false, // whether this is a stacked menu
							'items'=>array(
								 array('label'=>'Crear', 'url'=>array('acondicionamiento/createpapa'),'active'=>true),      
							),
						));
		}
	}
	
	//Acondicionamientos
	$acondicionamientos=Acondicionamiento::model()->findAll('id=:id and user_id=:user_id',
																				 array(':id'=>$model->id,':user_id'=>$model->user_id));
	
	//Inbox
	$criteria0=new CDbCriteria;
	$criteria0->condition='form_id=:form_id';
	$criteria0->order='id ASC';
	$criteria0->params=array(':form_id'=>$model->id);
	$inboxs = Inbox::model()->findAll($criteria0);
	?>
	
	<!--Vista Acondicionamiento-->
	<div class="row-fluid span12">		 
		<div class="row-fluid">			
		</div>
	</div>
	<!--Fin de Vista Acondicionamiento-->
	<?php
	
	?>
	
	
	
	
		<!--Vista Acondicionamiento-->
	<div class="row-fluid well span12">		 
		<div class="row-fluid">
			<?php				
				foreach($acondicionamientos as $acondicionamiento):
					echo $acondicionamiento->id;
				endforeach;				
			?>
		</div>
	</div>
	<!--Fin de Vista Acondicionamiento-->
	
	
	
	<!--Detalle de  Acondicionamiento-->
	<div class="row-fluid well span12">		 
		<div class="row-fluid">
			sfsd
		</div>
	</div>
	<!--Fin de Detalle de  Acondicionamiento-->
	