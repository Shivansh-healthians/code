<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
    <form class="form-signin" action="<?php echo base_url().'auth/home'; ?>" name="registerForm" id="registerForm" method="post">
</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--try for username as well -->
      <div class="col-md-6 text=right text-white">Welcome, <?php echo $user['first_name'].' '.$user['last_name']; ?> </div>
      <br>
      <br>
      <a href="<?php echo base_url().'auth/login';?>" class="nav-item text-white">Logout</a>
    </div>
  </nav>
</header>
</body>
</html>





<!-- <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> 
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div> -->