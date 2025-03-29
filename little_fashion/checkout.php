<?php
require_once 'config.php';

// Redirect if cart is empty or user not logged in
if (empty($_SESSION['cart']) || !isset($_SESSION['user'])) {
    header("Location: cart.php");
    exit();
}

// Fetch user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user']['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

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
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Checkout | Little Fashion</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="css/slick.css"/>
        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
    </head>
    
    <body>
        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>
            <?php include 'navbar.php'; ?>

            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Complete Your</span>
                                <span class="d-block text-dark">Purchase</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="checkout section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Billing Information</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="process-order.php">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName" 
                                                       value="<?= htmlspecialchars(explode(' ', $user['name'])[0] ?? '') ?>" required>
                                            </div>
                                            <!-- <div class="col-md-6 mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" 
                                                       value="<?= htmlspecialchars(explode(' ', $user['name'])[1] ?? '') ?>" required>
                                            </div> -->
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" 
                                                   value="<?= htmlspecialchars($user['phone'] ?? '') ?>" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" 
                                                   value="<?= htmlspecialchars($user['address'] ?? '') ?>" required>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" class="form-control" id="city" name="city" 
                                                       value="<?= htmlspecialchars($user['city'] ?? '') ?>" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="state" class="form-label">State</label>
                                                <input type="text" class="form-control" id="state" name="state" 
                                                       value="<?= htmlspecialchars($user['state'] ?? '') ?>" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="zip" class="form-label">ZIP Code</label>
                                                <input type="text" class="form-control" id="zip" name="zip" 
                                                       value="<?= htmlspecialchars($user['zip_code'] ?? '') ?>" required>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="paymentMethod" class="form-label">Payment Method</label>
                                            <select class="form-select" id="paymentMethod" name="paymentMethod" required>
                                                <option value="">Select payment method</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="paypal">PayPal</option>
                                                <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="terms" required>
                                            <label class="form-check-label" for="terms">
                                                I agree to the <a href="#">Terms and Conditions</a>
                                            </label>
                                        </div>
                                        
                                        <button type="submit" class="btn custom-btn cart-btn">Place Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Your Order</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($_SESSION['cart'] as $item): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($item['name']) ?> × <?= $item['quantity'] ?></td>
                                                    <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>$<?= number_format($subtotal, 2) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>$<?= number_format($shipping, 2) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td>$<?= number_format($tax, 2) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>$<?= number_format($total, 2) ?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include 'footer.php'; ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>