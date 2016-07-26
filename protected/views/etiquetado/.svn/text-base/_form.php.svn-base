
<br>
<!--Generar Muestreo-->
<div class="row-fluid well">
	<div class='row-fluid'>      
      <div class="form">
         <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
               'id'=>'etiquetado-form',
            ));
         ?>
         
         <div class="row-fluid">			 				
			   <div class="span12"><?php echo $form->textFieldRow($model,'peso_total',array('class'=>'etiquetado')); ?></div>			
			</div> 
        
         
         
         <table align="center" style="width:150px !important;">				
				<thead>
					<tr>
						<th>Cantidad</th>
						<th>Numeración del</th>
						<th>Numeración al</th>
						<th width="22">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td ><input id="Etiquetado_cantidad_0" name="Etiquetado[cantidad_0]" style="width:170px !important;" type="text" class="clsAnchoTotal"></td>
						<td ><input id="Etiquetado_inicio_0" name="Etiquetado[inicio_0]" style="width:170px !important;" type="text" class="clsAnchoTotal"></td>
						<td ><input id="Etiquetado_fin_0" name="Etiquetado[fin_0]" style="width:90px !important;" type="text" class="clsAnchoTotal"></td>
						<td align="right" ><input style="width:50px !important;" type="button" value="-" class="clsEliminarFila"></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" align="right">
							<input type="button" value="Agregar una fila" class="clsAgregarFila">
							<!--<input type="button" value="Clonar la tabla" class="clsClonarTabla">
							<input type="button" value="Eliminar la tabla" class="clsEliminarTabla">-->
						</td>
					</tr>
				</tfoot>
			</table>
         
        
         
         
         
         <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">																							 
                  <div class="row buttons">
                     <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','htmlOptions'=>array('class'=>'span3',),'buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Emitir Acta' : 'Emitir Acta')); ?>
                  </div>   
               </div>
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
			'<td><input id="Etiquetado_cantidad_'+a+'" name="Etiquetado[cantidad_'+a+']" style="width:170px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td><input id="Etiquetado_inicio_'+a+'" name="Etiquetado[inicio_'+a+']" style="width:170px !important;" type="text" class="clsAnchoTotal"></td>'+
			'<td><input id="Etiquetado_fin_'+a+']" name="Etiquetado[fin_'+a+']" style="width:80px !important;" type="text" class="clsAnchoTotal"></td>'+
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
		a++;
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
