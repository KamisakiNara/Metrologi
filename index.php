<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styling for sidebar */
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background-color: #212529; /* Dark background */
      color: #fff;
      padding-top: 60px; /* Adjusted to match navbar height */
    }
    .sidebar a {
      color: #adb5bd; /* Light gray text */
      text-decoration: none;
      display: block;
      padding: 10px 15px;
    }
    .sidebar a:hover {
      background-color: #343a40; /* Slightly lighter dark background */
      color: #fff;
    }
    .sidebar .submenu a {
      color: #ced4da; /* Submenu text color */
    }
    .sidebar .submenu a:hover {
      background-color: #495057; /* Submenu hover background */
    }
    .submenu {
      display: none;
    }
    .submenu.active {
      display: block;
    }

    /* Navbar styling */
    .navbar {
      background-color: #1c1c1e; /* Darker navbar */
      color: #fff;
      z-index: 1000; /* Ensure navbar is above sidebar */
    }
    .navbar-brand {
      color: #fff !important;
      margin-left: 20px;
    }
    .navbar .nav-link {
      color: #fff !important;
    }

    /* Main content styling */
    .content {
      margin-left: 250px; /* Same as sidebar width */
      padding: 20px;
    }
    iframe {
      width: 100%;
      height: calc(100vh - 120px); /* Adjust height to fit below navbar */
      border: none;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <span class="navbar-brand">Metrologi dan Perdagangan</span>
      <div class="d-flex">
        <a class="nav-link" href="#">Login Admin</a>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#" id="permohonan-toggle">Permohonan</a>
    <div class="submenu" id="permohonan-submenu">
      <a href="timbanganpanjang.php" class="ms-3" data-target="iframe-content">Alat Ukur Panjang</a>
      <a href="timbanganmassa.php" class="ms-3" data-target="iframe-content">Alat Ukur Massa</a>
      <a href="timbanganvolume.php" class="ms-3" data-target="iframe-content">Alat Ukur Volume</a>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <iframe id="iframe-content" src="welcome.php"></iframe>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // JavaScript to toggle submenu
    document.getElementById('permohonan-toggle').addEventListener('click', function() {
      const submenu = document.getElementById('permohonan-submenu');
      submenu.classList.toggle('active');
    });

    // JavaScript to handle iframe loading
    document.querySelectorAll('.submenu a').forEach(link => {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        const targetUrl = this.getAttribute('href'); // Get the URL from href
        const iframe = document.getElementById('iframe-content'); // Get the iframe element
        iframe.src = targetUrl; // Set the iframe source to the target URL
      });
    });
  </script>

</body>
</html>