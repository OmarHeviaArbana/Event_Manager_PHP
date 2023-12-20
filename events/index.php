<?php
include("../db.php");

$rows_per_page = 5;
$start = 0;

$call=$connection->prepare("SELECT * ,(SELECT nombre FROM tabla_categorias WHERE tabla_categorias.id=tabla_eventos.idcategoria limit 1) as categoria FROM  `tabla_eventos` ORDER BY rand() LIMIT 5 ");
$call->execute();
$event_tbl_list=$call->fetchAll(PDO::FETCH_ASSOC);


session_start();
$logged = $_SESSION['logued']; 

?> 
<!doctype html>
<html lang="en">

<head>
  <title>Gestor Eventos - Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  <header>
   <nav class="navbar navbar-expand navbar-light bg-light">
   <ul class="nav nav-tabs">
           <li class="nav-item">
               <a class="nav-link active" href=">./index.php" aria-current="page">Home<span class="visually-hidden">(current)</span></a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="../activity_2.php">Act_2</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="./events.php">Eventos</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="../api/events/index.php">API</a>
           </li> 
           <?php if($logged ==true){?>
           <li class="nav-item">
               <a class="nav-link" href="./create.php">Crear evento</a>
           </li> 
           <?php } ?>
           <?php if($logged ==false){?>
           <li class="nav-item">
               <a class="nav-link" href="../login.php">Login</a>
           </li> 
           <?php } ?>
         
           <?php if($logged ==true){?>
           <li lass="nav-item">
               <a class="nav-link" href="../logout.php">Cerrar Sesión</a>
           </li>  
           <?php } ?>
       </ul>
   </nav>
  </header>
  <main> 
    <div style="width: 80%; margin: 20px auto">
      <div class="d-flex justify-content-center">
        <h3 class="fw-bold">Bienvenid@ <?php echo $_SESSION['username'];?></h3>
      </div>
    </div>
    <div style="width: 80%; margin: 20px auto">
      <h1>Eventos Destacados</h1>
    </div>
  
    <div class="container" style="width: 80%; margin: auto">
        <div class="row justify-content-around">
          <?php foreach ($event_tbl_list as $event) { ?>
                
            <div class="card " style="width: 30rem; margin: 20px; padding:0">
                <img src="<?php echo $event['imagen']; ?>" style="height: 400px " class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $event['nombre']; ?></h5>
                  <p class="list-group-item" style="width: 100%; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo $event['descripcion']; ?></p>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?php echo $event['categoria']; ?></li>
                      <li class="list-group-item"><?php echo $event['ubicacion']; ?></li>
                      <li class="list-group-item"><?php echo $event['fecha']; ?></li>
                      <li class="list-group-item"><?php echo $event['hora']; ?></li>
                    </ul>
                    <btn onclick="location.href='./post.php?eventID=<?php echo $event['id']?>'"   class="btn btn-primary my-2">Más Información</btn>
                </div>
            </div>
          <?php } ?>
        </div>
    </div>
  
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>