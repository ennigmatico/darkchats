<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- SEO Meta Tags -->
  <meta name="description" content="DarkChats: Conectando personas de manera segura y privada.">
  <meta name="keywords" content="chats, seguridad, privacidad, encriptación, mensajería, DarkChats">
  <meta name="author" content="DarkChats">
  <meta name="robots" content="index, follow">
  <meta name="theme-color" content="#1F2937">

  <!-- Open Graph / Facebook Meta Tags -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="DarkChats - Página Principal">
  <meta property="og:description" content="Conectando personas de manera segura y privada a través de DarkChats.">
  <meta property="og:image" content="https://darkchats.com/assets/img/og-image.jpg">
  <meta property="og:url" content="https://darkchats.com">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="DarkChats - Página Principal">
  <meta name="twitter:description" content="Conectando personas de manera segura y privada a través de DarkChats.">
  <meta name="twitter:image" content="https://darkchats.com/assets/img/twitter-image.jpg">
  <meta name="twitter:url" content="https://darkchats.com">

  <!-- Favicon -->
  <link rel="icon" href="/path/to/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/path/to/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/path/to/favicon-32x32.png">

  <!-- Title -->
  <title>DarkChats - Página Principal</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- External CSS (if any) -->
  <link rel="stylesheet" href="/path/to/your/custom-styles.css">

  <!-- Meta tags for mobile optimization -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- Preload important assets for faster loading -->
  <link rel="preload" href="/assets/img/logo.png" as="image">
  <link rel="preload" href="/assets/fonts/Poppins.woff2" as="font" type="font/woff2" crossorigin="anonymous">

  <!-- Remove entire <style> block -->

  <!-- External JS (if any) -->
  <script src="/path/to/your/custom-scripts.js" defer></script>

  <!-- Web Manifest -->
  <link rel="manifest" href="/manifest.json">

  <!-- Analytics (Google Analytics / etc.) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXX-X"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-XXXXXXX-X');
  </script>

  <!-- Add responsive scaling styles -->
  <style>
    @media (min-width: 2000px) {
      html { font-size: 18px; }
    }
    @media (max-width: 1024px) {
      html { font-size: 14px; }
    }
    @media (max-width: 768px) {
      html { font-size: 12px; }
    }
  </style>
</head>

