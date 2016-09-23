<?php
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/requirejs/require.2.1.8.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/app/start.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/OpenLayers/OpenLayers.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/css/style.css');
?>
<script src="http://maps.google.com/maps/api/js?sensor=false&v=3;"></script>
<style>
	.thing {
		background: #eee;
		height: 200px;
		margin-bottom: 20px;
	}
	.map {
		height: 400px;
		width: 400px;
		background: #eee;
	}
</style>
<script>
	
jQuery( document ).ready(function( $ ) {
	
			new_map = new OpenLayers.Map('map', {
				theme: null,
				zoomMethod: null,
				projection: 'EPSG:3857',
					layers: [
						new OpenLayers.Layer.Google(
						"Google Hybrid",
						{type: google.maps.MapTypeId.HYBRID, numZoomLevels: 20,  animationEnabled: false}
						)
					],
				center: new OpenLayers.LonLat(10.2, 48.9)
					.transform('EPSG:4326', 'EPSG:3857'),
				zoom: 5			
			});
			vector = new OpenLayers.Layer.Vector('vector');
			new_map.addLayers([vector]);
			
			pointLayer = new OpenLayers.Layer.Vector("Point Layer",
				{
               styleMap: new OpenLayers.StyleMap({
						pointRadius: 6, // based on feature.attributes.type
                  fillColor: "#ff0000"
               }),														  
			});
			new_map.addLayers([pointLayer]);
			
			point = new OpenLayers.Control.DrawFeature(
				pointLayer,
            OpenLayers.Handler.Point);
			
			
			point.featureAdded = function(e) {
				pointLayer.removeAllFeatures();
				pointLayer.drawFeature(e)
				console.log(pointLayer)
				console.log(e);
				$("#location_lon").val(e.geometry.x);
				$("#location_lat").val(e.geometry.y);
				
			}
			new_map.addControl(point);
	
	
	$('#crop_id').change(function(){		
		if($('#crop_id').val()==15){			
			$('#Iform_category').html('<option value="5">Basica 1</option>'+
						  '<option value="6">Basica 2</option>'+
						  '<option value="7">Registrada 1</option>'+
						  '<option value="8">Registrada 2</option>'+
						  '<option value="9">Certificada</option>'+
						  '<option value="10">Autorizada</option>'
						  );
		}
		else
		{
			return $('#Iform_category').html('<option value="1">Basica</option>'+
							'<option value="2">Registrada</option>'+
							'<option value="3">Certificada</option>'+
							'<option value="4">Autorizada</option>');
		}
	})
});
</script>

