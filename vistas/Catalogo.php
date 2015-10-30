 <script type="text/javascript">

/*
      $("a.carro").on('click',function(){
      console.log("sdnsdn");
          
      });*/

      function editar(){
       // $('section.hola').load('../concesionario/vistas/Carro.php');
       $('#idCarro').val('1');
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

                                  var tipocarro=respuestaPHP[i].data.tipocarro;
                                  var marca=respuestaPHP[i].data.marca;
                                  var capacidad=respuestaPHP[i].data.capacidad;
                                  var preciorenta=respuestaPHP[i].data.preciorenta;
                                  var color=respuestaPHP[i].data.color;
                                  var kilometraje=respuestaPHP[i].data.kilometraje;
                                  var disponibilidad=respuestaPHP[i].data.disponibilidad;

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
                                                  '<p>Here is some more information about this product that is only revealed once clicked on.</p>'+
                                                '<a class="btn-floating btn-large waves-effect waves-light red carro" onclick="editar();"><i class="material-icons">mode_edit</i></a>'+
                                                '</div>'+
                                                '</div>'+
                                               '</div>';

                                     $(".listaCarros").html(cardCarro);

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