<body class="bg-gray-200 flex flex-col min-h-screen text-[clamp(12px,1vw,16px)]">
  <!-- Header - Single row -->
  <header id="mobile-header" class="fixed w-full bg-gray-800 text-white h-16 z-10">
    <div class="flex items-center justify-between h-full px-4 max-w-[2000px] mx-auto scale-[clamp(0.8,1vw,1)]">
      <!-- Logo/Brand -->
      <div class="flex-shrink-0">
        <img src="images/fondo.webp" alt="Logo" class="h-8 w-8">
      </div>

      <!-- Search Bar -->
      <div class="flex-1 mx-4 max-w-xl">
        <input type="text" id="searchInput" placeholder="Buscar Web"
          class="w-full p-2 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
      </div>

      <!-- Share buttons container -->
      <div class="flex items-center gap-2 overflow-x-auto">
        <!-- Convert all share buttons to this format -->
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-facebook" target="_blank" 
          style="background-color: #4267B2">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-twitter" target="_blank" 
          style="background-color: #1DA1F2">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-whatsapp" target="_blank" 
          style="background-color: #25D366">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-linkedin" target="_blank" 
          style="background-color: #0077B5">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733561.png" alt="LinkedIn" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-reddit" target="_blank" 
          style="background-color: #FF4500">
          <img src="https://cdn-icons-png.flaticon.com/512/2111/2111589.png" alt="Reddit" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-vk" target="_blank" 
          style="background-color: #4C75A3">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733635.png" alt="VK" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-tumblr" target="_blank" 
          style="background-color: #35465C">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733608.png" alt="Tumblr" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-pocket" target="_blank" 
          style="background-color: #EE4056">
          <img src="https://cdn-icons-png.flaticon.com/512/889/889492.png" alt="Pocket" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-telegram" target="_blank" 
          style="background-color: #0088CC">
          <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="Telegram" class="w-4 h-4">
        </a>
        <a class="flex items-center justify-center w-8 h-8 rounded-full hover:opacity-80 transition-opacity"
          href="#" id="share-email" target="_blank" 
          style="background-color: #D44638">
          <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email" class="w-4 h-4">
        </a>
      </div>
    </div>
  </header>

  <!-- Sidebar - Adjusted -->
  <div id="menu" class="fixed left-0 top-16 w-64 bg-white shadow-lg h-[calc(100vh-4rem)] overflow-y-auto">
    <div class="sticky top-0 bg-gray-50 p-2 border-b border-gray-200">
      <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wider px-2">Filtrar por categoría</h3>
    </div>
    <ul id="menuList" class="py-1 scale-[clamp(0.8,1vw,1)]">
      <li>
        <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 border-b border-gray-100 text-sm transition-all duration-200 ease-in-out capitalize filter-option active">
          📑 Mostrar Todo
        </a>
      </li>
    </ul>
  </div>

  <!-- Main content -->
  <main class="pt-16 pl-64">
    <!-- Gallery section -->
    <section id="gallery" class="p-4">
      <div class="max-w-[2000px] mx-auto">
        <div id="pages" class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-4">
          <!-- Cards will be inserted here -->
        </div>
      </div>
    </section>
  </main>

  <!-- Footer - Aligned with main content -->
  <footer class="pl-64 bg-gray-800 text-white mt-auto">
    <div class="max-w-[2000px] mx-auto px-4 py-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- About Section -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Sobre DarkChats</h3>
          <p class="text-gray-300 text-sm">
            Plataforma dedicada a conectar personas y compartir recursos web de manera segura y privada.
          </p>
        </div>

        <!-- Quick Links -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Enlaces Rápidos</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-gray-300 hover:text-white transition">Inicio</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white transition">Términos de Uso</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white transition">Política de Privacidad</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white transition">Contáctanos</a></li>
          </ul>
        </div>

        <!-- Contact Info -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Contacto</h3>
          <ul class="space-y-2 text-sm">
            <li class="flex items-center">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
              </svg>
              <a href="mailto:contact@darkchats.com" class="text-gray-300 hover:text-white transition">contact@darkchats.com</a>
            </li>
            <li class="flex items-center">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
              </svg>
              <span class="text-gray-300">Disponible 24/7</span>
            </li>
          </ul>
        </div>

        <!-- Social Media -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Síguenos</h3>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-300 hover:text-white transition">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-300 hover:text-white transition">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-300 hover:text-white transition">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Bottom Bar -->
      <div class="border-t border-gray-700 mt-8 pt-8 text-sm text-center text-gray-400">
        <p>&copy; 2024 DarkChats. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <!-- Contenedor del texto y botón flotante -->
  <div class="fixed bottom-32 right-4 flex flex-col items-center">
    <!-- Texto informativo -->
    <span class="text-green-500 text-lg font-bold mb-2">Agrega Tu Web</span>

    <!-- Botón flotante para abrir el formulario -->
    <a href="#" onclick="toggleOverlay()"
      class="bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-700 transition duration-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
    </a>
  </div>

  <!-- Overlay para el formulario -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50"
    onclick="closeOverlay(event)">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-4xl relative" onclick="event.stopPropagation()">
      <button onclick="toggleOverlay()" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
      <h2 class="text-xl font-semibold mb-4">Agregar nueva página</h2>
      <form action="addPage.php" method="POST" class="space-y-4">
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Título *</label>
          <input type="text" name="title" id="title" required placeholder="Nombre De La Web" class="mt-1 p-2 w-full border rounded">
        </div>
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700">Descripción *</label>
          <textarea name="description" id="description" required placeholder="Describe el funcionamiento o cervicios que brinda o ofrece la pagina en cuestion ." class="mt-1 p-2 w-full border rounded"></textarea>
        </div>
        <div>
          <label for="url" class="block text-sm font-medium text-gray-700">URL *</label>
          <input type="url" name="url" id="url" required placeholder="ingresa la url principal https://www.mipagina.com" class="mt-1 p-2 w-full border rounded">
        </div>
        <div>
          <label for="keywords" class="block text-sm font-medium text-gray-700">Palabras clave (separadas por comas) *</label>
          <input type="text" name="keywords" id="keywords" required placeholder="ingresa maximo 5 palabras clave con los que tu pagina sera encontrada, página, web, diseño, tecnología" class="mt-1 p-2 w-full border rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Agregar Página</button>
      </form>
    </div>
  </div>

  <script>
    function toggleOverlay() {
      const overlay = document.getElementById('overlay');
      overlay.classList.toggle('hidden');
    }

    function closeOverlay(event) {
      const overlay = document.getElementById('overlay');
      if (event.target === overlay) {
        overlay.classList.add('hidden');
      }
    }
  </script>

  <script>
    // Obtener la URL actual y el título
    const currentUrl = window.location.href;
    const pageTitle = document.title;

    // Facebook
    document.getElementById("share-facebook").href =
      `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;

    // Twitter
    document.getElementById("share-twitter").href =
      `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(pageTitle)}`;

    // WhatsApp
    document.getElementById("share-whatsapp").href =
      `https://api.whatsapp.com/send?text=${encodeURIComponent(pageTitle)}%20${encodeURIComponent(currentUrl)}`;

    // LinkedIn
    document.getElementById("share-linkedin").href =
      `https://www.linkedin.com/shareArticle?url=${encodeURIComponent(currentUrl)}&title=${encodeURIComponent(pageTitle)}`;

    // Reddit
    document.getElementById("share-reddit").href =
      `https://www.reddit.com/submit?url=${encodeURIComponent(currentUrl)}&title=${encodeURIComponent(pageTitle)}`;

    // VK
    document.getElementById("share-vk").href =
      `https://vk.com/share.php?url=${encodeURIComponent(currentUrl)}`;

    // Tumblr
    document.getElementById("share-tumblr").href =
      `https://www.tumblr.com/share/link?url=${encodeURIComponent(currentUrl)}&name=${encodeURIComponent(pageTitle)}`;

    // Pocket
    document.getElementById("share-pocket").href =
      `https://getpocket.com/save?url=${encodeURIComponent(currentUrl)}&title=${encodeURIComponent(pageTitle)}`;

    // Telegram
    document.getElementById("share-telegram").href =
      `https://t.me/share/url?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(pageTitle)}`;

    // Email
    document.getElementById("share-email").href =
      `mailto:?subject=${encodeURIComponent(pageTitle)}&body=${encodeURIComponent(currentUrl)}`;
  </script>

  <script>
        let activeFilter = 'all';

        function populateKeywordMenu() {
          // Obtener keywords únicos de todas las páginas
          const keywords = new Set();
          allPages.forEach(page => {
            page.keywords.forEach(keyword => keywords.add(keyword.toLowerCase()));
          });

          const menuList = document.getElementById('menuList');
          // Limpiar menú existente excepto "Mostrar Todo"
          while (menuList.children.length > 1) {
            menuList.removeChild(menuList.lastChild);
          }

          // Agregar keywords al menú con íconos
          const icons = ['🔍']; // Puedes agregar más íconos
          [...keywords].sort().forEach((keyword, index) => {
            const icon = icons[index % icons.length];
            const li = document.createElement('li');
            li.innerHTML = `<a href="#" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 border-b border-gray-100 text-sm transition-all duration-200 ease-in-out capitalize filter-option" data-keyword="${keyword}">${icon} ${keyword}</a>`;
            menuList.appendChild(li);
          });

          // Agregar manejadores de eventos
          document.querySelectorAll('.filter-option').forEach(option => {
            option.addEventListener('click', (e) => {
              e.preventDefault();
              const keyword = e.target.dataset.keyword;

              // Actualizar estado activo
              document.querySelectorAll('.filter-option').forEach(opt =>
                opt.classList.remove('active')
              );
              e.target.classList.add('active');

              // Aplicar filtro
              activeFilter = keyword;
              filterPagesByKeyword(keyword);
            });
          });
        }

        function filterPagesByKeyword(keyword) {
          if (keyword === 'all') {
            displayPages(allPages);
            return;
          }

          const filteredPages = allPages.filter(page =>
            page.keywords.some(k => k.toLowerCase() === keyword.toLowerCase())
          );
          displayPages(filteredPages);
        }

        // Eliminar el código antiguo de carga de menu.json ya que no se necesita

        // Modify loadPages function to populate menu after loading data
        function loadPages() {
          fetch('data.json?' + new Date().getTime())
            .then(response => response.json())
            .then(data => {
              allPages = data.pages;
              displayPages(allPages);
              populateKeywordMenu(); // Add this line
            })
            .catch(error => console.error('Error al cargar el JSON:', error));
        }

        // Modify event listener to work with dynamic options
        document.addEventListener('click', function(event) {
          if (event.target.closest('#menuList a')) {
            const menu = document.getElementById('menu');
            menu.classList.add('hidden');
          }
        });

        // Modify searchPages to respect active keyword filter
        function searchPages(searchTerm) {
          let pagesToSearch = activeFilter === 'all' ?
            allPages :
            allPages.filter(page =>
              page.keywords.some(k => k.toLowerCase() === activeFilter.toLowerCase())
            );

          if (!searchTerm.trim()) {
            displayPages(pagesToSearch);
            return;
          }

          const filteredAndSorted = pagesToSearch
            .map(page => ({
              ...page,
              relevance: calculateRelevance(page, searchTerm)
            }))
            .filter(page => page.relevance > 0)
            .sort((a, b) => b.relevance - a.relevance);

          displayPages(filteredAndSorted);
        }

        // Add some CSS for active state
        const style = document.createElement('style');
        style.textContent = `
        .filter-option.active {
            background-color: #e5e7eb;
            font-weight: bold;
        }
    `;
        document.head.appendChild(style);

        document.addEventListener('DOMContentLoaded', function() {
          loadPages();
        });
      </script>

  <script>
    // Generate a unique device identifier
    function getDeviceId() {
      let deviceId = localStorage.getItem('deviceId');
      if (!deviceId) {
        deviceId = 'device-' + Math.random().toString(36).substr(2, 9);
        localStorage.setItem('deviceId', deviceId);
      }
      return deviceId;
    }

    const deviceId = getDeviceId();
    let allPages = []; // Store all pages for filtering

    // Función para calcular la relevancia de una página
    function calculateRelevance(page, searchTerm) {
      const searchLower = searchTerm.toLowerCase();
      let score = 0;

      // Coincidencia exacta en título
      if (page.title.toLowerCase().includes(searchLower)) {
        score += 10;
      }

      // Coincidencia en palabras clave
      page.keywords.forEach(keyword => {
        if (keyword.toLowerCase().includes(searchLower)) {
          score += 5;
        }
      });

      // Coincidencia en descripción
      if (page.description.toLowerCase().includes(searchLower)) {
        score += 3;
      }

      // Coincidencia en URL
      if (page.url.toLowerCase().includes(searchLower)) {
        score += 2;
      }

      return score;
    }

    // Función para filtrar y ordenar páginas
    function searchPages(searchTerm) {
      let pagesToSearch = activeFilter === 'all' ?
        allPages :
        allPages.filter(page =>
          page.keywords.some(k => k.toLowerCase() === activeFilter.toLowerCase())
        );

      if (!searchTerm.trim()) {
        displayPages(pagesToSearch);
        return;
      }

      const filteredAndSorted = pagesToSearch
        .map(page => ({
          ...page,
          relevance: calculateRelevance(page, searchTerm)
        }))
        .filter(page => page.relevance > 0)
        .sort((a, b) => b.relevance - a.relevance);

      displayPages(filteredAndSorted);
    }

    // Función para mostrar las páginas
    function displayPages(pages) {
      const pagesContainer = document.getElementById('pages');
      pagesContainer.innerHTML = '';

      pages.forEach((page, index) => {
        const hasLiked = page.userInteractions.likedBy.includes(deviceId);
        const hasDisliked = page.userInteractions.dislikedBy.includes(deviceId);

        const pageElement = document.createElement('div');
        pageElement.classList.add(
          'bg-white',
          'p-4',
          'shadow-lg',
          'rounded-lg',
          'scale-[clamp(0.8,1vw,1)]',
          'transition-transform'
        );

        pageElement.innerHTML = `
        <h2 class="text-[clamp(16px,1.5vw,24px)] font-semibold text-gray-800">${page.title}</h2>
        <p class="text-[clamp(12px,1vw,14px)] text-gray-600">
          <a href="${page.url}" target="_blank" class="text-blue-600 hover:underline">
            🌐 ${page.url}
          </a>
        </p>
        <p class="text-[clamp(12px,1vw,14px)] text-gray-600 mt-2">${page.description}</p>
        <p class="text-[clamp(10px,0.8vw,12px)] text-gray-500 mt-2"><strong>Palabras clave:</strong> ${page.keywords.join(', ')}</p>
        <div class="flex items-center gap-2 mt-4">
          <button 
            id="like-btn-${index}" 
            class="like-btn flex items-center ${hasLiked ? 'bg-gray-400' : 'bg-green-500 hover:bg-green-600'} text-white px-2 py-1 rounded text-[clamp(10px,0.8vw,12px)]"
            onclick="updateLikeDislike(${page.id}, 'like', ${index})">
            👍 Bueno <span class="like-count ml-1">${page.likes}</span>
          </button>
          <button 
            id="dislike-btn-${index}" 
            class="dislike-btn flex items-center ${hasDisliked ? 'bg-gray-400' : 'bg-red-500 hover:bg-red-600'} text-white px-2 py-1 rounded text-[clamp(10px,0.8vw,12px)]"
            onclick="updateLikeDislike(${page.id}, 'dislike', ${index})">
            👎 Malo <span class="dislike-count ml-1">${page.dislikes}</span>
          </button>
        </div>
      `;
        pagesContainer.appendChild(pageElement);
      });
    }

    // Función para cargar las páginas desde el servidor
    function loadPages() {
      fetch('data.json?' + new Date().getTime())
        .then(response => response.json())
        .then(data => {
          allPages = data.pages; // Guardar todas las páginas
          displayPages(allPages); // Mostrar todas las páginas inicialmente
          populateKeywordMenu(); // Add this line
        })
        .catch(error => console.error('Error al cargar el JSON:', error));
    }

    // Agregar evento de búsqueda con debounce
    let searchTimeout;
    document.getElementById('searchInput').addEventListener('input', (e) => {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(() => {
        searchPages(e.target.value);
      }, 300); // Esperar 300ms después de que el usuario deje de escribir
    });

    // Función para manejar los clics en "Me gusta" o "No me gusta"
    function updateLikeDislike(id, action, index) {
      const likeButton = document.getElementById(`like-btn-${index}`);
      const dislikeButton = document.getElementById(`dislike-btn-${index}`);

      // Evitar clics múltiples
      likeButton.disabled = true;
      dislikeButton.disabled = true;

      fetch('updateLikes.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            action: action,
            id: id,
            deviceId: deviceId // Enviar deviceId al servidor
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.error) {
            alert(data.error);
          } else {
            // Actualizar los contadores de "likes" y "dislikes"
            likeButton.querySelector('.like-count').textContent = data.likes;
            dislikeButton.querySelector('.dislike-count').textContent = data.dislikes;

            // Actualizar clases de botones
            likeButton.classList.toggle('bg-green-500', !data.hasLiked);
            dislikeButton.classList.toggle('bg-red-500', !data.hasDisliked);
            likeButton.classList.toggle('bg-gray-400', data.hasLiked);
            dislikeButton.classList.toggle('bg-gray-400', data.hasDisliked);
          }
          // Rehabilitar botones
          likeButton.disabled = false;
          dislikeButton.disabled = false;
        })
        .catch(error => {
          console.error('Error al actualizar los likes/dislikes:', error);
          // Rehabilitar botones en caso de error
          likeButton.disabled = false;
          dislikeButton.disabled = false;
        });
    }
  </script>

  <!-- Contenedor del texto y botón flotante de soporte -->
  <div class="fixed bottom-16 right-4 flex flex-col items-center">
    <!-- Texto informativo -->
    <span class="text-blue-500 text-lg font-bold mb-2">Soporte</span>

    <!-- Botón flotante de soporte -->
    <a href="https://t.me/soportedarkchats" target="_blank"
      class="bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M14.752 11.168l-4.197 4.197m0 0l-1.415-1.415m1.415 1.415L9 13.414m5.752-2.246a4.5 4.5 0 11-6.364-6.364 4.5 4.5 0 016.364 6.364z" />
      </svg>
    </a>
  </div>

  <script>
    // Función para cargar el contenido de una sección en el contenedor específico
    function loadSection(url, containerId) {
      fetch(url)
        .then(response => response.text())
        .then(html => {
          document.getElementById(containerId).innerHTML = html;
        })
        .catch(error => console.log("Error al cargar la sección:", error));
    }
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Función para verificar si el dispositivo es móvil
      function esDispositivoMovil() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
      }

      // Verificar dispositivo
      if (esDispositivoMovil()) {
        console.log("Dispositivo móvil detectado. Redirigiendo a index.php...");
        // Si es móvil, redirige a index.php
        window.location.href = "index.php";
      } else {
        console.log("PC detectado. Permitir el acceso.");
        // Si es PC, permanece en la página actual
      }
    });
  </script>
</body>

</html>