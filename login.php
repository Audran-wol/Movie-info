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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
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
               <div class="forgot-pass">
                  <a href="Register.php">Forgot Password?</a>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button i type="submit" value="Login">login</button>
               </div>
               <div class="signup-link">
                  Not a member? <a href="signup.php">Signup now</a>
               </div>
            </form>
         </div>
        </div>
    </div>
         
</body>
</html>