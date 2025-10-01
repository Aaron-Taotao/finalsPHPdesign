<?php
// Simple login logic
$login_error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hardcoded example credentials
    $valid_username = "admin";
    $valid_password = "password123";

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        // Successful login (for demo, redirect or show message)
        header("Location: welcome.php"); // You can create a welcome.php page
        exit();
    } else {
        $login_error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e8f5e9; /* Light green background */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .btn-green {
      background-color: #4caf50;
      color: white;
    }

    .btn-green:hover {
      background-color: #45a049;
    }

    .error-message {
      color: red;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h3 class="text-center mb-4 text-success">LOGIN FORM</h3>
  
  <?php if ($login_error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($login_error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" id="username" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
    <input type="text" name="password" id="password" class="form-control" required>
    </div>
<button type="submit" class="btn btn-green w-100">Login</button>
    </form>
  </div>

</body>
</html>