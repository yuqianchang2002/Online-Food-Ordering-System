<html>
<head>
    <link href="css/style.css" rel="stylesheet" /><!--Link to style.css file to use the design-->
</head>
<body>
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

	<section class="form ">
	<div class="container">
	<h1>Register</h1><br><br>
	<form action="register.php" method="POST" ><!--register form-->
		<label for="name">Name:</label><br>
		<input type ="form" name="name" class="form-control" id="name" placeholder="Name"><!--enter customer name field-->	
		<br><br><label for="number">Phone No:</label><br>
		<input type ="form" name="number" class="form-control" id="number" placeholder="Phone Number"required><!--enter customer phone no field-->	
		<br><br><label for="username">Username:</label><br>
		<input type ="form" name="username" class="form-control" id="username" placeholder="Username"required><!--enter cusername field-->		
		<br><br><label for="email">Email:</label><br>
		<input type ="form" name="email" class="form-control" id="email" placeholder="Email"required><!--enter customer email field-->
		<br><br><label for="address">Address:</label><br>
		<input type ="form" name="address" class="form-control" id="address" placeholder="address"required><!--enter customer address field-->				
		<br><br><label for="password">Password:</label><br>
		<input type ="password" name="password" class="form-control" id="password" placeholder="Password" required><!--enter password field-->	<br><br>
		<hr/>
		<br><button type="submit" name="register" class="btn btn-primary"/>&nbsp;Register&nbsp;</button><!--register button-->
					</div>		
	</section>



		<?php
include('config/constants.php');



if(isset($_POST['register']))//system will run this code when user press the register button
{
//define variable
$name=$_POST['name'];
$number=$_POST['number'];
$username=$_POST['username'];
$email=$_POST['email'];
$address=$_POST['address'];
$password=md5($_POST['password']);
$sql=mysqli_query($conn,"insert into tbl_customer (name,number,username,email,address,password) values('$name','$number','$username','$email','$address','$password')");//insert data  into tbl_customer table

                    //Check whether query executed successfully or not
                    if($sql	==true)
                    {
                        //Query Executed and Information Saved
                        $_SESSION['register'] = "<div class='success text-center'>Register Successfully.</div>";
						header('location:'.SITEURL.'index.php');

                    }
                    else
                    {
                        //Failed to Save information
                        $_SESSION['register'] = "<div class='error text-center'>Failed to register.</div>";
                        header('location:'.SITEURL.'register.php');                    
					}

                }
 include('partials-front/footer.php'); ?>
</body>
</html>
<!--code end-->
