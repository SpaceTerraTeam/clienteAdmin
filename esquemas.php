<!doctype html>
<html lang="en">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




    <title>Space Terra Admin</title>
  </head>
  <body>

    <!-- Funcion Crear Esquema -->

    <script type="text/javascript">
      $(document).ready(function (){
        $(".crearEsquema").on("click", function(e){
          e.preventDefault();
          var name = $(".name").val();
          var editable = $(".editable").val();
          $.ajax({

            //Aqui ira la URL
          //  url: 'http://localhost:8888/proyectoss/public/index.php/usuario/create',
            dataType: 'json',
            type: 'POST',
            data: {
              'name': name,
              'editable': editable,
      
            },
            success:function(){
              alert("Se ha creado el esquema");
            }
          });
        });
      });
      </script>

      <!-- Funcion Mostrar Esquemas -->

    <script type="text/javascript">
      $(document).ready(function (){
        $(".listaEsquemas").on("click", function(e){
          e.preventDefault();
          
          $.ajax({
            headers: {
             'Authorization' : sessionStorage.getItem('token')
            },

            //Aqui ira la URL
         //   url: 'http://localhost:8888/proyectoss/public/index.php/usuario/allUsers',
            dataType: 'json',
            type: 'GET',
            data: {
               'name': name,
              'editable': editable,
            },
            success:function(data){
              mostrar(data.data);
          //    alert($users);
            }
          });
        });
      });
      </script>

        <!-- Funcion Eliminar Esquemas -->

    <script type="text/javascript">
        function borrar(id_item){
          $(document).ready(function (){
            $.ajax({
              headers: {
              'Authorization' : sessionStorage.getItem('token')
             },

            //Aqui ira la URL
             // url: 'http://localhost:8888/proyectoss/public/index.php/usuario/deleteUser',
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
  
    <h1 style="text-align: center">Esquemas</h1>
 
 <!-- Botones Usuarios y Esquemas -->
 
<div class="text-center">
  <a href="login.php">  <input type="button" class="btn btn-ghost btn-ghost-bordered center-block" value="Usuarios" style="width:160px;"></a>
   <input type="button" class="btn btn-ghost btn-ghost-bordered  btn-primary center-block" value="Esquemas" style="width:160px;margin-top: 10px">
      
</div>
  <br>
  

      <div class="input-group center-block" style=" width: 250px" >
      
      <!-- Añadir Name Esquema -->

      <input type="text" class="form-control mb-2 name" id="inlineFormInput" style="margin-top: 2px" placeholder="Nombre del esquema" >

          <!-- Añadir Editable Esquema -->
      <input type="number" min="0" max="1" class="form-control mb-2 editable" id="inlineFormInput" style="margin-top: 5px" placeholder="Editable">
    
   
         <!-- Btn Añadir -->
        
      <button type="submit" style="margin-top: 5px; margin-left: 100px" class="btn btn-primary mb-2 crearEsquema">Añadir</button>

    </div>
  
  <!-- Lista de Esquemas -->
   <br>
   
<ul class="list-group center-block"  style="text-align: center;"> 
  <div id="answer"> 

   </div>
   <script type="text/javascript">
    function mostrar(datos){
      $.each(datos, function(i,item){
        $("#answer").append("<br><br>"+ item.name + '<button type="button" onClick="borrar(' + item.id + ')">Borrar</button>');
      });
      }
   
   </script>
   </ul>
   
  </body>
</html>