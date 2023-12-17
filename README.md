# Event_Manager_PHP

Se propone crear un gestor básico de eventos culturales almacenados en una base de datos real. A continuación se indican los requisitos fundamentales que debe cumplir el gestor que queremos desarrollar.

# R1. 

Como estado inicial del sitio web, publicaremos al menos 10 eventos culturales, de los cuales al menos 5 de ellos serán eventos reales.

# R2. 

El sitio web permitirá añadir nuevos eventos culturales y también editar los eventos culturales existentes.

# R3. 

El portal tendrá un menú visible en todas las páginas del sitio web. El menú tendrá las siguientes opciones:

Home. Página de inicio. Muestra un listado de cinco eventos culturales aleatorios (actividad 3). Permite paginación de 5 elementos. (index.php)

Act_2. Muestra el resultado de la actividad 2. (activity_2.php)

Eventos. Muestra una lista de todos los eventos. No es necesario paginar la lista. En caso de estar logueado, si se selecciona un evento de la lista, se permitirá editar cualquiera de sus campos, tal como se indica en la actividad 9. (events.php)

API. Acceso a la API, tal como se pide en la actividad 8, que muestra el resultado en formato json. (api/events)
Login. Muestra el formulario de login. Sólo se mostrará cuando el usuario no está logueado. (login.php)

Crear evento. Muestra un formulario que permite crear un nuevo evento cultural (todos los campos son obligatorios). Sólo se mostrará cuando el usuario está logueado. (create.php)

Logout. Cierra la sesión del usuario y redirige a la página de inicio. Sólo se mostrará cuando el usuario está logueado. (logout.php)

# R4. 

Utilizaremos una base de datos sql para almacenar los eventos. Trabajaremos con MySQL tanto en local (XAMPP o equivalente) como en el servidor remoto de pruebas.

Cada evento cultural dispondrá de los siguientes campos: identificador único (número), nombre del evento, fecha, hora, descripción, ubicación, imagen y categoría. 

Notas:

La fecha y la hora se deberán guardar en formato timestamp.

Las imágenes pueden estar almacenadas en cualquier localización del servidor. Para definir los campos de la imagen en la base de datos se ha de tener en cuenta que, según la actividad 9, se debe poder subir una imagen al servidor.

La categoría será un campo que sólo podrá contener determinados valores, por ejemplo música, arte o teatro, entre otros.

Para simplificar, en la ubicación se guardará sólo el nombre del recinto, por ejemplo “Teatre Grec”, y será un campo de texto.


# Actividades
A partir de este caso de estudio, deberás realizar las siguientes actividades.

# Actividad 1. Creación de la base de datos

En primer lugar, crearemos la base de datos que contendrá una tabla para almacenar los eventos culturales. Cada campo de esta tabla será de un tipo de datos que cumpla con los requisitos de R4. Se deberá justificar la elección de los tipos de datos elegidos.

A continuación, insertaremos en la base de datos diez eventos culturales, de los cuales al menos cinco eventos han de ser reales (R1).

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 0,5 puntos)


# Actividad 2. Acceso a la base de datos

Seguidamente, crearemos un script en PHP llamado activity_2.php que muestre por pantalla todos los campos de un evento cultural cualquiera de la base de datos (podéis elegir el evento que queráis).



# Actividad 3. Creación de la página de inicio

A continuación crearemos la página de inicio del sitio web. Este archivo debe llamarse index.php. La página mostrará una lista de cinco eventos culturales elegidos de forma aleatoria. De este modo, cada vez que se cargue la página de inicio deberían mostrarse cinco eventos diferentes.

Para cada evento, se mostrarán los siguientes campos. 

Nombre del evento cultural
Fecha del evento, en formato DD/MM/YYYY, por ejemplo 18/11/2023
Ubicación
Categoría
Las primeras 40 palabras de la descripción del evento cultural, en el caso que el texto sea más largo.
La imagen
La página de inicio ha de permitir paginación de 5 elementos. En las siguientes páginas deberán mostrarse el resto de eventos culturales (sin repetición de eventos).

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 1,5 puntos)

# Actividad 4. Creación de las páginas para los eventos culturales

A continuación crearemos la página única de cada evento cultural. Utilizaremos el archivo post.php, al cual se deberá pasar el identificador del evento que se quiera visualizar. Por ejemplo, post.php?id=5 mostrará la página del evento cuyo identificador es 5.

