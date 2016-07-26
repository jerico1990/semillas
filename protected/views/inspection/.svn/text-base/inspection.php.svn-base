    <?php 
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'inspection-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array('validateOnSubmit'=>true),
            'htmlOptions'=>array('class'=>'well'),
       
    ));
    
    ?>

    <?php echo $form->datepickerRow($model,'proposed_date',
						     array('prepend'=>'<li class="icon-calendar"></li>',
								'options'=>array( 'format' => 'dd/mm/yyyy', 
								'weekStart'=> 1,
								'showButtonPanel' => true,
								'showAnim'=>'fold',)))
    ?>
                             
    <?php $this->endWidget(); ?>