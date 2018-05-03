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
              <input id="meeting_title" type="text" class="validate" name="meeting_title" >
              <label for="meeting_title">Meeting title</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_box</i>
              <input id="meeting_date" type="text" class="datepicker" name="meeting_date">
              <label for="meeting_date" > Meeting date</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">toys</i>
              <input id="user_id" type="text" class="validate" name="user_id">
              <label for="user_id"> User ID</label>
            </div>
             <div class="input-field col s6">
              <select id="boolean">
                <option value="" disabled selected>Choose your option</option>
                <option value="true">Virtual</option>
                <option value="false">No Virtual</option>
                
              </select>
              
            </div>
            
        
          </div>
          <div class="row">
            <div class="form-control">
              <a class="waves-effect waves-light btn" onclick="crearReunion();">Crear Reunion</a>
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
     $('.datepicker').datepicker();



    });
    </script>
  </body>
</html>