<script type="text/javascript">
    
                 

  function facturar(accion){
     
    var cedula=$(".input-cedula").val();
    var placa=$(".input-placa").val();
    var horas=$(".input-horas").val();
 
      $.ajax({
              url: '/concesionario/FacturaController/'+accion,
              type: 'POST',
              data: { 
                'name-input-cedula': cedula,
                'name-input-placa': placa,
              'name-input-horas': horas
              },

              dataType: 'json',
              success: function(respuestaPHP){
                            console.log("dentro del success");
                            if (respuestaPHP['resultado'] != null ) {
                              console.log("dentro del if  success"+respuestaPHP[1]);
                              Materialize.toast(respuestaPHP['resultado'], 5000);
                              $('section.hola').load('../concesionario/vistas/Facturacion.php');
                            }else{
                              console.log("dentro del else success");    
                            } 
                        }
      });
  }

</script>


<div class="row">
  <h4>Facturar Servicio</h4>
</div>
<div class="row">

      <div class="col s12 white border">

           
            
            <div class="row">
              <div class="input-field col s6">
                <input id="input-cedula" type="text" class="validate input-cedula">
                <label for="input-cedula">Cedula</label>
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
                <input id="input-horas" type="text" class="validate input-horas">
                <label for="input-horas">Horas</label>
              </div>
            </div>
   
            <div class="row">
               <a class="waves-effect blue btn btnfacturar" onclick="facturar('facturar')">Facturar</a>
               
            </div>
          
      </div>
</div>
