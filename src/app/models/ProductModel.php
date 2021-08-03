<?php

class ProductModel
{
    private $db;

    /**
     * ProductModel constructor.
     * @param null $data
     */

    public function __construct()
    {
        $this->db = new Database;
    }

    public function update($data)
    {
        $this->db->query("UPDATE products SET title = :title, description = :description, price = :price, sku = :sku WHERE id = :id");

        $this->db->bind(":title", $data["title"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":price", $data["price"]);
        $this->db->bind(":sku", $data["sku"]);
        $this->db->bind(":id", $data["id"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function create($data)
    {
        $this->db->query("INSERT INTO products (title, description, price, sku) VALUES(:title, :description, :price, :sku)");

        $this->db->bind(":title", $data["title"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":price", $data["price"]);
        $this->db->bind(":sku", $data["sku"]);

        if ($this->db->execute()) {
            return $this->db->lastInsertId;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM products WHERE id = :id");

        $this->db->bind(":id", $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM products WHERE id = :id");

        $this->db->bind(":id", $id);

        $row = $this->db->single();

        return $row;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM products");
        return $this->db->resultSet();
    }
}
