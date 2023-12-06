  <?php require "../includes/header.php"; ?>
  <?php require "../config/config.php"; ?>
<?php

try{
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];


$login = $conn->prepare("SELECT id, password FROM register WHERE email = :email");
$login->execute([
  'email' => $email,
]);
$data = $login->fetch();
if($data && password_verify($password, $data['password'])){
  echo '<script>alert("login successful!");</script>';
}
else{
  echo '<script>alert("wrong email or password!");</script>';
}
}
}
catch(PDOException $error){
  echo $error->getMessage();
}
?>
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Register</h1>
						<h4 class="pull-right">A Simple Forum</h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form" enctype="multipart/form-data" method="post" action="login.php">

							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address">
							</div>

					<div class="form-group">
                        <label>Password*</label> <input type="password" class="form-control"
                    name="password" placeholder="Enter A Password">
                    </div>

			        <input name="submit" type="submit" class="color btn btn-default" value="Register" />
        </form>
					</div>
				</div>
			</div>



	<?php require "../includes/footer.php"; ?>
