<?php include('config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
                    <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
			<br><br><br><br><br><hr>
			
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        

            <!-- Login Form Starts Here -->
		<section class="form" >
			<div class="container" >
			            <h1  class="text-center">Customer Login</h1><br>

            <form action="index.php" method="POST"  class="text-center">
            Username: <br>
            <input type="form" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

		<hr/>
		<br><button type="submit" name="submit" class="btn btn-primary"/>&nbsp;Login&nbsp;</button><!--register button-->
            
			</form>
			<form method="POST" action="http://localhost/onlinefood-order/register.php"  class="text-center">
      		<br><button type="submit" name="submit" class="btn btn-primary"/> &nbsp;Register</button>&nbsp;<!--lecturer login button to lead users to the lecturer login page-->
			</form>			

			</section>
            <!-- Login Form Ends Here -->
				
            </div>
        </div>

    </body>
</html>

<?php 

    //Check whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'home.php');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'index.php');
        }


    }

 include('partials-front/footer.php'); ?>
<!--code end-->