<?php
$ambitos = Headquarter::model()->with('users')->findAll('t.parent_id is null and users.type_id=5');
$heard = Headquarter::model()->with('users')->findAll('t.parent_id is null and users.type_id=5'); //:model()->findAll('parent_id is null');
$headquarters = CHtml::listData($heard,'id','name');
			
			
		  
		  
?>
<div class="form">
<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));*/
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'form-form',
    'htmlOptions'=>array('class'=>'well'),
    'enableClientValidation'=>true,
	 'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
	<p class="note">Campos <span class="required">*</span> requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	<h2>Semilla a Producir</h2>	
		<?php
			echo "Cultivo</br>";
			$crop = Crop::model()->findAll(array('condition'=>'parent is null and status=1'));
			 
			$list = CHtml::listData($crop,'id','name');
					 
			echo 	CHtml::dropDownList('crop_id',$model, $list,array('empty'=>'Seleccionar..',
				'ajax' => array(
				'type'=>'POST', //request type
				'url'=>CController::createUrl('crop/variedad'), //url to call.
				//'update'=>'#Iform_variety_id',
				'success' => 'function(data)
				{
				$("#Iform_variety_id").find("option").each(function(){
				$(this).remove();
				});																
				$("#Iform_variety_id").append(data);											
				console.log($("Iform_variety_id"));													
				}'))); 
		?>
		<?php echo $form->dropDownListRow($model,'variety_id', array(),array()); ?>
		<br>
		<?php
			$cropa = Crop::model()->findAll(array('condition'=>'parent is null and status=1'));
			$listaa = CHtml::listData($cropa,'id','name');
			echo "Cultivo anterior</br>";
			echo 	CHtml::dropDownList('crop_before_id',$model, $listaa,array('empty'=>'Seleccionar..',
				'ajax' => array(
				'type'=>'POST', //request type
				'url'=>CController::createUrl('crop/variedadanterior'), //url to call.
				//'update'=>'#Iform_variety_id',
				'success' => 'function(data)
				{
				$("#Iform_variety_before_id").find("option").each(function(){
				$(this).remove();
				});																
				$("#Iform_variety_before_id").append(data);											
				console.log($("aaa"));													
				}'))); 
		?>
		<?php echo $form->dropDownListRow($model,'variety_before_id', array(),array()); ?>
		
		<?php	echo $form->dropDownListRow($model, 'category', array(), array('empty'=>'Seleccionar..')); ?>
	<h2>Fuente de Origen</h2>	 			
			<table align="center" style="width:150px !important;">				
				<thead>
					<tr>
						<th>N° Control</th>
						<th>N° Etiqueta</th>
						<th>Cant.(kg)</th>
						<th>Documento</th>
						<th>Producido por</th>
						<th width="22">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td ><input id="Iform_source_control_0" name="Iform[source_control_0]" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>
						<td ><input id="Iform_source_etiqueta_0" name="Iform[source_etiqueta_0]" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>
						<td ><input id="Iform_source_cantidad_0" name="Iform[source_cantidad_0]" style="width:50px !important;" type="text" class="clsAnchoTotal"></td>
						<td ><input id="Iform_document_reference_0" name="Iform[document_reference_0]" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>
						<td ><input id="Iform_productor_0" name="Iform[productor_0]" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>
						<td align="right" ><input style="width:30px !important;" type="button" value="-" class="clsEliminarFila"></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" align="right">
							<input type="button" value="Agregar una fila" class="clsAgregarFila">							
						</td>
					</tr>
				</tfoot>
			</table>
		
	<h2>Campo de Multiplicacion</h2>
	<?php
		$departments = Location::model()->findAll(array(
				'select'   => 't.id, t.department, t.department_id',
				'group'    => 't.id,t.department',
				'order'	  => 't.department',
				'distinct' => true
			)); 
		$list = CHtml::listData($departments,'department_id','department');
	?>
	
	<ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#home">Ubicación</a></li>
	    <li><a data-toggle="tab" href="#menu1">Datos</a></li>
	</ul>
	  
	<div class="tab-content">
	    <div id="home" class="tab-pane fade in active">
		<div class="row-fluid">
		    <div class="span4">
			<label for="Iform_headquarter_id">Organismo Certificador</label>
			<select name="Iform[headquarter_id]" id="Iform_headquarter_id" onchange="Region($(this).val())">
			    <option value> </option>
			    <?php foreach($ambitos as $ambito){ ?>
				<option value="<?= $ambito->id ?>"><?= $ambito->name ?></option>
			    <?php } ?>
			</select>
		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span4">
			<label for="Iform_department_id">Departamento</label>
			<select name="Iform[department_id]" id="Iform_department_id" onchange="Provincias($(this).val())">
			    <option value>Seleccionar</option>
			</select>
			<div class="help-block error" id="Iform_department_id_em_" style="display:none">Departamento no es correcto.</div>
		    </div>
		    <div class="span8">
		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span4">
			<label for="Iform_province_id">Provincia</label>
			<select name="Iform[province_id]" id="Iform_province_id" onchange="Distritos($(this).val())">
			    <option value="">Seleccionar</option>
			</select>
			<div class="help-block error" id="Iform_province_id_em_" style="display:none">Provincia no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_id" class="required">Distrito <span class="required">*</span></label>
			<select name="Iform[location_id]" id="Iform_location_id">
			    <option value="">Seleccionar</option>
			</select>
			<div class="help-block error" id="Iform_location_id_em_" style="display:none">Distrito no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_annex" class="required">Anexo/Sector <span class="required">*</span></label>
			<input size="60" maxlength="100" name="Iform[location_annex]" id="Iform_location_annex" type="text">
			<div class="help-block error" id="Iform_location_annex_em_" style="display:none">Anexo/Sector no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
	    </div>
	    <div id="menu1" class="tab-pane fade">
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_annex" class="required">Nombre de Campo <span class="required">*</span></label>
			<input name="Iform[location_name]" id="Iform_location_name" type="text" maxlength="100">
			<div class="help-block error" id="Iform_location_annex_em_" style="display:none">Nombre de Campo no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_annex" class="required">Area (ha) <span class="required">*</span></label>
			<input size="18" maxlength="18" class="solicitud" name="Iform[area]" id="Iform_area" type="text">
			<div class="help-block error" id="Iform_location_annex_em_" style="display:none">Area (ha) no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_annex" class="required">Fecha Estimada de Siembra <span class="required">*</span></label>
			<input type="date"  name="Iform[seed_date]" id="Iform_seed_date">
			<div class="help-block error" id="Iform_location_annex_em_" style="display:none">Fecha Estimada de Siembra no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
		<div class="row-fluid">
		    <div class="span8">
			<label for="Iform_location_annex" class="required">Estimado de Cosecha (kg) <span class="required">*</span></label>
			<input class="solicitud" name="Iform[sow_estimate_quantity]" id="Iform_sow_estimate_quantity" type="text" maxlength="18">
			<div class="help-block error" id="Iform_location_annex_em_" style="display:none">Estimado de Cosecha (kg) no es correcto.</div>
		    </div>
		    <div class="span4"></div>
		</div>
	    </div>
	</div>

	<?php 	/*$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		//'htmlOptions'=>array('style'=>'height: 400px; width: 400px;'),
		'tabs'=>array(				
		array('label'=>'Ubicacion', 
			'content'=>
				
				"Región</br>".
				CHtml::dropDownList('department_id','', array(),
						    array(
							  'ajax' => array(
									  'type'=>'GET', //request type
									  'url'=>CController::createUrl('location/provinces'), //url to call.
									  'update'=>'#province_id', //selector to update
									  'data'   => 'js:$("#department_id").val()'
									  ))).
				"</br>".
				"Provincia</br>".
				CHtml::dropDownList('province_id','', array(),
						    array(
							  'ajax' => array(
									'type'=>'GET', //request type
									'url'=>CController::createUrl('location/districts'), //url to call.
									'update' => '#Iform_location_id',
									'data'   => 'js:$("#province_id").val()'
									))).			   
				$form->dropDownListRow($model,'location_id',array(), array('ajax'   => array(
									'type'    => 'GET', 
									'url'     => CController::createUrl('location/district'),
									'data'    => 'js:$("#Iform_location_id").val()',
									'success' => 'js:function(e){
										eval("data = " + e);
										vector.removeAllFeatures();
										pointLayer.removeAllFeatures();
										
										
										point.activate();

										var wkt = new OpenLayers.Format.WKT;
										var f = wkt.read(data.wkt);
										vector.addFeatures([f]);
										new_map.zoomToExtent(f.geometry.bounds);
					
										
										OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                
											defaultHandlerOptions: {
												"single": true,
												"double": false,
												"pixelTolerance": 0,
												"stopSingle": false,
												"stopDouble": false
											},
		
											initialize: function(options) {
												this.handlerOptions = OpenLayers.Util.extend(
													{}, this.defaultHandlerOptions
												);
												OpenLayers.Control.prototype.initialize.apply(
													this, arguments
												); 
												this.handler = new OpenLayers.Handler.Click(
													this, {
													"click": this.trigger
												}, this.handlerOptions
												);
											}, 
		
											trigger: function(e) {
												var lonlat = new_map.getLonLatFromPixel(e.xy);
												$("#location_lon").val(lonlat.lon);
												$("#location_lat").val(lonlat.lat);
											}
										});					
					
									var click = new OpenLayers.Control.Click();
									new_map.addControl(click);
									click.activate();
									}'
									))).
				$form->textFieldRow($model,'location_annex',array('size'=>60,'maxlength'=>100)).
				"<div class='map' id='map' style='height: 400px; width: 100%;'></div>",
				'active'=>true
				),
		array('label'=>'Datos',
			'content'=>								
				$form->textFieldRow($model,'location_name').				
				$form->textFieldRow($model,'area',array('size'=>18,'maxlength'=>18,'class'=>'solicitud')).							
				$form->datepickerRow($model,'seed_date',
						     array(//'prepend'=>'<i class="icon-calendar"></i>',
								'options'=>array( 'format' => 'dd-mm-yyyy', 
								'weekStart'=> 1,
								'showButtonPanel' => true,
								'showAnim'=>'fold',))).	
				$form->textFieldRow($model,'sow_estimate_quantity',array('class'=>'solicitud'))
				//$form->textFieldRow($model,'last_crop')
				//'active'=>true
				),
		),
	)); */ ?>
	<?php echo CHtml::hiddenField('location_lon'); ?>
	<?php echo CHtml::hiddenField('location_lat'); ?>
	
	<!--<input id="location_lon" />
	<input id="location_lat" />-->
	
	<h2>Agricultor Multiplicador</h2>
	
			<table align="center" style="width:150px !important;">
				
				<thead>
					<tr>
						<th>Nombre / Razón Social</th>
						<!--<th>Apellidos</th>-->
						<th>N° de Documento</th>
						<th width="22">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td ><input id="Iform_farmers_nombre_0" name="Iform[farmers_nombre_0]" style="width:350px !important;" type="text" class="clsAnchoTotal"></td>
						<!--<td ><input id="Iform_farmers_apellidos_0]" name="Iform[farmers_apellidos_0]" style="width:170px !important;" type="text" class="clsAnchoTotal"></td>-->
						<td ><input id="Iform_farmers_dni_0]" name="Iform[farmers_dni_0]" style="width:120px !important;" type="text" class="clsAnchoTotal"></td>
						<td align="right" ><input style="width:50px !important;" type="button" value="-" class="clsEliminarFila"></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" align="right">
							<input type="button" value="Agregar una fila" class="clsAgregarFilaagricultor">
							<!--<input type="button" value="Clonar la tabla" class="clsClonarTabla">
							<input type="button" value="Eliminar la tabla" class="clsEliminarTabla">-->
						</td>
					</tr>
				</tfoot>
			</table>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Crear' : 'Guardar','htmlOptions'=>array('class'=>'span2 offset8',))); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'danger','buttonType'=>'link','url'=>array('index'), 'label'=>'Cancelar','htmlOptions'=>array('class'=>'span2',))); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<?php
$provincias=CController::createUrl('location/provinces');
$distritos=CController::createUrl('location/districts');
$filtrardep=CController::createUrl('location/filtrardep');
?>
<script>
	function Region(valor) {
	    $.get( "<?= $filtrardep ?>?ambito="+valor, function( data ) {$( "#Iform_department_id" ).html( data );});
	}
	
	function Provincias(valor) {
	    $.get( "<?= $provincias ?>?departamento="+valor, function( data ) {$( "#Iform_province_id" ).html( data );});
	    $("#Iform_province_id").find("option").remove().end().append("<option value></option>").val("");
	    $("#Iform_location_id").find("option").remove().end().append("<option value></option>").val("");
	}
	
	function Distritos(valor) {
	    $.get( "<?= $distritos ?>?provincia="+valor, function( data ) {$( "#Iform_location_id" ).html( data );});
	    $("#Iform_location_id").find("option").remove().end().append("<option value></option>").val("");
	}
	$('.solicitud').on('blur', function(){
		$('#Iform_area').val(numeral($('#Iform_area').val()).format('0,0.00'));
		$('#Iform_sow_estimate_quantity').val(numeral($('#Iform_sow_estimate_quantity').val()).format('0,0.00'));
	});
	$(document).ready(function(){
	//
	
	
	
	$(document).on('click','caption',function(){
		//obtener la tabla que contiene el caption clickeado
		var objTabla=$(this).parent();
			//el cuerpo de la tabla esta visible?
			//lo siguiente es unicamente para cambiar el icono del caption
			if(objTabla.find('tbody').is(':visible')){
				//eliminamos la clase clsContraer
				$(this).removeClass('clsContraer');
				//agregamos la clase clsExpandir
				$(this).addClass('clsExpandir');
			}else{
				//eliminamos la clase clsExpadir
				$(this).removeClass('clsExpandir');
				//agregamos la clase clsContraer
				$(this).addClass('clsContraer');
			}
			//mostramos u ocultamos el cuerpo de la tabla
			objTabla.find('tbody').toggle();
	});
	
	var a=1;	
	//evento que se dispara al hacer clic en el boton para agregar una nueva fila
	$(document).on('click','.clsAgregarFila',function(){
		//almacenamos en una variable todo el contenido de la nueva fila que deseamos
		//agregar. pueden incluirse id's, nombres y cualquier tag... sigue siendo html
		var strNueva_Fila='<tr>'+
			'<td><input id="Iform_source_control_'+a+'" name="Iform[source_control_'+a+']" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td><input id="Iform_source_etiqueta_'+a+'" name="Iform[source_etiqueta_'+a+']" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td><input id="Iform_source_cantidad_'+a+']" name="Iform[source_cantidad_'+a+']" style="width:50px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td><input id="Iform_document_reference_'+a+']" name="Iform[document_reference_'+a+']" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td><input id="Iform_productor_'+a+']" name="Iform[productor_'+a+']" style="width:100px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td align="right"><input style="width:30px !important;" type="button" value="-" class="clsEliminarFila"></td>'+
		'</tr>';
				
		/*obtenemos el padre del boton presionado (en este caso queremos la tabla, por eso
		utilizamos get(3)
			table -> padre 3
				tfoot -> padre 2
					tr -> padre 1
						td -> padre 0
		nosotros queremos utilizar el padre 3 para agregarle en la etiqueta
		tbody una nueva fila*/
		var objTabla=$(this).parents().get(3);
				
		//agregamos la nueva fila a la tabla
		$(objTabla).find('tbody').append(strNueva_Fila);
				
		//si el cuerpo la tabla esta oculto (al agregar una nueva fila) lo mostramos
		if(!$(objTabla).find('tbody').is(':visible')){
			//le hacemos clic al titulo de la tabla, para mostrar el contenido
			$(objTabla).find('caption').click();
		}
		a++;
	});
	var b=1;
	$(document).on('click','.clsAgregarFilaagricultor',function(){
		//almacenamos en una variable todo el contenido de la nueva fila que deseamos
		//agregar. pueden incluirse id's, nombres y cualquier tag... sigue siendo html
		var strNueva_Fila='<tr>'+
			'<td><input id="Iform_farmers_nombre_'+b+'" name="Iform[farmers_nombre_'+b+']" style="width:350px !important;" type="text" class="clsAnchoTotal"></td>'+
			//'<td><input id="Iform_farmers_apellidos_'+b+'" name="Iform[farmers_apellidos_'+b+']" style="width:170px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td><input id="Iform_farmers_dni_'+b+'" name="Iform[farmers_dni_'+b+']" style="width:120px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td align="right"><input style="width:50px !important;" type="button" value="-" class="clsEliminarFila"></td>'+
		'</tr>';
				
		/*obtenemos el padre del boton presionado (en este caso queremos la tabla, por eso
		utilizamos get(3)
			table -> padre 3
				tfoot -> padre 2
					tr -> padre 1
						td -> padre 0
		nosotros queremos utilizar el padre 3 para agregarle en la etiqueta
		tbody una nueva fila*/
		var objTabla=$(this).parents().get(3);
				
		//agregamos la nueva fila a la tabla
		$(objTabla).find('tbody').append(strNueva_Fila);
				
		//si el cuerpo la tabla esta oculto (al agregar una nueva fila) lo mostramos
		if(!$(objTabla).find('tbody').is(':visible')){
			//le hacemos clic al titulo de la tabla, para mostrar el contenido
			$(objTabla).find('caption').click();
		}
		b++;
	});
	//cuando se haga clic en cualquier clase .clsEliminarFila se dispara el evento
	$(document).on('click','.clsEliminarFila',function(){
		/*obtener el cuerpo de la tabla; contamos cuantas filas (tr) tiene
		si queda solamente una fila le preguntamos al usuario si desea eliminarla*/
		var objCuerpo=$(this).parents().get(2);
			if($(objCuerpo).find('tr').length==1){
				if(!confirm('Esta es el Ãºnica fila de la lista Â¿Desea eliminarla?')){
					return;
				}
			}
					
		/*obtenemos el padre (tr) del td que contiene a nuestro boton de eliminar
		que quede claro: estamos obteniendo dos padres
					
		el asunto de los padres e hijos funciona exactamente como en la vida real
		es una jergarquia. imagine un arbol genealogico y tendra todo claro ;)
				
			tr	--> padre del td que contiene el boton
				td	--> hijo de tr y padre del boton
					boton --> hijo directo de td (y nieto de tr? si!)
		*/
		var objFila=$(this).parents().get(1);
			/*eliminamos el tr que contiene los datos del contacto (se elimina todo el
			contenido (en este caso los td, los text y logicamente, el boton */
			$(objFila).remove();
	});
	
	
	
			
});
	
	
</script>





