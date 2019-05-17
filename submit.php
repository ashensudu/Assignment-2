
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
        
    </head>
    <body style="background-image: url('images/profile2.jpg'); color: white; background-size: cover;">
        <?php
        if(isset($_COOKIE['session_cookie'])){
                echo "
				<nav class='navbar navbar-dark bg-dark'>
				<a class='navbar-brand  btn btn-success' href='logout.php' style='font-family:Helvetica'>Logout</a>
				</nav>
				";
            }
        ?>
        <div class="container">
        <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">
            
        <?php
        
            if(isset($_COOKIE['session_cookie'])){
                
                session_start();
                
                if ($_POST['CSRF_Token'] == $_COOKIE['CSRF_token']){
                    
                    $name = $_POST['name'];
                    $itnumber = $_POST['itnumber'];
                    $faculty = $_POST['faculty'];
                    
                    echo "
					<ul class='list-group'>
					  <li class='list-group-item  list-group-item-primary'>Your name is ".$name."</li>
					   <li class='list-group-item  list-group-item-primary'>Your IT Number is ".$itnumber."</li>
					    <li class='list-group-item  list-group-item-primary'>Your Faculty is ".$faculty."</li>
					</ul>";
                }
                else{
                    echo "<script>alert('CSRF Found!')</script>";
                }
            }
            
        ?>
        </div>
        </div>
        </div>
    </body>
</html>

