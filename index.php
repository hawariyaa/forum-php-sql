<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php

$topic = $conn->query("SELECT topic.id As id, topic.title AS title, topic.catagory
  AS catagory, topic.username AS username, register.avatar AS userimage, topic.date AS date, COUNT(reply.topic_id) AS countreply FROM topic JOIN reply JOIN register ON  topic.id = reply.topic_id GROUP BY (reply.topic_id) ");

  $topic->execute();

  $alltopic = $topic->fetchAll(PDO::FETCH_OBJ);

 ?>
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Welcome to Forum</h1>
						<h4 class="pull-right">A Simple Forum</h4>
						<div class="clearfix"></div>
						<hr>
						<ul id="topics">
               <?php foreach($alltopic as $topic): ?>
							<li class="topic">
							<div class="row">
							<div class="col-md-2">
								<img class="avatar pull-left" src="<?php echo $topic->userimage; ?>" />
							</div>
							<div class="col-md-10">
								<div class="topic-content pull-right">
									<h3><a href="topic.html"><?php echo $topic->title; ?></a></h3>
									<div class="topic-info">
										<a href="category.html"><?php echo $topic->catagory; ?></a> >> <a href="profile.html"><?php echo $topic->username; ?></a> >> Posted on: <?php echo $topic->date; ?>
										<span class="color badge pull-right"><?php echo $topic->countreply; ?></span>
									</div>
								</div>
							</div>
						</div>
					</li>
 <?php endforeach; ?>
						</ul>

					</div>
				</div>
			</div>

<?php require "includes/footer.php"; ?>
