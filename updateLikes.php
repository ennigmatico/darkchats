<?php
// Obtener los datos POST
$input = file_get_contents('php://input');
$data = json_decode($input, true);

$action = isset($data['action']) ? $data['action'] : '';
$id = isset($data['id']) ? intval($data['id']) : 0;
$deviceId = isset($data['deviceId']) ? $data['deviceId'] : '';

// Validar los datos recibidos
if (!$action || !$id || !$deviceId) {
    echo json_encode(['error' => 'Datos inválidos.']);
    exit;
}

// Cargar los datos existentes
$dataFile = 'data.json';
if (!file_exists($dataFile)) {
    echo json_encode(['error' => 'Archivo de datos no encontrado.']);
    exit;
}

$dataJson = file_get_contents($dataFile);
$dataArray = json_decode($dataJson, true);

// Buscar la página por ID
$pageFound = false;
foreach ($dataArray['pages'] as &$page) {
    if ($page['id'] == $id) {
        $pageFound = true;

        // Inicializar arrays si no están definidos
        if (!isset($page['userInteractions']['likedBy'])) {
            $page['userInteractions']['likedBy'] = [];
        }
        if (!isset($page['userInteractions']['dislikedBy'])) {
            $page['userInteractions']['dislikedBy'] = [];
        }

        // Verificar si el dispositivo ya votó
        if ($action == 'like') {
            if (!in_array($deviceId, $page['userInteractions']['likedBy'])) {
                // Remover dislike si existe
                if (($key = array_search($deviceId, $page['userInteractions']['dislikedBy'])) !== false) {
                    unset($page['userInteractions']['dislikedBy'][$key]);
                    $page['dislikes']--;
                }
                // Agregar like
                $page['userInteractions']['likedBy'][] = $deviceId;
                $page['likes']++;
            }
        } elseif ($action == 'dislike') {
            if (!in_array($deviceId, $page['userInteractions']['dislikedBy'])) {
                // Remover like si existe
                if (($key = array_search($deviceId, $page['userInteractions']['likedBy'])) !== false) {
                    unset($page['userInteractions']['likedBy'][$key]);
                    $page['likes']--;
                }
                // Agregar dislike
                $page['userInteractions']['dislikedBy'][] = $deviceId;
                $page['dislikes']++;
            }
        }
        // No permitir múltiples likes/dislikes del mismo dispositivo
    }
}

if ($pageFound) {
    // Guardar los datos actualizados
    file_put_contents($dataFile, json_encode($dataArray, JSON_PRETTY_PRINT));
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Página no encontrada.']);
}
?> 
