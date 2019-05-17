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
    <body style="background-image: url('images/profile1.jpg'); color: white; background-size: cover;" >
        <?php 
            if(isset($_COOKIE['session_cookie'])){
                echo "
				<nav class='navbar navbar-dark bg-dark'>
				<a class='navbar-brand  btn btn-success' href='logout.php' style='font-family:Helvetica'>Logout</a>
				</nav>
				";
            }
        ?>
        <script>
            function getCookie(cname){
                
                var name = cname + "=";
                var dCookie = decodeURIComponent(document.cookie);
                var ca = dCookie.split(';');
                
                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                
                return "";
            }
            
            function submitForm(oFormElement){
                document.getElementById("CSRF_Token").value=getCookie("CSRF_token");
            }
            
        </script>
        
        <?php
            
            if(isset($_COOKIE['session_cookie'])){
                   echo "
						<form method='post' action='submit.php' onsubmit='submitForm(this);' style='margin-left:650px;'>
                            <!-- CSRF Token -->
                                <input type='hidden' name='CSRF_Token' id='CSRF_Token' value=''>   
                                <!--  -->	
                            <div class='form-group row'>
                            	<label for='name' class='col-sm-4 col-form-label'>Full Name</label>
                            <div class='col-sm-10'>
                                <input type='text' class='form-control' id='name' name='name' placeholder='Full Name' required>
                            </div>
                            </div>
                          
                          	<div class='form-group row'>
                                <label for='university' class='col-sm-4 col-form-label'>IT Number</label>
                            <div class='col-sm-10'>
                                <input type='text' class='form-control' id='itnumber' name='itnumber' placeholder='IT Number' required>
                            </div>
                          	</div>
							
							<div class='form-group row'>
                                <label for='degree' class='col-sm-4 col-form-label'>Faculty</label>
                            <div class='col-sm-10'>
							<select class='form-control' id='faculty' name='faculty' placeholder='Faculty' >
								<option>Computing</option>
								<option>Business</option>
								<option>Engineering</option>
							</select>
                            </div>
                          	</div>
                                           
                                <button type='submit' class='btn btn-primary' style='margin-left:90px'>Submit</button>
                       </form>";
            }
        
        ?>
    </body>
</html>

