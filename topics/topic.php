<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

 if(isset($_GET['id'])){
   $id = $_GET['id'];

   $topic =  $conn->query("SELECT * FROM topic WHERE id = '$id'");
   $topic->execute();
   $thetopic = $topic->fetch(PDO::FETCH_OBJ);
 }

 $number = $conn->query("SELECT COUNT(*) AS count FROM topic WHERE username = '$thetopic->username'");
 $number->execute();

$result = $number->fetch(PDO::FETCH_OBJ);


?>

    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left"><?php echo $thetopic->title; ?></h1>
						<h4 class="pull-right">A Simple Forum</h4>
						<div class="clearfix"></div>
						<hr>
						<ul id="topics">
					<li id="main-topic" class="topic topic">
						<div class="row">
							<div class="col-md-2">
								<div class="user-info">
									<img class="avatar pull-left" src="<?php echo $thetopic->userimage; ?>" />
									<ul>
										<li><strong><?php echo $thetopic->username; ?></strong></li>
										<li><?php echo $result->count; ?>posts</li>
										<li><a href="profile.php">Profile</a>
									</ul>
								</div>
							</div>
							<div class="col-md-10">
								<div class="topic-content pull-right">
									<p><?php echo $thetopic->body; ?></p>
								</div>
							</div>
						</div>
					</li>
				</ul>
				<h3>Reply To Topic</h3>
				<form role="form">
  					<div class="form-group">
						<textarea id="reply" rows="10" cols="80" class="form-control" name="reply"></textarea>
						<script>
							CKEDITOR.replace( 'reply' );
            			</script>
  					</div>
 					 <button type="submit" class="color btn btn-default">Submit</button>
				</form>
					</div>
				</div>
			</div>
		<?php require "../includes/footer.php"; ?>
