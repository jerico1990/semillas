
<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id'=>'headquarter-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'template'=>"{items}\n{pager}",
		'columns'=>array(
			array('name'=>'crop_id','value'=>'$data->crop->name',),
			'form_number',
			array('name'=>'user_id','value'=>'$data->usera->fullname',),
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{view}',
				'htmlOptions'=>array('style'=>'width: 50px'),
				'buttons'=>array(			 
					'view'=>array(
						'label'=>'',				
						'url'=>'Yii::app()->createUrl("iform/asolicitud", array("id"=>$data->id))',
					),			    
				),
			),
    ),
)); ?>