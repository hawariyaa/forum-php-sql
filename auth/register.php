
<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

//besically this is what we call validation can not be accessed
//through the url
if(isset($_SESSION['name'])){
  header("location: ".URL."");
}


if(isset($_POST['submit'])){
 if(empty($_POST['name']) OR empty($_POST['email'])
 OR empty($_POST['username']) OR empty($_POST['password']) OR empty($_POST['about']))
  {
    echo "<script>alert('Empty field!!!');</script>";
  }

else{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $about = $_POST['about'];
  $avatar = $_FILES['avatar']['name'];

  $dir = "img/" . basename($avatar);
try{

$stmt = $conn->prepare("SELECT id FROM register WHERE username = :username AND email = :email");
$stmt->execute([
  'username' => $username,
  'email' => $email,
]);
$stt = $conn->prepare("SELECT id FROM register WHERE username = :username OR email = :email");
$stt->execute([
  'username' => $username,
  'email' => $email,
]);
$sttt = $stt->fetch();
 if($sttt){
   echo '<script>alert("username or email already exists");</script>';
 }
 else{
  $insert = $conn->prepare("INSERT INTO register (name, username,
  email, password,about, avatar) VALUES(:name , :username , :email, :password, :about, :avatar)");

  $insert->execute([
    'name' => $name,
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'about' => $about,
    'avatar' => $avatar,
]);
echo '<script>alert("registered successfully!");</script>';
}
}
catch(PDOException $error){
  echo $error->getMessage();
}
}
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
						<form role="form" enctype="multipart/form-data" method="post" action="register.php">
							<div class="form-group">
								<label>Name*</label> <input type="text" class="form-control"
							name="name" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address">
							</div>
						<div class="form-group">
					<label>Choose Username*</label> <input type="text"
							class="form-control" name="username" placeholder="Create A Username">
						</div>
					<div class="form-group">
					<label>Password*</label> <input type="password" class="form-control"
				name="password" placeholder="Enter A Password">
				</div>

				<div class="form-group">
					<label>Upload Avatar</label>
				<input type="file" name="avatar">
				<p class="help-block"></p>
					</div>
					<div class="form-group">
					<label>About Me</label>
					<textarea id="about" rows="6" cols="80" class="form-control"
					name="about" placeholder="Tell us about yourself (Optional)"></textarea>
			</div>
			<input name="submit" type="submit" class="color btn btn-default" value="Register" />
</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div id="sidebar">
					<div class="block">


				<?php require "../includes/footer.php"; ?>
