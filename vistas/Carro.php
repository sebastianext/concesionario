<script type="text/javascript">
        var id=$('#idCarro').val();
        console.log("id carro: "+id);
            $.ajax({
              url: '/concesionario/CarroController/obtenerCarro',
              type: 'POST',
              data: { 'name-idcarro': id
              },
              dataType: 'json',
              success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP != null ) {
                              console.log("dentro del if  success"+respuestaPHP);

                              $('.select-tipo-carro').val(respuestaPHP.tipocarro);
                              $('.select-marca').val(respuestaPHP.marca);
                              $('.input-capacidad').val(respuestaPHP.capacidad);
                              $('.input-precio').val(respuestaPHP.preciorenta);
                              $('.input-color').val(respuestaPHP.color);
                              $('.input-placa').val(respuestaPHP.placa);
                              $('.input-kilometraje').val(respuestaPHP.kilometraje);
                              $('.select-disponibilidad').val(respuestaPHP.disponibilidad);
                              Materialize.toast(respuestaPHP.placa, 5000);
                            }else{
                              console.log("dentro del else success");    
                            } 
                        }
             });


  function guardar(accion){
    //var id=$(".input-usuario-id").val();
    var tipocarro=$(".select-tipo-carro").val();
    var marca=$(".select-marca").val();
    var capacidad=$(".input-capacidad").val();
    var precio=$(".input-precio").val();
    var color= $(".input-color").val();
    var placa=$(".input-placa").val();
    var kilometraje=$(".input-kilometraje").val();
    var disponibilidad=$(".select-disponibilidad").val();
    console.log("color"+ color);


    if(true){
      $.ajax({
              url: '/concesionario/CarroController/'+accion,
              type: 'POST',
              data: { 'name-select-tipo-carro': tipocarro,
              'name-select-marca': marca,
              'name-input-capacidad': capacidad,
              'name-input-precio': precio,
              'name-input-color': color,
              'name-input-placa': placa,
              'name-input-kilometraje': kilometraje, 
              'name-select-disponibilidad': disponibilidad
              },
              dataType: 'json',
              success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP['resultado'] != null ) {
                              console.log("dentro del if  success"+respuestaPHP[1]);
                              Materialize.toast(respuestaPHP['resultado'], 5000);
                            }else{
                              console.log("dentro del else success");    
                            } 
                        }
      });
    }else{
      console.log("afuera");
    }  
  }

  function eliminar(accion){
       var placa=$(".input-placa").val(); 

       console.log("color"+ color);

        if(true){
      $.ajax({
              url: '/concesionario/CarroController/'+accion,
              type: 'POST',
              data: { 
              'name-input-placa': placa
              },
              dataType: 'json',
              success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP['resultado'] != null ) {
                              console.log("dentro del if  success"+respuestaPHP[1]);
                              Materialize.toast(respuestaPHP['resultado'], 5000);
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
  <h4>Carro</h4>
</div>
<div class="row">

      <div class="col s3 blue-grey lighten-5 border">
        <!-- Grey navigation panel -->
       
        <div class="row">
          <div class="card">
          <div class="card-image">
              <img src="../concesionario/img/car.png">
            </div>
        </div>
        </div>
      </div>

      <div class="col s9 white border">
            <div class="row">
              <div class="col s12 m6">
                <label>Tipo de Carro</label>
                <select class="browser-default select-tipo-carro">
                  <option value="" disabled selected>Seleccionar...</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>
           
            <div class="row">
              <div class="col s12 m6">
                <label>Marca</label>
                <select class="browser-default select-marca">
                  <option value="" disabled selected>Seleccionar...</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input id="input-capacidad" type="number" class="validate input-capacidad">
                <label for="input-capacidad">Capacidad</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input id="input-precio" type="text" class="validate input-precio">
                <label for="input-precio">Precio de la Renta</label>
              </div>
            </div>

            <div class="row">
              <div class=" col s6">
                
                <input id="color" type="color" class="input-color">
                <label for="color" >Color</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input id="input-placa" type="text" class="validate input-placa">
                <label for="input-placa">Placa</label>
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
                    <label>Disponibilidad</label>
                    <select class="browser-default select-disponibilidad">
                      <option value="1">Disponible</option>
                      <option value="2">Ocupado</option>
                    </select>
                </div>
            </div>
            <div class="row">
               <a class="waves-effect blue btn" onclick="guardar('registrar')">Crear</a>
               <a class="waves-effect blue btn">Actualizar</a>
               <a class="waves-effect blue btn" onclick="eliminar('eliminar')">Eliminar</a>
            </div>
      </div>
</div>
<div class="row">
      <div class="col s12 m7">
        <div class="card">
          <form class="col s12">
            <div class="row">
              <span class="card-title black-text">Eliminar carro </span>
              <div class="card-action">
            </div>
             
            
              <div class="input-field col s6">
                <input id="icon_prefix" type="text" class="validate input-hu1" name="name-hu1">
                <label for="icon_prefix">Placa</label>
              </div>
               <div class="input-field col s6">
                  <a class="waves-effect waves-light btn" onclick="eliminar('eliminar')">Eliminar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>