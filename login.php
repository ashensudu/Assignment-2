<?php
    if(isset($_POST['submit'])){
	login();
    }
?>

<?php
	
    function login()
    {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(strcmp($username,'ashen')==0 &&strcmp($password,'12345')==0)
	{
            session_set_cookie_params(300);
            session_start();
            session_regenerate_id();
			
            setcookie('session_cookie', session_id(), time() + 300, '/');

            $token = sha1(base64_encode(openssl_random_pseudo_bytes(30)));

            setcookie('CSRF_token', $token, time() + 300, '/','',true);
			
            header("Location:profile.php");
            exit;	
        }
	else
	{
            echo "<script>alert('Username and Password does not match. Please try again!')</script>";
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>CSRF_DSC</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style.css">
        
    </head>
    <body style="background-image: url('images/main1.jpg'); color: white; background-size: cover; ">
        <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">
            
            <form action="login.php" method="POST" >
					<div class="form-group">
					<input id="name" type="text" id="username" name="username" placeholder="Username" class="form-control" required>
					<label for="name">Username</label>
				</div>
				
				<div class="form-group">
					<input id="phone" type="password" id="password" name="password" placeholder="Password" class="form-control" required>
					<label for="phone">Password</label>
				</div>
			
        
                <input type="submit" value="Login" id="submit" name="submit" class="btn btn-info" style="background-color:#33a5ff;width:120px">
            
            </form>
        </div>
        </div>
        </div>
        
    </body>
</html>
