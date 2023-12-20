<!-- A continuación crearemos la página única de cada evento cultural. Utilizaremos el archivo post.php, al cual se deberá pasar el identificador del evento que se quiera visualizar. Por ejemplo, post.php?id=5 mostrará la página del evento cuyo identificador es 5.

Además, añadiremos un enlace en el título de cada evento en la página de inicio (index.php, desarrollado en la actividad anterior) que nos lleve a la página única de este evento, donde se mostrarán todos los campos y la descripción completa.
 -->



 <?php
include("../../db.php");

$callEvents=$connection->prepare("SELECT * FROM `tabla_eventos`");
$callEvents->execute();
$event_tbl_list=$callEvents->fetchAll(PDO::FETCH_ASSOC);

$callCategory=$connection->prepare("SELECT * FROM `tabla_categorias`");
$callCategory->execute();
$category_tbl_list=$callCategory->fetchAll(PDO::FETCH_ASSOC);

$callUsers=$connection->prepare("SELECT * FROM `tabla_users`");
$callUsers->execute();
$users_tbl_list=$callUsers->fetchAll(PDO::FETCH_ASSOC);

$response=array();

$dataEvents=$event_tbl_list;
$dataCategory=$category_tbl_list;
$dataUsers=$users_tbl_list;

$response['tabla_eventos']=array();
$response['tabla_categorias']=array();
$response['tabla_users']=array();


foreach($dataEvents as $param) {
    $dataTable=array();
    foreach($param as $key => $value)
        $dataTable[$key] = $value;
        array_push($response['tabla_eventos'], $dataTable);
}
foreach($dataCategory as $param) {
    $dataTable=array();
    foreach($param as $key => $value)
        $dataTable[$key] = $value;
        array_push($response['tabla_categorias'], $dataTable);
}
foreach($dataUsers as $param) {
    $dataTable=array();
    foreach($param as $key => $value)
        $dataTable[$key] = $value;
        array_push($response['tabla_users'], $dataTable);
}

/* die(json_encode($response)); */
?> 


<!-- Instanciamos la base de datos y recogemos la respusta en formato array. Apuntamos a la tabla de donde queremos extraer la información. Introducimos una variable para recoger la respuesta dentro de un array.

Para recorrer cada uno de los parametros de las tablas debemos hacer un doble forEach. En el primero recorremos toda la tabla y en el segundo,  cada una de las columnas. En ese segundo foreach se hace un array_push al array que recoge la respuesta con los parametros de la data de la tabla y su valor. 

FInalmente, repetimos el proceso para cada una de las tablas y lo parseamos mediante json_encode-->


<!doctype html>
<html lang="en">

<head>
  <title>Gestor Eventos - API</title>
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
               <a class="nav-link " href="<?php echo $url_base?>events/events.php">Eventos</a>
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
   
  <p><?php echo(json_encode($response));?></p>
  
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