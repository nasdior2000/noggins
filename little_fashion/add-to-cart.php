<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
    // Validate quantity
    if ($quantity < 1) $quantity = 1;
    if ($quantity > 10) $quantity = 10;
    
    // Fetch product details
    $stmt = $pdo->prepare("SELECT id, name, price, image_path FROM products WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        // Check if product already in cart
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        
        // If not found, add new item
        if (!$found) {
            $_SESSION['cart'][] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image_path' => $product['image_path'],
                'quantity' => $quantity
            ];
        }
        
        // Redirect to cart with success message
        $_SESSION['message'] = "Product added to cart successfully!";
        header("Location: cart.php");
        exit();
    }
}

// If something went wrong, redirect back
header("Location: products.php");
exit();
?>