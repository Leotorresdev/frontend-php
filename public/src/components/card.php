<?php
// public/src/components/card.php
// Espera: $tutorial (array) con keys: id,title,description,thumbnail,tags,youtube
?>
<article class="card" data-search="<?php echo htmlspecialchars($tutorial['title'] . ' ' . $tutorial['description'] . ' ' . implode(' ', $tutorial['tags'] ?? [])); ?>" data-level="<?php echo htmlspecialchars($tutorial['level'] ?? ''); ?>">
  <?php $thumb = !empty($tutorial['thumbnail']) ? $tutorial['thumbnail'] : 'https://images.unsplash.com/photo-1517433456452-f9633a875f6f?q=80&w=1600&auto=format&fit=crop&crop=entropy'; ?>
  <div class="thumb" role="img" aria-label="<?php echo htmlspecialchars($tutorial['title']); ?>" data-bg="<?php echo htmlspecialchars($thumb); ?>">
    <div class="overlay"></div>
    <div class="level-badge"><?php echo htmlspecialchars($tutorial['level'] ?? '—'); ?></div>
    <div class="duration-badge"><?php echo htmlspecialchars($tutorial['duration'] ?? '00:00'); ?></div>
    <a href="#" class="play-cta open-video" data-youtube="<?php echo htmlspecialchars($tutorial['youtube']); ?>" aria-label="Reproducir <?php echo htmlspecialchars($tutorial['title']); ?>">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z"></path></svg>
    </a>
  </div>
  <div class="card-content">
    <h3><?php echo htmlspecialchars($tutorial['title']); ?></h3>
    <p><?php echo htmlspecialchars($tutorial['description']); ?></p>
    <div class="meta">
      <div class="chips">
        <?php foreach(array_slice($tutorial['tags'] ?? [], 0, 3) as $tg): ?>
          <span class="chip"><?php echo htmlspecialchars($tg); ?></span>
        <?php endforeach; ?>
      </div>
      <a href="#" class="open-video" data-youtube="<?php echo htmlspecialchars($tutorial['youtube']); ?>">Ver ▶</a>
    </div>
  </div>
</article>
