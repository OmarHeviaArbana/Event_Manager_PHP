<?php
include("../db.php");

$call=$connection->prepare("SELECT *,(SELECT nombre FROM tabla_categorias WHERE tabla_categorias.id=tabla_eventos.idcategoria limit 1) as categoria FROM   `tabla_eventos`");
$call->execute();
$event_tbl_list=$call->fetchAll(PDO::FETCH_ASSOC);

session_start();
$logged = $_SESSION['logued']; 

?> 
<!doctype html>
<html lang="en">

<head>
  <title>Gestor Eventos - Eventos</title>
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
               <a class="nav-link" href="./index.php" aria-current="page">Home</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="../activity_2.php">Act_2</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link active" href="./events.php">Eventos<span class="visually-hidden">(current)</span></a>
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
      <h1>Listado Eventos</h1>
    </div>
  
    <div class="card " style="width: 80%; margin: 20px auto">
      <div class="card-header">
        <?php if($logged ==true){?>
        <button onclick="location.href='create.php'" type="button" class="btn btn-primary align-items-end">Crear Evento</button>
        <?php } ?>
      </div>
      <div class="card-body">
        <div class="table-responsive"></div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" style="width:20%">Nombre</th>
                <th scope="col" style="width:30%">Descripción</th>
                <th scope="col">Categoría</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Ubicación</th>
                <th scope="col" style="width:10%">Imagen</th>
                <?php if($logged ==true){?>
                <th scope="col">Acciones</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($event_tbl_list as $event) { ?>
                <tr>
                  
                    <td><?php echo $event['nombre'];?></td>
                    <td><?php echo $event['descripcion'];?></td>
                    <td><?php echo $event['categoria'];?></td>
                    <td><?php echo $event['fecha'];?></td>
                    <td><?php echo $event['hora'];?></td>
                    <td><?php echo $event['ubicacion'];?></td>
                    <td >
                      <img src="<?php echo $event['imagen'];?>" class="img-fluid" width="80px"/>
                    </td>
                    <td >
                      <?php if($logged ==true){?>
                        <button onclick="location.href='edit.php?eventID=<?php echo $event['id']?>'" type="button" class="btn btn-success">Editar</button>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
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