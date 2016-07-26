<h1>Generar Nota de Venta</h1>
<?php
   foreach($payments as $payment):
?>
<?php echo CHtml::form('registrarnota', 'post', array ()); ?>
	<div class="row-fluid">
		<div class="form well span12">		
			<div class="row-fluid">
				<div class="span12"><?php echo CHtml::link("Nota de Venta $payment->code",array('pdf/notaventa','id'=>$payment->code))?></div>
			</div>
			<!--Conceptos-->
			<?php
				foreach($conceptos as $concepto):
				if($concepto->code===$payment->code)
				{
			?>
				<div class="row-fluid">
					<div class="span2"><?php echo $concepto->document_reference; ?></div>
					<div class="span7"><?php echo $concepto->descripcion; ?></div>
					<div class="span1"><?php echo CHtml::encode($concepto->quantity); ?></div>
					<div class="span2"><?php echo $concepto->price; ?></div>
				</div>
			<?php
				}
				endforeach;
			?>		
			<div class="row-fluid">
				<div class="span10 text-right"><b>Total:</b></div>
				<div class="span2 "><?php echo CHtml::encode($payment->total); ?></div>
			</div>
			<div class="row-fluid">
				<div class="span4">Ingrese Nota de Venta N°:</div>
				<div class="span5">
					<?php echo CHtml::hiddenField('code',$payment->code); ?>
					<?php echo CHtml::textField('data'); ?>
				</div>
				<div class="span3">
					<?php $this->widget('bootstrap.widgets.TbButton', array( 'type'=>'success','buttonType'=>'submit','label'=>'Registrar','htmlOptions' => array('name'=>'yt0','value'=>'registrar'),)); ?>
							
				</div>
			</div>			
		</div>	
	</div><!-- form -->



<?php echo CHtml::endForm(); ?>
<?php  
   endforeach;
?>



