<?php

include("config.php");


require_once 'admin/controller/category/index.php';
require_once 'admin/model/category/index.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $path);

// Check if the request is for your API endpoint
if ($parts[1] === 'api') {
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case 'GET':
            $controller = new CategoryController($db);
            echo $controller->getCategories();
            break;
        default:
            http_response_code(405); // Method Not Allowed
            echo json_encode(['error' => 'Method not allowed']);
            break;
    }
} else {
    http_response_code(404); // Not Found
    echo json_encode(['error' => 'Endpoint not found']);
}
