<?php
  session_start();
  if (isset($_GET["salir"])) {
    unset($_SESSION["Usuario"]);
  }
  if (isset($_GET["token"])&&isset($_GET["tipo"])&&isset($_GET["user"])) {//si existe token pase al siguiente
    $_SESSION["Usuario"][0]=$_GET["token"];
    $_SESSION["Usuario"][1]=$_GET["tipo"];
    $_SESSION["Usuario"][2]=$_GET["user"];
  }
  if (!isset($_SESSION["Usuario"])) {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Segundo Proyecto</title>
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/materialize.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    
    
  </head>
  <body>
    <!--navbar-->
        <!--navbar-->
      <div>
      <?php
      if (ltrim($_SESSION["Usuario"][1])=="admin") {
      include("nav-administrador.php");
      }else{
      include("nav-usuarios.php");
      }
      ?>
    </div>

    <div class="container">
      <div class="row">
        <form class="col s12" method="POST">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="problem_title" type="text" class="validate" name="problem_title" >
              <label for="problem_title">Problem_title</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_box</i>
              <input id="detail" type="text" class="validate" name="detail">
              <label for="detail"> detail</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">toys</i>
              <input id="who_report" type="text" class="validate" name="who_report">
              <label for="who_report"> Who Report</label>
            </div>
             <div class="input-field col s6">
              <i class="material-icons prefix">toys</i>
              <input id="client_id" type="text" class="validate" name="client_id">
              <label for="client_id"> Client id</label>
            </div> <div class="input-field col s6">
              <i class="material-icons prefix">toys</i>
              <input id="status" type="text" class="validate" name="status">
              <label for="status"> Status</label>
            </div>
            
          </div>
          <div class="row">
            <div class="form-control">
              <a class="waves-effect waves-light btn" onclick="crearTicket();">Crear Ticket</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Compiled and minified JavaScript, and Jquery 3 -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('select').formSelect();
    



    });
    </script>
  </body>
</html>