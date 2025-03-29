<?php
require_once 'config.php';

// Handle remove item action
if (isset($_GET['remove'])) {
    $removeId = $_GET['remove'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $removeId) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['message'] = "Product removed from cart";
            break;
        }
    }
    // Reset array keys
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

// Handle quantity update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $id => $quantity) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = max(1, min(10, (int)$quantity));
                break;
            }
        }
    }
    $_SESSION['message'] = "Cart updated successfully";
    header("Location: cart.php");
    exit();
}

// Calculate totals
$subtotal = 0;
$totalItems = 0;

foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['price'] * $item['quantity'];
    $totalItems += $item['quantity'];
}

// Shipping and tax (example values)
$shipping = $subtotal > 0 ? 5.00 : 0; // $5 shipping if items in cart
$tax = $subtotal * 0.08; // 8% tax
$total = $subtotal + $shipping + $tax;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Your Shopping Cart | Little Fashion</title>

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
                                <span class="d-block text-primary">Your</span>
                                <span class="d-block text-dark">Shopping Cart</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="cart section-padding">
                <div class="container">
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <?php if (empty($_SESSION['cart'])): ?>
                                <div class="alert alert-info">
                                    Your cart is empty. <a href="products.php" class="alert-link">Continue shopping</a>
                                </div>
                            <?php else: ?>
                                <form method="post" action="cart.php">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Subtotal</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($_SESSION['cart'] as $item): ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="d-flex align-items-center">
                                                            <img src="<?= $item['image_path'] ?>" class="img-fluid cart-product-image me-3" alt="<?= $item['name'] ?>">
                                                            <h6 class="mb-0"><?= $item['name'] ?></h6>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">$<?= number_format($item['price'], 2) ?></td>
                                                    <td class="align-middle">
                                                        <input type="number" name="quantity[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1" max="10" class="form-control cart-quantity-input">
                                                    </td>
                                                    <td class="align-middle">$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                                                    <td class="align-middle">
                                                        <a href="cart.php?remove=<?= $item['id'] ?>" class="text-danger" onclick="return confirm('Are you sure you want to remove this item?')">
                                                            <i class="bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <a href="products.php" class="btn btn-outline-secondary">Continue Shopping</a>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="submit" name="update_cart" class="btn btn-outline-primary">Update Cart</button>
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                            <div class="card cart-summary">
                                <div class="card-body">
                                    <h5 class="card-title">Order Summary</h5>
                                    
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Items (<?= $totalItems ?>)</span>
                                        <span>$<?= number_format($subtotal, 2) ?></span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Shipping</span>
                                        <span>$<?= number_format($shipping, 2) ?></span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Tax</span>
                                        <span>$<?= number_format($tax, 2) ?></span>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span>Total</span>
                                        <span>$<?= number_format($total, 2) ?></span>
                                    </div>
                                    
                                    <div class="d-grid mt-4">
                                        <a href="checkout.php" class="btn custom-btn cart-btn <?= empty($_SESSION['cart']) ? 'disabled' : '' ?>">
                                            Proceed to Checkout
                                        </a>
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