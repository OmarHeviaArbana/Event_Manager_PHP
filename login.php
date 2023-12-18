<!-- Crear evento. Muestra un formulario que permite crear un nuevo evento cultural (todos los campos son obligatorios). Sólo se mostrará cuando el usuario está logueado. (create.php -->

<!-- seguidamente, crearemos un script en PHP llamado activity_2.php que muestre por pantalla todos los campos de un evento cultural cualquiera de la base de datos (podéis elegir el evento que queráis). -->

<!-- La página mostrará una lista de cinco eventos culturales elegidos de forma aleatoria. De este modo, cada vez que se cargue la página de inicio deberían mostrarse cinco eventos diferentes.

Para cada evento, se mostrarán los siguientes campos. 

Nombre del evento cultural
Fecha del evento, en formato DD/MM/YYYY, por ejemplo 18/11/2023
Ubicación
Categoría
Las primeras 40 palabras de la descripción del evento cultural, en el caso que el texto sea más largo.
La imagen
La página de inicio ha de permitir paginación de 5 elementos. En las siguientes páginas deberán mostrarse el resto de eventos culturales (sin repetición de eventos). -->


<?php
include("db.php");

$call=$connection->prepare("SELECT * FROM `tabla_eventos`");
$call->execute();
$event_tbl_list=$call->fetchAll(PDO::FETCH_ASSOC);

?> 
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
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
               <a class="nav-link" href="index.php" aria-current="page">Home</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="activity_2.php">Act_2</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="events.php">Eventos</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="post.php">API</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="create.php">Crear evento</a>
           </li> 
           <li class="nav-item">
               <a class="nav-link active" href="login.php">Login<span class="visually-hidden">(current)</span></a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="logout.php">Logout</a>
           </li> 
       </ul>
   </nav>
  </header>
  <main>
   
  <h1>login</h1>
  
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