<h1>Notas por pagar Registradas</h1>
<div id="error" style="color: red"></div>
<?php
   foreach($payments as $payment):
?>
<?php echo CHtml::form('registrarpago', 'post', array ()); ?>

<div class="row-fluid">
   <div class="form well span12">		
      <div class="row-fluid">
	      <div class="span12"><?php echo CHtml::link("Nota de Pago $payment->code",array('pdf/notapago','id'=>$payment->code))?></div>
      </div>
      <!--Conceptos-->
      <?php
	       $total=0;
	      foreach($conceptos as $concepto):
	      if($concepto->code===$payment->code)
	      {
      ?>
	      <div class="row-fluid">
		  <div class="span2"><?php echo $concepto->document_reference;	?></div>
		  <div class="span6"><?php echo $concepto->descripcion; ?></div>
		  <div class="span1"><?php echo CHtml::encode($concepto->quantity); ?></div>
		  <div class="span3"><?php echo $concepto->quantity*$concepto->price; ?></div>
	      </div>
      <?php	$total=$total+$concepto->quantity*$concepto->price;
	      }
	      endforeach;
      ?>		
      <div class="row-fluid">
	      <div class="span9 text-right"><b>Total:</b></div>
	      <div class="span3 "><?php echo CHtml::encode($total); ?></div>
      </div>
      <div class="row-fluid">
	      <div class="span4">Ingrese código de voucher:</div>
	      <div class="span5">
		     <?php echo CHtml::hiddenField('code',$payment->code); ?>
		     <input type="text" name="data" id="data" maxlength="20" class="numerico">
		     <?php //echo CHtml::textField('data'); ?>
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


<script>
   $('.numerico').keypress(function (e) {
	tecla = (document.all) ? e.keyCode : e.which; // 2
	if (tecla==8) return true; // 3
        var reg = /^[0-9\s]+$/;
        te = String.fromCharCode(tecla); // 5
	return reg.test(te); // 6
		
    });
   $(document).on('click','#yw0',function(){
	var error='';
	if ($('#data').val()=='') {
	    error=error+'Debe ingresar el numero de voucher<br>';
	}
	 if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de registrar la nota de pago?");
	if (r == true) {
	    return true;
	} else {
	    return false;
	}
   });
   
   
</script>


