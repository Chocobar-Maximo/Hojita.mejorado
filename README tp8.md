 Trabajo Práctico N° 8: Sistema de Autenticación, Control de Accesos y Seguridad Web

 Descripción y Objetivos
Se desarrolló un sistema integral de gestión de cuentas y autenticación de usuarios para la plataforma "Hojita". El módulo abarca el registro seguro de nuevos usuarios, inicio de sesión (Login), control de acceso por roles (RBAC) mediante un guardián de rutas, y un cierre de sesión seguro (Logout) alineado con los estándares internacionales de seguridad web de OWASP.

 Características Técnicas y Seguridad
- Hashing de Contraseñas: Las claves de los usuarios se almacenan utilizando encriptación unidireccional con `password_hash()` (algoritmo BCRYPT) y se validan en el inicio de sesión mediante `password_verify()`.
- Gestión Segura de Sesiones: Implementación de `session_start()` junto con `session_regenerate_id(true)` tras una autenticación exitosa para mitigar ataques de fijación de sesión (Session Fixation).
- Control de Acceso por Roles (RBAC): Creación del script reutilizable `auth_guard.php`, el cual valida el estado de la sesión activa y restringe las vistas del panel de administración (`/admin/`) exclusivamente a los usuarios con privilegios de administrador (`rol_id = 1`).
- Limpieza de Estado: El módulo `logout.php` limpia correctamente las variables superglobales de sesión, invalida la cookie de sesión del navegador y destruye la sesión por completo.