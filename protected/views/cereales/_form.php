<div class="form well span12" style="background: #FFFFFF">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
    <div class="row-fluid">
	<div class="span12" id="error" style="color: red"></div>      
    </div> 	
    <div class="row-fluid">
	<div class="span12"><h4>Campo de Multiplicación</h4></div>      
    </div>
    <div class="row-fluid">			
	<div class="span3">
	    <label for="Inspection_size">Area(m2)</label>
	    <input class="cereales span12" name="Inspection[size]" id="Inspection_size" type="text" maxlength="18">
	</div>
	<div class="span9">
	    <label for="Inspection_cer_fecha_siembra">Fecha de Siembra</label>
	    <input class="cereales_fecha span10" type="text" autocomplete="off" name="Inspection[cer_fecha_siembra]" id="Inspection_cer_fecha_siembra">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Etapa / Estado fenológico de cultivo</h4></div>      
    </div>  
    <div class="row-fluid">					
	<div class="span6">
	    <label for="Inspection_cer_floracion">Floración (%)</label>
	    <input size="18" maxlength="18" class="cereales span6" name="Inspection[cer_floracion]" id="Inspection_cer_floracion" type="text">
	</div>
	<div class="span6">
	    <label for="Inspection_cer_maduracion">Maduración (%)</label>
	    <input size="18" maxlength="18" class="cereales span6" name="Inspection[cer_maduracion]" id="Inspection_cer_maduracion" type="text">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Cantidad de Semillas (kg)</h4></div>      
    </div>  
    <div class="row-fluid">
	<div class="spa12">
	    <label for="Inspection_cer_cantidad_semilla"></label>
	    <input size="18" maxlength="18" class="cereales span2" name="Inspection[cer_cantidad_semilla]" id="Inspection_cer_cantidad_semilla" type="text">
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Mezcla</h4></div>      
    </div> 
    <div class="row-fluid">
	<div class="span6">
	    <label for="Inspection_cer_inflorecencias_otros_cultivares">Inflorecencias de Otros Cultivares</label>
	    <textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_inflorecencias_otros_cultivares]" id="Inspection_cer_inflorecencias_otros_cultivares"></textarea>
	</div>
	<div class="span6">
	    <label for="Inspection_cer_inflorecencias_otros_cultivares_menores">Inflorecencias de Otros Cultivares Menores</label>
	    <textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_inflorecencias_otros_cultivares_menores]" id="Inspection_cer_inflorecencias_otros_cultivares_menores"></textarea>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Enfermedades transmisibles por semilla</h4></div>      
    </div>	  		  
    <div class="row-fluid">
	<div class="span4">
	    <label for="Inspection_cer_carbon_apestoso">Carbón Apestoso</label>
	    <textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_carbon_apestoso]" id="Inspection_cer_carbon_apestoso"></textarea>
	</div>
	<div class="span4">
	    <label for="Inspection_cer_carbon_cubierto">Carbón Cubierto</label>
	    <textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_carbon_cubierto]" id="Inspection_cer_carbon_cubierto"></textarea>
	</div>
	<div class="span4">
	    <label for="Inspection_cer_carbon_volador">Carbón Volador</label>
	    <textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_carbon_volador]" id="Inspection_cer_carbon_volador"></textarea>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span4">
	    <label for="Inspection_cer_cornezuelo">Cornezuelo</label>
	    <textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_cornezuelo]" id="Inspection_cer_cornezuelo"></textarea>
	</div>
	<div class="span4">
	    <label for="Inspection_cer_mancha_foliar">Mancha Foliar</label>
	    <textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_mancha_foliar]" id="Inspection_cer_mancha_foliar"></textarea>
	</div>
	<div class="span4">
	    <label for="Inspection_cer_escaldadura">Escaldadura</label>
	    <textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_escaldadura]" id="Inspection_cer_escaldadura"></textarea>
	</div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Estado del Campo</h4></div>      
    </div>
    <div class="row-fluid">
	<div class="span6"><label for="Inspection_cer_presencia_maleza_nocivas">Presencia Malezas Nocivas</label><textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_presencia_maleza_nocivas]" id="Inspection_cer_presencia_maleza_nocivas"></textarea></div>
	<div class="span6"><label for="Inspection_cer_aspecto_general_poblacion">Aspecto General Población</label><textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_aspecto_general_poblacion]" id="Inspection_cer_aspecto_general_poblacion"></textarea></div>
    </div>
    <div class="row-fluid">
	<div class="span12"><label for="Inspection_cer_plagas">Plagas</label><textarea size="60" maxlength="300" class="cereales span12" rows="5" name="Inspection[cer_plagas]" id="Inspection_cer_plagas"></textarea></div>
    </div>
    
    <div class="row-fluid">
	<div class="span12"><h4>Aislamiento</h4></div>      
    </div>
     <div class="row-fluid">
	<div class="span4"><label for="Inspection_cer_aislamiento">Campo comercial (m)</label><input size="60" maxlength="300" class="cereales span12" name="Inspection[cer_aislamiento]" id="Inspection_cer_aislamiento" type="text"></div>
	<div class="span4"><label for="Inspection_cer_otra_cultivar">Otra Cultivar (m)</label><input size="60" maxlength="300" class="cereales span12" name="Inspection[cer_otra_cultivar]" id="Inspection_cer_otra_cultivar" type="text"></div>
	<div class="span4"><label for="Inspection_cer_otra_categoria">Otra Categoria (m)</label><input size="60" maxlength="300" class="cereales span12" name="Inspection[cer_otra_categoria]" id="Inspection_cer_otra_categoria" type="text"></div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Datos</h4></div>      
    </div>
    <div class="row-fluid">
	<div class="span6"><label for="Inspection_cer_plantas_fuera_tipo">Plantas fuera de tipo</label><input size="18" maxlength="18" class="cereales span12" name="Inspection[cer_plantas_fuera_tipo]" id="Inspection_cer_plantas_fuera_tipo" type="text"></div>
	<div class="span6"><label for="Inspection_cer_otras_especies">Otras Especies</label><input size="18" maxlength="18" class="cereales span12" name="Inspection[cer_otras_especies]" id="Inspection_cer_otras_especies" type="text"></div>
    </div>
    <div class="row-fluid">
	<div class="span12"><h4>Observaciones</h4></div>      
    </div>
    <div class="row-fluid">
	<div class="span12"><label for="Inspection_observaciones"> </label><textarea size="60" maxlength="300" class="cereales span12" rows="6" name="Inspection[observaciones]" id="Inspection_observaciones"></textarea></div>
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
    $('.cereales_fecha').datepicker({
	format: 'dd-mm-yyyy',
    });
    $('.cereales').on('blur', function(){
	    $('#Inspection_size').val(numeral($('#Inspection_size').val()).format('0,0.00'));
	    $('#Inspection_cer_aislamiento').val(numeral($('#Inspection_cer_aislamiento').val()).format('0,0.00'));
	    $('#Inspection_cer_otra_cultivar').val(numeral($('#Inspection_cer_otra_cultivar').val()).format('0,0.00'));
	    $('#Inspection_cer_otra_categoria').val(numeral($('#Inspection_cer_otra_categoria').val()).format('0,0.00'));
	    $('#Inspection_cer_cantidad_semilla').val(numeral($('#Inspection_cer_cantidad_semilla').val()).format('0,0.00'));
	    $('#Inspection_cer_floracion').val(numeral($('#Inspection_cer_floracion').val()).format('0.0'));
	    $('#Inspection_cer_maduracion').val(numeral($('#Inspection_cer_maduracion').val()).format('0.0'));
    });
    
    $('#btn_apro').on('click', function(){
	var error='';
	if ($('#Inspection_size').val()=='') {
	    error=error+'Debe ingresar Area(m2)<br>';
	}
	if ($('#Inspection_cer_fecha_siembra').val()=='') {
	    error=error+'Debe ingresar la Fecha de Siembra<br>';
	}
	if ($('#Inspection_cer_floracion').val()=='') {
	    error=error+'Debe ingresar la Floración (%)<br>';
	}
	if ($('#Inspection_cer_maduracion').val()=='') {
	    error=error+'Debe ingresar el Maduración (%)<br>';
	}
	if ($('#Inspection_arz_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar la Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_cer_cantidad_semilla').val()=='') {
	    error=error+'Debe ingresar la cantidad de semillas (kg)<br>';
	}
	if ($('#Inspection_cer_inflorecencias_otros_cultivares').val()=='') {
	    error=error+'Debe ingresar la inflorecencias de otros cultivares<br>';
	}
	if ($('#Inspection_cer_inflorecencias_otros_cultivares_menores').val()=='') {
	    error=error+'Debe ingresar la Inflorecencias de Otros Cultivares Menores<br>';
	}
	if ($('#Inspection_cer_carbon_apestoso').val()=='') {
	    error=error+'Debe ingresar el Carbón Apestoso<br>';
	}
	if ($('#Inspection_cer_carbon_cubierto').val()=='') {
	    error=error+'Debe ingresar el Carbón Cubierto<br>';
	}
	if ($('#Inspection_cer_carbon_volador').val()=='') {
	    error=error+'Debe ingresar el Carbón Volador<br>';
	}
	if ($('#Inspection_cer_cornezuelo').val()=='') {
	    error=error+'Debe ingresar la Cornezuelo<br>';
	}
	if ($('#Inspection_cer_mancha_foliar').val()=='') {
	    error=error+'Debe ingresar la Mancha Foliar<br>';
	}
	if ($('#Inspection_cer_escaldadura').val()=='') {
	    error=error+'Debe ingresar la Escaldadura<br>';
	}
	if ($('#Inspection_cer_presencia_maleza_nocivas').val()=='') {
	    error=error+'Debe ingresar la Presencia Malezas Nocivas<br>';
	}
	if ($('#Inspection_cer_aspecto_general_poblacion').val()=='') {
	    error=error+'Debe ingresar el Aspecto General Población<br>';
	}
	if ($('#Inspection_cer_plagas').val()=='') {
	    error=error+'Debe ingresar las Plagas<br>';
	}
	if ($('#Inspection_cer_aislamiento').val()=='') {
	    error=error+'Debe ingresar el Campo comercial (m)<br>';
	}
	if ($('#Inspection_cer_otra_cultivar').val()=='') {
	    error=error+'Debe ingresar la Otra Cultivar (m)<br>';
	}
	if ($('#Inspection_cer_otra_categoria').val()=='') {
	    error=error+'Debe ingresar Otra Categoria (m)<br>';
	}
	if ($('#Inspection_cer_plantas_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_cer_otras_especies').val()=='') {
	    error=error+'Debe ingresar Otras Especies<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar Observaciones<br>';
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
	if ($('#Inspection_size').val()=='') {
	    error=error+'Debe ingresar Area(m2)<br>';
	}
	if ($('#Inspection_cer_fecha_siembra').val()=='') {
	    error=error+'Debe ingresar la Fecha de Siembra<br>';
	}
	if ($('#Inspection_cer_floracion').val()=='') {
	    error=error+'Debe ingresar la Floración (%)<br>';
	}
	if ($('#Inspection_cer_maduracion').val()=='') {
	    error=error+'Debe ingresar el Maduración (%)<br>';
	}
	if ($('#Inspection_arz_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar la Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_cer_cantidad_semilla').val()=='') {
	    error=error+'Debe ingresar la cantidad de semillas (kg)<br>';
	}
	if ($('#Inspection_cer_inflorecencias_otros_cultivares').val()=='') {
	    error=error+'Debe ingresar la inflorecencias de otros cultivares<br>';
	}
	if ($('#Inspection_cer_inflorecencias_otros_cultivares_menores').val()=='') {
	    error=error+'Debe ingresar la Inflorecencias de Otros Cultivares Menores<br>';
	}
	if ($('#Inspection_cer_carbon_apestoso').val()=='') {
	    error=error+'Debe ingresar el Carbón Apestoso<br>';
	}
	if ($('#Inspection_cer_carbon_cubierto').val()=='') {
	    error=error+'Debe ingresar el Carbón Cubierto<br>';
	}
	if ($('#Inspection_cer_carbon_volador').val()=='') {
	    error=error+'Debe ingresar el Carbón Volador<br>';
	}
	if ($('#Inspection_cer_cornezuelo').val()=='') {
	    error=error+'Debe ingresar la Cornezuelo<br>';
	}
	if ($('#Inspection_cer_mancha_foliar').val()=='') {
	    error=error+'Debe ingresar la Mancha Foliar<br>';
	}
	if ($('#Inspection_cer_escaldadura').val()=='') {
	    error=error+'Debe ingresar la Escaldadura<br>';
	}
	if ($('#Inspection_cer_presencia_maleza_nocivas').val()=='') {
	    error=error+'Debe ingresar la Presencia Malezas Nocivas<br>';
	}
	if ($('#Inspection_cer_aspecto_general_poblacion').val()=='') {
	    error=error+'Debe ingresar el Aspecto General Población<br>';
	}
	if ($('#Inspection_cer_plagas').val()=='') {
	    error=error+'Debe ingresar las Plagas<br>';
	}
	if ($('#Inspection_cer_aislamiento').val()=='') {
	    error=error+'Debe ingresar el Campo comercial (m)<br>';
	}
	if ($('#Inspection_cer_otra_cultivar').val()=='') {
	    error=error+'Debe ingresar la Otra Cultivar (m)<br>';
	}
	if ($('#Inspection_cer_otra_categoria').val()=='') {
	    error=error+'Debe ingresar Otra Categoria (m)<br>';
	}
	if ($('#Inspection_cer_plantas_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_cer_otras_especies').val()=='') {
	    error=error+'Debe ingresar Otras Especies<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar Observaciones<br>';
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
	if ($('#Inspection_size').val()=='') {
	    error=error+'Debe ingresar Area(m2)<br>';
	}
	if ($('#Inspection_cer_fecha_siembra').val()=='') {
	    error=error+'Debe ingresar la Fecha de Siembra<br>';
	}
	if ($('#Inspection_cer_floracion').val()=='') {
	    error=error+'Debe ingresar la Floración (%)<br>';
	}
	if ($('#Inspection_cer_maduracion').val()=='') {
	    error=error+'Debe ingresar el Maduración (%)<br>';
	}
	if ($('#Inspection_arz_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar la Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_cer_cantidad_semilla').val()=='') {
	    error=error+'Debe ingresar la cantidad de semillas (kg)<br>';
	}
	if ($('#Inspection_cer_inflorecencias_otros_cultivares').val()=='') {
	    error=error+'Debe ingresar la inflorecencias de otros cultivares<br>';
	}
	if ($('#Inspection_cer_inflorecencias_otros_cultivares_menores').val()=='') {
	    error=error+'Debe ingresar la Inflorecencias de Otros Cultivares Menores<br>';
	}
	if ($('#Inspection_cer_carbon_apestoso').val()=='') {
	    error=error+'Debe ingresar el Carbón Apestoso<br>';
	}
	if ($('#Inspection_cer_carbon_cubierto').val()=='') {
	    error=error+'Debe ingresar el Carbón Cubierto<br>';
	}
	if ($('#Inspection_cer_carbon_volador').val()=='') {
	    error=error+'Debe ingresar el Carbón Volador<br>';
	}
	if ($('#Inspection_cer_cornezuelo').val()=='') {
	    error=error+'Debe ingresar la Cornezuelo<br>';
	}
	if ($('#Inspection_cer_mancha_foliar').val()=='') {
	    error=error+'Debe ingresar la Mancha Foliar<br>';
	}
	if ($('#Inspection_cer_escaldadura').val()=='') {
	    error=error+'Debe ingresar la Escaldadura<br>';
	}
	if ($('#Inspection_cer_presencia_maleza_nocivas').val()=='') {
	    error=error+'Debe ingresar la Presencia Malezas Nocivas<br>';
	}
	if ($('#Inspection_cer_aspecto_general_poblacion').val()=='') {
	    error=error+'Debe ingresar el Aspecto General Población<br>';
	}
	if ($('#Inspection_cer_plagas').val()=='') {
	    error=error+'Debe ingresar las Plagas<br>';
	}
	if ($('#Inspection_cer_aislamiento').val()=='') {
	    error=error+'Debe ingresar el Campo comercial (m)<br>';
	}
	if ($('#Inspection_cer_otra_cultivar').val()=='') {
	    error=error+'Debe ingresar la Otra Cultivar (m)<br>';
	}
	if ($('#Inspection_cer_otra_categoria').val()=='') {
	    error=error+'Debe ingresar Otra Categoria (m)<br>';
	}
	if ($('#Inspection_cer_plantas_fuera_tipo').val()=='') {
	    error=error+'Debe ingresar Plantas fuera de tipo<br>';
	}
	if ($('#Inspection_cer_otras_especies').val()=='') {
	    error=error+'Debe ingresar Otras Especies<br>';
	}
	if ($('#Inspection_observaciones').val()=='') {
	    error=error+'Debe ingresar Observaciones<br>';
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
</script>





















