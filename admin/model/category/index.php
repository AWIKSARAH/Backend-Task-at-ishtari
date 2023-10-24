<?php
class CategoryModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCategories($data)
    {
        $order = $data['order'];
        $sql = "SELECT * FROM categories ORDER BY category_name $order";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addCategory($data)
    {
        $sql = "INSERT INTO categories (category_name, status, image) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$data['category_name'], $data['status'], $data['image']]);
        return $this->db->lastInsertId();
    }

    public function updateCategory($id, $data)
    {
        $sql = "UPDATE categories SET category_name = ?, status = ?, image = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$data['category_name'], $data['status'], $data['image'], $id]);
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
}
