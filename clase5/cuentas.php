<?php 
  $titulo_pagina = "Mi Perfil de Usuario - Hojita"; 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  require_once 'includes/header.php'; 
?>
    <main>
        <h2>Cuentas</h2>

        <!-- Fila de Selección de Perfiles -->
        <div class="contenedor-perfiles">
            <a href="#" class="tarjeta-usuario">
                <div class="avatar bg-rojo">
                    <img src="../img/usuario 1.png" alt="Avatar de Cuenta 1">
                </div>
                <span>Cuenta 1</span>
            </a>

            <a href="#" class="tarjeta-usuario">
                <div class="avatar bg-azul">
                    <img src="../img/usuario 2.png" alt="Avatar de Cuenta 2">
                </div>
                <span>Cuenta 2</span>
            </a>

            <a href="#" class="tarjeta-usuario">
                <div class="avatar bg-verde">
                    <img src="../img/usuario 3.png" alt="Avatar de Cuenta 3">
                </div>
                <span>Cuenta 3</span>
            </a>

            <a href="#" class="tarjeta-usuario">
                <div class="avatar bg-amarillo">
                    <img src="../img/usuario 4.png" alt="Avatar de Cuenta 4">
                </div>
                <span>Cuenta 4</span>
            </a>
        </div>

        <!-- Botón / Enlace destacado para Crear Cuenta -->
        <div class="opcion-crear">
            <a href="crear-cuenta.php" class="btn-crear-cuenta">
                + Crear una nueva cuenta
            </a>
        </div>

        <!-- Guía informativa -->
        <div class="informacion-registro">
            <h3>Administración de perfiles múltiples y cuentas familiares</h3>
            <p>
                En nuestra plataforma de streaming musical entendemos que cada miembro de la casa tiene gustos completamente diferentes. Mientras que algunos prefieren ritmos enérgicos para entrenar por las mañanas, otros buscan melodías relajantes para estudiar o trabajar concentrados. Por este motivo, el sistema de gestión de cuentas te permite configurar múltiples perfiles independientes bajo una misma suscripción general, garantizando un espacio único para cada oyente.
            </p>
            <p>
                Cada uno de los perfiles que crees en este panel central mantendrá de forma totalmente privada su propio historial de descubrimientos logrados mediante el detector de canciones, sus listas de reproducción personalizadas y sus marcadores del blog de noticias de actualidad.
            </p>
            <p>
                Si necesitas editar la configuración visual de un perfil específico, cambiar el nombre visible en el sitio, modificar la foto o avatar predeterminado, simplemente debes hacer clic sobre la imagen del usuario correspondiente e ingresar tu clave de seguridad asociada.
            </p>
            <p>
                Te recordamos que para añadir nuevos integrantes a tu plan familiar no es necesario compartir tus credenciales de acceso principales. Cada usuario puede configurar sus propios datos de inicio de sesión de manera descentralizada, resguardando la privacidad de sus contraseñas en todo momento.
            </p>
        </div>
    </main>

    <hr>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>