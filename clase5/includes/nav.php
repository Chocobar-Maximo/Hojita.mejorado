<?php 
  $pagina_actual = basename($_SERVER['PHP_SELF']); 
  $nav_prefix = isset($path_prefix) ? $path_prefix : ''; 
?>

<nav class="navegacion" id="menu-navegacion">
    <a href="<?php echo $nav_prefix; ?>menu.php" class="<?php echo ($pagina_actual == 'menu.php') ? 'active' : ''; ?>"><h2>Menú</h2></a>
    <a href="<?php echo $nav_prefix; ?>cuentas.php" class="<?php echo ($pagina_actual == 'cuentas.php') ? 'active' : ''; ?>">Cuenta <img src="../img/usuario.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>detector.php" class="<?php echo ($pagina_actual == 'detector.php') ? 'active' : ''; ?>">Detector <img src="../img/detector.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>descargar_musica.php" class="<?php echo ($pagina_actual == 'descargar_musica.php') ? 'active' : ''; ?>">Descargar <img src="../img/descargar.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>noticias.php" class="<?php echo ($pagina_actual == 'noticias.php') ? 'active' : ''; ?>">Noticias <img src="../img/noticias.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>reproductor.php" class="<?php echo ($pagina_actual == 'reproductor.php') ? 'active' : ''; ?>">Reproductor <img src="../img/repro.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>blog.php" class="<?php echo ($pagina_actual == 'blog.php') ? 'active' : ''; ?>">Blog <img src="../img/blog.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>curso.php" class="<?php echo ($pagina_actual == 'curso.php') ? 'active' : ''; ?>">Cursos <img src="../img/curso.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>CV.php" class="<?php echo ($pagina_actual == 'CV.php') ? 'active' : ''; ?>">CV <img src="../img/CV.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>sobre_nosotros.php" class="<?php echo ($pagina_actual == 'sobre_nosotros.php') ? 'active' : ''; ?>">Sobre Nosotros <img src="../img/nosotros.png" alt="" height="25" width="25"></a>
    <a href="<?php echo $nav_prefix; ?>ayuda.php" class="<?php echo ($pagina_actual == 'ayuda.php') ? 'active' : ''; ?>">Ayuda <img src="../img/ayuda.png" alt="" height="25" width="25"></a>
</nav>