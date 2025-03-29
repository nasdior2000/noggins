<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="index.php">
            <strong><span>Noggin's</span> Studio</strong>
        </a>

        <div class="d-lg-none">
            <a href="sign-in.php" class="bi-person custom-icon me-3"></a>
            <a href="cart.php" class="bi-bag custom-icon"></a>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">Story</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : '' ?>" href="products.php">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>

            <div class="d-none d-lg-block">
    <?php if (isset($_SESSION['user'])): ?>
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="me-2"><?= htmlspecialchars($_SESSION['user']['name']) ?></span>
                    <i class="bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
            </div>
            
            <a href="cart.php" class="bi-bag custom-icon position-relative ms-3">
                <?php if (!empty($_SESSION['cart'])): ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= array_reduce($_SESSION['cart'], function($carry, $item) { return $carry + $item['quantity']; }, 0) ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
    <?php else: ?>
        <a href="sign-in.php" class="bi-person custom-icon me-3"></a>
        <a href="cart.php" class="bi-bag custom-icon"></a>
    <?php endif; ?>
</div>

        </div>
    </div>
</nav>