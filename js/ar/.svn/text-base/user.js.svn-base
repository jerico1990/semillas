 function validarUsuario(){
                    name= $('#name').val();
                    
                    error= "";
                    
                    if($("#name").val() == ""){
                       error="El campo nombre esta vacio";
                    }
                    
                    
                    $.ajax({
                            //beforeSend:textreplace(description),
                            type: "POST",
                            url: "user/create",
                            data: dataString,
                            //context: '#respuesta',
                            success: function() {
                             $('#respuesta').html("hola");
                            },
                            error: function() {
                              $('#respuesta').html(error);
                            }
                          });
                   
                  
  
            }



