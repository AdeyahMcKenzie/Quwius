<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Login|Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		   <div class="login-box">
			<div class="login-box-body">
				
			<p class="login-box-msg">Be Curious - Sign In</p>
			<?php if (isset($loginError))
				  		{
					  		echo  "<p class ='login-box-msg' style='color:red'>".$loginError."</p>";
				  		}

						  if (isset($passwordError))
				  		{
					  		echo  "<p class='login-box-msg' style='color:red'>".$passwordError."</p>";
				  		}
						  if (isset($success))
				  		{
					  		echo  "<p class='login-box-msg' style='color:green'>".$success."</p>";
				  		}
					?>
			<form action="authenticate.php" method="POST">
			  <div class="form-group has-feedback">
				<input type="text" <?php if (isset($email)){ echo "value ='".$email."'";}?>
					class="form-control" name ="email" placeholder="Email"/>
			  </div>
			  <div class="form-group has-feedback">
				<input type="password" class="form-control" name ="password" placeholder="Password"/>
			  </div>
			  <div class="row">
				<div class="col-xs-8">    
				  <div class="checkbox icheck">
					<label>
					  <input type="checkbox"> Remember Me
					</label>
				  </div>                        
				</div><!-- /.col -->
				<div class="col-xs-4">
				 <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div><!-- /.col -->
			  </div>
			</form>
			<br>
			<a href="register.html" class="text-center">Sign Up</a>
       </div><!-- /.login-box-body -->
	  </div>
	  
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>