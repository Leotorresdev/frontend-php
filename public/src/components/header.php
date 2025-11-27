<?php
// public/src/components/header.php — encabezado y carga de recursos
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php
  $site_title = $site_title ?? 'Academia Dev';
  $site_desc = $site_desc ?? 'Vídeos y recursos prácticos para aprender programación.';
  $og_image = $og_image ?? '/assets/images/og-default.jpg';
  ?>
  <title><?php echo htmlspecialchars($site_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($site_desc); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($site_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($site_desc); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" as="style">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
  <script defer src="assets/js/main.js"></script>
</head>
<body>
  <header class="site-header" style="padding:18px 0;">
    <div class="site-container" style="display:flex;align-items:center;justify-content:space-between;">
      <a href="index.php" style="display:flex;align-items:center;text-decoration:none;color:inherit">
        <img src="assets/images/logo-placeholder.png" alt="Academia Dev" style="width:38px;height:38px;border-radius:8px;margin-right:10px;object-fit:cover" onerror="this.style.display='none'">
        <strong style="font-size:18px">Academia <span style="color:var(--accent-color)">Dev</span></strong>
      </a>
      <nav>
        <a href="index.php" style="margin-right:14px;text-decoration:none;color:inherit;font-weight:600">Inicio</a>
        <a href="about.php" style="margin-right:14px;text-decoration:none;color:inherit;font-weight:600">Sobre nosotros</a>
        <div style="display:inline-flex;gap:8px;margin-left:12px;align-items:center">
          <a href="#login" class="btn btn-ghost" aria-label="Iniciar sesión">Iniciar sesión</a>
          <a href="#register" class="btn btn-primary" aria-label="Registrarse">Registrarse</a>
        </div>
      </nav>
    </div>
  </header>
