   <nav>
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo center">Merci13</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="usuario.php">Usuarios</a></li>
          <li><a href="clientes.php">Clientes</a></li>
          <li><a href="reuniones.php">Reuniones</a></li>
          <li><a href="contactos.php">Contactos</a></li>
          <li><a href="tickets.php">Tickets</a></li>
          <li><a href="registrar.php">Nuevo Usuario</a></li>

          <li><a href="http://localhost/Consumir/usuario.php?salir='exit'">Logout</a></li>
     	  
        </ul>
        <a style="float:right; margin-right: 20px;"><?php echo $_SESSION["Usuario"][2] ?></a>
      </div>
    </nav>