<h1>Prueba 1</h1>
        <script>
            function fnSuccess(data){
                alert(data);
            }
            function fnError(e){
                alert("error: "+e.responseText);
            }
        </script>
        <?php echo CHtml::ajaxbutton(
            "Invocar un action via Ajax"
            ,array('bandeja/invocarUsandoAjax','prueba'=>'123')
            ,array('success'=>'js:fnSuccess','error'=>'js:fnError')
        ); ?>
<hr/>




<h1>Prueba 2</h1>
    <p id='enlaceX' style='cursor: pointer; color: darkred;'>[haz click aqui]</p>
    <p id='respuesta' style='cursor: pointer;'>[la respuesta se pondra aqui]</p>
    <script>
        $('#enlaceX').click(function(){
            $.getJSON('invocarUsandoAjaxPrueba2', 
            function(data) 
            {
                $("#respuesta").html("datos que llegan desde el server:");
                $("#respuesta").append("<ul id='unalista'></ul>");
                
                  $.each(data, function(key, val) {
                        $("#unalista").append("<li>"+val+"</li>");
                  });
            }
            ).error(function(e){
                $("#respuesta").html("algo salio mal: "+e.responseText);
            });
        });
    </script> 