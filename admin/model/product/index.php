<?php
class ProductModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getProduct($data)
    {
        $order = $data['order'];
        $sql = "SELECT product.*, category.category_name 
        FROM product 
        JOIN category ON product.category = category.id
        ORDER BY product.product_name $order";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getProductById($id)
    {
        $sql = "SELECT product.*, category.category_name 
        FROM product 
        JOIN category ON product.category = category.id
        WHERE product.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($data)
    {
        if (!isset($data['product_name']) || !isset($data['description']) || !isset($data['price']) || !isset($data['category'])) {
            throw new Exception('Missing required fields');
        }

        if (empty($data['product_name']) || empty($data['description']) || empty($data['price']) || empty($data['category'])) {
            throw new Exception('All fields must be filled');
        }


        $sql = "INSERT INTO product (product_name, description, price,category) VALUES (?, ?, ?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$data['product_name'], $data['description'], $data['price'], $data['category']]);
        return $this->db->lastInsertId();
    }

    public function updateProduct($id, $data)
    {
        if (isset($data['product_name']) || isset($data['description']) || isset($data['price']) || isset($data['category'])) {
            $sql = "UPDATE product SET";

            $params = [];
            if (isset($data['product_name'])) {
                $sql .= " product_name = ?,";
                $params[] = $data['product_name'];
            }

            if (isset($data['description'])) {
                $sql .= " description = ?,";
                $params[] = $data['description'];
            }

            if (isset($data['price'])) {
                $sql .= " price = ?,";
                $params[] = $data['price'];
            }

            if (isset($data['category'])) {
                $sql .= " category = ?,";
                $params[] = $data['category'];
            }

            $sql = rtrim($sql, ',');
            $sql .= " WHERE id = ?";
            $params[] = $id;

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);

            return json_encode(['success' => true]);
        } else {
            return json_encode(['error' => 'No fields to update']);
        }
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
}
