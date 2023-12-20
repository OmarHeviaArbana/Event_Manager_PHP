<?php
include("../db.php");

session_start();
$logged = $_SESSION['logued']; 

  if(isset($_GET['eventID'])) {

    $eventID=(isset($_GET['eventID']))?$_GET['eventID']:"";

    $call=$connection->prepare("SELECT * FROM tabla_eventos WHERE id=:id");
    $call->bindParam(":id", $eventID);
    $call->execute();
    $register=$call->fetch(PDO::FETCH_LAZY);

    $nombre=$register["nombre"];
    $hora=$register["hora"];
    $fecha=$register["fecha"];
    $descripcion=$register["descripcion"];
    $ubicacion=$register["ubicacion"];
    $imagen=$register["imagen"];
    $idcategoria=$register["idcategoria"]; 
  }
  if($_POST){

      $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
      $hora=(isset($_POST["hora"])?$_POST["hora"]:"");
      $fecha=(isset($_POST["fecha"])?$_POST["fecha"]:"");
      $descripcion=(isset($_POST["descripcion"])?$_POST["descripcion"]:"");
      $ubicacion=(isset($_POST["ubicacion"])?$_POST["ubicacion"]:"");
      $eventID=(isset($_GET['eventID']))?$_GET['eventID']:"";
  
      $idcategoria=(isset($_POST["idcategoria"])?$_POST["idcategoria"]:"");
    
    
      $call=$connection->prepare("UPDATE tabla_eventos SET 
          nombre=:nombre,
          hora=:hora,
          fecha=:fecha,
          descripcion=:descripcion,
          ubicacion=:ubicacion,
          idcategoria=:idcategoria 
          WHERE id=:id ");
    
      $call->bindParam(":nombre", $nombre);
      $call->bindParam(":hora", $hora);
      $call->bindParam(":fecha", $fecha);
      $call->bindParam(":descripcion", $descripcion);
      $call->bindParam(":ubicacion", $ubicacion);
      $call->bindParam(":id", $eventID);
      $call->bindParam(":idcategoria", $idcategoria); 
      $call->execute();

      $imagen=(isset($_FILES["imagen"]['name'])?$_FILES["imagen"]['name']:""); 

      $date=new DateTime();

      $file_image_input=($imagen != '')?$date->getTimestamp()."_".$_FILES["imagen"]["name"]:"";
    
      $tmp_image=$_FILES["imagen"]["tmp_name"];
      
      if($tmp_image != '' ) {
        move_uploaded_file($tmp_image,"./".$file_image_input);

        $call=$connection->prepare("SELECT imagen FROM `tabla_eventos` WHERE id=:id ");
        $call->bindParam(":id", $eventID);
        $call->execute();
        $image_stored=$call->fetch(PDO::FETCH_LAZY);
        if(isset($image_stored["imagen"]) && $image_stored["imagen"]!=""){
          if(file_exists("./".$image_stored["imagen"])) {
            unlink("./".$image_stored["imagen"]);
        } 
      }

      $call=$connection->prepare("UPDATE `tabla_eventos` SET imagen=:imagen WHERE id=:id ");
      $call->bindParam(":imagen", $file_image_input);
      $call->bindParam(":id", $eventID);
      $call->execute();
    }

     header("Location:./events.php"); 
  }

$call=$connection->prepare("SELECT * FROM `tabla_categorias`");
$call->execute();
$category_tbl_list=$call->fetchAll(PDO::FETCH_ASSOC);

?> 
<!doctype html>
<html lang="en">

<head>
  <title>Gestor Eventos - Editar Evento</title>
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
               <a class="nav-link active" href="<?php echo $url_base?>events/events.php">Eventos<span class="visually-hidden">(current)</span></a>
           </li> 
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>/api/events/index.php">API</a>
           </li> 
           <?php if($logged ==true){?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $url_base?>events/create.php">Crear evento<span class="visually-hidden">(current)</span></a>
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
      <h1>Editar Evento</h1>
    </div>
  
    <div class="card " style="width: 80%; margin: 20px auto">
      <div class="card-header">
        Descripción del Evento
      </div>
      <div class="card-body">

      <form action= "" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" value="<?php echo $nombre;?>" class="form-control" id="nombre" name="nombre" placeHolder="Nombre" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="hora" class="form-label">Hora</label>
          <input type="text"  value="<?php echo $hora;?>" class="form-control" id="hora" name="hora" placeholder="hh:mm" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="fecha" class="form-label">Fecha</label>
          <input type="date" value="<?php echo $fecha;?>" class="form-control" id="fecha" name="fecha" placeholder="Fecha" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" aria-describedby="emailHelp">"<?php echo $descripcion;?>"</textarea>
        </div>
        <div class="mb-3">
          <label for="ubicacion" class="form-label">Ubicación</label>
          <input type="text" value="<?php echo $ubicacion;?>" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ubicación" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen Evento</label>
          "<?php echo $imagen;?>"
          <input type="file"  class="form-control" id="imagen" name="imagen" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="idcategoria" class="form-label">Categoría</label>
          <select id="idcategoria" name="idcategoria" placeholder="Selecciona una categoría" class="form-select">
            <?php foreach ($category_tbl_list as $event) { ?>
            <option value="<?php echo $event['id']?>"><?php echo $event['nombre']?></option>
            <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios </button>
        <button onclick="location.href='events.php'" type="button" class="btn btn-danger ml-2">Cancelar</button>
      </form>

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