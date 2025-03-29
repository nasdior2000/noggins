<?php
require_once 'config.php';

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: sign-in.php");
    exit();
}

$errors = [];
$success = '';

// Fetch current user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user']['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip_code = trim($_POST['zip_code']);

    // Validate inputs
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email';
    }

    // Check if email is being changed to one that already exists
    if ($email !== $user['email']) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $errors['email'] = 'Email already registered';
        }
    }

    if (empty($errors)) {
        try {
            // Update user data
            $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, phone = ?, address = ?, city = ?, state = ?, zip_code = ? WHERE id = ?");
            $stmt->execute([$name, $email, $phone, $address, $city, $state, $zip_code, $_SESSION['user']['id']]);
            
            // Update session data
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            
            $success = "Profile updated successfully!";
            
            // Refresh user data
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user']['id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $errors['database'] = "Update error: " . $e->getMessage();
        }
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>My Profile | Little Fashion</title>

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
                                <span class="d-block text-primary">My</span>
                                <span class="d-block text-dark">Profile</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="profile section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto col-12">
                            <?php if ($success): ?>
                                <div class="alert alert-success"><?= $success ?></div>
                            <?php endif; ?>

                            <div class="card">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">Full Name</label>
                                                <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" 
                                                       id="name" name="name" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>
                                                <?php if (isset($errors['name'])): ?>
                                                    <div class="invalid-feedback"><?= $errors['name'] ?></div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                                                       id="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
                                                <?php if (isset($errors['email'])): ?>
                                                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" 
                                                   value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" 
                                                   value="<?= htmlspecialchars($user['address'] ?? '') ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" class="form-control" id="city" name="city" 
                                                       value="<?= htmlspecialchars($user['city'] ?? '') ?>">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="state" class="form-label">State</label>
                                                <input type="text" class="form-control" id="state" name="state" 
                                                       value="<?= htmlspecialchars($user['state'] ?? '') ?>">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="zip_code" class="form-label">ZIP Code</label>
                                                <input type="text" class="form-control" id="zip_code" name="zip_code" 
                                                       value="<?= htmlspecialchars($user['zip_code'] ?? '') ?>">
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn custom-btn cart-btn">Update Profile</button>
                                        </div>
                                    </form>
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