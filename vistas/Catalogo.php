 <script type="text/javascript">


      $("a.carro").on('click',function(){
      
      $('#idCarro').val('');
          $('section.hola').load('../concesionario/vistas/Carro.php');
      });

      function editar(id){
       
       $('#idCarro').val(id);
         $.ajax({
              url: '/concesionario/vistas/Carro.php',
              
              success: function(data){
                $('section.hola').html(data);
                            console.log("dentro success rediret");

                        }
              });

      }
      $.ajax({
                          url: '/concesionario/CatalogoController/obtenerCarros',
                          type: 'POST',
                              success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP!= null ) {
                              
                              console.log("dentro del if  success");
                              console.log(respuestaPHP);



                              $.each(respuestaPHP, function(i, item) {
                                  var id=respuestaPHP[i].data.id;
                                  var tipocarro=respuestaPHP[i].data.tipocarro;
                                  var marca=respuestaPHP[i].data.marca;
                                  var capacidad=respuestaPHP[i].data.capacidad;
                                  var preciorenta=respuestaPHP[i].data.preciorenta;
                                  var color=respuestaPHP[i].data.color;
                                  var kilometraje=respuestaPHP[i].data.kilometraje;
                                  var disponibilidad=respuestaPHP[i].data.disponibilidad;
                                  

                                  var  disponibilidad2='';
                                  /*
                                  if (disponibilidad==1) {
                                    disponibilidad2='<i class="material-icons">done</i>';
                                  }else{
                                    disponibilidad2='<i class="material-icons">not_interested</i>';
                                  }*/

                                  if (disponibilidad==1) {
                                    disponibilidad2='Disponible';
                                  }else{
                                    disponibilidad2='Ocupado';
                                  }

                                  var  cardCarro= '<div class="col s12 m4">'+
                                                '<div class="card">'+
                                              '<div class="card-image waves-effect waves-block waves-light">'+
                                                ' <img class="activator" src="../concesionario/img/carro.jpg">'+
                                                '</div>'+
                                                  ' <div class="card-content">'+
                                                  '<span class="card-title activator grey-text text-darken-4">'+marca+'<i class="material-icons right">more_vert</i></span>'+
                                                  '<p><a href="#">link</a></p>'+
                                                '</div>'+
                                                  '<div class="card-reveal">'+
                                                  
                                                  '<span class="card-title grey-text text-darken-4">'+marca+'<i class="material-icons right">close</i></span>'+
                                                  '<p><b>Tipo de Carro: </b> '+tipocarro+'</br>'+
                                                  '<b>Precio de Renta: </b> $'+preciorenta+'</br>'+
                                                  '<b>Capacidad: </b> '+capacidad+'</br>'+
                                                  '<b>Color: </b> <span style="background:'+color+';border: 1px solid black; padding: 0px 0px 0px 50px;"></span></br>'+
                                                  '<b>Kilometraje: </b> '+kilometraje+'</br>'+
                                                  '<b>Disponibilidad: </b> '+disponibilidad2+'</p>'+
                                                '<a class="btn-floating btn-large waves-effect waves-light red" onclick="editar('+id+');"><i class="material-icons">mode_edit</i></a>'+
                                                '</div>'+
                                                '</div>'+
                                               '</div>';

                                     $(".listaCarros").append(cardCarro);

                                });

                                                        
                            
                            }else{
                              console.log("dentro del else success");
                              alert('Error en el success');
                            }
                             
                          }
                      });

      



  </script>
<div class="row"></div>
<div class="col s12 m12 white">
    <div class="row">
      <div class="col s12 m12 right-align">
        <a class="btn-floating btn-large waves-effect waves-light red margen-10 carro"><i class="material-icons">add</i></a>
      </div>
    </div>
    <div class="divider"></div>
    <div class="row listaCarros">
        
       
      </div>
</div>