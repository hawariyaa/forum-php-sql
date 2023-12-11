<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if(!isset($_SESSION['name'])){
  header("location: ".URL."");
}
else{

if(isset($_POST['submit'])){
  if(empty($_POST['title']) OR empty($_POST['body'])){
    echo '<script>alert("empty field!")</script>';
  }


  $title = $_POST['title'];
  $catagory = $_POST['catagory'];
  $body = $_POST['body'];
  $username = $_SESSION['name'];

  $image = $conn->query("SELECT register.avatar AS image FROM topic JOIN register
          ON topic.username = register.username");
  $theimage = $image->fetch();

  $insert = $conn->prepare("INSERT INTO topic (title, catagory, body,username, userimage)
   VALUES (:title, :catagory, :body, :username, :userimage)");




  $insert->execute([

    'title' => $title,
    'catagory' => $catagory,
    'body' => $body,
    'username' => $username,
    'userimage' => $theimage['image'],
  ]);
}


}
?>

    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Create A Topic</h1>
						<h4 class="pull-right">A Simple Forum</h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form" action="create.php" method="post">
							<div class="form-group">
								<label>Topic Title</label>
								<input type="text" class="form-control" name="title" placeholder="Enter Post Title">
							</div>
							<div class="form-group">
								<label>Category</label>
								<select name="catagory" class="form-control">
									<option value="Design">Design</option>
									<option value="Development">Development</option>
									<option value="Business & Marketing">Business & Marketing</option>
									<option value="Search Engines">Search Engines</option>
									<option value="Cloud & Hosting">Cloud & Hosting</option>
                  <option value="sport">sport</option>
							</select>
							</div>
								<div class="form-group">
									<label>Topic Body</label>
									<textarea id="body" rows="10" cols="80" class="form-control" name="body"></textarea>
									<script>CKEDITOR.replace('body');</script>
								</div>
							<button type="submit" name="submit" class="color btn btn-default">Create</button>
						</form>
					</div>
				</div>
			</div>


<?php require "../includes/footer.php"; ?>
