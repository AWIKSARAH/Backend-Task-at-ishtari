<?php
include("admin/controller/handleImage/uploadImage.php");

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

            $result = $this->model->getcategory($data);

            return json_encode($result);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    public function addCategory($data)
    {

        if (isset($_FILES["image"])) {
            $fileName = uploadImage($_FILES["image"]);
            if (!is_string($fileName)) {
                return json_encode(['error' => $fileName]); // Return error message
            }
            $data['image'] = $fileName; // Add the file name to the data array
        }

        try {
            $categoryId = $this->model->createCategory($data);
            return json_encode(['category_id' => $categoryId]);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }

    }

    public function getCategoryById($id)
    {
        try {
            $category = $this->model->getCategoryById($id);

            if (!$category) {
                http_response_code(404);
                echo json_encode(['error' => 'Category not found']);
                return;
            }

            return json_encode($category);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    public function updateCategory($id, $data)
    {

        if (isset($_FILES["image"])) {
            $fileName = uploadImage($_FILES["image"]);
            if (!is_string($fileName)) {
                return json_encode(['error' => $fileName]); // Return error message
            }
            $data['image'] = $fileName; // Add the file name to the data array
        }
        try {
            if ($this->model->updateCategory($id, $data)) {
                echo json_encode(['success' => true]);
            } else {
                return json_encode(['error' => 'The update failed']);
            }
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }

    }

    public function deleteCategory($id)
    {
        try {
            $this->model->deleteCategory($id);

            return json_encode(['success' => true]);
        } catch (Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }
}

