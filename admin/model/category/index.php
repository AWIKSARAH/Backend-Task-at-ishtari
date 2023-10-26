<?php
class CategoryModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getcategory($data)
    {
        $order = $data['order'];
        $sql = "SELECT * FROM category ORDER BY category_name $order";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategory($data)
    {
        echo $data['category_name'];
        if (!isset($data['category_name'])) {
            throw new Exception('Missing required Name');
        }
        if (!isset($data['status'])) {
            throw new Exception('Missing required status');
        }
        if (!isset($data['image'])) {
            throw new Exception('Missing required image');
        }

        if (empty($data['category_name']) || empty($data['status']) || empty($data['image'])) {
            throw new Exception('All fields must be filled');
        }


        $sql = "INSERT INTO category (category_name, status, image) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$data['category_name'], $data['status'], $data['image']]);
        return $this->db->lastInsertId();
    }


    public function updateCategory($id, $data)
    {
        $sql = "UPDATE category SET category_name = ?, status = ?, image = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$data['category_name'], $data['status'], $data['image'], $id]);
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
}
