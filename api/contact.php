<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Получаем данные из POST запроса
$input = json_decode(file_get_contents('php://input'), true);

// Валидация данных
$errors = [];

if (empty($input['firstName'])) {
    $errors[] = 'Имя обязательно для заполнения';
}

if (empty($input['email'])) {
    $errors[] = 'Email обязателен для заполнения';
} elseif (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Некорректный формат email';
}

if (empty($input['message'])) {
    $errors[] = 'Сообщение обязательно для заполнения';
}

// Если есть ошибки, возвращаем их
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['errors' => $errors]);
    exit;
}

// Подготовка данных для отправки
$firstName = htmlspecialchars($input['firstName']);
$lastName = htmlspecialchars($input['lastName'] ?? '');
$email = htmlspecialchars($input['email']);
$phone = htmlspecialchars($input['phone'] ?? '');
$projectType = htmlspecialchars($input['projectType'] ?? '');
$budget = htmlspecialchars($input['budget'] ?? '');
$message = htmlspecialchars($input['message']);

// Формирование email сообщения
$to = 'contact@portfolio3d.com'; // Замените на ваш email
$subject = 'Новое сообщение с сайта 3D Portfolio';

$emailBody = "
Новое сообщение с сайта 3D Portfolio

Имя: {$firstName}
Фамилия: {$lastName}
Email: {$email}
Телефон: {$phone}
Тип проекта: {$projectType}
Бюджет: {$budget}

Сообщение:
{$message}

---
Отправлено с сайта portfolio3d.com
";

$headers = [
    'From' => $email,
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8'
];

// Отправка email
$mailSent = mail($to, $subject, $emailBody, $headers);

// Сохранение в файл (для резервной копии)
$logData = [
    'timestamp' => date('Y-m-d H:i:s'),
    'firstName' => $firstName,
    'lastName' => $lastName,
    'email' => $email,
    'phone' => $phone,
    'projectType' => $projectType,
    'budget' => $budget,
    'message' => $message,
    'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
];

$logFile = 'contact_log.json';
$existingLogs = [];
if (file_exists($logFile)) {
    $existingLogs = json_decode(file_get_contents($logFile), true) ?? [];
}
$existingLogs[] = $logData;
file_put_contents($logFile, json_encode($existingLogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Отправка автоматического ответа клиенту
$autoReplySubject = 'Спасибо за ваше сообщение - 3D Portfolio';
$autoReplyBody = "
Здравствуйте, {$firstName}!

Спасибо за ваше сообщение. Я получил его и свяжусь с вами в ближайшее время.

Детали вашего сообщения:
- Тип проекта: {$projectType}
- Бюджет: {$budget}

С уважением,
Команда 3D Portfolio
";

$autoReplyHeaders = [
    'From' => 'noreply@portfolio3d.com',
    'Content-Type' => 'text/plain; charset=UTF-8'
];

mail($email, $autoReplySubject, $autoReplyBody, $autoReplyHeaders);

// Возвращаем успешный ответ
echo json_encode([
    'success' => true,
    'message' => 'Сообщение успешно отправлено! Мы свяжемся с вами в ближайшее время.',
    'timestamp' => date('Y-m-d H:i:s')
]);
?>
