<?php
// إعداد ترويسة CORS للسماح بالوصول
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$dataFile = 'data.json';

// قراءة البيانات الحالية
$data = [];
if (file_exists($dataFile)) {
    $content = file_get_contents($dataFile);
    if ($content) {
        $data = json_decode($content, true) ?: [];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if ($input && isset($input['question']) && isset($input['answer'])) {
        $data[] = [
            'id' => count($data) + 1,
            'timestamp' => date('Y-m-d H:i:s'),
            'question' => $input['question'],
            'answer' => $input['answer']
        ];
        file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo json_encode(['success' => true]);
        exit;
    }
}

// عرض البيانات
echo json_encode($data);
