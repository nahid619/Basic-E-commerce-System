<?php
require_once 'classes/Product.php';
require_once 'classes/Cart.php';
session_start();

$cart = new Cart();

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require 'includes/header.php';
?>

<div class="container">
    <h2>Checkout</h2>
    <?php $cartItems = $cart->getProducts(); ?>
    <?php if (count($cartItems) > 0): ?>
        <ul class="list-group">
            <?php foreach ($cartItems as $item): ?>
                <li class="list-group-item">
                    <h5><?php echo htmlspecialchars($item->getName()); ?></h5>
                    <p>Quantity: <?php echo $cart->getQuantity($item->getId()); ?></p>
                    <p>Price: BDT <?php echo number_format($item->getPrice(), 2); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <h3>Total Price: BDT <?php echo number_format($cart->getTotalPrice(), 2); ?></h3>
        <!-- Updated form action to point to thankyou.php -->
        <form method="post" action="thankyou.php">
            <div style="text-align: center;">
                <button type="submit" class="btn btn-checkout">Confirm and Pay</button>
            </div>
        </form>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

<?php require 'includes/footer.php'; ?>
