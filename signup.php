<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/register.css">
    <title>Login</title>
    
</head>
<body>
    <div class="center">
         <input type="checkbox" id="show">
         <label for="show" class="show-btn">View Form</label>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               Movie Info
            </div>
            <form method="post">
               <div class="data">
                  <label>Email or Phone</label>
                  <input id="text" type="text" name="user_name">
               </div>
               <div class="data">
                  <label>Password</label>
                  <input id="text" type="password" name="password">
               </div>
            
               <div class="btn">
                  <div class="inner"></div>
                  <button id="button" type="submit" value="Signup">Register</button>
               </div>
               
            </form>
         </div>
        </div>
    </div>
         
</body>
</html>