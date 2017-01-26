

<h1>Campos Inscritos</h1>
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/latest/loadingoverlay.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/latest/loadingoverlay_progress.min.js"></script>
<script src=" //cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<div class="table-responsive">
    <table id="campos" class="display table table-bordered table-striped table-condensed table-hover" cellspacing="0" >
	<thead>
	    <tr>
		<th>Fecha de solicitud</th>
		<th>Cultivo / Cultivar</th>
		<th>Categoria</th>
		<th>Ubicación</th>
		<th>Acciones</th>
	    </tr>
	</thead>
	<tbody></tbody>
    </table>
</div>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	//'template'=>'{items} {pager}',
	'itemView'=>'_view',
));*/ ?>
<?php $listado=CController::createUrl('iform/listadocampo'); ?>
<script>
    
    var tblresultjs;
        var configDTjs={
            "order": [[ 2, "desc" ]],
                "language": {
                    "sProcessing":    "Procesando...",
                    "sLengthMenu":    "Mostrar _MENU_ registros",
                    "sZeroRecords":   "No se encontraron resultados",
                    "sEmptyTable":    "Ningun dato disponible en esta lista",
                    "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":   "",
                    "sSearch":        "Buscar:",
                    "sUrl":           "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":    "Último",
                        "sNext":    "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
        };
    $(document).ready(function() {
        
        $.ajax({
            url:'<?= $listado ?>',
            async:false,
            data:{},
            beforeSend:function()
            {
                $('.table-responsive').LoadingOverlay("show");
            },
            success:function(result)
            {
                    //$tblresultjs.destroy();//
                    $("#campos tbody").html(result);
                    $('#campos').DataTable(configDTjs);
                    //tblresultjs=$('#example').DataTable(configDTjs);
                    $('.table-responsive').LoadingOverlay("hide",true);
            },
            error:function(){
                $('.table-responsive').LoadingOverlay("hide",true);
                alert('Error al realizar el proceso de busqueda.');
            }
        });
        
    } );
</script>
