<?php
require_once __DIR__.'/vendor/autoload.php';
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

$dir = __DIR__.'/sentia_usuarios/';
if (!is_dir($dir)) exit;

$publicKey  = 'BNA2d_FHnoAfbvZ_1SsWdSrkmzJVV8kSdDnavWzEzrNLm2-IdpYVXjqn1jxrHaYwLdWwO_1ryno3gvluJQ39bv8';
$privateKey = 'l3F7InDZu4foZh1FwQ0Gaa5YKizVLj0V3sDerfqRuqE';

$mensajes = [
    'Hola. Aquí estoy si me necesitas.',
    'Buenas noches. Espero que el día haya sido amable contigo.',
    'Hola. Sin prisa. Aquí estoy.',
    'Buenas. Si quieres hablar, estoy.',
    'Hola. Solo paso a saludarte.'
];

$ahora = new DateTime('now', new DateTimeZone('Europe/Madrid'));
$horaActual = $ahora->format('H:i');

$auth = ['VAPID' => [
    'subject'    => 'mailto:info@neuroup.help',
    'publicKey'  => $publicKey,
    'privateKey' => $privateKey,
]];

$webPush = new WebPush($auth);

foreach (glob($dir.'*.json') as $archivo) {
    $data = json_decode(file_get_contents($archivo), true);
    if (!$data) continue;
    if (empty($data['recordatorio_activo'])) continue;
    if (empty($data['push_subscription'])) continue;

    $horaUsuario = $data['hora_recordatorio'] ?? '21:00';
    $horaObj    = DateTime::createFromFormat('H:i', $horaUsuario);
    $horaActObj = DateTime::createFromFormat('H:i', $horaActual);
    $diff = abs($horaObj->getTimestamp() - $horaActObj->getTimestamp());
   if ($diff > 60) continue;

    $msg = $mensajes[array_rand($mensajes)];
    $sub = Subscription::create($data['push_subscription']);
    $webPush->queueNotification($sub, json_encode(['title'=>'Sentia','body'=>$msg]));
}

foreach ($webPush->flush() as $report) {
    file_put_contents(__DIR__.'/push_log.txt', date('H:i:s').' '.($report->isSuccess() ? 'OK' : $report->getReason())."\n", FILE_APPEND);
}