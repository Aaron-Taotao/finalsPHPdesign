<?php
$register_error = "";
$register_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST["first_name"] ?? '';
    $last_name = $_POST["last_name"] ?? '';
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    // Simple form validation (you can extend this)
    if (empty($first_name) || empty($last_name) || empty($username) || empty($password)) {
        $register_error = "All fields are required!";
    } else {
        // Save the user data (In production, use database and hash passwords!)
        // Example: Here we just simulate a successful registration.
        $register_success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e8f5e9; /* Light green background */
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .register-box {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 12px rgba(0, 100, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .btn-green {
      background-color: #43a047;
      color: white;
    }

    .btn-green:hover {
      background-color: #388e3c;
    }

    h3 {
      color: #2e7d32;
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <div class="register-box">
    <h3>Register Form</h3>

    <?php if ($register_success): ?>
      <div class="alert alert-success text-center">Registration successful! You can now log in.</div>
    <?php elseif (!empty($register_error)): ?>
      <div class="alert alert-danger"><?php echo htmlspecialchars($register_error); ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo isset($first_name) ? htmlspecialchars($first_name) : ''; ?>" required>
      </div>
      <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo isset($last_name) ? htmlspecialchars($last_name) : ''; ?>" required>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
      <button type="submit" class="btn btn-green w-100">Register</button>
    </form>

  </div>

</body>
</html>