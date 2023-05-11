<?php
   session_start();
   include("connections.php");
   include("functions.php");
   
   if ($_SERVER['REQUEST_METHOD'] == "POST")
   {
     //SOMETHING WAS POSTED
     $user_name=$_POST['user_name'];
     $password = $_POST['password'];
     
    
     if (!empty($user_name) && !empty($password) && !is_numeric($user_name))
     {

       //read from the database
       $query ="select * from userstab where user_name='$user_name' limit 1";
      
       $result = mysqli_query($con,$query);
       if ($result)
       {
         
          if ($result && mysqli_num_rows($result) >0)
          {
               if ($user_data= mysqli_fetch_assoc($result))
               {
                 if ($user_data['password'] == $password)
                 {
                   $_SESSION['user_id']= $user_data['user_id'];
                   echo "successfully logged in";
                   echo $user_data['user_name'];
                   header("Location: ./project.html");
                   die;
                }
                else
                {
                  echo "<p style='font-size:30px; font-weight: bold; color: red; text-align: center'> incorrect password </p>";
                }
              }
              else
              {
                echo "<p style='font-size:30px; font-weight: bold; color: red; text-align: center'> incorrect username </p>";
              } 
           }
           else
           {
              echo "<p style='font-size:30px; font-weight: bold; color: red; text-align: center'> incorrect user name </p>";
           }  
        } else
        {
           echo "<p style='font-size:30px; font-weight: bold; color: red; text-align: center'> please enter some valid information </p>";
        }
    }
  }


?>

<!doctype html>
<html>
<head>
    <title>Login - Indian Tour</title>
    <link rel="stylesheet" type="text/css" href="logstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1>LOGIN</h1>
    <div class="login-box">
      <h2>Login</h2>
      <form method="post">
        <label for="name">Username:</label>
        <input type="text" id="text" name="user_name"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="text" name="password" class="password" required><br><br>

        <input type="submit" value="Log-in" class="submit">
    </form>
      <p>Don't have an account? <a href="http://localhost/registerpages/signin.php">Sign up</a></p>
    </div>
  </body>

</html>

