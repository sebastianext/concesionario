<script type="text/javascript">
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
                              onsole.log("dentro del else success");    
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
            </div>
      </div>
</div>