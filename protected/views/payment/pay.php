

<h1>Notas Registradas</h1>
<?php
   foreach($payments as $payment):
?>

	<div class="row-fluid">
		<div class="form well span12">		
			<div class="row-fluid">
				<div class="span12">Nota de Pago <?php echo CHtml::decode($payment->code); ?></div>
			</div>
			<!--Conceptos-->
			<?php
				foreach($conceptos as $concepto):
				if($concepto->code===$payment->code)
				{
			?>
				<div class="row-fluid">
					<div class="span8"><?php echo $concepto->concept->short_name; ?></div>
					<div class="span1"><?php echo CHtml::encode($concepto->quantity); ?></div>
					<div class="span3"><?php echo $concepto->price; ?></div>
				</div>
			<?php
				}
				endforeach;
			?>		
			<div class="row-fluid">
				<div class="span9 text-right"><b>Total:</b></div>
				<div class="span3 "><?php echo CHtml::encode($payment->total); ?></div>
			</div>
			<div class="row-fluid">
				<div class="span4">Ingrese código de voucher:</div>
				<div class="span5">
					<?php echo CHtml::hiddenField('code',$payment->code); ?>
					<?php echo CHtml::textField('data'); ?>
				</div>
				<div class="span3">
					<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Registrar','htmlOptions' => array('name'=>'yt0','value'=>'registrar'),)); ?>
							
				</div>
			</div>			
		</div><!-- form -->	
	</div>
<?php  
   endforeach;
?>