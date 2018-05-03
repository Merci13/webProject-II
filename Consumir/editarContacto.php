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
              <input id="name" type="text" class="validate" name="name" >
              <label for="name">Name</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_box</i>
              <input id="lastname" type="text" class="validate" name="lastname">
              <label for="lastname" >LastName</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">toys</i>
              <input id="email" type="text" class="validate" name="email">
              <label for="email">Email</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">vpn_key</i>
              <input id="phone" type="text" class="validate" name="phone">
              <label for="phone">Phone</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">verified_user</i>
              <input id="position" type="text" class="validate" name="position">
              <label for="position">Position</label>
            </div>
           
          
           
          </div>
          <div class="row">
            <div class="form-control">
              <a class="waves-effect waves-light btn" onclick="actualizarContact(<?php echo $_GET["id_contact"]?>);" >Actualizar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Compiled and minified JavaScript, and Jquery 3 -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('select').formSelect();
    var id="<?php echo $_GET['id_contact']?>";
    $.ajax({
    
    method:"GET",
    url:"http://localhost:3000/contacts/"+id,
    success:function(response){
      datos=Object.values(response);

      $("#name").val(datos[1]);
      $("#lastname").val(datos[2]);
      $("#email").val(datos[3]);
      $("#phone").val(datos[4])
      $("#position").val(datos[5])
      
      
     
      M.updateTextFields();
    }
  })
    });
    </script>
  </body>
</html>