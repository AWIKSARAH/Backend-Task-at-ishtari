<?php

class ProductController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new ProductModel($db);
    }

    public function getProducts()
    {
        try {
            if (isset($_GET['order'])) {
                $order = $_GET['order'];
            } else {
                $order = 'desc';
            }

            $data = [
                'order' => $order,
            ];

            $result = $this->model->getProduct($data);

            return json_encode($result);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    public function addProduct($data)
    {
        try {
            $productId = $this->model->createProduct($data);
            return json_encode(['product_id' => $productId]);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }

    }

    public function getProductById($id)
    {
        try {
            $product = $this->model->getProductById($id);

            if (!$product) {
                http_response_code(404);
                echo json_encode(['error' => 'Product not found']);
                return;
            }

            return json_encode($product);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    public function updateProduct($id, $data)
    {
        try {
            if ($this->model->updateProduct($id, $data)) {
                echo json_encode(['success' => true]);
            } else {
                return json_encode(['error' => 'The update failed']);
            }
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    public function deleteProduct($id)
    {
        try {
            $this->model->deleteProduct($id);

            return json_encode(['success' => true]);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }
}

