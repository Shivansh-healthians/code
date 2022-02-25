<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/login.css'?>">
</head>
<body>
<form class="form-signin" action="<?php echo base_url().'auth/login'; ?>" name="registerForm" id="registerForm" method="post">
    
    <?php
    $msg = $this->session->flashdata('msg');
    if($msg != "") {
      ?>
      <div class = "alert alert-success">
        <?php echo $msg;?>
      </div>
      <?php
    }
    ?>

    <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>

    <div class="form-floating">
      
      <input type="text" name="email" class="form-control <?php echo strip_tags(form_error('email') != "")? 'is-invalid' : '';?>" id="email" placeholder="name@example.com" autofocus>
      <label for="floatingInput" class="sr-only">Email address</label>
      <p class="invalid-feedback"> <?php echo strip_tags(form_error('email')); ?></p> 
    </div>
    <div class="form-floating">
      
      <input type="password" name="password" class="form-control <?php echo strip_tags(form_error('password') != "")? 'is-invalid' : '';?>" id="password" placeholder="Password" autofocus>
      <label for="password" class="sr-only">Password</label>
      <p class="invalid-feedback"> <?php echo strip_tags(form_error('password')); ?></p> 
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    
    <div class="mt-3">
    <a href="<?php echo base_url().'auth/register';?>">Register here</a>
    </div>

  </form>
</body>
</html>