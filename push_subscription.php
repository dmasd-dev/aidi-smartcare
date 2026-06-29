<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);
if (!$input || empty($input['userId']) || empty($input['subscription'])) {
    echo json_encode(['error' => 'datos incompletos']); exit;
}

$dir = __DIR__.'/sentia_usuarios/';
$archivo = $dir.$input['userId'].'.json';
$data = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];

$data['push_subscription'] = $input['subscription'];
$data['ultima_visita'] = date('Y-m-d H:i:s');

file_put_contents($archivo, json_encode($data));
echo json_encode(['ok' => true]);