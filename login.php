
<?php

session_start();
if($_POST) {
 
include("db.php");

  $call=$connection->prepare("SELECT *,count(*) as usuarios FROM  `tabla_users` WHERE username=:username AND password=:password");

  $username=$_POST["username"];
  $password=$_POST["password"];

  $call->bindParam(":username", $username);
  $call->bindParam(":password", $password);
  $call->execute();
  
  $users_tbl_list=$call->fetch(PDO::FETCH_LAZY);

  if($users_tbl_list["usuarios"]==1) {
    $_SESSION['username']= $users_tbl_list["username"];
    $_SESSION['logued']= true;
    header("Location:index.php");
    } else {
      $message="Error: Usuario o contraseña incorrecto";
  }
}
?> 
<!doctype html>
<html lang="en">

<head>
  <title>Gestor Eventos - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <header>
   <nav class="navbar navbar-expand navbar-light bg-light">
       <ul class="nav nav-tabs">
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>events/index.php" aria-current="page">Home</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>activity_2.php">Act_2</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>events/events.php">Eventos</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>/api/events/index.php">API</a>
           </li> 
           <?php if($logged ==true){?>
           <li class="nav-item">events/create.php">Crear evento</a>
           </li> 
           <?php } ?>
           <?php if($logged ==false){?>
           <li class="nav-item">
             <a class="nav-link active" href="<?php echo $url_base?>login.php">Login<span class="visually-hidden">(current)</span></a>
           </li> 
           <?php } ?>
         
           <?php if($logged ==true){?>
           <li lass="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>logout.php">Cerrar Sesión</a>
           </li>  
           <?php } ?>
       </ul>
   </nav>
  </header>
  <main class="container">

 <div class="row">
   <div class="col-md-6 mx-auto">
       <div class="card mt-4">
         <div class="card-header">
           Login
         </div>
         <div class="card-body">
         <?php if(isset($message)){?>
         <div class="alert alert-danger" role="alert">
           <strong><?php echo $message;?></strong> 
         </div>
         <?php } ?>
          <form action="" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text"
                  class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Usuario" required>
              </div>       
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password"
                  class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña" required>
              </div>       
              <button type="submit" class="btn btn-primary mx-auto" >
                Aceptar
                </button>
          </form>
        </div>
      </div>
   </div>
 </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>