<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PHP CRUD</title>
  </head>
  <body>

  <div class="container">
    <?php require_once 'process.php'; ?>

    <?php if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>" >
        <?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        ?>
    </div>
      <?php endif ?>

    <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data");   
    ?>

    <div class="row justify-content-center">
      <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td>
              <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
              <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">DELETE</a>
            </td>
          </tr>
          <?php endwhile; ?>
      </table>
    </div>

    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Enter your name">
            </div>
            
            <div class="form-group">
                <label for="Location">Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo $location ?>" placeholder="Enter your location">
            </div>
            
            <div class="form-group">
            <?php if($update == true): ?>
              <button type="submit" name="update" class="btn btn-info">Update</button>
            <?php else: ?>
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            <?php endif; ?>
            </div>

            
        </form>
        
    </div>  
  </div>
    
  
    

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>