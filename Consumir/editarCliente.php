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
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">account_circle</i>
              <input id="name" type="text" class="validate" name="name" >
              <label for="name">Name</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">account_box</i>
              <input id="legal_document" type="text" class="validate" name="legal_document">
              <label for="legal_document" > Cédula Jurídica</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">toys</i>
              <input id="web_page" type="text" class="validate" name="web_page">
              <label for="web_page">Página Web</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">vpn_key</i>
              <input id="adress" type="text" class="validate" name="adress">
              <label for="adress"> Dirección Física</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">verified_user</i>
              <input id="phone" type="text" class="validate" name="phone">
              <label for="phone">Número de Telefono</label>
            </div>
         <div class="row">
            <div class="input-field col s12 m6 offset-m3">
            <i class="material-icons prefix">group</i>
              <select id = "sector">
                <option value="" disabled selected>Choose your option</option>
                <option value="agropecuario">Educación</option>
                <option value="industrial">Industria</option>
                <option value="publico">Agricultura</option>  
                <option value="publico">Manufactura</option>  
                <option value="publico">Servicios</option>  
                <option value="publico">Otros</option>  





              </select>
              <label>Sector</label>
            </div>
            </div>
          <div class="row">
            <div class="form-control">
              <a class="waves-effect waves-light btn" onclick="actualizaCliente(<?php echo $_GET["id_client"]?>);" >Actualizar</a>
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
    
    /*recoger los datos de cliente con el id*/
     var id= "<?php echo $_GET["id_client"]  ?>";
    $.ajax({
     
    
    method:"GET",
    url:"http://localhost:3000/clients/"+id,
    success:function(response){
    //  alert(response)
    datos=Object.values(response);
    $("#name").val(datos[1]);
    $("#legal_document").val(datos[2]);
    $("#web_page").val(datos[3]);
    $("#adress").val(datos[4]);
    $("#phone").val(datos[5]);
    $("#username").val(datos[6]);
    
    
    $("#sector").val(datos[4]).formSelect();
    M.updateTextFields();
    }
    })
    });
      </script>
  </body>
</html>