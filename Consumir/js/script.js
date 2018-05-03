/*
  funcion para el login
  recibe el username y el password para poder iniciar
  redirige a la vista de usuarios.php

*/
function login(username,password){
  var user={
    "username":username,
    "password":password
  }
$.ajax({
  data:user,
  method:"POST",
  url:"http://localhost:3000/sessions",
  success:function(response){
   
    response=response.split(",");

      window.location.replace("http://localhost/Consumir/usuario.php?token="+response[0]+"&tipo="+response[1]+"&user="+response[2]);
  }
 
})

}


/*
  funcion para registrar un nuevo usuario en la base de datos utilizando la api
  recoge los valores porporcionados, los inserta en la base de datos y redirige 
  a la vista de usuario.php


*/
function registrar(){
var usuarioNuevo={
  "nombre":$("#name").val()
  }
  $.ajax({
    data:usuarioNuevo,
    method:"POST",
    url:"http://localhost:3000/users"
  })


}


/*
funcion para cargar la tabla de usuarios en la vista de usuario.


*/
function cargartablaUsuarios(ruta){

     $.ajax({
    url:"http://localhost:3000/"+ruta,
    type:"GET",
  
    datatype:"aplication/json",
    success:function(response){
        //agarrar los datos del response
      /*
         "id": 1,
        "name": "Juna",
        "last_name": "Rodri",
        "username": "asd",
        "user_type": "admin",
      */ 
      /*
         <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
      */
       //dividirlos en los campos tr
      for (var i = 0; i < response.length; i++) {
        //ponerlos en la tabla
          var tr =
          "<tr>"+
          "<td>"+ response[i].id +"</td>"+
          "<td>"+ response[i].name +"</td>"+ 
          "<td>"+ response[i].last_name +"</td>"+
          "<td>"+ response[i].username +"</td>"+
          "<td>"+ response[i].user_type +"</td>"+
             //agregar un btn con la info del usuario
           "<td><a class='btn green' href='editar.php?id_user="+response[i].id+"'> Editar </a>"+
            //hacerle el evento onclick al boton para poder hacer el crud de usuarios
            "<a onclick=eliminar('users',"+ response[i].id+") class='btn red'> Eliminar </a> </td></tr>"
             $("#tbodyofUsers").append(tr);
        }
   
    }

  });

}
/*
  metodo para eliminar desde culquier lado
  recibe la ruta ejemplo: users, clients
  recibe el id de lo que se quiere eliminar
*/

function eliminar(ruta,id){
/*borrar la sesion si existe*/
if (ruta=="users") {
  id_login="<?php echo $_SESSION['Usuario'][0]?>";
  if (id==id_login) {
    alert("Usuario en linea");
  }else{
    $.ajax({
      url:"http://localhost:3000/"+ruta+"/"+id,
      type:"DELETE",
    
      datatype:"aplication/json",
      success:function(response){

        alert("Se borro correctamente");
         location.reload();
    }
  });
  }
}else{
  $.ajax({
    url:"http://localhost:3000/"+ruta+"/"+id,
    type:"DELETE",
  
    datatype:"aplication/json",
    success:function(response){

      alert("Se borro correctamente");
       location.reload();
    }});
}
  
}



/*
  actualizar datos de usuario

*/
function actualizar(ID){
  var password="";
  
  if ($("#password").val()==$("#confirm").val()) {
    password=$("#confirm").val();
      var nombre=$("#name").val();
      var last_name=$("#lastname").val();
      var username= $("#username").val();
      var user_type= $("#tipo").val();
    usuarioNuevo={
      "nombre":nombre,
      "last_name":last_name,
      "username":username,
      "user_type": user_type,
      "password": password
    }
      
    /*$.ajax({
      data:JSON.stringify(usuarioNuevo),
      method:"PATCH",
      dataType: 'json',
      contentType : 'application/json',
      url:"http://localhost:3000/users/"+ID
    });*/
    var request = new XMLHttpRequest();
request.open('PATCH', "http://localhost:3000/users/"+ID, false);
request.setRequestHeader("Content-type","application/json");
if (!request.send(JSON.stringify(usuarioNuevo))) {
   window.location.replace("http://localhost/Consumir/usuario.php");
}

}

}






