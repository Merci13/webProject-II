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
    <div class="navbar">
      <nav>
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo center">Merci13</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            
            <li><a href="login.php">Login</a></li>
           
            
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
      <div class="row">
        <form class="col s12" method="POST">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="username" type="text" class="validate input-field inline" name="username" >
              <label for="username">Username</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">vpn_key</i>
              <input id="password" type="tel" class="validate input-field inline" name="password">
              <label for="password">Pasword</label>
            </div>
          </div>
          <div class="row">
            <div class="form-control">
              <a name="submit" class="waves-effect waves-light btn" onclick="datos()">Enviar </a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Compiled and minified JavaScript, and Jquery 3 -->
    
    <script type="text/javascript">
    function datos(){
    var username= $('#username').val();
    var password= $('#password').val();
    login(username,password);
    }
    </script>
    
  </body>
</html>