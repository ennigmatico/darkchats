<?php
// Obtener los datos enviados por el formulario
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';
$url = isset($_POST['url']) ? trim($_POST['url']) : '';
$keywords = isset($_POST['keywords']) ? trim($_POST['keywords']) : '';

// Validar los campos requeridos
if (!$title || !$description || !$url || !$keywords) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Validar la descripción: máximo 30 palabras
$descriptionWords = str_word_count($description);
if ($descriptionWords > 30) {
    echo "La descripción no puede tener más de 30 palabras.";
    exit;
}

// Validar las palabras clave: máximo 5 palabras clave
$keywordsArray = array_map('trim', explode(',', $keywords));
if (count($keywordsArray) > 5) {
    echo "Las palabras clave no pueden ser más de 5.";
    exit;
}

// Normalizar la URL eliminando 'http://', 'https://' y 'www.'
function normalizeUrl($url) {
    // Eliminar el prefijo http:// o https://
    $url = preg_replace('#^https?://#', '', $url);
    // Eliminar el subdominio 'www.'
    $url = preg_replace('#^www\.#', '', $url);
    // Retornar la URL hasta el primer punto (dominio sin subdominio)
    return strtok($url, '/');
}

// Cargar los datos existentes
$dataFile = 'data.json';
if (!file_exists($dataFile)) {
    $dataArray = ['pages' => []];
} else {
    $dataJson = file_get_contents($dataFile);
    $dataArray = json_decode($dataJson, true);
}

// Normalizar la URL ingresada
$normalizedUrl = normalizeUrl($url);

// Verificar si ya existe una URL similar
foreach ($dataArray['pages'] as $page) {
    $existingUrl = normalizeUrl($page['url']);
    if ($existingUrl === $normalizedUrl) {
        echo "La URL ya existe en la lista.";
        exit;
    }
}

// Crear un nuevo ID único
$newId = count($dataArray['pages']) > 0 ? max(array_column($dataArray['pages'], 'id')) + 1 : 1;

// Preparar los datos de la nueva página
$newPage = [
    'id' => $newId,
    'title' => $title,
    'description' => $description,
    'url' => $url,
    'keywords' => $keywordsArray,
    'likes' => 0,
    'dislikes' => 0,
    'userInteractions' => [
        'likedBy' => [],
        'dislikedBy' => [],
    ],
];

// Agregar la nueva página al arreglo
$dataArray['pages'][] = $newPage;

// Guardar los datos actualizados
if (file_put_contents($dataFile, json_encode($dataArray, JSON_PRETTY_PRINT))) {
    // Redirigir de vuelta a index.php
    header('Location: index.php');
    exit;
} else {
    echo "Error al guardar los datos.";
}