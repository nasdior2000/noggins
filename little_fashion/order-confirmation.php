<?php
require_once 'config.php';

if (!isset($_SESSION['order_success'])) {
    header("Location: cart.php");
    exit();
}

unset($_SESSION['order_success']);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Order Confirmation | Little Fashion</title>

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
                                <span class="d-block text-primary">Order</span>
                                <span class="d-block text-dark">Confirmed</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="order-confirmation section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12 text-center">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-4">
                                        <i class="bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                                    </div>
                                    <h2 class="mb-3">Thank You For Your Order!</h2>
                                    <p class="lead mb-4">Your order has been received and is being processed. You will receive a confirmation email shortly.</p>
                                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                        <a href="products.php" class="btn btn-primary btn-lg px-4 gap-3">Continue Shopping</a>
                                        <a href="index.php" class="btn btn-outline-secondary btn-lg px-4">Back to Home</a>
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