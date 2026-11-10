Proceso de Normalización de Base de Datos - Proyecto "Hojita"

 1. Entidad / Tabla Principal sin Normalizar (Forma No Normalizada - FNN)
En la etapa inicial del diseño, un registro hipotético de nuestra plataforma de música digital que agrupa toda la información de manera plana y redundante se vería de la siguiente forma:

| id_usuario | username | correo | rol_usuario | canciones_favoritas (Multivalor) | artista_favorito | fecha_registro |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | juan_carlos | juan@correo.com | Administrador, Suscriptor | "Nunca Quise, Miles, Razzmatazz" | Intoxicados, Mother Mother | 2026-05-10 |

* Problemas detectados: 
  * Presencia de campos multivalorados (`canciones_favoritas` almacena múltiples elementos en una sola celda separados por comas).
  * Redundancia e información repetitiva en los datos de usuario, roles y artistas.


 2. Proceso de Normalización

 Primera Forma Normal (1FN)
* Objetivo: Eliminar los grupos repetitivos o listas de datos para asegurar que cada campo sea atómico (un único valor por celda).
* Estructura resultante: Desglosamos cada canción favorita en una fila independiente asociada al usuario, eliminando el campo multivalor y garantizando atomicidad.

 Segunda Forma Normal (2FN)
* Objetivo: Partir la tabla para que todas las columnas no clave dependan funcionalmente de toda la clave primaria.
* Estructura resultante: Se separan los datos personales del usuario en una tabla `usuarios`, los datos de las canciones y artistas en una tabla `canciones`, y se reestructuran las relaciones para evitar dependencias parciales.

 Tercera Forma Normal (3FN)
* Objetivo: Eliminar las dependencias transitivas (atributos que dependen de otros atributos que no son clave, como roles o categorías).
* Estructura resultante: Se extraen los roles a una tabla maestra independiente (`roles`) y las categorías o géneros musicales a otra tabla maestra (`categorias`). De esta forma, ningún atributo no clave depende de otro atributo no clave.


 3. Diagrama / Listado de Tablas Resultante

Tras completar el proceso de normalización hasta la 3FN, la base de datos de nuestro sistema queda estructurada en las siguientes tablas relacionales, indicando sus Claves Primarias (PK) y Claves Foráneas (FK):

1. `roles` (Tabla Maestra / Secundaria)
   * `id` (PK)
   * `nombre_rol`

2. `categorias` (Tabla Maestra / Secundaria)
   * `id` (PK)
   * `nombre_categoria`

3. `usuarios` (Tabla Principal de Usuarios)
   * `id` (PK)
   * `username`
   * `correo`
   * `pass`
   * `rol_id` (FK a `roles.id`)
   * `cumpleanos`
   * `genero`
   * `created_at`, `updated_at` (Auditoría)

4. `canciones` (Tabla Principal de Negocio)
   * `id` (PK)
   * `titulo`
   * `artista`
   * `album`
   * `categoria_id` (FK a `categorias.id`)
   * `portada_url`
   * `destacado`
   * `created_at`, `updated_at` (Auditoría)

5. `usuario_cancion_favorita` (Tabla de Relación / Detalle N:M)
   * `id` (PK)
   * `usuario_id` (FK a `usuarios.id`)
   * `cancion_id` (FK a `canciones.id`)