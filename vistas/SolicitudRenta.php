

<script type="text/javascript">
    

    /*$(document).ready(function(){
        
        
    });*/


     $('.datepicker').pickadate({
        selectHour: true,
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
      });
                      $.ajax({
                          url: '/concesionario/SolicitudRentaController/obtenerSelectClientes',
                          type: 'POST',
                            success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP!= null ) {
                              
                              console.log("dentro del if  success");
                              $(".select-clientes").html(respuestaPHP);
                              
                            }else{
                              console.log("dentro del else success");
                              alert('Error en el success');
                            }
                             
                          }
                      });        

  function guardar(accion){
    var id=$("#id").val(); 
    var fecha=$(".datepickerr").val();
    var kilometraje=$(".input-kilometraje").val();
    var cliente=$(".select-clientes").val();
 
      $.ajax({
              url: '/concesionario/SolicitudRentaController/'+accion,
              type: 'POST',
              data: { 
                'name-datepicker': fecha,
                'name-input-kilometraje': kilometraje,
              'name-select-clientes': cliente,
              'name-id':id
              },

              dataType: 'json',
              success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP['resultado'] != null ) {
                              console.log("dentro del if  success"+respuestaPHP[1]);
                              Materialize.toast(respuestaPHP['resultado'], 5000);
                              $("#reporteRentas").html(respuestaPHP['tabla']);
                            /*  $('#reporteRentas').DataTable(
          {
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Registro del _START_ al _END_ de _TOTAL_",
                "sInfoEmpty":     "No hay registros",
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
        }
        );*/
                              //$('section.hola').load('../concesionario/vistas/Catalogo.php');
                            }else{
                              console.log("dentro del else success");    
                            } 
                        }
      });
  }

  function edit(id){
                         
                            $.ajax({
                          url: '/concesionario/SolicitudRentaController/obtenerRenta',
                          type: 'POST',
                          data: { 'id': id,
                                  'key': 'edit-link'  },
                          dataType: 'json',
                          success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP!= null ) {
                              
                              console.log("dentro del if  success");
                              
                              
                            
                              $('#id').val(respuestaPHP.id);
                              $('.datepickerr').val(respuestaPHP.fecha);
                              $('.input-kilometraje').val(respuestaPHP.kilometraje);
                              $('.select-clientes').val(respuestaPHP.cliente);
                              
                            }else{
                              console.log("dentro del else success");
                              alert('Error en el success');
                            }
                             
                          }
                      });
                     }   

  function eliminar(accion){
       var placa=$("#id").val(); 

        if(true){
      $.ajax({
              url: '/concesionario/SolicitudRentaController/'+accion,
              type: 'POST',
              data: { 
              'name-id': placa
              },
              dataType: 'json',
              success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP['resultado'] != null ) {
                              console.log("dentro del if  success"+respuestaPHP[1]);
                              Materialize.toast(respuestaPHP['resultado'], 5000);
                              $("#reporteRentas").html(respuestaPHP['tabla']);
                            }else{
                              console.log("dentro del else success");    
                            } 
                        }
      });
    }else{
      console.log("afuera");
    }  
  }
             

</script>


<div class="row">
  <h4>Solicitud de Renta</h4>
</div>
<div class="row">

      <div class="col s12 white border">

            <input type="hidden" id="id" value="">
            <div class="row">
              <div class="col s12 m6">
                <label>Fecha</label>
                <input type="datetime-local" class="datepickerr" value="2015-01-01T12:00">
              </div>
            </div>
            
            <div class="row">
              <div class="input-field col s6">
                <input id="input-kilometraje" type="text" class="validate input-kilometraje">
                <label for="input-kilometraje">Kilometraje</label>
              </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <label>Cliente</label>
                    <select class="browser-default select-clientes">
                    </select>
                </div>
            </div>
   
 
            <div class="row">
               <a class="waves-effect blue btn btncrear" onclick="guardar('registrar')">Crear</a>
               <a class="waves-effect blue btn btnactualizar" onclick="guardar('actualizar')">Actualizar</a>
               <a class="waves-effect blue btn btneliminar" onclick="eliminar('eliminar')">Eliminar</a>
            </div>
      </div>


     <div class="row">
       <div class="col s12 white border">
        <table id="reporteRentas">
          <thead>
          <tr>
            <th>Editar</th>
            <th>Fecha</th>
            <th>kilometraje</th>
            <th>Cliente</th>
          </tr>
        </thead>
        </table>
        </div> 
     </div>  
</div>
