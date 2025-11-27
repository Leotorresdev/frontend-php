<?php
// public/index.php — Página principal
$tutorials = include __DIR__ . '/src/data.php';
include __DIR__ . '/src/components/header.php';
?>

<main class="site-container">
  <section class="hero">
    <div class="hero-inner">
      <h1>Academia Dev</h1>
      <p class="lead">Vídeos, guías y recursos para aprender a programar. Contenido práctico y actualizado.</p>
      <p class="lead" style="margin-top:8px;color:var(--muted);font-size:15px">Aprende construyendo proyectos reales, mejora tu portafolio y prepárate para entrevistas técnicas con contenidos claros y ejercicios descargables.</p>

      <div class="hero-features" style="display:flex;gap:12px;margin-top:14px;flex-wrap:wrap">
        <div style="background:rgba(255,255,255,0.04);padding:10px 12px;border-radius:10px;display:flex;align-items:center;gap:8px">
          <span style="font-size:18px">🚀</span>
          <div><strong>Proyectos reales</strong><div style="font-size:13px;color:var(--muted)">Construye apps desde cero</div></div>
        </div>
        <div style="background:rgba(255,255,255,0.04);padding:10px 12px;border-radius:10px;display:flex;align-items:center;gap:8px">
          <span style="font-size:18px">📁</span>
          <div><strong>Recursos descargables</strong><div style="font-size:13px;color:var(--muted)">Código y assets listos</div></div>
        </div>
        <div style="background:rgba(255,255,255,0.04);padding:10px 12px;border-radius:10px;display:flex;align-items:center;gap:8px">
          <span style="font-size:18px">🤝</span>
          <div><strong>Comunidad</strong><div style="font-size:13px;color:var(--muted)">Soporte y feedback</div></div>
        </div>
      </div>
      <div class="hero-ctas">
        <a href="#tutorials" class="btn btn-primary">Ver tutoriales</a>
        <a href="about.php" class="btn btn-ghost">Sobre nosotros</a>
      </div>
    </div>
    <div class="hero-media" aria-hidden="true"></div>
  </section>

  <section id="tutorials" class="section">
    <div class="section-header">
      <h2>Últimos tutoriales</h2>
        <div class="search-wrap">
          <input id="searchInput" type="search" placeholder="Buscar tutoriales..." aria-label="Buscar tutoriales" />
          <div style="display:flex;gap:8px;align-items:center">
            <select id="levelFilter" aria-label="Filtrar por nivel">
              <option value="all">Todos los niveles</option>
              <option value="Principiante">Principiante</option>
              <option value="Intermedio">Intermedio</option>
              <option value="Avanzado">Avanzado</option>
            </select>
            <button id="themeToggle" aria-label="Cambiar tema">🌗</button>
          </div>
        </div>
    </div>

      <div id="filters" style="margin-bottom:12px"></div>

      <div id="grid" class="grid" data-initial-count="6">
        <?php foreach($tutorials as $t): ?>
          <?php $tutorial = $t; include __DIR__ . '/src/components/card.php'; ?>
        <?php endforeach; ?>
      </div>

      <div style="text-align:center;margin-top:18px">
        <button id="loadMore" class="btn btn-ghost">Cargar más</button>
      </div>
  </section>

  <!-- Modal vídeo -->
  <div id="videoModal" class="modal hidden" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="modal-content">
      <header class="modal-header">
        <h3 id="modalTitle">Título</h3>
        <button id="closeModal" class="modal-close" aria-label="Cerrar">✕</button>
      </header>
      <div id="modalIframe" class="modal-body"></div>
    </div>
    <div class="modal-backdrop" id="modalBackdrop"></div>
  </div>

</main>

<?php include __DIR__ . '/src/components/footer.php'; ?>
