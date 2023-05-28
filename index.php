<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Movie-Info</title>
</head>

<body>

    <div class="container">
        <div class="search-container">
            <input type="text" id="movie-name" placeholder="Enter movie name here..." value="Wednesday">
            <button id="search-btn">Search</button>
        </div>
        <div id="result"></div>
    </div>



    <script src="public/js/key.js"></script>
    <script src="public/js/index.js"></script>

</body>

</html>