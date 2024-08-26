<?php

class Product {
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct($id, $name, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public static function getProductById($id) {
        $products = self::getAllProducts();
        foreach ($products as $product) {
            if ($product->getId() == $id) {
                return $product;
            }
        }
        return null;
    }

    public static function getAllProducts() {
        $json = file_get_contents('data/products.json');
        $data = json_decode($json, true);
        $products = [];
        foreach ($data as $item) {
            $products[] = new Product($item['id'], $item['name'], $item['description'], $item['price']);
        }
        return $products;
    }
}
