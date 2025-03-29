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

        <title>Noggin's Video and Film Services</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>
        <?php include 'navbar.php'; ?>

            <section class="slick-slideshow">   
                <div class="slick-custom">
                    <img src="images/slideshow/medium-shot-business-women-high-five.jpeg" class="img-fluid" alt="">

                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">Your Story. Perfectly Captured.</h1>

                                    <p class="lead text-white mt-lg-3 mb-lg-5">We turn moments into cinematic memories — from brand commercials to weddings and everything in between. At Noggin, our passion is bringing your vision to life with professional-grade video production.</p>

                                    <a href="about.php" class="btn custom-btn">Learn more about us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slick-custom">
                    <img src="images/slideshow/team-meeting-renewable-energy-project.jpeg" class="img-fluid" alt="">

                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">Our Work</h1>

                                    <p class="lead text-white mt-lg-3 mb-lg-5">Explore our latest video project styles and service packages tailored for every story — from commercials to weddings and beyond.</p>

                                    <a href="product.php" class="btn custom-btn">Explore products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slick-custom">
                    <img src="images/slideshow/two-business-partners-working-together-office-computer.jpeg" class="img-fluid" alt="">

                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">Talk to us</h1>

                                    <p class="lead text-white mt-lg-3 mb-lg-5">At Noggin, we specialize in creating stunning video productions for commercials, weddings, corporate events, and more. Whether you’re telling a love story or launching a brand — we’re here to capture every moment, frame by frame.</p>

                                    <a href="contact.php" class="btn custom-btn">Work with us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section class="about section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="mb-5">Get started with <span>Noggin</span> Studio</h2>
                        </div>

                        <div class="col-lg-2 col-12 mt-auto mb-auto">
                            <ul class="nav nav-pills mb-5 mx-auto justify-content-center align-items-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Introduction</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-youtube-tab" data-bs-toggle="pill" data-bs-target="#pills-youtube" type="button" role="tab" aria-controls="pills-youtube" aria-selected="true">How we work?</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-skill-tab" data-bs-toggle="pill" data-bs-target="#pills-skill" type="button" role="tab" aria-controls="pills-skill" aria-selected="false">Capabilites</button>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-10 col-12">
                            <div class="tab-content mt-2" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <img src="images/pim-chu-z6NZ76_UTDI-unsplash.jpeg" class="img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3">Good <span>Design</span> <br>Ideas for <span>your</span> fashion</h4>

                                                <p>At Noggin, we offer professional video services tailored for every story — from corporate commercials to weddings, social media content, and more.
                                                    We bring your ideas to life using cinematic techniques, modern editing, and a passion for visual storytelling.
                                                    
                                                    This platform includes client onboarding, booking features, video previews, and a dedicated contact section — everything you need to create and collaborate.</p>

                                                

                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="about.php" class="custom-link mb-2">
                                                        Learn more about us
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-youtube" role="tabpanel" aria-labelledby="pills-youtube-tab">

                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="https://www.youtube-nocookie.com/embed/f_7JqPDWhfw?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3">Life at Noggin Studio</h4>

                                                <p>With over three years of creative storytelling, we’ve partnered with individuals, brands, and organizations to produce high-impact videos. From cinematic wedding reels to commercial ads and event coverage — we turn ideas into visual stories that connect and inspire.</p>

                                                

                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="contact.php" class="custom-link mb-2">
                                                        Work with us
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-skill" role="tabpanel" aria-labelledby="pills-skill-tab">
                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <img src="images/cody-lannom-G95AReIh_Ko-unsplash.jpeg" class="img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3">What can help you?</h4>

                                                <p>Over three years in business, We’ve had the chance on projects</p>

                                                <div class="skill-thumb mt-3">

                                                    <strong>Cinematic Video Editing</strong>
                                                        <span class="float-end">90%</span>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                            </div>

                                                    <strong>Event & Wedding Coverage</strong>
                                                        <span class="float-end">70%</span>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                                            </div>

                                                    <strong>Commercial Production</strong>
                                                        <span class="float-end">80%</span>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                            </div>

                                                </div>
                                                
                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="products.php" class="custom-link mb-2">
                                                        Explore products
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="front-product">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12">
                            <img src="images/retail-shop-owner-mask-social-distancing-shopping.jpg" class="img-fluid" alt="">
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="px-5 py-5 py-lg-0">
                                
                                <h2 class="mb-4"><span>Event Planners</span> & Content Creators</h2>

                                <p class="lead mb-4">We work hand-in-hand with brands, wedding coordinators, and social media creators to deliver engaging and high-quality videos that make an impact.

                                    Whether you’re launching a campaign, tying the knot, or promoting your services — Noggin Studio is here to capture your story.</p>

                                <a href="products.php" class="custom-link">
                                    Explore Products
                                    <i class="bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="featured-product section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Featured Products</h2>
                            <p>At Noggin Studio, we don’t just produce films — we empower fellow creators with the tools they need to bring stories to life. Explore our curated collection of video production gear including cameras, tripods, lighting equipment, microphones, and editing accessories — all tested and trusted by our own team.

                            </p>
                        </div>

                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="product-detail.php">
                                    <img src="images/product/image.png" class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert me-auto">New Arrival</span>

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="product-detail.html" class="product-title-link">Canon EOS 1500D</a>
                                        </h5>

                                        <p class="product-p">Original package from Canon</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">₱45,000</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="product-detail.html">
                                    <img src="images/product/image copy.png" class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert">Low Price</span>

                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="product-detail.php" class="product-title-link">Tripod</a>
                                        </h5>

                                        <p class="product-p">Costume Package</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">₱3500</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="product-thumb">
                                <a href="product-detail.php">
                                    <img src="images/product/phone.png" class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="product-detail.php" class="product-title-link">Andoer Smartphone Vlogging </a>
                                        </h5>

                                        <p class="product-p">Phone Holder</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">₱36,000</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <a href="products.php" class="view-all">View All Products</a>
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
