<?php

$server="localhost";
$data_base="events_managers";
$user="root";
$password="";

try {
    $connection = new PDO("mysql:host=$server;dbname=$data_base", $user, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}


?>

<!-- CREACION DB Y CONEXION -->

<!-- Para la conexión a la base es necesario definir el servidor, el nombre de la base de datos, un usuario y su passwor mediante variables. 

En nuestro local el server es "localhost" y en remoto "".

Posteriormente se hace un try para la creación de la conexión mediante la clase PDO con la base de datos. Pasamos como parametros las variables definidas previamente. Y para recoger excepciones incorporamos un cath para mostrar el mensaje de errorˆ recibido. 
ˆ
Realizo pruebas del try y el catch modificando de forma erronea las variables.-->  

<!-- TABLAS -->
<!-- 
Una vez conectado el proyecto a la base de datos, es el turno de crear las dos tablas existentes en el proyecto: tabla de eventos y tabla de usuarios. 

Los id tienen se autoincrementales por lo que se activa el check A.I 

Eventos 

Insertamos un nombre de tablas y el número de columnas que se correspondera con los campos del evento más el identificador único (id).  En el caso de eventos seran 8:  identificador único (número), nombre del evento, fecha, hora, descripción, ubicación, imagen y categoría


Se define el tipo de datos para cada uno de los campos. Con respecto al de la imagen tenemos que determinar que sa tipo BLOB - LONGBLOB porque queremos almacenar la imagen en la base datos y la imagen puede contener una gran cantidad de datos binarios. 

Usuarios

En la tabla de datos se definen 3 campos: id, username y password

Categorias

Para predefinir categorías se inlcluye otra tercera tabla que va a estar relacionada con la tabla eventos. Para ello se realiza lo siguiente:

El campo idcategoria se marca como indice y se convierte en la clave foranea y el id de la tabla categoréas se convierte en la clave primaria.

Aquí se observa la relación entre las dos tablas
 -->


