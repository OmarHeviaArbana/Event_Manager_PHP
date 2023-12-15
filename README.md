# Event_Manager_PHP

El reto consiste en desarrollar un sitio web en Drupal. El sitio web consistirá en un directorio de eventos culturales para ayuntamientos que ofrezca a los ciudadanos una plataforma para descubrir y participar en eventos culturales de la ciudad.

La implementación se basa en un tipo de contenido personalizado en Drupal llamado "Evento Cultural" con campos como nombre, fecha, descripción y categoría.
A partir de este tipo de contenido se tendrá que crear un calendario interactivo y opciones de búsqueda avanzada que permitan a los usuarios mantenerse informados acerca de nuevas actividades y explorar eventos según sus preferencias, respectivamente.. El sitio complementará este núcleo de funcionalidades con otras auxiliares como compartición en redes sociales, escritura de comentarios, etc.

Los requisitos del reto son los siguientes:

# R1. 

Creación de un tipo de contenido personalizado: Configurar un tipo de contenido personalizado llamado "Evento Cultural" que incluya campos esenciales como nombre del evento, fecha, hora, descripción, ubicación, imagen destacada y categoría. Además, se deberá considerar la inclusión de campos adicionales según las necesidades específicas de los eventos culturales.

# R2. 

Búsqueda y filtrado avanzado: Configurar opciones de filtrado avanzado para permitir a los usuarios buscar eventos por categoría (por ejemplo, música, arte o teatro, entre otros), fecha, ubicación y palabras clave. Utilizar el módulo "Views" para crear una página con un sistema de filtrado intuitivo.

# R3. 

Listado de ubicaciones: Mostrar una lista detallada de ubicaciones de eventos, incluyendo direcciones y detalles relevantes. Si se desean mapas, se pueden incluir en las páginas de eventos específicos.

# R4. 

Gestión de usuarios y roles: Crear el rol de usuario “organizador de eventos", con permisos específicos para la publicación y gestión de eventos. Los organizadores de eventos deben poder añadir y administrar sus propios eventos.

# R5. 

Comentarios: Habilitar la función de comentarios en las páginas de eventos para que los usuarios puedan expresar sus opiniones.

# R6. 

Integración de redes sociales: Agregar botones de compartir en redes sociales en las páginas de eventos para que los usuarios puedan promover los eventos en sus perfiles de redes sociales, como Facebook y Twitter. En el caso de utilizar algún módulo contribuido justificar su elección.

# R7. 

Páginas informativas: Crear páginas informativas adicionales, como "Acerca de nosotros" y "Preguntas frecuentes", para proporcionar a los visitantes información sobre el funcionamiento del directorio y responder a preguntas comunes.

# R8. 

Eventos destacados: Destacar cinco  eventos especiales en la página de inicio del directorio y configurar un sistema de rotación para mostrar una variedad de eventos destacados a lo largo del tiempo.

# R9. 

Una API REST de consulta que permita obtener toda la información en formato json. Debe permitir la paginación de los resultados. La url de consulta debe ser /api/eventos. No es necesario poder añadir o modificar contenidos es una API solo de lectura.

# R10. 

El menú deberá tener las siguientes opciones

Inicio (donde se muestran solo los eventos destacados)
Eventos. Listado de eventos filtrable
Ubicaciones. Listado de ubicaciones
Acerca de nosotros
Preguntas frecuentes
API. Accede a la URL de la API en una nueva pestaña, tal como se pide en el apartado j. 
 

### Tareas
Dados estos requisitos del proyecto, elegimos como plataforma Drupal 10, ya que se adapta mejor a los requerimientos que otros CMS como WordPress, al ofrecer funcionalidad específica para definir fácilmente la estructura de los contenidos. Utilizando esta plataforma se pide realizar las siguientes tareas:

# a) Instalar Drupal en la máquina local y comprobar su funcionamiento correcto. Deberás describir los pasos que has realizado y adjuntar capturas de pantalla para ilustrar los pasos.
(Máximo 300 palabras y capturas de pantalla ilustrativas, 0.5  puntos)


# b) Crear un tipo de contenido personalizado llamado "Evento cultural" con campos para el nombre, la fecha y hora, descripción, ubicación, categoría. imagen destacada y palabras clave.
La categoría y las ubicaciones deben implementarse como taxonomías en Drupal. Añadir 20 eventos ficticios o reales, a mano o utilizando algún módulo de generación de contenidos justificando su elección.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 1 punto)


# c) Crear una vista en forma de página que permita al usuario filtrar en la web los eventos por categoría, fecha, ubicación o palabras clave.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 1 punto)


# d) Crear una vista que sea un listado de las ubicaciones de los eventos. Una ubicación además del nombre puede tener un campo de dirección y código postal, por ejemplo “Teatre grec, Passeig de Santa Madrona, 08038”
(Máximo 200 palabras y capturas de pantalla ilustrativas, 1 punto)


# e) Crear un rol “gestor de eventos” que solo tenga permiso para crear y editar sus propios eventos. Comprobar su funcionamiento y crear dos eventos utilizando este rol.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 1 punto)


# f) Permitir la posibilidad de añadir comentarios en los eventos por parte de los visitantes de la web.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 0.5 puntos)


# g) Agregar botones en la página de cada evento para compartir en las redes sociales (por ejemplo facebook o twitter). Escoger algún módulo contribuido y justificar su elección.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 0.5 puntos)


# h) Crear dos páginas informativas que deben aparecer en el menú. “Acerca de nosotros” y “Preguntas frecuentes”. El texto puede ser ficticio.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 0.5 puntos)


i) En la página de inicio deben aparecer 5 eventos destacados. El orden debe ser aleatorio. Deben mostrar al menos el título, la fecha del evento y la imagen y un enlace para ver los detalles en la página única de cada evento.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 1 punto)


j) Crear una API REST de consulta que devuelva toda la información de los eventos en formato json, sin autenticación. La url debe ser api/eventos.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 1 punto)


k) Publicar el sitio web en el servidor de la UOC. Confirmar el funcionamiento correcto.Comentar los pasos seguidos para este propósito.
(Máximo 200 palabras y capturas de pantalla ilustrativas, 2 puntos)