/*

Cargar tabla usuario
*/
function cargartablaCliente(){


  $.ajax({
    url:"http://localhost:3000/clients",
    type:"GET",
  
    datatype:"aplication/json",
    success:function(response){
        //agarrar los datos del response
      /*
         "id": 1,
        "name": "Juna",
        "last_name": "Rodri",
        "username": "asd",
        "user_type": "admin",
      */ 
      /*
         <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
      */
       //dividirlos en los campos tr
      for (var i = 0; i < response.length; i++) {
        //ponerlos en la tabla
          var tr =
          "<tr>"+
          "<td>"+ response[i].id +"</td>"+
          "<td>"+ response[i].name +"</td>"+ 
          "<td>"+ response[i].legal_document +"</td>"+
          "<td>"+ response[i].web_page +"</td>"+
          "<td>"+ response[i].adress +"</td>"+
          "<td>"+ response[i].phone +"</td>"+
          "<td>"+ response[i].sector +"</td>"+
             //agregar un btn con la info del cliente
           "<td><a class='btn green' href='editarCliente.php?id_client="+response[i].id+"'> Editar </a>"+
            //hacerle el evento onclick al boton para poder hacer el crud de usuarios
            "<a onclick=eliminar('clients',"+ response[i].id+") class='btn red'> Eliminar </a> </td></tr>"
             $("#tbodyofUsers").append(tr);
        }
   
    }

  });


}

function actualizaCliente(id){
 
  
  
    clienteNuevo={

   "name":$("#name").val(),
   "legal_document":$("#legal_document").val(),
   "web_page":$("#web_page").val(),
   "adress":$("#adress").val(),
   "phone":$("#phone"),
   "username":$("#username"),
   "sector":$("#sector").val()
 }
  
    var request = new XMLHttpRequest();
request.open('PATCH', "http://localhost:3000/clients/"+id, false);
request.setRequestHeader("Content-type","application/json");
if (!request.send(JSON.stringify(clienteNuevo))) {
   window.location.replace("http://localhost/Consumir/clientes.php");
}

}


function cargartablaReuniones(){



  $.ajax({
    url:"http://localhost:3000/meetings",
    type:"GET",
  
    datatype:"aplication/json",
    success:function(response){
        //agarrar los datos del response
      /*
         "id": 1,
        "name": "Juna",
        "last_name": "Rodri",
        "username": "asd",
        "user_type": "admin",
      */ 
      /*
         <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
      */
       //dividirlos en los campos tr
      for (var i = 0; i < response.length; i++) {
        //ponerlos en la tabla
          var tr =
          "<tr>"+
          "<td>"+ response[i].id +"</td>"+
          "<td>"+ response[i].meeting_title +"</td>"+ 
          "<td>"+ response[i].meeting_date +"</td>"+
          "<td>"+ response[i].user_id +"</td>"+
          "<td>"+ response[i].virtual +"</td>"+
             //agregar un btn con la info del cliente
           "<td><a class='btn green' href='editarReuinon.php?id_reunion="+response[i].id+"'> Editar </a>"+
            //hacerle el evento onclick al boton para poder hacer el crud de usuarios
            "<a onclick=eliminar('meetings',"+ response[i].id+") class='btn red'> Eliminar </a> </td></tr>"
             $("#tbodyofUsers").append(tr);
        }
   
    }

  });

}
function cargartablaContacto(){
  $.ajax({
    url:"http://localhost:3000/contacts",
    type:"GET",
  
    datatype:"aplication/json",
    success:function(response){
        //agarrar los datos del response
      /*
         "id": 1,
        "name": "Juna",
        "last_name": "Rodri",
        "username": "asd",
        "user_type": "admin",
      */ 
      /*
         <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
      */
       //dividirlos en los campos tr
      for (var i = 0; i < response.length; i++) {
        //ponerlos en la tabla
          var tr =
          "<tr>"+
          "<td>"+ response[i].id +"</td>"+
          "<td>"+ response[i].name +"</td>"+ 
          "<td>"+ response[i].last_name +"</td>"+
          "<td>"+ response[i].email +"</td>"+
          "<td>"+ response[i].phone +"</td>"+
          "<td>"+ response[i].position +"</td>"+
          "<td>"+ response[i].client_id +"</td>"+
             //agregar un btn con la info del cliente
           "<td><a class='btn green' href='editarContacto.php?id_contact="+response[i].id+"'> Editar </a>"+
            //hacerle el evento onclick al boton para poder hacer el crud de usuarios
            "<a onclick=eliminar('contacts',"+ response[i].id+") class='btn red'> Eliminar </a> </td></tr>"
             $("#tbodyofUsers").append(tr);
        }
   
    }

  });


}


