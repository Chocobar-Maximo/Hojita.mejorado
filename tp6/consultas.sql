USE hojita;

-- ==========================================
-- 1. CREATE (Insertar datos iniciales)
-- ==========================================

-- Inserciones en tablas maestras (Roles y Categorías)
INSERT INTO roles (nombre_rol) VALUES ('Administrador'), ('Suscriptor');

INSERT INTO categorias (nombre_categoria) VALUES ('Rock Nacional'), ('Alt-Rock / Indie');

-- Inserciones en la tabla principal de usuarios (vinculando rol_id)
INSERT INTO usuarios (username, correo, pass, rol_id, cumpleanos, genero) 
VALUES ('juan_carlos', 'juancarlos@correo.com', 'secreto123', 2, '2000-05-15', 'masculino');

INSERT INTO usuarios (username, correo, pass, rol_id, cumpleanos, genero) 
VALUES ('admin_hojita', 'admin@hojita.com', 'adminpass', 1, '1995-10-20', 'otro');

-- Inserciones en la tabla principal de canciones (vinculando categoria_id)
INSERT INTO canciones (titulo, artista, album, categoria_id, portada_url, destacado) 
VALUES ('Nunca Quise', 'Intoxicados', 'Otro Día En El Planeta Tierra', 1, 'img/nunca_quise.jpg', 1);

INSERT INTO canciones (titulo, artista, album, categoria_id, portada_url, destacado) 
VALUES ('Miles', 'Mother Mother', 'O My Heart', 2, 'img/miles.jpg', 1);

-- Inserción en la tabla de relación (usuario marca canción como favorita)
INSERT INTO usuario_cancion_favorita (usuario_id, cancion_id) VALUES (1, 1), (1, 2);


-- ==========================================
-- 2. READ (Consultas y Uniones)
-- ==========================================

-- Consulta SELECT con WHERE y ORDER BY
SELECT * FROM canciones 
WHERE destacado = 1 
ORDER BY titulo ASC;

-- Consulta SELECT con INNER JOIN uniendo múltiples tablas relacionales
SELECT 
    c.titulo AS Cancion, 
    c.artista AS Artista, 
    cat.nombre_categoria AS Categoria, 
    u.username AS Usuario_Favorito
FROM canciones c
INNER JOIN categorias cat ON c.categoria_id = cat.id
INNER JOIN usuario_cancion_favorita ucf ON c.id = ucf.cancion_id
INNER JOIN usuarios u ON ucf.usuario_id = u.id;


-- ==========================================
-- 3. UPDATE (Actualización de registros)
-- ==========================================

-- Actualizar el estado de destacado de una canción utilizando estrictamente WHERE
UPDATE canciones 
SET destacado = 0, album = 'Edición Especial Remasterizada' 
WHERE id = 1;


-- ==========================================
-- 4. DELETE (Eliminación de registros)
-- ==========================================

-- Dar de baja un registro de prueba específico utilizando WHERE
DELETE FROM usuario_cancion_favorita 
WHERE usuario_id = 1 AND cancion_id = 2;