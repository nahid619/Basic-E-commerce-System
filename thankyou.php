<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Include header
require 'includes/header.php';
?>

<div class="container">
    <h2>Thank You for Shopping!</h2>
    <p>Want to shop again?</p>

    <form method="post">
        <div style="text-align: center;">
            <button type="submit" name="action" value="shop_again" class="btn btn-primary">Yes</button>
            <button type="submit" name="action" value="logout" class="btn btn-danger">No, Logout</button>
        </div>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'action' key exists before accessing it
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'shop_again') {
            header('Location: index.php');
            exit;
        } elseif ($_POST['action'] === 'logout') {
            // Clear session and redirect to login
            session_destroy();
            header('Location: login.php');
            exit;
        }
    }
}
?>

<?php require 'includes/footer.php'; ?>
