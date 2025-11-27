<?php
include __DIR__ . '/src/components/header.php';
?>

<main class="site-container">
	<section class="section">
		<h1>Sobre nosotros — Academia Dev</h1>
		<p class="lead">Somos un proyecto educativo dedicado a crear tutoriales prácticos sobre programación. Este sitio muestra ejemplos, vídeos y recursos para aprender paso a paso.</p>
	</section>

	<section class="about-hero">
		<div>
			<h2>Enfoque y valores</h2>
			<p class="lead">En Academia Dev creemos en aprender construyendo. Aquí encontrarás cursos enfocados a crear proyectos reales, mejorar tus habilidades y construir un portafolio.</p>

			<div style="display:flex;gap:12px;margin:12px 0;align-items:center">
				<a href="#login" class="btn btn-ghost">Iniciar sesión</a>
				<a href="#register" class="btn btn-primary">Registrarse</a>
			</div>

			<div class="about-panel accent">
				<h3>Nuestra misión</h3>
				<p>Hacer accesible el aprendizaje de la programación con recursos prácticos, claros y actualizados para todas las personas que quieran comenzar o avanzar en su carrera tech.</p>

				<h3>Qué ofrecemos</h3>
				<ul>
					<li>Vídeos paso a paso con ejemplos descargables.</li>
					<li>Proyectos prácticos: desde landing pages hasta APIs completas.</li>
					<li>Materiales actualizados con buenas prácticas y seguridad básica.</li>
				</ul>

				<div class="stats">
					<div class="stat"><h3>120+</h3><p>Tutoriales</p></div>
					<div class="stat"><h3>8k+</h3><p>Estudiantes</p></div>
					<div class="stat"><h3>5</h3><p>Rutas de aprendizaje</p></div>
				</div>
			</div>
		</div>

		<aside>
			<div class="about-panel">
				<h3>Únete a la comunidad</h3>
				<p>Suscríbete para recibir nuevos tutoriales y recursos. También puedes seguirnos en redes para ver mini-clases y tips.</p>
				<form onsubmit="return false;" style="display:flex;gap:8px;margin-top:12px">
					<input type="email" placeholder="tu@correo.com" style="flex:1;padding:10px;border-radius:8px;border:1px solid rgba(0,0,0,0.06)" />
					<button class="btn btn-primary">Suscribir</button>
				</form>
			</div>
		</aside>
	</section>
	<section class="section">
		<h2>Cómo aprender con nosotros</h2>
		<p>Nos centramos en proyectos, con ejercicios al final de cada vídeo y archivos de ejemplo. Recomendamos seguir una ruta: Fundamentos → Frontend → Backend → Proyecto final.</p>
	</section>

	<section class="section">
		<h2>Metodología</h2>
		<p>Nuestra metodología combina teoría breve con práctica intensiva. Cada módulo incluye:
		<ul>
			<li>Vídeo explicativo con demostraciones en vivo.</li>
			<li>Ejercicios prácticos y retos para aplicar lo aprendido.</li>
			<li>Recursos descargables: código fuente, assets y guías paso a paso.</li>
		</ul>
		</p>
	</section>

	<section class="section">
		<h2>Cómo empezar</h2>
		<ol>
			<li>Revisa los tutoriales de <strong>Fundamentos</strong> si eres nuevo.</li>
			<li>Elige una ruta (Frontend o Backend) y sigue los cursos marcados.</li>
			<li>Realiza los proyectos y sube tu código a GitHub para practicar entrevistas técnicas.</li>
		</ol>
	</section>

	<section class="section">
		<h2>Equipo</h2>
		<p>Equipo pequeño y enfocado en educación: instructores expertos, diseñadores y desarrolladores que crean contenido claro y actualizado.</p>
		<ul>
			<li><strong>Coordinador:</strong> Dirección de contenido y roadmap.</li>
			<li><strong>Instructores:</strong> Profesionales con experiencia práctica.</li>
			<li><strong>Diseño/UX:</strong> Interfaces y material visual.</li>
		</ul>
	</section>

	<section class="section">
		<h2>Roadmap</h2>
		<p>Próximas mejoras previstas:</p>
		<ul>
			<li>Panel de administración para gestionar tutoriales.</li>
			<li>Versiones locales de thumbnails y optimización WebP/AVIF.</li>
			<li>Integración con plataforma de comentarios y foro.</li>
		</ul>
	</section>

	<section class="section">
		<h2>Preguntas frecuentes</h2>
		<dl>
			<dt>¿Necesito experiencia previa?</dt>
			<dd>No necesariamente. Recomendamos empezar por los tutoriales de Fundamentos.</dd>
			<dt>¿Puedo usar los recursos en proyectos comerciales?</dt>
			<dd>Sí, el contenido es didáctico; revisa los requisitos de atribución si aportas a un proyecto público.</dd>
		</dl>
	</section>

	<section class="section">
		<h2>Contacto</h2>
		<p>¿Tienes sugerencias o quieres colaborar? Escríbenos a <a href="mailto:contacto@academiadev.local">contacto@academiadev.local</a>.</p>
	</section>

</main>

<?php include __DIR__ . '/src/components/footer.php'; ?>
