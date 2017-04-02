<?php
	include 'includes/head.php'; 
	session_start(); 
?>

<style>
	.login{
		display: table;
		position: absolute;
		height: 100%;
		width: 100%;
	}
	body{
		background-color: #0b3c50;
		height: 100%;
	}
	.login-container{
		/*vertical-align: middle;*/
		width: 350px;
		margin-left: auto;
		margin-right: auto; 
	}
	.login-middle{
		display: table-cell;
		vertical-align: middle;		
	}
	.login-img{
		text-align: center;
		margin: 20px 0;
	}
	.remember-me{
		color: #337ab7;
	}
	.sign-in{
		background-color: transparent;
		border: 2px solid #337ab7;
		color: #337ab7;
	}
	.sign-in:hover{
		background-color: #337ab7;
		border: 2px solid #337ab7;
		color: #0b3c50;
	}
	input[type="text"], input[type="password"]{
		background-color: transparent !important;
		border-color: #337ab7;
	}
	p{
		color: white;
	}
</style>

<?php 
	if (isset($_POST['login'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connect, $username);
		$password = mysqli_real_escape_string($connect, $password);

		$query = "SELECT * FROM users WHERE '{$username}' = username";

		$login_query = mysqli_query($connect, $query);

		if (!$login_query) {
			die("query faild". mysqli_error($connect));
		}//check if query is right if statment end

		while ($row = mysqli_fetch_array($login_query)) {
			
			$db_username = $row['username'];
			$db_password = $row['password'];
			$db_firstname = $row['first_name'];
			$db_lastname = $row['last_name'];
			$db_email = $row['email'];
			$db_userimg = $row['user_img'];
			$db_role = $row['role'];

		}//while loop mysqli_fetch_array end

		if ($username !== $db_username && $password !== $db_password) {
			header('Location: login.php');
			$wrong = "Try again Man, You typed something wrong";
		}//iff username !== db_username... end
		else if($username == $db_username && $password == $db_password){
			
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_password;
			$_SESSION['firstname'] = $db_firstname;
			$_SESSION['lastname'] = $db_lastname;
			$_SESSION['email'] = $db_email;
			$_SESSION['userimg'] = $db_userimg;
			$_SESSION['role'] = $db_role;

			header('Location: admin');
		}
		else{
			$wrong = "nope, you forgot to write the password";
		}

	}//if isset login end

 ?>

<section class="login">
	<div class="container login-middle">
		<div class="login-container">
			<div class="login-img">
				<img src="img/login-logo.png" alt="logo">
			</div>
			<p><?php if (isset($_POST['login'])) {echo $wrong;} ?></p>
			<form class="form-horizontal" action="login.php" method="post">
			  <div class="form-group">
			    <div class="col-sm-12">
			      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-12">
			      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class=" col-sm-12">
			      <div class="checkbox">
			        <label class="remember-me">
			          <input type="checkbox">Remember me
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class=" col-sm-12">
			      <button type="submit" name="login" class="sign-in btn btn-block">Sign in</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</section><!-- feautered-post -->

<?php //include 'includes/footer.php'; ?>