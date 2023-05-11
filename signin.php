<?php

   session_start();
   include("connections.php");
   include("functions.php");
   
   if ($_SERVER['REQUEST_METHOD'] == "POST")
   {
     //SOMETHING WAS POSTED
     $user_name = $_POST['user_name'];
     $password = $_POST['password'];
     $mail_id = $_POST['mail_id'];
    
     if (!empty($user_name) && !empty($password) && !is_numeric($user_name))
     {

       //save to database
       $user_id = random_num(20);
       $query ="insert into userstab (user_id,user_name,password,mail_id) values ('$user_id','$user_name','$password','$mail_id')";
       //mysqli_query($con,$query);

       if (mysqli_query($con,$query))
       {

          header("Location: ./log.php");
          die;
       }
      } else
        {
           echo "please enter some valid information";
         }
    }

?>

<!doctype html>
<html>
<head>
    <title>Signup - Indian Tour</title>
    <link rel="stylesheet" type="text/css" href="logstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1>SIGNUP</h1>
    <div class="login-box">
    <h2>Sign-up</h2>
    <form method="post">
        <label for="name">Username:</label>
        <input type="text" id="text" name="user_name"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="text" name="password" class="password" required><br><br>

        <label for="email">Email:</label>
        <input type="text" id="text" name="mail_id"><br><br>
        
        <input type="submit" value="sign-up" class="submit">
    </form>
    </div>
  </body>

</html>
