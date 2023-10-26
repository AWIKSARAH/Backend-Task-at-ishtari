<?php

include("config.php");

require_once 'admin/controller/category/index.php';
require_once 'admin/model/category/index.php';

require_once 'admin/controller/product/index.php';
require_once 'admin/model/product/index.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $path);
echo json_encode($parts);

// Check if the request is for your API endpoint
$method = $_SERVER['REQUEST_METHOD'];
if (isset($parts[3]) && $parts[3] == 'admin') {
    if (isset($parts[4]) && $parts[4] == 'category') {
        switch ($method) {
            case 'GET':
                if (isset($parts[5])) {
                    $endpoint = $parts[5];
                    $controller = new CategoryController($db);

                    switch ($endpoint) {
                        case 'show':
                            if (isset($parts[6])) {
                                $id = $parts[6];
                                $controller = new CategoryController($db);
                                echo $controller->getCategoryById($id);
                            } else {
                                $controller = new CategoryController($db);
                                echo $controller->getCategories();
                            }
                            break;

                        default:
                            http_response_code(404); // Not Found
                            echo json_encode(['error' => 'Endpoint not found']);
                            break;
                    }
                } else {
                    http_response_code(404); // Not Found
                    echo json_encode(['error' => 'Endpoint not found']);
                }
                break;
            case 'POST':
                if (isset($parts[5])) {
                    $data = json_decode(file_get_contents('php://input'), true);
                    $endpoint = $parts[5];
                    $controller = new CategoryController($db);

                    switch ($endpoint) {
                        case 'add':
                            echo $controller->addCategory($data);
                            break;
                        default:
                            http_response_code(404);
                            echo json_encode(['error' => 'Endpoint not found']);
                            break;
                    }
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Endpoint not found']);
                }
                break;
            case 'PUT':
                if (isset($parts[6])) {
                    $id = $parts[6];
                    $data = json_decode(file_get_contents('php://input'), true);
                    $controller = new CategoryController($db);
                    $controller->updateCategory($id, $data);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Endpoint not found']);
                }
                break;

            case 'DELETE':
                if (isset($parts[6])) {
                    $id = $parts[6];
                    $data = json_decode(file_get_contents('php://input'), true);
                    $controller = new CategoryController($db);
                    $controller->deleteCategory($id);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Endpoint not found']);
                }
                break;


            default:
                http_response_code(404);
                echo json_encode(['error' => 'Method not allowed']);
                break;
        }
    } else if (isset($parts[4]) && $parts[4] == 'product') {
        $endpoint = $parts[5];
        $controller = new ProductController($db);

        switch ($endpoint) {
            case 'show':
                if (isset($parts[6])) {
                    $id = $parts[6];
                    $controller = new ProductController($db);
                    echo $controller->getProductById($id);
                } else {
                    $controller = new ProductController($db);
                    echo $controller->getProducts();
                }
                break;

            case 'add':
                $data = json_decode(file_get_contents('php://input'), true);
                $controller = new ProductController($db);
                echo $controller->addProduct($data);
                break;

            case 'update':
                if (isset($parts[6])) {
                    $id = $parts[6];
                    $data = json_decode(file_get_contents('php://input'), true);
                    $controller = new ProductController($db);
                    $controller->updateProduct($id, $data);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Product ID not specified']);
                }
                break;

            case 'delete':
                if (isset($parts[6])) {
                    $id = $parts[6];
                    $controller = new ProductController($db);
                    $controller->deleteProduct($id);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Product ID not specified']);
                }
                break;

            default:
                http_response_code(404);
                echo json_encode(['error' => 'Endpoint not found']);
                break;
        }
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Error endpoint']);
    }

} else {
    http_response_code(404);
    echo json_encode(['error' => 'Should be an Admin endpoint']);
}