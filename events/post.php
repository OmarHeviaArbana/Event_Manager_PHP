<?php
include("../db.php");

session_start();
$logged = $_SESSION['logued']; 

    if(isset($_GET['eventID'])) {

        $eventID=(isset($_GET['eventID']))?$_GET['eventID']:"";

        $call=$connection->prepare("SELECT * ,(SELECT nombre FROM tabla_categorias WHERE tabla_categorias.id=tabla_eventos.idcategoria limit 1) as categoria FROM  `tabla_eventos` WHERE id=:id");
        $call->bindParam(":id", $eventID);
        $call->execute();
        $register=$call->fetch(PDO::FETCH_LAZY);

        $nombre=$register["nombre"];
        $hora=$register["hora"];
        $fecha=$register["fecha"];
        $descripcion=$register["descripcion"];
        $ubicacion=$register["ubicacion"];
        $imagen=$register["imagen"];
        $idcategoria=$register["categoria"]; 
        
    }
?> 


<!doctype html>
<html lang="en">

<head>
  <title>Gestor Eventos - Detalle Evento</title>
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
               <a class="nav-link" href="<?php echo $url_base?>events/index.php" aria-current="page">Home</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>activity_2.php">Act_2</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>events/events.php">Eventos</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link active" href="<?php echo $url_base?>/api/events/index.php">API<span class="visually-hidden">(current)</span></a>
           </li> 
           <?php if($logged ==true){?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>events/create.php">Crear evento</a>
           </li> 
           <?php } ?>
           <?php if($logged ==false){?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>login.php">Login</a>
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
  <main>

  <div style="width: 80%; margin: 20px auto">
      <h1>Detalle Evento</h1>
    </div>
  
    <div class="container" style="width: 80%; margin: 20px auto">
        <div class="card mb-3" style="margin: auto;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="<?php echo $imagen;?>"style="height: 400px " class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $nombre;?>"</h5>
                    <p class="card-text"><?php echo $descripcion;?></p>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?php echo $idcategoria;?></li>
                      <li class="list-group-item"><?php echo $ubicacion;?></li>
                      <li class="list-group-item"><?php echo $fecha;?></li>
                      <li class="list-group-item"><?php echo $hora;?></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  <footer>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>