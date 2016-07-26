<?php
/* @var $this PaymentController */
/* @var $model Payment */

?>

<h1>Notas de Ventas</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'id'=>'headquarter-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'template'=>"{items}\n{pager}",
		'columns'=>array(
			'document_number',
			'pay_date',
			'ruc',
			'total',
			
			array(
				 'class'=>'bootstrap.widgets.TbButtonColumn',
				 'template'=>'{view}',
				 'buttons'=>array(       
                                'view' => array(
                                  'url'=>'Yii::app()->controller->createUrl("pdf/notaventa", array("id"=>$data->code))'),
                                ),
				 'htmlOptions'=>array('style'=>'width: 50px'),
			),
    ),
)); ?>