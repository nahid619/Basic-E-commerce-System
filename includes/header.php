<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amar Dokan</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Amar Dokan</a></h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="checkout.php">Checkout</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
                <form action="index.php" method="get" class="search-form">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit" class="btn btn-warning">Search</button>
                </form>
            </nav>
        </div>
    </header>
