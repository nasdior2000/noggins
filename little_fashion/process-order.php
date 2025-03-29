<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['cart']) || !isset($_SESSION['user'])) {
    header("Location: cart.php");
    exit();
}

try {
    $pdo->beginTransaction();

    // Fetch logged-in user ID
    $user_id = $_SESSION['user']['id'];

    // Calculate totals
    $subtotal = 0;
    $totalItems = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['price'] * $item['quantity'];
        $totalItems += $item['quantity'];
    }

    $shipping = $subtotal > 0 ? 5.00 : 0;
    $tax = $subtotal * 0.08;
    $total = $subtotal + $shipping + $tax;

    // Insert into orders table
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount, shipping, tax) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $total, $shipping, $tax]);
    $order_id = $pdo->lastInsertId();

    // Insert each item into order_items table
    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_name, quantity, price, total) VALUES (?, ?, ?, ?, ?)");
    foreach ($_SESSION['cart'] as $item) {
        $stmt->execute([$order_id, $item['name'], $item['quantity'], $item['price'], $item['price'] * $item['quantity']]);
    }

    // Commit transaction
    $pdo->commit();

    // Clear cart and set success message
    $_SESSION['order_success'] = true;
    $_SESSION['cart'] = [];

    header("Location: order-confirmation.php");
    exit();
} catch (Exception $e) {
    $pdo->rollBack();
    die("Error processing order: " . $e->getMessage());
}
?>
