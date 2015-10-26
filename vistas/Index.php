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
  
      <link rel="stylesheet" href="css/style.css">
      <link href="css/materialize.min.css" rel="stylesheet">
          <!-- Place favicon.ico in the root directory -->
    <!-- script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script> 
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
      $(".menu1").on('click',function(){
        console.log("entro por cacas");
        $('div.hola').load('../concesionario/vistas/c.php');
      });





 $('.button-collapse').sideNav({
      menuWidth: 240, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );


    });


 

   
  </script>
  <body>
<nav>
      <ul id="slide-out" class="side-nav fixed">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
  <div class="hola">


  </div>


  <section>
  </section>

  <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>