<?php
// Simulate a logged-in user for this demo
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$username = $_SESSION['username']; // Get the logged-in user's username (from session)

// Dummy data for items (this would normally come from a database)
$items = [
    ['id' => 1, 'name' => 'Item 1'],
    ['id' => 2, 'name' => 'Item 2'],
    ['id' => 3, 'name' => 'Item 3'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Items</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #e8f5e9; /* Light green background */
    }

    .navbar {
      background-color: #43a047; /* Green navbar */
    }

    .navbar-brand, .nav-link {
      color: white !important;
    }

    .navbar-brand:hover, .nav-link:hover {
      color: #f1f1f1 !important;
    }

    .container {
      margin-top: 20px;
    }

    .card {
      background-color: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      padding: 20px;
    }

    .btn-green {
      background-color: #43a047;
      color: white;
    }

    .btn-green:hover {
      background-color: #388e3c;
    }

    .btn-red {
      background-color: #d32f2f;
      color: white;
    }

    .btn-red:hover {
      background-color: #c2185b;
    }

    h1 {
      color: #388e3c;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="items.php">Items</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-red" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Items Page Content -->
  <div class="container">
    <div class="card">
      <h1 class="text-center">Manage Items</h1>
      <div class="d-flex justify-content-between">
        <a href="add_item.php" class="btn btn-green">Add Item</a>
      </div>

      <!-- Items Table -->
      <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($items as $item): ?>
            <tr>
              <td><?php echo htmlspecialchars($item['id']); ?></td>
              <td><?php echo htmlspecialchars($item['name']); ?></td>
              <td>
                <a href="edit_item.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_item.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies (Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
