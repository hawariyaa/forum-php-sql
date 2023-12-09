<?php require "./includes/header.php"; ?>
<?php require "./config/config.php"; ?>
<?php

if(!isset($_SESSION['name'])){
  header("location: ".URL."");
}

if(isset($_POST['submit'])){
  if(empty($_POST['title']) OR empty($_POST['body'])){
    echo '<script>alert("empty field!")</script>';
  }
}

  $title = $_POST['title'];
  $catagory = $_POST['catagory'];
  $body = $_POST['body'];


  $insert = $conn->prepare("INSERT INTO topic (title, category, body)
   VALUES (:title, :category, :body)");


  $insert->execute([
    'title' => $title,
    'category' => $catagory,
    'body' => $body,
  ]);


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
									<option>Design</option>
									<option>Development</option>
									<option>Business & Marketing</option>
									<option>Search Engines</option>
									<option>Cloud & Hosting</option>
                  <option>sport</option>
							</select>
							</div>
								<div class="form-group">
									<label>Topic Body</label>
									<textarea id="body" rows="10" cols="80" class="form-control" name="body"></textarea>
									<script>CKEDITOR.replace('body');</script>
								</div>
							<button type="submit" name="submit" class="color btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</div>


<?php require "./includes/footer.php"; ?>
