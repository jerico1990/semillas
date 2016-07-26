<h1>Pagos Registradas</h1>
<?php
   foreach($payments as $payment):
?>

<?php echo CHtml::form('registrarpago', 'post', array ()); ?>
	<div class="row-fluid">
		<div class="form well span12">		
			<div class="row-fluid">
				<div class="span12"><?php echo CHtml::link("Nota de Pago $payment->code",array('pdf/notapago','id'=>$payment->code))?> </div>
			</div>
			<!--Conceptos-->
			<?php
			      $total=0;
				foreach($conceptos as $concepto):
				if($concepto->code===$payment->code)
				{
			?>
			<?php $form=Iform::model()->find('id=:id',array(':id'=>$concepto->form_id));?>
				<div class="row-fluid">
			<div class="span2">
						<?php echo $concepto->document_reference;	?>
					</div>
					<div class="span7">
					<?php					
					//	echo $concepto->descripcion;					
					echo $concepto->descripcion; ?>
					</div>
					<div class="span1"><?php echo CHtml::encode($concepto->quantity); ?></div>
					<div class="span2"><?php echo $concepto->quantity*$concepto->price; ?></div>
				</div>
			<?php	$total=$total+$concepto->quantity*$concepto->price;
				}
				endforeach;
			?>		
			<div class="row-fluid">
				<div class="span10 text-right"><b>Total:</b></div>
				<div class="span2 "><?php echo CHtml::encode($total); ?></div>
			</div>					
		</div>	
	</div><!-- form -->



<?php echo CHtml::endForm(); ?>
<?php  
   endforeach;
?>