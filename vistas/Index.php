<!DOCTYPE html>
<!-- saved from url=(0052)http://getbootstrap.com/2.3.2/examples/carousel.html -->
<html lang="en">
<head>

   <title>Inicio</title>
    <!-- Meta -->
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

      <!-- html5 boilerplate -->
      <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="description" content="">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link css -->    
      <!-- html5 boilerplate -->
          <link rel="stylesheet" href="css/normalize.css">
          <link rel="stylesheet" href="css/main.css">
          <link rel="apple-touch-icon" href="apple-touch-icon.png">
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css">
      <link href="css/materialize.min.css" rel="stylesheet">
          <!-- Place favicon.ico in the root directory -->
    <!-- script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>

      <!-- html5 boilerplate -->
          <script src="js/vendor/modernizr-2.8.3.min.js"></script>

          <style type="text/css">



          header, main, footer,body {
            padding-left: 240px;
           
          }
          

          @media only screen and (max-width : 992px) {
            header, main, footer,body {
              padding-left: 0;
            }
  }

  </style>

  </head>


  <script>



    $(document).on('ready',function(){ 

      $('.button-collapse').sideNav({
            menuWidth: 240, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor
          }
        );

      $(".menu1").on('click',function(){
          $('section.hola').load('../concesionario/vistas/Catalogo.php');
      });

      $(".menu2").on('click',function(){
          $('section.hola').load('../concesionario/vistas/SolicitudRenta.php');
      });

       $(".menu3").on('click',function(){
          $('section.hola').load('../concesionario/vistas/Facturacion.php');
      });


       $("a.carro").on('click',function(){
          console.log("sdnsdn");
          $('section.hola').load('../concesionario/vistas/Carro.php');
      
       //$('section.hola').load('../concesionario/vistas/Catalogo.php');
      });


       


    });


  </script>
  <body>
    <nav class="blue">
      <ul id="slide-out" class="side-nav fixed">
        <li><a class="menu1" onclick="return false;">Catalogo de Carros</a></li>
        <li><a class="menu2" onclick="return false;">Solicitud de Rentas</a></li>        
        <li><a href="#!">Devoluciones</a></li>
        <li><a href="#!">Retribucion de Bonos</a></li>
        <li><a class="menu3" onclick="return false;">Facturacion</a></li>
        <li><a href="#!">Reportes</a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </nav>
    <input type="hidden" id="idCarro" value="">
  <section class="hola">
    <div >
     <h1 class="titulo center-align">Concesionario</h1>
    </div>

  </section>


 
  </body>
</html>