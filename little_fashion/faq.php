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

        <title>Noggins - FAQs Page</title>

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
            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Your favorite questions</span>
                                <span class="d-block text-dark">and our answers to them</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="faq section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-8 col-12">
                            <h2>General Info.</h2>

                            <div class="accordion" id="accordionGeneral">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralOne" aria-expanded="true" aria-controls="accordionGeneralOne">
                                        What is Noggin's Studio?
                                        </button>
                                    </h2>

                                    <div id="accordionGeneralOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionGeneral">

                                        <div class="accordion-body">
                                            <p class="large-paragraph"><strong>Noggin's Studio</strong> is our online platform where we offer top-quality camera products and professional video and recording services for personal and commercial use.</p>

                                            <p class="large-paragraph"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralTwo" aria-expanded="false" aria-controls="accordionGeneralTwo">
                                        What is Noggins website?
                                        </button>
                                    </h2>

                                    <div id="accordionGeneralTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionGeneral">

                                        <div class="accordion-body">
                                            <p class="large-paragraph"><a href="https://www.tooplate.com/free-templates" target="_blank">Noggins</a> provides HTML templates that help businesses like ours create clean and modern websites. We’ve used a Tooplate template to build a great experience for our visitors.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralThree" aria-expanded="false" aria-controls="accordionGeneralThree">
                                        How do I support your website?
                                        </button>
                                    </h2>

                                    <div id="accordionGeneralThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionGeneral">

                                        <div class="accordion-body">
                                            <p class="large-paragraph">You can support us by purchasing our camera products, booking our video/recording services, and sharing our website with your friends or on social media.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <h2 class="mt-5">About <span>our products</span></h2>

                            <div class="accordion" id="accordionProduct">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProductOne" aria-expanded="true" aria-controls="accordionProductOne">
                                        What type of products do you offer?
                                        </button>
                                    </h2>

                                    <div id="accordionProductOne" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionProduct">

                                        <div class="accordion-body">
                                            <p class="large-paragraph"><strong>Noggins Studio</strong> We offer a wide range of camera equipment including DSLRs, mirrorless cameras, lenses, tripods, lighting gear, and accessories — everything you need for photography and video production.</p>

                                            <p class="large-paragraph"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProductTwo" aria-expanded="false" aria-controls="accordionProductTwo">
                                        How do I use the product?
                                        </button>
                                    </h2>

                                    <div id="accordionProductTwo" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionProduct">

                                        <div class="accordion-body">
                                            <p class="large-paragraph">Each product includes a user guide, and we also offer tutorial videos to help you get started. If you need personalized help, our team is available for consultations and setup assistance.</p>
                                        </div>
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
