<!doctype html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <title></title>

  <!-- Funcion Registrar Usuarios -->

  <script type="text/javascript">
  $(document).ready(function (){
    $(".crear").on("click", function(e){
      e.preventDefault();
      var username = $(".username").val();
      var password = $(".password").val();
      var email = $(".email").val();
      var rol = $("#rol option:selected").val();
      alert(rol)
      $.ajax({
        url: 'http://81.169.234.32/sanwichino/proyectoss/public/index.php/usuario/create',
        dataType: 'json',
        type: 'POST',
        data: {
          'username': username,
          'password': password,
          'passwordRepeat': password,
          'email': email,
          'id_rol': rol,
        },
        success:function(data){
          if (data.code == '200') 
           {
            alert("se registro");
             location.reload();
           }
          if (data.code == '400') 
          {
            alert(data.message);
          }
        }
      });
    });
  });
  </script>

      <!-- Funcion Eliminar Usuarios -->


   <script type="text/javascript">
    function borrar(id_item){
      $(document).ready(function (){
        $.ajax({
          headers: {
          'Authorization' : sessionStorage.getItem('token')
         },
          url: 'http://81.169.234.32/sanwichino/proyectoss/public/index.php/usuario/deleteUser',
          dataType: 'json',
          type: 'POST',
          data: {
            'id': id_item

          },
          success: function(){
           alert(id_item);
           location.reload();
          }
        });
      });
    }


  </script>

 <!-- Funcion Mostrar Usuarios -->

  <script type="text/javascript">
  $(document).ready(function (){
    $(".listaUsuarios").on("click", function(e){
      e.preventDefault();
      
      $.ajax({
        headers: {
         'Authorization' : sessionStorage.getItem('token')
        },
        url: 'http://81.169.234.32/sanwichino/proyectoss/public/index.php/usuario/allUsers',
        dataType: 'json',
        type: 'GET',
        data: {
          
        },
        success:function(data){

          mostrar(data.data);
      //    alert($users);
        }
      });
    });
  });
  </script>

    


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Space Terra Admin</title>
  </head>
  <body>
  
    <h1 style="text-align: center">Usuarios</h1>
 
 <!-- Botones Usuarios y Esquemas -->
 
<div class="text-center">
    <input type="button" class="btn btn-ghost btn-primary btn-ghost-bordered center-block" value="Usuarios" style="width:160px;">

  <a href="esquemas.php">  <input type="button" class="btn btn-ghost btn-ghost-bordered center-block" value="Esquemas" style="width:160px; margin-top: 10px"></a>




      
</div>
  <br>
  
  <!-- Añadir Usuario -->
  
  <div class="text-center">
      <form>
  <div class="form-row align-items-center">
    <div class="col-auto" style="margin-left: 5px">

     
     
     
      
    </div>
    <div class="input-group center-block" >
      
      <div class="input-group center-block" >
          <!-- Input Rol -->

        <select id="rol" class="rol input-group center-block"  style="width: 70px;margin-left: 5px">

            <option  value="1">Admin</option>
            <option  value="2">User</option>
            <option  value="3">Premium</option>
        </select>  
        
        <!-- <input step="1" type="number" min="1" max="3" class="form-control mb-2 rol" id="inlineFormInput" placeholder="Rol" style="width: 70px;margin-left: 5px"> -->
       
        <!-- Input Email -->
        <input type="text" style="width: 200px;margin-left: 5px" class="form-control email ce" id="inlineFormInputGroup" placeholder="Email">
        
         <!-- Input Username -->
      
       <input type="text" style="width: 200px;margin-left: 5px" class="form-control username" id="inlineFormInputGroup" placeholder="Username">
       
        <!-- Input Password -->
       <input type="text" style="width: 250px;margin-left: 5px" class="form-control password" id="inlineFormInputGroup" placeholder="Password">
    
    </div>
     <!-- Input Password -->
    
    
   <br>


<!-- Btn Añadir -->
<br>
    <div class="col-auto">
      <button type="submit" class="btn btn-ghost btn-primary btn-ghost-bordered center-block crear">Añadir</button>
    </div>
     <!-- Btn Mostrar Usuarios -->

     <div class="col-auto">
      <button  type="submit" onclick="this.disabled=true"  style="margin-top: 5px" class="btn btn-ghost btn-primary btn-ghost-bordered center-block listaUsuarios">MostrarUsers</button>
    </div>
  </div>
</form>
  </div>
  
 
   <br>
   <ul class="list-group center-block" type="submit"  style="text-align: center;">

   <div id="answer"> 

   </div>
   <script type="text/javascript">
    function mostrar(datos){
      $.each(datos, function(i,item){
        $("#answer").append("<br><br>"+ item.username + '<br><button class="btn btn-primary mb-2 type="button" onClick="borrar(' + item.id + ')">Borrar</button>');
      });
      }

    
    </script>
  </ul>
   
   
   
      <!-- correct -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  </body>
</html>