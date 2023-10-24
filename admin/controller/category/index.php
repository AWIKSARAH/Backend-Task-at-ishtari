<?php

class CategoryController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new CategoryModel($db);
    }

    public function getCategories()
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

            $result = $this->model->getCategories($data);

            return json_encode($result);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    
}

