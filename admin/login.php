<?php
require '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>login Takmir</title>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		/>
		<link rel="stylesheet" href="../style/style.css" />
	</head>
	<body>
		<div class="container">
			<div
				class="row justify-content-center align-items-center"
				style="height: 100vh"
			>
				<form action="" method="post" class="p-5 shadow">
					<h3 class="text-center mb-3">Login Takmir</h3>
					<div class="mb-3">
						<label for="username" class="form-label"
							>Username</label
						>
						<input type="text" class="form-control" 
							id="username" name="username" />
					</div>
					<div class="mb-3">
						<label for="password" class="form-label"
							>Password</label
						>
						<input
							type="password"
							class="form-control"
							id="password"
							name="password"
						/>
					</div>
					<button
						type="submit"
                        name="loginbtn"
						class="btn text-light form-control"
						style="background-color: var(--color2)"
					>
						Login
					</button>
                    <div>
                        <?php if(isset($_POST['loginbtn'])){
							$username = $_POST['username'];
							$password = $_POST['password'];
							$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
							$countdata = mysqli_num_rows($query);
							$data = mysqli_fetch_array($query);

							if($countdata > 0) {
								if($password == $data['password']) {
									session_start();
									$_SESSION['username'] = $data['username'];
									$_SESSION["login"] = true;
									header('location: ../admin/');
								} else {
									?>
									<div class="alert alert-warning mt-3" role="alert">
									Password salah!
									</div>
								<?php
								}
							} else {
								?>
								<div class="alert alert-warning mt-3" role="alert">
								Username tidak ditemukan!
								</div>
							<?php
							}
						}
						?>
                    </div>
				</form>
			</div>
		</div>
	</body>
</html>
