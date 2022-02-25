<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">   Detail </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
  <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'auth/dashboard'?>">Home</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " aria-current="page" href="<?php echo base_url().'auth/blogs'?>">Add Article</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url().'auth/login'?>">Logout</a>
      </li>
    </nav><br>
    <center><h2>Detail of Articles<h2></center>
    <br>
    <div class="container">
        <table class ="table table-striped">
        <!-- <div class="container">
    <table align ="center" border="1px" style="width:900px; line-height:30px">  -->

      
            <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Profile</th>
            <th>Action</th>
            
</tr>

<?php if(!empty($blogs)){
    foreach($blogs as $row){
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['description']?></td>
            <!-- <td><?php echo $row['profile']?></td> -->
            <td><img src="<?php echo base_url().$row['profile']; ?>"
  height="50px" weight="50px"></td>
            <td>
                <a href="<?php echo base_url().'auth/edit/'.$row['id']?>" class="btn btn-primary">EDIT</a>
        </td>
        <td>
            <a href="<?php echo base_url().'auth/delete/'.$row['id']?>" class="btn btn-danger">DELETE</a>
        </td>
    </tr>
    <?php }
    } else {
        ?>
        <tr>
            <td>Records not Found</td>
    </tr>
    <?php 
    }?>
    
    


</div>
</body>
</html>