Además, añadiremos un enlace en el título de cada evento en la página de inicio (index.php, desarrollado en la actividad anterior) que nos lleve a la página única de este evento, donde se mostrarán todos los campos y la descripción completa.

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 1 punto)


# Actividad 5. Ordenación y filtro de los eventos culturales

En la página de inicio añadiremos opciones para poder ordenar los eventos culturales por fecha y también por título (orden alfabético). En ambos casos con las opciones creciente y decreciente.

Ordenaremos los eventos utilizando la función usort de php.

También añadiremos opciones que nos permitan filtrar los eventos por categoría y fecha.

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 1 punto)


# Actividad 6. Menú

Crearemos un menú (horizontal, vertical o bien otro tipo de menú) con enlaces a las secciones descritas en R3.

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 0,5 puntos)

 
# Actividad 7. API

Crearemos una API que exponga los campos de todos los eventos culturales en formato JSON.

La ruta será /api/events

Recordar mostrar, además, una captura del resultado.

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 1 punto)


# Actividad 8. Login

Crearemos una página llamada login.php que muestre un formulario de login. El formulario constará de un campo de texto para username y otro para password (ambos campos serán obligatorios), así como de un botón para enviar los datos.

Para simplificar y personalizar este reto, sólo habrá un usuario registrado que deberá ser vuestro nombre de usuario de la UOC. La contraseña será igual al nombre de usuario.

Las credenciales se guardarán en la base de datos del back-end (servidor) en una nueva tabla llamada “users” y que tendrá los siguientes campos: username y password.

Para acceder a estos campos, se deberán emplear técnicas que eviten el ataque “SQL injection”. Este ataque consiste en la manipulación maliciosa de campos en una base de datos mediante la inserción de código SQL no autorizado. En el siguiente recurso podéis ver algunos ejemplos:

https://www.w3schools.com/sql/sql_injection.asp Links to an external site.

Y más información sobre cómo prevenirlo en PHP:

https://www.acunetix.com/blog/articles/prevent-sql-injection-vulnerabilities-in-php-applications/ Links to an external site.

Por seguridad, en el backend el password se guardará cifrado usando el algoritmo Blowfish y la función PHP password_hash(). Esta función genera un hash distinto en cada llamada. Podéis obtener más información sobre esta función de encriptación en el portal oficial de PHP:

https://www.php.net/manual/es/function.password-hash.php Links to an external site.

A modo de ejemplo, si vuestro nombre de usuario de la UOC fuese “johndoe”, la contraseña también sería “johndoe” pero en la base de datos deberíamos guardar:

    Username: "johndoe"

    Password: "$2y$10$5Zz21uQFWi8PpBaTfSxZNO6MSiZYnO1TAG9iIFCrP1h8fT8NB6cP6"   

Nótese que el password es uno de los hashes resultantes de ejecutar la función PHP comentada anteriormente, es decir:

password_hash("johndoe", PASSWORD_BCRYPT);

(podéis ejecutar este comando en una consola interactiva de PHP)

Si el usuario se valida correctamente, en todas las páginas se mostrará en un lugar visible el mensaje "Hola, < contenido del campo Username >" y la opción de menú logout (logout.php), que permitirá cerrar la sesión y redirigirá a la página de inicio.

En caso de introducir credenciales no válidas, se mostrará un mensaje al respecto.

En la documentación añadiremos, además, capturas del resultado al loguearse con el usuario registrado.

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 1,5 puntos)

 
# Actividad 9. Creación y edición de eventos culturales

El sitio web permitirá añadir nuevos eventos culturales y también editar los existentes, tal como se indica en R2. Esta opción estará sólo disponible para usuarios registrados.

Las opciones de menú que permiten añadir y editar eventos están descritas en R3.

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 1 punto)


# Actividad 10. Publicación

Publicaremos el sitio web en el servidor de la UOC comprobando que funciona correctamente toda la funcionalidad implementada (listado de eventos culturales, la página única de cada uno de ellos, el sistema de autenticación, API, etc).

Indicaremos la URL para acceder al sitio web.

(Explicación de cómo se ha realizado la actividad y capturas de pantalla ilustrativas. 1 punto)

 