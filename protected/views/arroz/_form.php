<div class="form well span12" style="background: #FFFFFF">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm');  ?>
	<div class="row-fluid">
	    <div class="span12" id="error" style="color: red"></div>      
	</div> 	
	<div class="row-fluid">
	    <div class="span12"><h4>Estado fenologico del cultivo</h4></div>      
	</div> 		  
	<div class="row-fluid">
	    <div class="span6">
		<label class="checkbox">
		    <input class="arroz" name="Inspection[arz_siembra_directa]" id="Inspection_arz_siembra_directa" type="checkbox">Siembra Directa
		</label>
	    </div>
	    <div class="span6">
		<label class="checkbox">
		    <input class="arroz" name="Inspection[arz_transplante]" id="Inspection_arz_transplante" type="checkbox">Transplante
		</label>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Campo de Multiplicación</h4></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span4">
		<label>Fecha siembra</label>
		<input type="date" name="Inspection[arz_fecha_siembra]" id="Inspection_arz_fecha_siembra">
	    </div>
	    <div class="span4">
		<label>Fecha Almacigo</label>
		<input type="date" name="Inspection[arz_fecha_almacigo]" id="Inspection_arz_fecha_almacigo">
	    </div>
	    <div class="span4">
		<label>Fecha de Transplante</label>
		<input type="date" name="Inspection[arz_fecha_transplante]" id="Inspection_arz_fecha_transplante">
	    </div>		 
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<label>Area Instalada (ha)</label>
		<input type="text" name="Inspection[arz_area_instalada]" class="arroz " id="Inspection_arz_area_instalada" maxlength="5">
	    </div>				  	 
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Evaluación</h4></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span12">
		<div class="row-fluid">
		    <div class="span6">
			<label>Plantas fuera de tipo</label>
			<input type="text" name="Inspection[arz_fuera_tipo]" class="span12" id="Inspection_arz_fuera_tipo" maxlength="5">
		    </div>
		    <div class="span6">
			<label>Arroz rojo</label>
			<input type="text" name="Inspection[arz_rojo]" class="span12" id="Inspection_arz_rojo" maxlength="5">
		    </div>
		</div>
	    </div>
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<div class="row-fluid">
		    <div class="span6">
			<label>Plantas con síntomas de enfermedades</label>
			<input type="text" name="Inspection[arz_plantas_sintomas]" class="span12" id="Inspection_arz_plantas_sintomas" maxlength="5">
		    </div>
		    <div class="span6">
			<label>Aislamiento (m)</label>
			<input type="text" name="Inspection[arz_aislamiento]" class="arroz span12" id="Inspection_arz_aislamiento" maxlength="5">
		    </div>
		</div>
	    </div>	    		  
	</div>
	<div class="row-fluid">
	    <div class="span12"><h4>Observación</h4></div>      
	</div> 
	<div class="row-fluid">
	    <div class="span12">
		<div class="row-fluid">
		    <div class="span12">
			<label>Observación</label>
			<textarea size="60" maxlength="300" rows="6" class="arroz span12" name="Inspection[observaciones]" id="Inspection_observaciones"></textarea>
		    </div>		    
		</div>
	    </div>	    		  
	</div>
	<div class="row-fluid">
	    <div class="span12">
		<div class="form-actions">
		    <div class="span4">
		    <!--Aprobado-->
			<button id="btn_apro" class="btn btn-success span12" data-toggle="modal">Cumple</button>
			<input name="Inspection[y01]" id="hidden" type="hidden">
		    <!--Fin de Aprobado-->	
		    </div>
		    <div class="span4">
		    <!--Condicional-->
			<button id="btn_condi"  class="btn btn-primary span12" data-toggle="modal">condicional</button>
		    <!--Fin de Condicional-->
		    </div>
		    <!--Boton de No cumples-->
		    <div class="span4">
			<button id="btn_recha"  class="btn btn-danger span12" >No cumple</button>
		    </div>
		</div>
	    </div>
	</div>
	<!--Botones-->
	
	<!--Aprobado-->
	<div id="myModal_acond_apro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >	
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 id="myModalLabel">Pasar a Inspeccion de Acondicionamiento</h4>
	    </div>
	    <div class="modal-body">
		<p>
		    <div class="form">
			<div class="row-fluid">
			    <div class="span5">Continuar con la Inspección de</div>
			    <div class="span7">
				<select class="validar" name="Inspection[select_id]" id="Inspection_select_id">
				    <option value>Seleccionar</option>
				    <option value="1">Acondicionamiento</option>
				    <option value="2">Campo</option>
				</select>
			    </div>
			</div>
			<div class="row-fluid">
			    <div class="span5">Fecha propuesta</div>
			    <div class="span7">
				<input type="date" name="Inspection[aprobado_fecha_propuesta]" id="Inspection_aprobado_fecha_propuesta">
			    </div>
			</div>
		    </div><!-- form -->
		</p>
	    </div>
	    <div class="modal-footer">
		<button id="btn_enviar_aprobado" class="btn btn-primary">Enviar</button>
	    </div>
	</div>
	<!--Boton Condicional-->	
	<div id="myModal_acond_conda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 id="myModalLabel">Fecha sugerida de Subsanación</h4>
	    </div>
	    <div class="modal-body">
		<p>
		    <label for="Inspection_subsanacion_date">Subsanación Fecha</label>
		    <input type="date" name="Inspection[subsanacion_date]" id="Inspection_subsanacion_date">
		</p>
	    </div>
	    <div class="modal-footer">
		<button id="btn_enviar_condicional" class="btn btn-primary">Enviar</button>			
	    </div>
	</div>
	<!--Boton Rechazado-->
	<!--
	<div id="myModal_acond_recha" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 id="myModalLabel">Fecha sugerida de Subsanación</h4>
	    </div>
	    <div class="modal-body">
		<p>
		    <label for="Inspection_subsanacion_date">Subsanación Fecha</label>
		    <input type="date" name="Inspection[subsanacion_date]" id="Inspection_subsanacion_date">
		</p>
	    </div>
	    <div class="modal-footer">
		<button id="btn_enviar_rechazado" class="btn btn-primary">Enviar</button>			
	    </div>
	</div>
	-->
