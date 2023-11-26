<?php

require '../../database/connection.php';

if (isset($_POST['submit'])) {
	if (!empty($_POST['email'])  && !empty($_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$password = $_POST['password'];
		$email = $_POST['email'];
		$result = mysqli_query($conn, "select * from users where email = '$email'");

		if (mysqli_num_rows($result) > 0) {
			$checkUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if (password_verify($password, $checkUser["password"])) {
				session_start();
				$_SESSION['email'] = $email;
				header("Location:../../index.php");
				$check = "success";
			} else {
				$check = "error";
			}
		} else {
			$check = "error";
		}
	} else {
		$check = "error";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		html {
			height: 100%;
		}

		body {
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: linear-gradient(#141e30, #243b55);
		}

		.login-box {
			position: absolute;
			top: 50%;
			left: 50%;
			width: 400px;
			padding: 40px;
			transform: translate(-50%, -50%);
			background: rgba(0, 0, 0, .5);
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
			border-radius: 10px;
		}

		.login-box h2 {
			margin: 0 0 30px;
			padding: 0;
			color: #fff;
			text-align: center;
		}

		.login-box .user-box {
			position: relative;
		}

		.login-box .user-box input:not([type="submit"]) {
			width: 100%;
			padding: 10px 0;
			font-size: 16px;
			color: #fff;
			margin-bottom: 30px;
			border: none;
			border-bottom: 1px solid #fff;
			outline: none;
			background: transparent;
		}

		.login-box .user-box label {
			position: absolute;
			top: 0;
			left: 0;
			padding: 10px 0;
			font-size: 26px;
			color: #fff;
			pointer-events: none;
			transition: .5s;
		}

		.login-box .user-box input:focus~label,
		.login-box .user-box input:valid~label {
			top: -20px;
			left: 0;
			color: #03e9f4;
			font-size: 12px;
		}
	</style>
	<title>Document</title>
</head>

<body>
	<div class="">

		<div class="login-box">
			<h2>Login</h2>
			<form method="post">
				<div class="user-box">
					<input type="text" name="email" value="<?php echo isset($_POST['submit']) ? $_POST['email'] : ''; ?>">
					<label>Email</label>
				</div>
				<div class="user-box">
					<input type="password" name="password">
					<label>Password</label>
				</div>
				<div class="user-box">
					<input type="submit" name="submit" value="Login">
				</div>
				you d'ont have account <a href="register.php">Here</a>

			</form>
		</div>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		let jsCheck = <?php
						echo json_encode($check);
						?>;
		console.log(jsCheck);
		if (jsCheck == 'success') {
			Swal.fire({
				position: "top-end",
				icon: "success",
				title: "You are successfully registered",
				showConfirmButton: false,
				timer: 1500
			});
		} else if (jsCheck == 'error') {
			Swal.fire({
				position: "top-end",
				icon: "error",
				title: "You are not registered",
				showConfirmButton: false,
				timer: 1500
			});
		} else {

		}
	</script>
</body>

</html>