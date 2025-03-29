<?php
// product-detail.php
require_once 'config.php';

if (!isset($_GET['id'])) {
    header("Location: products.php");
    exit();
}

$productId = $_GET['id'];

// Fetch product details
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header("Location: products.php");
    exit();
}

// Fetch related products
$stmtRelated = $pdo->prepare("
    SELECT p.* FROM products p
    JOIN related_products rp ON p.id = rp.related_product_id
    WHERE rp.product_id = ?
    LIMIT 3
");
$stmtRelated->execute([$productId]);
$relatedProducts = $stmtRelated->fetchAll(PDO::FETCH_ASSOC);

// If no related products, get some random products
if (empty($relatedProducts)) {
    $stmtRandom = $pdo->query("SELECT * FROM products WHERE id != $productId ORDER BY RAND() LIMIT 3");
    $relatedProducts = $stmtRandom->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $product['name'] ?> | Noggins</title>

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
                                <span class="d-block text-primary">We provide you</span>
                                <span class="d-block text-dark">Fashionable Stuffs</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <img src="<?= $product['image_path'] ?>" class="img-fluid product-image" alt="<?= $product['name'] ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0"><?= $product['name'] ?></h2>
                                    <p class="product-p"><?= $product['short_description'] ?></p>
                                </div>
                                <small class="product-price text-muted ms-auto mt-auto mb-5">$<?= number_format($product['price'], 2) ?></small>
                            </div>

                            <div class="product-description">
                                <strong class="d-block mt-4 mb-2">Description</strong>
                                <p class="lead mb-5"><?= $product['description'] ?></p>
                            </div>

                            <div class="product-cart-thumb row">
                                    <form method="post" action="add-to-cart.php">
                                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                        <div class="col-lg-6 col-12">
                                            <select class="form-select cart-form-select" name="quantity" id="inputGroupSelect01">
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                            <button type="submit" class="btn custom-btn cart-btn">Add to Cart</button>
                                        </div>
                                    </form>

                                    <p>
                                        <a href="#" class="product-additional-link">Details</a>
                                        <a href="#" class="product-additional-link">Delivery and Payment</a>
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="related-product section-padding border-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="mb-5">You might also like</h3>
                        </div>

                        <?php foreach ($relatedProducts as $related): ?>
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="product-detail.php?id=<?= $related['id'] ?>">
                                    <img src="<?= $related['image_path'] ?>" class="img-fluid product-image" alt="<?= $related['name'] ?>">
                                </a>

                                <div class="product-top d-flex">
                                    <?php if ($related['is_new_arrival']): ?>
                                    <span class="product-alert me-auto">New arrival</span>
                                    <?php endif; ?>
                                    <?php if ($related['is_discounted']): ?>
                                    <span class="product-alert me-auto">Low Price</span>
                                    <?php endif; ?>
                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="product-detail.php?id=<?= $related['id'] ?>" class="product-title-link"><?= $related['name'] ?></a>
                                        </h5>
                                        <p class="product-p"><?= $related['short_description'] ?></p>
                                    </div>
                                    <small class="product-price text-muted ms-auto mt-auto mb-5">$<?= number_format($related['price'], 2) ?></small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </main>

        <?php include 'footer.php'; ?>

        <!-- CART MODAL -->
        <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <img src="<?= $product['image_path'] ?>" class="img-fluid product-image" alt="<?= $product['name'] ?>">
                            </div>

                            <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                                <h3 class="modal-title" id="exampleModalLabel"><?= $product['name'] ?></h3>
                                <p class="product-price text-muted mt-3">$<?= number_format($product['price'], 2) ?></p>
                                <p class="product-p">Quatity: <span class="ms-1">1</span></p>
                                <div class="border-top mt-4 pt-3">
                                    <p class="product-p"><strong>Total: <span class="ms-1">$<?= number_format($product['price'], 2) ?></span></strong></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row w-50">
                            <button type="button" class="btn custom-btn cart-btn ms-lg-4">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>