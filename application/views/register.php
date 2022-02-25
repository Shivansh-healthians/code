<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" > -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">

    <!--Jquery link for validation of text-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>
<body>
<div class="container">
        <?php
        $msg=$this->session->flashdata('msg');
        if($msg !=""){
            //echo "<div class='alert alert_success'>'.$msg.'</div>";
        }
        ?>

        <div class="col-md-6">
          <div class="card mt-4">
            <div class="card-header">
              Register Here
            </div>
            <form action="<?php echo base_url().'auth/register'; ?>" name="registerForm" id="registerForm" method="post">
            <br>

<div class="container">    
<!-- <form class="row g-3"  enctype="multipart/form-data"> -->
  <div class="card-body">


  <div class="form-group">
    <label for="name" class="form-label">First Name</label>
    <input type="text" name="first_name" id="form_first" value="<?php echo set_value('first_name') ?>" class="form-control <?php echo strip_tags(form_error('first_name') != "")? 'is-invalid' : '';?> "placeholder="First Name"> 
    <p class="invalid-feedback"> <?php echo strip_tags(form_error('first_name')); ?></p> 
    
    <!-- <input type="text" class="form-control" id="inputEmail4" name="user_name"> -->
    <span class="error_form" id="first_error_message"></span>
  </div>

  <div class="form-group">
    <label for="name" class="form-label">Last Name</label>
    <input type="text" name="last_name" id="form_last" value="<?php echo set_value('last_name') ?>" class="form-control <?php echo strip_tags(form_error('last_name') != "")? 'is-invalid' : '';?>" placeholder="Last Name"> 
    <p class="invalid-feedback"> <?php echo strip_tags(form_error('last_name')); ?></p> 
    <span class="error_form" id="last_error_message"></span>
  </div>

  <div class="form-group">
    <label for="name" class="form-label">Email</label>
    <input type="text" name="email" id="form_email" value="<?php echo set_value('email') ?>" class="form-control <?php echo strip_tags(form_error('email') != "")? 'is-invalid' : '';?>" placeholder="example@gmail.com"> 
    <p class="invalid-feedback"> <?php echo strip_tags(form_error('email')); ?></p> 
    <span class="error_form" id="email_error_message"></span>
  </div>

  <div class="form-group">
    <label for="name" class="form-label">Username</label>
    <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" class="form-control <?php echo strip_tags(form_error('username') != "")? 'is-invalid' : '';?>"
    placeholder="Username"> 
    <p class="invalid-feedback"> <?php echo strip_tags(form_error('username')); ?></p> 
  </div>

  <div class="form-group">
    <label for="name" class="form-label">Phone</label>
    <input type="number" name="phone" id="form_phone" value="<?php echo set_value('phone') ?>" class="form-control <?php echo strip_tags(form_error('phone') != "")? 'is-invalid' : '';?>"
    placeholder="Phone"> 
    <p class="invalid-feedback"> <?php echo strip_tags(form_error('phone')); ?></p> 
    <span class="error_form" id="phone_error_message"></span>
  </div>

  <div class="form-group">
    <label for="name" class="form-label">Password</label>
    <input type="password" name="password" id="form_password" value="<?php echo set_value('password') ?>" class="form-control <?php echo strip_tags(form_error('password') != "")? 'is-invalid' : '';?>" placeholder="Create new password"> 
    <p class="invalid-feedback"> <?php echo strip_tags(form_error('password')); ?></p> 
    <span class="error_form" id="password_error_message"></span>
  </div>

<br>
<div class="form-groupp">
<button type="submit" class="btn btn-block btn-primary">Submit</button>
</div>
<div class="mt-3">
    <a href="<?php echo base_url().'auth/login';?>">Login here</a>
</div>
</form>
</div>


<script type="text/javascript">
        $(function(){
                $("#first_error_message").hide();
                $("#last_error_message").hide();
                $("#email_error_message").hide();
                $("#phone_error_message").hide();
                $("#password_error_message").hide();
                
                var error_first = false;
                var error_last = false;
                var error_email = false;
                var error_phone=false;
                var error_password=false;

                $("#form_first").focusout(function(){
                        check_first();
                });
                $("#form_last").focusout(function(){
                        check_last();
                });
                $("#form_email").focusout(function(){
                        check_first();
                });
                $("#form_phone").focusout(function(){
                        check_phone();
                });
                $("#form_password").focusout(function(){
                        check_first();
                });
                
                function check_first(){
                        var pattern = /^[a-zA-z]*$/;
                        var first = $("#form_first").val();
                        if(pattern.test(first) && first !==''){
                                $("#first_error_message").hide();
                                $("#form_first").css("border-bottom",
                                //"2px solid #34a7f4"
                                );
                        } else {
                                $("#first_error_message").html("should contain only characters");
                                $("#first_error_message").show();
                                $("#form_first").css("border-bottom",
                                //"2px solid #F90A0A"
                                );
                                error_first = true;
                        }
                }

                function check_last(){
                        var pattern = /^[a-zA-z]*$/;
                        var last = $("#form_last").val();
                        if(pattern.test(last) && last !==''){
                                $("#last_error_message").hide();
                                $("#form_last").css("border-bottom","2px solid #34a7f4");
                        } else {
                                $("#last_error_message").html("should contain only characters");
                                $("#last_error_message").show();
                                $("#form_last").css("border-bottom","2px solid #F90A0A");
                                error_last = true;
                        }
                }

                // function check_email(){
                //         var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                //         var email = $("#form_email").val();
                //         if(pattern.test(email) && email !==''){
                //                 $("#email_error_message").hide();
                //                 $("#form_email").css("border-bottom","2px solid #34a7f4");
                //         } else {
                //                 $("#email_error_message").html("Invalid Email");
                //                 $("#email_error_message").show();
                //                 $("#form_email").css("border-bottom","2px solid #F90A0A");
                //                 error_email = true;
                //         }
                // }

                function check_phone(){
                        var pattern = /^[0-9]*$/;
                        var phone = $("#form_phone").val();
                        if(pattern.test(phone) && phone !==''){
                                $("#phone_error_message").hide();
                                $("#form_phone").css("border-bottom","2px solid #34a7f4");
                        } else {
                                $("#phone_error_message").html("should contain only letters");
                                $("#phone_error_message").show();
                                $("#form_phone").css("border-bottom","2px solid #F90A0A");
                                error_phone = true;
                        }
                }


                $("#register_form").submit(function(){
                        error_first = false;
                        error_last = false;
                        error_email = false;
                        error_phone =false;
                        error_password =false;
                        
                        check_first();
                        check_last();
                        check_email();
                        check_phone();
                        check_password();

                        if(error_first ===false && error_last === false && error_email === false && error_phone ===false &&
                        error_password ===false){
                                alert("Registration Successfull");
                                return true;
                        } else {
                                alert("Please Fill the form Correctly");
                                return false;
                        }
                });

        });
        </script>




</body>
<script>

</script>

</html>

<!-- <div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CDI </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"></a>
      </li>
    </nav>
    <center><h1></h1></center>
    </div> -->