<!--Fin de botones-->
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
    $cumple=CController::createUrl('inspection/rechazado');
    $condicional=CController::createUrl('inspection/condicional');
    $no_cumple=CController::createUrl('inspection/rechazado');
?>
<script>
    $('#btn_apro').on('click', function(){
	var error='';
	if ($('#Inspection_arz_fecha_siembra').val()=='') {
	    error=error+'Debe ingresar la Fecha Siembra<br>';
	}
	if ($('#Inspection_arz_fecha_almacigo').val()=='') {
	    error=error+'Debe ingresar la Fecha Almacigo<br>';
	}
	if ($('#Inspection_arz_fecha_transplante').val()=='') {
	    error=error+'Debe ingresar la Fecha Transplante<br>';
	}
	if ($('#Inspection_arz_area_instalada').val()=='') {
	    error=error+'Debe ingresar la Area Instalada (ha)<br>';
	}
	if ($('#Inspection_arz_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar la Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_arz_rojo').val()=='') {
	    error=error+'Debe ingresar la Arroz rojo<br>';
	}
	if ($('#Inspection_arz_plantas_sintomas').val()=='') {
	    error=error+'Debe ingresar la Plantas con síntomas de enfermedades<br>';
	}
	if ($('#Inspection_arz_aislamiento').val()=='') {
	    error=error+'Debe ingresar el Aislamiento (m)<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar la Observación<br>';
	}
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	$('#myModal_acond_apro').modal('show');
	return true;
    });
    
    $('#btn_condi').on('click', function(){
	var error='';
	if ($('#Inspection_arz_fecha_siembra').val()=='') {
	    error=error+'Debe ingresar la Fecha Siembra<br>';
	}
	if ($('#Inspection_arz_fecha_almacigo').val()=='') {
	    error=error+'Debe ingresar la Fecha Almacigo<br>';
	}
	if ($('#Inspection_arz_fecha_transplante').val()=='') {
	    error=error+'Debe ingresar la Fecha Transplante<br>';
	}
	if ($('#Inspection_arz_area_instalada').val()=='') {
	    error=error+'Debe ingresar la Area Instalada (ha)<br>';
	}
	if ($('#Inspection_arz_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar la Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_arz_rojo').val()=='') {
	    error=error+'Debe ingresar la Arroz rojo<br>';
	}
	if ($('#Inspection_arz_plantas_sintomas').val()=='') {
	    error=error+'Debe ingresar la Plantas con síntomas de enfermedades<br>';
	}
	if ($('#Inspection_arz_aislamiento').val()=='') {
	    error=error+'Debe ingresar el Aislamiento (m)<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar la Observación<br>';
	}
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	$('#myModal_acond_conda').modal('show');
	return true;
    });
    
    
    $('#btn_recha').on('click', function(){
	var error='';
	if ($('#Inspection_arz_fecha_siembra').val()=='') {
	    error=error+'Debe ingresar la Fecha Siembra<br>';
	}
	if ($('#Inspection_arz_fecha_almacigo').val()=='') {
	    error=error+'Debe ingresar la Fecha Almacigo<br>';
	}
	if ($('#Inspection_arz_fecha_transplante').val()=='') {
	    error=error+'Debe ingresar la Fecha Transplante<br>';
	}
	if ($('#Inspection_arz_area_instalada').val()=='') {
	    error=error+'Debe ingresar la Area Instalada (ha)<br>';
	}
	if ($('#Inspection_arz_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar la Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_arz_rojo').val()=='') {
	    error=error+'Debe ingresar la Arroz rojo<br>';
	}
	if ($('#Inspection_arz_plantas_sintomas').val()=='') {
	    error=error+'Debe ingresar la Plantas con síntomas de enfermedades<br>';
	}
	if ($('#Inspection_arz_aislamiento').val()=='') {
	    error=error+'Debe ingresar el Aislamiento (m)<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar la Observación<br>';
	}
	if (error!='') {
	    //alert(error);
	    $('#error').html(error);
	    return false;
	}
	
	var txt;
	var r = confirm("¿Estas seguro de que el informe no cumple?");
	if (r == true) {
	    $('#hidden').val(3);
	    return true;
	} else {
	    return false;
	}
    });
    
    //Fecha Formato
    $('.arroz').on('blur', function(){
	$('#Inspection_arz_area_instalada').val(numeral($('#Inspection_arz_area_instalada').val()).format('0,0.00'));
	$('#Inspection_arz_aislamiento').val(numeral($('#Inspection_arz_aislamiento').val()).format('0,0.00'));
    });
    
    
    
    $('#btn_enviar_aprobado').click(function(){
	var error='';
	if ($('#Inspection_aprobado_fecha_propuesta').val()=='') {
	    error=error+'Debe ingresar la fecha propuesta\n';
	}
	if (error!='') {
	    alert(error);
	    return false;
	}
	
	
	var txt;
	var r = confirm("¿Estas seguro de enviar la fecha sugerida?");
	if (r == true) {
	    $('#hidden').val(1);
	    return true;
	} else {
	    return false;
	}
    });
    
    $('#btn_enviar_condicional').click(function(){
	var error='';
	if ($('#Inspection_subsanacion_date').val()=='') {
	    error=error+'Debe ingresar la fecha de subsanación\n';
	}
	if (error!='') {
	    alert(error);
	    return false;
	}
	
	
	var txt;
	var r = confirm("¿Estas seguro de enviar la fecha de subsanación?");
	if (r == true) {
	    $('#hidden').val(2);
	    return true;
	} else {
	    return false;
	}
    });
    /*
    $('#btn_enviar_rechazado').click(function(){
	var error='';
	if ($('#Inspection_aprobado_fecha_propuesta').val()=='') {
	    error=error+'Debe ingresar la fecha propuesta\n';
	}
	if (error!='') {
	    alert(error);
	    return false;
	}
	
	
	var txt;
	var r = confirm("¿Estas seguro de enviar la fecha sugerida?");
	if (r == true) {
	    $('#btn_apro_hidden').val(1);
	    return true;
	} else {
	    return false;
	}
    });*/
</script>


