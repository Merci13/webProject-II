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
<!-- A $( document ).ready() block.-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Segundo Proyecto</title>
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/materialize.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
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
    <!--Tabla-->
    <table class="striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Position</th>
          <th>Client ID</th>
        </tr>
      </thead>
      <tbody id="tbodyofUsers">
        
      </tbody>
    </table>
    
    <script>
    
    $(document).ready(function() {
    cargartablaContacto();
    });
    </script>
    <a class="btn-floating btn-large waves-effect waves-light green" href="agregarContacto.php"><i class="material-icons">add</i></a>
  </body>
</html>