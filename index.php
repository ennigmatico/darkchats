<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    #menu {
      max-height: calc(100vh - 180px);
      /* Ajusta según el espacio que necesites */
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: #4B5563 #E5E7EB;
    }

    #menu::-webkit-scrollbar {
      width: 6px;
    }

    #menu::-webkit-scrollbar-track {
      background: #E5E7EB;
    }

    #menu::-webkit-scrollbar-thumb {
      background-color: #4B5563;
      border-radius: 3px;
    }

    .filter-option {
      font-family: 'Poppins', sans-serif;
      transition: all 0.2s ease;
    }

    #menuList a {
      padding: 12px 16px;
      border-bottom: 1px solid #f0f0f0;
      font-size: 14px;
      display: block;
      transition: all 0.2s ease;
    }

    #menuList a:hover {
      background-color: #f8f9fa;
      padding-left: 20px;
    }

    .filter-option.active {
      background-color: #EEF2FF !important;
      color: #4F46E5 !important;
      font-weight: 500;
      border-left: 3px solid #4F46E5;
    }
  </style>
</head>

<body class="bg-gray-200 flex flex-col min-h-screen">
  <!-- Header -->
  <header id="mobile-header" class="fixed w-full bg-gray-800 text-white p-4 transition-opacity duration-300 z-10">
    <div class="flex items-center justify-between">

      
      <div class="animate-pulse" onclick="toggleMenu()">
        <img src="images/internet.png" alt="Menu" class="w-6 h-6">
        <span class="text-xs">Categorías</span>
      </div>
      <!-- Menú desplegable -->
      <div id="menu" class="hidden fixed top-16 left-0 w-full bg-white shadow-lg z-20 border-t border-gray-200">
        <div class="sticky top-0 bg-gray-50 p-2 border-b border-gray-200">
          <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wider px-2">Filtrar por categoría</h3>
        </div>
        <ul id="menuList" class="py-1">
          <li>
            <a href="#" class="block text-gray-700 hover:bg-gray-100 capitalize filter-option active" data-keyword="all">
              📑 Mostrar Todo
            </a>
          </li>
        </ul>
      </div>

      <script>
        let activeFilter = 'all';

        function toggleMenu() {
          const menu = document.getElementById('menu');
          menu.classList.toggle('hidden');

          if (!menu.classList.contains('hidden')) {
            document.addEventListener('click', closeMenuOnClickOutside);
          } else {
            document.removeEventListener('click', closeMenuOnClickOutside);
          }
        }

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
            li.innerHTML = `<a href="#" class="block text-gray-700 hover:bg-gray-400 capitalize filter-option" data-keyword="${keyword}">${icon} ${keyword}</a>`;
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
              toggleMenu();
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
            document.removeEventListener('click', closeMenuOnClickOutside);
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

        function closeMenuOnClickOutside(event) {
          const menu = document.getElementById('menu');
          const menuButton = document.querySelector('[onclick="toggleMenu()"]');

          if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
            menu.classList.add('hidden');
            document.removeEventListener('click', closeMenuOnClickOutside);
          }
        }

        // Asegurarse de que el menú se cierre al hacer scroll
        window.addEventListener('scroll', () => {
          const menu = document.getElementById('menu');
          if (!menu.classList.contains('hidden')) {
            menu.classList.add('hidden');
          }
        });

        document.addEventListener('DOMContentLoaded', function() {
            loadPages();
        });
      </script>

      <!-- Buscador -->
      <div class="flex-1 mx-4">
        <input type="text"
          id="searchInput"
          placeholder="Buscar Web"
          class="w-full p-2 text-sm text-black focus:outline-none focus:ring-2 focus:ring-blue-300">
      </div>

      <!-- Botón de Cerrar Sesión -->
      <!-- <a href="../logout.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2">Salir</a> -->
    </div>
  </header>


  <!-- Botón flotante para abrir el formulario -->
  <a href="#" onclick="toggleOverlay()" class="fixed bottom-32 right-4 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-700 transition duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
  </a>

  <!-- Overlay para el formulario -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50" onclick="closeOverlay(event)">
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
          <input type="text" name="title" id="title" required class="mt-1 p-2 w-full border rounded">
        </div>
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700">Descripción *</label>
          <textarea name="description" id="description" required class="mt-1 p-2 w-full border rounded"></textarea>
        </div>
        <div>
          <label for="url" class="block text-sm font-medium text-gray-700">URL *</label>
          <input type="url" name="url" id="url" required class="mt-1 p-2 w-full border rounded">
        </div>
        <div>
          <label for="keywords" class="block text-sm font-medium text-gray-700">Palabras clave (separadas por comas) *</label>
          <input type="text" name="keywords" id="keywords" required class="mt-1 p-2 w-full border rounded">
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

  <!-- Contenedor Galería -->
  <section id="gallery" class="pt-20 py-8">
    <div id="pages" class="space-y-6 w-full max-w-4xl mx-auto">
      <!-- Las páginas se insertarán aquí -->
    </div>
  </section>

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
          'bg-white', 'p-5', 'shadow-lg', 'w-full', 'max-w-md', 'mx-auto', 'space-y-3'
        );

        // Resto del código HTML igual que antes
        pageElement.innerHTML = `
        <h2 class="text-2xl font-semibold text-gray-800">${page.title}</h2>
        <p class="text-sm text-gray-600">
          <strong></strong> 
          <a href="${page.url}" target="_blank" class="text-blue-600 hover:underline">
            🌐 ${page.url}
          </a>
        </p>
        <p class="text-sm text-gray-600">${page.description}</p>
        <p class="text-xs text-gray-500"><strong>Palabras clave:</strong> ${page.keywords.join(', ')}</p>
        <div class="flex items-center space-x-4 pt-2">
          <button 
            id="like-btn-${index}" 
            class="like-btn flex items-center ${hasLiked ? 'bg-gray-400' : 'bg-green-500 hover:bg-green-600'} text-white px-3 py-1"
            onclick="updateLikeDislike(${page.id}, 'like', ${index})">
            👍 Me gusta <span class="like-count">${page.likes}</span>
          </button>
          <button 
            id="dislike-btn-${index}" 
            class="dislike-btn flex items-center ${hasDisliked ? 'bg-gray-400' : 'bg-red-500 hover:bg-red-600'} text-white px-3 py-1"
            onclick="updateLikeDislike(${page.id}, 'dislike', ${index})">
            👎 No me gusta <span class="dislike-count">${page.dislikes}</span>
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


  <!-- Botón flotante de soporte -->
  <a href="https://t.me/soportedarkchats" target="_blank" class="fixed bottom-16 right-4 bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-4.197 4.197m0 0l-1.415-1.415m1.415 1.415L9 13.414m5.752-2.246a4.5 4.5 0 11-6.364-6.364 4.5 4.5 0 016.364 6.364z" />
    </svg>
  </a>

  <div class="flex justify-center space-x-4 mt-6">
  <a href="https://www.facebook.com/sharer/sharer.php?u=https://darkchats.com" target="_blank" class="text-blue-600">
    <i class="fab fa-facebook-square fa-2x"></i>
  </a>
  <a href="https://twitter.com/intent/tweet?url=https://darkchats.com&text=Descubre%20Darkchats,%20el%20directorio%20web%20para%20anunciar%20y%20encontrar%20negocios!" target="_blank" class="text-blue-400">
    <i class="fab fa-twitter-square fa-2x"></i>
  </a>
  <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://darkchats.com" target="_blank" class="text-blue-700">
    <i class="fab fa-linkedin fa-2x"></i>
  </a>
  <a href="https://wa.me/?text=Explora%20Darkchats%20y%20encuentra%20o%20anuncia%20tu%20negocio:%20https://darkchats.com" target="_blank" class="text-green-500">
    <i class="fab fa-whatsapp-square fa-2x"></i>
  </a>
  <a href="https://t.me/share/url?url=https://darkchats.com&text=Explora%20Darkchats%20y%20encuentra%20o%20anuncia%20tu%20negocio" target="_blank" class="text-blue-500">
    <i class="fab fa-telegram fa-2x"></i>
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
  document.addEventListener("DOMContentLoaded", function () {
    // Función para verificar si el dispositivo es móvil
    function esDispositivoMovil() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    // Verificar dispositivo
    if (esDispositivoMovil()) {
        console.log("Dispositivo móvil detectado. Permitir el acceso.");
        // Si es móvil, permanece en la página actual
    } else {
        console.log("PC detectado. Redirigiendo a web.php...");
        // Si es PC, redirige a web.php
        window.location.href = "web.php";
    }
});

</script>

</body>

</html>