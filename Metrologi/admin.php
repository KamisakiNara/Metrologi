<?php
// Start session to store user login status
session_start();

// Array of valid admin accounts
$admins = [
    [
        "username" => "admin1",
        "password" => "password123"
    ],
    [
        "username" => "admin2",
        "password" => "securepass456"
    ],
    [
        "username" => "superadmin",
        "password" => "supersecret789"
    ]
];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate username and password against the admin array
    $isValid = false;
    foreach ($admins as $admin) {
        if ($username === $admin['username'] && $password === $admin['password']) {
            $isValid = true;
            break;
        }
    }

    if ($isValid) {
        // Set session variable to indicate user is logged in
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $username; // Store username in session
        header("Location: dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        $errorMessage = "Username atau password salah!";
    }
}

// If user is already logged in, redirect to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .error-message {
      color: red;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="login-container">
      <h2 class="text-center mb-4">Admin Login</h2>

      <?php if (isset($errorMessage)): ?>
        <div class="error-message text-center"><?php echo htmlspecialchars($errorMessage); ?></div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>