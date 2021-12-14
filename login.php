<?php

require 'dbconnection.php';
require 'helpers.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
 $email    = Clean($_POST['email']);
 $password = Clean($_POST['password']);
 $password = md5($password);


 $sql = "select *from test where email = '$email' and password = '$password'";  

  $op = mysqli_query($con,$sql);
  if (mysqli_num_rows($op) == 1) {
    # code...
      $data = mysqli_fetch_assoc($op);
      $_SESSION['test'] = $data ;
      header("location: toDo.php");
   
  }else{
    echo 'Email or password is failed, try again';
  }

    
  
    
}



?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>  LOGIN </title>


</head>
<body>

<h2>Login Form</h2>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="email"  name="email" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
    <label>
    </label>
  </div>

  </div>
</form>

</body>
</html>