function crearContacto(){

  var contactoNuevo={
  "name":$("#name").val(),
  "last_name":$("#lastname").val(),
"email":$("#email").val(),
"phone":$("#phone").val(),
"position":$("#position").val(),
"client_id":$("#client_id").val()
  }
  alert(Object.values(contactoNuevo));

    var request = new XMLHttpRequest();
request.open('POST', "http://localhost:3000/contacts/", false);
request.setRequestHeader("Content-type","application/json");
if (!request.send(JSON.stringify(contactoNuevo))) {
   window.location.replace("http://localhost/Consumir/contactos.php");
}




}


function actualizarContact(id){

      contactoNuevo={

   "name":$("#name").val(),
   "last_name":$("#lastname").val(),
   "email":$("#email").val(),
   "phone":$("#phone").val(),   
   "position":$("#sector").val()
 }
  
    var request = new XMLHttpRequest();
request.open('PATCH', "http://localhost:3000/contacts/"+id, false);
request.setRequestHeader("Content-type","application/json");
if (!request.send(JSON.stringify(contactoNuevo))) {
   window.location.replace("http://localhost/Consumir/contactos.php");
}

}



function actualizarReunion(id){

      reunionNuevo={

   "meeting_title":$("#name").val(),
   "meetings_date":$("#lastname").val(),
   "virtual":$("#boolean").val(),
   
 }
  
    var request = new XMLHttpRequest();
request.open('PATCH', "http://localhost:3000/contacts/"+id, false);
request.setRequestHeader("Content-type","application/json");
if (!request.send(JSON.stringify(reunionNuevo))) {
   window.location.replace("http://localhost/Consumir/reuniones.php");
}
}

function crearReunion(){
    var reunionNuevo={
  "meeting_title":$("#meeting_title").val(),
  "meeting_date":$("#meeting_date").val(),
"user_id":$("#user_id").val(),
"virtual":$("#boolean").val(),

  }


  alert(Object.values(reunionNuevo));

    var request = new XMLHttpRequest();
request.open('POST', "http://localhost:3000/meetings/", false);
request.setRequestHeader("Content-type","application/json");
if (!request.send(JSON.stringify(reunionNuevo))) {
   window.location.replace("http://localhost/Consumir/reuniones.php");
}




}


function cargartablaTickets(){
  $.ajax({
    url:"http://localhost:3000/tickets",
    type:"GET",
  
    datatype:"aplication/json",
    success:function(response){
        //agarrar los datos del response
      /*
         "id": 1,
        "name": "Juna",
        "last_name": "Rodri",
        "username": "asd",
        "user_type": "admin",
      */ 
      /*
         <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
      */
       //dividirlos en los campos tr
      for (var i = 0; i < response.length; i++) {
        //ponerlos en la tabla
          var tr =
          "<tr>"+
          "<td>"+ response[i].id +"</td>"+
          "<td>"+ response[i].problem_title +"</td>"+ 
          "<td>"+ response[i].detail +"</td>"+
          "<td>"+ response[i].who_report +"</td>"+
          "<td>"+ response[i].client_id +"</td>"+
          "<td>"+ response[i].status +"</td>"+
          
             //agregar un btn con la info del cliente
           "<td><a class='btn green' href='editarTicket.php?id_ticket="+response[i].id+"'> Editar </a>"+
            //hacerle el evento onclick al boton para poder hacer el crud de usuarios
            "<a onclick=eliminar('tickets',"+ response[i].id+") class='btn red'> Eliminar </a> </td></tr>"
             $("#tbodyofUsers").append(tr);
        }
   
    }

  });


}


function  actualizarTicket(id){
   ticketNuevo={

   "problem_title":$("#problem_title").val(),
   "detail":$("#detail").val(),
   "who_report":$("#who_report").val(),
   "client_id":$("#client_id").val(),
   "status":$("#status").val(),




   
 }
  
    var request = new XMLHttpRequest();
request.open('PATCH', "http://localhost:3000/tickets/"+id, false);
request.setRequestHeader("Content-type","application/json");
if (!request.send(JSON.stringify(ticketNuevo))) {
   window.location.replace("http://localhost/Consumir/tickets.php");
}


}


function crearTicket(){

   ticketNuevo={

   "problem_title":$("#problem_title").val(),
   "detail":$("#detail").val(),
   "who_report":$("#who_report").val(),
   "client_id":$("#client_id").val(),
   "status":$("#status").val(),




   
 }
  
    var request = new XMLHttpRequest();
request.open('POST', "http://localhost:3000/tickets", false);
request.setRequestHeader("Content-type","application/json");
if (!request.send(JSON.stringify(ticketNuevo))) {
   window.location.replace("http://localhost/Consumir/tickets.php");
}


}


