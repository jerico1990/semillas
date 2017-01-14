<?php
$contador=1;
?>
<div class="files">
    <div id="error_archivos" style="color: red"></div>
    
    <?php if(Yii::app()->user->checkAccess('productor')) { ?>
    <h2>Documentos</h2>
    <form method="post" enctype="multipart/form-data">
    <div style="color: red">Nota: Subir en formato .pdf, .jpg, .png con un tamaño maximo de 2MB.</div>
    <div id="error" style="color:red"></div>
    <button type="button" id="agregar_archivo" class="btn btn-primary">Agregar documento</button><br><br>
    <table class="table borderless table-hover" id="detalle_tabla_archivo" border="0">
        <thead>
            <tr>
		<th style="width:200px !important;">Nombre</th>
                <th style="width:300px !important;">Adjuntar</th>
                <th width="22px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr id='archivo_<?= $contador ?>'></tr>
        </tbody>
    </table>
    <input type="submit" id="subir" class="btn btn-primary" value="Subir">
        
    </form>
    <?php } ?>
    <h2>Historial</h2>
    <table class="table borderless table-hover" border="0">
        <thead>
            <tr>
                <th style="width:150px !important;">Archivo</th>
                <th style="width:50px !important;">Descargar</th>
                <?php if(Yii::app()->user->checkAccess('laboratorio')) { ?>
                <th width="22px">&nbsp;</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($files as $file){?>
            <tr>
                <td><?= $file->name ?> <input type="hidden" name="Files[nombres_archivos][]" value="<?= $file->name ?>" id="nombre_archivo_<?= $contador ?>"></td>
                <td><a target="_blank" href="<?= Yii::app()->baseUrl ?>\files\<?= $file->name_file ?>">Descargar</a></td>
                <?php if(Yii::app()->user->checkAccess('laboratorio')) { ?>
                <td><span class="eliminar icon-minus-sign" ><input name="Files[ids][]" type="hidden" value=<?= $file->id ?> ></span></td>
                <?php } ?>
            </tr>
            <?php }?>
            
        </tbody>
    </table>
</div>

<script>
    $("#subir").click(function(){
        var detalles_fuentes=$('input[name=\'Files[nombres_archivos][]\']').length;
	
	var error = '';
        for (i=1;i<=detalles_fuentes;i++) {
	    /*if ($.trim($('#nombre_archivo_'+i).val())=='') {
		error=error+'Debe ingresar la descripción del archivo n°'+i+'<br>';
	    
	    if ($('#archivo_'+i).val()=='') {
		error=error+'Debe adjuntar un archivo<br>';
	    }
	    */
	}
        if (error != '') {
	    $("#error_archivos").html(error);
            return false;
	}
        return true;
    });
    
    contador=<?= $contador ?>;
    $("#agregar_archivo").click(function(){
	var detalles_fuentes=$('input[name=\'Files[nombres_archivos][]\']').length;
	
	var error = '';
	
	for (i=1;i<=detalles_fuentes;i++) {
            /*
	    if ($.trim($('#nombre_archivo_'+i).val())=='') {
		error=error+'Debe ingresar la descripción del archivo n°'+i+'<br>';
	    }
	    
	    if ($('#archivo_'+i).val()=='') {
		error=error+'Debe adjuntar un archivo<br>';
	    }
	    */
	}
	
	if (error != '') {
	    $("#error_archivos").html(error);
            return false;
	}
	else
        {
	    var option = null;
            $('#archivo_'+contador).html(
					    '<td>'+
                                                '<input type="text" style="width:300px !important;" name="Files[name][]" >'+
					    '</td>'+
					    '<td>'+
                                                '<input type="file" style="width:300px !important;" name="Files[archivos][]" id="archivo_'+contador+'" onchange="Documento(this)">'+
					    '</td>'+
					    '<td>'+
						'<span class="eliminar icon-minus-sign" >'+
                                                '<input type="hidden" name="Files[ids][]">'+
						'</span>'+
					    '</td>');
            $('#detalle_tabla_archivo').append('<tr id="archivo_'+(contador+1)+'"></tr>');
            contador++;
            return true;
        }
        
        console.log(contador);
    });
    function Eliminar(id) {
        $.get( "<?php //= $eliminar ?>?id="+id, function( data ) {
            alert("Se ha eliminado el registro");
            return true;
        });
        return false;
    }
    
    $("#detalle_tabla_archivo").on('click','.eliminar',function(){
        var r = confirm("Estas seguro de Eliminar?");
        var mensaje = '';
        if (r == true) {
            id=$(this).children().val();
            if (id) {
                //$.post( "<?php //= $eliminarcronograma ?>", { id: id})
                $(this).parent().parent().remove();
            }
            else
            {
                $(this).parent().parent().remove();    
            }   
            mensaje = "Se elimino el Registro Correctamente";
        } 
    });
    
    
    function Documento(elemento) {
        var ext = $(elemento).val().split('.').pop().toLowerCase();
        var error='';
        if($.inArray(ext, ['pdf','jpg','png']) == -1) {
            error=error+'Solo se permite subir archivos con extensiones .docx,.doc';
        }
        if (error=='' && elemento.files[0].size/1024/1024>=2) {
            error=error+'Solo se permite archivos hasta 2 MB';
        }
        
        if (error!='') {
            $('#error').html(error);
            //fileupload = $('#equipo-foto_img');  
            //fileupload.replaceWith($fileupload.clone(true));
            $(elemento).replaceWith($(elemento).val('').clone(true));
            //$('#equipo-foto_img').val('');
            return false;
        }
        else
        {
            //mostrarImagen(this);
            return true;
        }
    }
</script>