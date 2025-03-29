<?php
// products.php
require_once 'config.php';

// Fetch new arrival products
$stmtNewArrivals = $pdo->query("SELECT * FROM products WHERE is_new_arrival = TRUE");
$newArrivals = $stmtNewArrivals->fetchAll(PDO::FETCH_ASSOC);

// Fetch popular products
$stmtPopular = $pdo->query("SELECT * FROM products WHERE is_popular = TRUE");
$popularProducts = $stmtPopular->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Noggin's - Products</title>

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
                                <span class="d-block text-primary">Choose your</span>
                                <span class="d-block text-dark">Products and Services</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="products section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-5">Services</h2>
                        </div>

                        <?php foreach ($newArrivals as $product): ?>
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="product-detail.php?id=<?= $product['id'] ?>">
                                    <img src="<?= $product['image_path'] ?>" class="img-fluid product-image" alt="<?= $product['name'] ?>">
                                </a>

                                <div class="product-top d-flex">
                                    <?php if ($product['is_new_arrival']): ?>
                                    <span class="product-alert me-auto">Premium</span>
                                    <?php endif; ?>
                                    <?php if ($product['is_discounted']): ?>
                                    <span class="product-alert me-auto">Discounted Price</span>
                                    <?php endif; ?>

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="product-detail.php?id=<?= $product['id'] ?>" class="product-title-link"><?= $product['name'] ?></a>
                                        </h5>
                                        <p class="product-p"><?= $product['short_description'] ?></p>
                                    </div>
                                    <small class="product-price text-muted ms-auto">₱<?= number_format($product['price'], 2) ?></small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <div class="col-12">
                            <h2 class="mb-5">Products</h2>
                        </div>

                        <?php foreach ($popularProducts as $product): ?>
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="product-detail.php?id=<?= $product['id'] ?>">
                                    <img src="<?= $product['image_path'] ?>" class="img-fluid product-image" alt="<?= $product['name'] ?>">
                                </a>

                                <div class="product-top d-flex">
                                    <?php if ($product['is_new_arrival']): ?>
                                    <span class="product-alert me-auto">Trending</span>
                                    <?php endif; ?>
                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="product-detail.php?id=<?= $product['id'] ?>" class="product-title-link"><?= $product['name'] ?></a>
                                        </h5>
                                        <p class="product-p"><?= $product['short_description'] ?></p>
                                    </div>
                                    <small class="product-price text-muted ms-auto">₱<?= number_format($product['price'], 2) ?></small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
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