// public/assets/js/main.js — interactividad: búsqueda, filtros, modal vídeo, lazy-load, tema
document.addEventListener('DOMContentLoaded', function() {
  // --- Elementos principales ---
  const search = document.getElementById('searchInput');
  const modal = document.getElementById('videoModal');
  const iframeContainer = document.getElementById('modalIframe');
  const modalTitle = document.getElementById('modalTitle');
  const backdrop = document.getElementById('modalBackdrop');
  const themeToggle = document.getElementById('themeToggle');

  // --- Utilidades ---
  const qsAll = sel => Array.from(document.querySelectorAll(sel));

  // --- BÚSQUEDA ---
  if (search) {
    search.addEventListener('input', function(e) {
      applyAllFilters();
    });
  }

  // --- FILTROS: tags y nivel ---
  const filtersWrap = document.getElementById('filters');
  const levelSelect = document.getElementById('levelFilter');

  function collectTags(){
    const set = new Set();
    qsAll('#grid article').forEach(card=>{
      card.querySelectorAll('.chip').forEach(c=> set.add(c.textContent.trim()));
    });
    return Array.from(set).filter(Boolean);
  }

  function renderTagFilters(){
    if(!filtersWrap) return;
    const tags = collectTags();
    filtersWrap.innerHTML = '';
    tags.forEach(tag => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'chip';
      btn.setAttribute('aria-pressed','false');
      btn.textContent = tag;
      btn.addEventListener('click', () => {
        const isActive = btn.classList.toggle('active');
        btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
        applyAllFilters();
      });
      filtersWrap.appendChild(btn);
    });
  }
  renderTagFilters();

  function getActiveTags(){
    return qsAll('#filters .chip.active').map(b=>b.textContent.trim().toLowerCase());
  }

  levelSelect && levelSelect.addEventListener('change', applyAllFilters);

  function applyAllFilters(){
    const q = (search && search.value.toLowerCase().trim()) || '';
    const activeTags = getActiveTags();
    const level = (levelSelect && levelSelect.value) || 'all';

    qsAll('#grid article').forEach(card => {
      const txt = (card.getAttribute('data-search')||'').toLowerCase();
      const matchesQuery = q === '' || txt.includes(q);
      const matchesTags = activeTags.length === 0 || activeTags.every(t => txt.includes(t));
      const cardLevel = (card.getAttribute('data-level')||'').toLowerCase();
      const matchesLevel = level === 'all' || cardLevel === level.toLowerCase();
      card.style.display = (matchesQuery && matchesTags && matchesLevel) ? '' : 'none';
    });
  }

  // --- MODAL VÍDEO con accesibilidad ---
  function openVideo(youtubeId, title){
    iframeContainer.innerHTML = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/${youtubeId}?rel=0&autoplay=1" frameborder="0" allowfullscreen title="${title}"></iframe>`;
    modalTitle.textContent = title || 'Tutorial';
    modal.classList.remove('hidden');
    const closeBtn = document.getElementById('closeModal');
    closeBtn && closeBtn.focus();
    removeTrap = trapFocus(modal);
  }
  function closeVideo(){
    iframeContainer.innerHTML = '';
    modal.classList.add('hidden');
    removeTrap && removeTrap();
  }

  // attach play handlers (delegation not used to keep simple)
  qsAll('.open-video').forEach(btn => {
    btn.addEventListener('click', function(e){
      e.preventDefault();
      const yid = this.dataset.youtube;
      const card = this.closest('article');
      const title = card ? (card.querySelector('h3')?.textContent || '') : '';
      openVideo(yid, title);
    });
    btn.addEventListener('keyup', function(e){ if(e.key === 'Enter' || e.key === ' ') { e.preventDefault(); this.click(); }});
  });

  document.getElementById('closeModal')?.addEventListener('click', closeVideo);
  backdrop?.addEventListener('click', closeVideo);
  document.addEventListener('keydown', function(e){ if(e.key === 'Escape') closeVideo(); });

  // simple focus trap for modal
  function trapFocus(modalEl){
    const focusable = modalEl.querySelectorAll('a[href], button, textarea, input, select, iframe, [tabindex]:not([tabindex="-1"])');
    if(!focusable.length) return function(){};
    let first = focusable[0], last = focusable[focusable.length-1];
    function keyListener(e){
      if(e.key !== 'Tab') return;
      if(e.shiftKey && document.activeElement === first){ e.preventDefault(); last.focus(); }
      else if(!e.shiftKey && document.activeElement === last){ e.preventDefault(); first.focus(); }
    }
    modalEl.addEventListener('keydown', keyListener);
    return ()=> modalEl.removeEventListener('keydown', keyListener);
  }
  let removeTrap = null;

  // --- TEMA OSCURO persistente ---
  const saved = localStorage.getItem('theme');
  if (saved === 'dark') document.documentElement.classList.add('dark');
  themeToggle && themeToggle.addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
  });

  // --- LAZY-LOAD background images (.thumb[data-bg]) ---
  const lazyThumbs = qsAll('.thumb[data-bg]');
  if('IntersectionObserver' in window){
    const io = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          const el = entry.target;
          const url = el.getAttribute('data-bg');
          if(url){ el.style.backgroundImage = `url('${url}')`; el.removeAttribute('data-bg'); }
          obs.unobserve(el);
        }
      });
    }, {rootMargin: '200px'});
    lazyThumbs.forEach(t=> io.observe(t));
  } else {
    lazyThumbs.forEach(el=>{ const url = el.getAttribute('data-bg'); if(url) el.style.backgroundImage = `url('${url}')`; });
  }

  // --- LOAD MORE (cliente) ---
  const loadMore = document.getElementById('loadMore');
  function showInitial(){
    const grid = document.getElementById('grid');
    if(!grid) return;
    const items = Array.from(grid.querySelectorAll('article'));
    const initial = parseInt(grid.getAttribute('data-initial-count')||6,10);
    items.forEach((it, idx)=>{ if(idx>=initial) it.style.display='none'; });
    if(items.length <= initial) loadMore && (loadMore.style.display='none');
  }
  showInitial();
  loadMore && loadMore.addEventListener('click', function(){
    const grid = document.getElementById('grid');
    const items = Array.from(grid.querySelectorAll('article'));
    const currentlyVisible = items.filter(i => i.style.display !== 'none');
    const next = items.slice(currentlyVisible.length, currentlyVisible.length + 6);
    next.forEach(n => n.style.display='');
    if(items.filter(i=>i.style.display!=='none').length === items.length) loadMore.style.display='none';
  });

  // apply filters initially
  setTimeout(()=>{ renderTagFilters(); applyAllFilters(); }, 80);

});
