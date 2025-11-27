# Academia Dev — Frontend (Prototipo)

Descripción
-----------
Academia Dev es un prototipo frontend de una plataforma educativa enfocada en la enseñanza de programación mediante tutoriales en vídeo, guías y recursos descargables. Está diseñado como ejemplo didáctico para aprender a construir interfaces modernas, accesibles y responsivas con PHP y HTML/CSS/JS.

Estructura del proyecto
-----------------------
- `public/` — Carpeta pública que contiene los archivos servidos por el servidor web (ej. XAMPP).
  - `index.php` — Página principal con listado de tutoriales, búsqueda, filtros y modal de vídeo.
  - `about.php` — Página "Sobre nosotros" con información del proyecto y formulario de suscripción (simulado).
  - `assets/`
    - `css/styles.css` — Estilos principales (paleta, layout, responsive, animaciones).
    - `js/main.js` — Lógica del frontend: búsqueda, filtros, lazy-load, modal, carga incremental.
  - `src/`
    - `data.php` — Datos de ejemplo (array PHP) con tutoriales (titulo, descripción, thumbnail, tags, youtube, duration, level).
    - `components/`
      - `header.php`, `footer.php`, `card.php` — componentes parciales reutilizables.

Objetivos del prototipo
-----------------------
- Proveer una interfaz moderna y atractiva para mostrar tutoriales.
- Demostrar buenas prácticas de frontend: accesibilidad básica (focus management, keyboard), lazy-load de imágenes, filtros y micro-interacciones.
- Facilitar la extensión a un backend real (API o base de datos) y un panel de administración.

Cómo ejecutar localmente (Windows + XAMPP)
-----------------------------------------
1. Coloca la carpeta del proyecto en `C:\xampp\htdocs\frontend_proyecto`.
2. Inicia Apache desde el Panel de XAMPP (`C:\xampp\xampp-control.exe`).
3. Abre en tu navegador:
   - `http://localhost/frontend_proyecto/public/index.php`
   - `http://localhost/frontend_proyecto/public/about.php`

Personalización rápida
----------------------
- Reemplaza las URLs de miniaturas en `public/src/data.php` por imágenes locales en `public/assets/images/` para mejor control y rendimiento.
- Añade/edita tutoriales en `public/src/data.php` o adapta un endpoint JSON para administrar contenido dinámicamente.

Mejoras posibles (próximos pasos)
--------------------------------
- Mover `src/` fuera de `public/` para seguridad, y ajustar `include` paths.
- Generar thumbnails locales y servir versiones WebP/AVIF para mejorar rendimiento.
- Añadir un endpoint PHP para suscripciones (`subscribe.php`) que guarde correos en `data/subscribers.json`.
- Implementar un panel `admin/` con un CRUD (JSON o DB) para gestionar tutoriales desde una UI.
- Añadir tests de accesibilidad y optimización (Lighthouse/axe).

Contacto y licencia
-------------------
Este proyecto es un ejemplo didáctico creado como prototipo. Puedes adaptarlo libremente para proyectos personales o educativos.

---
_Fecha de creación: 2025-11-27_
