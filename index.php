<?php
require_once 'classes/Cart.php';
require_once 'classes/Product.php';
session_start();

$cart = new Cart();

// Load products from JSON file
$json = file_get_contents('data/products.json');
$productsArray = json_decode($json, true);

$products = [];
foreach ($productsArray as $productData) {
    $product = new Product($productData['id'], $productData['name'], $productData['description'], $productData['price']);
    $products[] = $product;
}

require 'includes/header.php';
?>

<div class="container">
    <h2>Product List</h2>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product->getName()); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($product->getDescription()); ?></p>
                        <p class="card-text"> BDT <?php echo number_format($product->getPrice(), 2); ?></p>
                        <a href="cart.php?action=add&id=<?php echo $product->getId(); ?>" class="btn btn-add-to-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
