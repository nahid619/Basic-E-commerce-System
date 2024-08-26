<?php
// Include class definitions before session start
require_once 'classes/Product.php';
require_once 'classes/Cart.php';
require_once 'classes/User.php';
session_start();

// Create a new Cart instance
$cart = new Cart();

// Handle adding a product to the cart
if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    $product = Product::getProductById($productId);
    if ($product) {
        $cart->addProduct($product);
    }
    // Redirect to prevent resubmission on refresh
    header('Location: cart.php');
    exit();
}

// Handle decreasing product quantity
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    $cart->decreaseProductQuantity($productId);
    // Redirect to prevent resubmission on refresh
    header('Location: cart.php');
    exit();
}

require 'includes/header.php';
?>

<div class="container">
    <h2>Your Shopping Cart</h2>
    <?php $cartItems = $cart->getProducts(); ?>
    <?php if (count($cartItems) > 0): ?>
        <ul class="list-group">
            <?php foreach ($cartItems as $item): ?>
                <li class="list-group-item">
                    <h5><?php echo htmlspecialchars($item->getName()); ?></h5>
                    <p>Quantity: <?php echo $cart->getQuantity($item->getId()); ?></p>
                    <p>Price: BDT <?php echo number_format($item->getPrice(), 2); ?></p>
                    <a href="cart.php?action=delete&id=<?php echo $item->getId(); ?>" class="btn btn-delete">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <h3>Total Price: BDT <?php echo number_format($cart->getTotalPrice(), 2); ?></h3>
        <div class="button-container">
            <a href="checkout.php" class="btn btn-cart">Proceed to Checkout</a>
        </div>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

<?php require 'includes/footer.php'; ?>
