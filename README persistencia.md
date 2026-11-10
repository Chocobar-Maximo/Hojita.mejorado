 Trabajo Práctico N° 7: Módulo CRUD y Conexión con MySQL (Hito 2)

 Descripción y Objetivos
Este módulo implementa la persistencia de datos del proyecto mediante una conexión segura utilizando PDO (PHP Data Objects) conectada al motor de base de datos MySQL. El sistema incorpora un módulo CRUD (Create, Read, Update, Delete) totalmente operativo y adaptado a la temática musical de la plataforma "Hojita", gestionando el catálogo de canciones de manera integrada al diseño visual modular del sitio.

 Características Técnicas y Seguridad
- Conexión Robusta: Instancia de PDO optimizada con manejo de excepciones mediante bloques try-catch y configuración de juego de caracteres `utf8mb4`.
- Prevención de Inyección SQL: Todas las consultas de inserción, lectura, actualización y borrado implementan estrictamente Consultas Preparadas (Prepared Statements) con parámetros seguros.
- Protección contra XSS: Uso exhaustivo de la función `htmlspecialchars()` al renderizar variables dinámicas e información proveniente de la base de datos en las vistas HTML.
- Estructura Modular: Organización limpia del código separando los componentes de configuración (`config/conexion.php`), plantillas comunes (`includes/`) y la lógica administrativa bajo el directorio `/admin/`.