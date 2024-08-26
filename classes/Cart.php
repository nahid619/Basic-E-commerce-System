<?php

class Cart {
    private $items = [];

    public function __construct() {
        if (isset($_SESSION['cart'])) {
            $this->items = $_SESSION['cart'];
        }
    }

    public function addProduct(Product $product) {
        $productId = $product->getId();
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity']++;
        } else {
            $this->items[$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
        $_SESSION['cart'] = $this->items;
    }

    public function getProducts() {
        return array_map(function($item) {
            return $item['product'];
        }, $this->items);
    }

    public function getQuantity($productId) {
        return $this->items[$productId]['quantity'] ?? 0;
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    public function clearCart() {
        $this->items = [];
        $_SESSION['cart'] = $this->items;
    }

    // Method to decrease the quantity of a product
    public function decreaseProductQuantity($productId) {
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity']--;
            if ($this->items[$productId]['quantity'] <= 0) {
                unset($this->items[$productId]); // Remove the product if the quantity reaches zero
            }
            $_SESSION['cart'] = $this->items;
        }
    }
}
