  <?php require "../includes/header.php"; ?>
  <?php require "../config/config.php"; ?>
<?php


if(isset($_SESSION['name'])){
  header("location: ".URL."");
}



try{
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];


$login = $conn->prepare("SELECT * FROM register WHERE email = :email");
$login->execute([
  'email' => $email,
]);
$data = $login->fetch();
if($data && password_verify($password, $data['password'])){
  //sessions are used to carry information across multiple pages
  //session is also used to limit the user from some pages unless
  //login, if login to give the user valdating(access to different pages).

  $_SESSION['name'] = $data['name'];
  $_SESSION['id'] = $data['id'];
  $_SESSION['email'] = $data['email'];
  $_SESSION['username'] = $data['username'];
  $_SESSION['avatar'] = $data['avatar'];



header("location: " .URL."");
/*This line of code redirects the user to the URL specified in the URL constant or variable. It leverages
 the HTTP Location header to direct the user's browser to a new page, URL, or endpoint within the website.
*/
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
