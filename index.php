
<!DOCTYPE html>
<html lang="en">
  <head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title></title>
  <script type="text/javascript">
  $(document).ready(function (){
    $(".crear").on("click", function(e){
      var username = $(".username").val();
      var password = $(".password").val();
      e.preventDefault();
      $.ajax({
        url: 'http://81.169.234.32/sanwichino/proyectoss/public/index.php/usuario/login',
        dataType: 'json',
        type: 'GET',
        data: {
          'username': username,
          'password': password
        },
        success: function(data){
          sessionStorage.setItem('username', data.username);
          sessionStorage.setItem('token',  data.data);
          $tok = sessionStorage.getItem('token');
          alert($tok) ;
          window.location.href = 'login.php';

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
  </head>
  <body>
    <h1 style="text-align: center">Space Terra Admin</h1>
       
        <form>
      <div class="form-group">
      
       <!-- Username -->

        <label for="exampleInputEmail1">Email address</label>
        <input name="username" class="username " type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        
         <!-- Pass-->

        <label for="exampleInputPassword1">Password</label>
        
        <input name="password" class="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        
      </div>
      <!-- Btn1 -->

    

      <!-- Btn2 -->

     <button type="submit" class="crear btn btn-primary">Login2</button>
    </form>
    
  </body>
</html>