
<br>
<!--Generar Muestreo-->
<div class="row-fluid well">
    <div class='row-fluid'>      
	<div class="form">
	    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'etiquetado-form', ));?>
		<div id="error" style="color: red"></div>
		<div class="row-fluid">			 				
		    <div class="span12">
			<label for="Etiquetado_peso_total">Peso Total(kg)</label>
			<input name="Etiquetado[peso_total]" id="Etiquetado_peso_total" type="text" maxlength="18">
		    </div>
		</div>
		<button type="button" id="agregar_etiqueta" class="btn btn-primary">Agregar fuente de origen</button><br><br>
		<table class="table borderless table-hover" id="detalle_tabla_etiqueta" border="0">
		    <thead>
			<tr>
			    <th>Cantidad</th>
			    <th>Numeración del</th>
			    <th>Numeración al</th>
			    <th width="22">&nbsp;</th>
			</tr>
		    </thead>
		    <tbody>
			<tr id='etiqueta_addr_1'></tr>
		    </tbody>
		</table>
		<div class="row-fluid">
		    <div id="error_etiquetado" style="color: red"></div>
		</div>
		<div class="row-fluid">
		   <div class="span12">	
			    <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','htmlOptions'=>array('class'=>'span3',),'buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Emitir Acta' : 'Emitir Acta')); ?>
			
		   </div>
		</div>       
         <?php $this->endWidget(); ?>
      </div><!-- form -->
   </div>
</div>



<script>
	$('.etiquetado').on('blur', function(){
	    $('#Etiquetado_peso_total').val(numeral($('#Etiquetado_peso_total').val()).format('0,0.00'));
	});
	$('body').on('click', '#yw0', function (e) {
	    var error='';
	    if ($('#Etiquetado_peso_total').val()=='') {
		error=error+'Debe ingresar el peso recibido en gramos<br>';
	    }
	    if (error!='') {
		$('#error').html(error);
		return false;
	    }
	    
	    var txt;
	    var r = confirm("¿Estas seguro de emitir acta?");
	    if (r == true) {
		return true;
	    } else {
		return false;
	    }
	});
	contador=1;
	$("#agregar_etiqueta").click(function(){
	    var cantidades=$('input[name=\'Etiquetado[cantidades][]\']').length;
	    var error = '';
	    for (i=1;i<=cantidades;i++) {
		if ($.trim($('#cantidad_'+i).val())=='') {
		    error=error+'Debe ingresar la Cantidad en la fila n° '+i+'<br>';
		}
		
		if ($.trim($('#inicio_'+i).val())=='') {
		    error=error+'Debe ingresar la numeración de inicio en la fila n° '+i+'<br>';
		}
		
		if ($.trim($('#fin_'+i).val())=='') {
		    error=error+'Debe ingresar la numeración de fin en la fila n° '+i+'<br>';
		}
	    }
	    
	    if (error != '') {
		$("#error_etiquetado").html(error);
		return false;
	    }
	    else
	    {
		var option = null;
		$('#etiqueta_addr_'+contador).html(
						'<td>'+
						    '<input class="form-control" type="text" style="width:170px !important;" name="Etiquetado[cantidades][]" id="cantidad_'+contador+'">'+
						'</td>'+
						'<td>'+
						    '<input type="text" style="width:170px !important;" name="Etiquetado[inicios][]" id="inicio_'+contador+'">'+
						'</td>'+
						'<td>'+
						    '<input type="text" style="width:170px !important;" name="Etiquetado[fines][]" id="fin_'+contador+'">'+
						'</td>'+
						'<td>'+
						    '<span class="eliminar icon-minus-sign" >'+
						    '</span>'+
						'</td>');
		$('#detalle_tabla_etiqueta').append('<tr id="etiqueta_addr_'+(contador+1)+'"></tr>');
		contador++;
		return true;
	    }
	});
</script>
