<?php
 include ( "inc/connection.inc.php" );

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
	$utype_db = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = $con->query("SELECT * FROM user WHERE id='$user'");
		$get_user_name = $result->fetch_assoc();
			$uname_db = $get_user_name['fullname'];
			$utype_db = $get_user_name['type'];
}

//time ago convert
include_once("inc/timeago.php");
$time = new timeago();


?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/footer.css" rel="stylesheet" type="text/css" media="all" />

	<!-- menu tab link -->
	<link rel="stylesheet" type="text/css" href="css/homemenu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	
</head>
<body class="body1">
<div>
	<div>
		<header class="header">

			<div class="header-cont">

				<?php
					include 'inc/banner.inc.php';
				?>

			</div>
		</header>
		  
		</div>
		<div class="topnav">
			<div class="parent2">
		  <!-- <div class="test1 bimage1"><a href=""><img src="image/tech.png" title="IT Solution" style="border-radius: 50%;" width="42" height="42"></a></div>
		  <div class="test2"><a href="#"><img src="image/eventmgt.png" title="Event Management" width="42" height="42" style="border-radius: 50%;"></a></div>
		  <div class="test3"><a href="#"><img src="image/photography.png" title="Photography" width="42" height="42" style="border-radius: 50%;"></a></div>
		  <div class="test4"><a href="#"><img src="image/teaching.png" title="Tution" style="border-radius: 50%;" width="42" height="42"></a></div>
		  <div class="mask2"><i class="fa fa-home fa-3x"></i></div> -->
		</div>
			<a class="navlink" href="index.php" style="margin: 0px 0px 0px 100px;">Search Student</a>
			<?php 
			if($utype_db == "teacher")
				{
					echo '<a class="navlink" href="teacherstudents.php">Your Choice</a>';
				}if($utype_db == "student") {
					echo '<a class="navlink" href="search.php">Search Tutor</a>';
					echo '<a class="navlink" href="postform.php">Post</a>';
				}

			 ?>
			<a class="navlink" href="contact.html">Contact</a>
			<a class="active navlink" href=aboutus.php>About</a>
			
			<div style="float: right;" >
				<table>
					<tr>
						<?php
							if($user != ""){
								$resultnoti = $con->query("SELECT * FROM applied_post WHERE post_by='$user' AND student_ck='no'");
								$resultnoti_cnt = $resultnoti->num_rows;
								if($resultnoti_cnt == 0){
									$resultnoti_cnt = "";
								}else{
									$resultnoti_cnt = '('.$resultnoti_cnt.')';
								}
								echo '<td>
							<a class="navlink" href="notification.php">Notification'.$resultnoti_cnt.'</a>
						</td>
								<td>
							<a class="navlink" href="profile.php?uid='.$user.'">'.$uname_db.'</a>
						</td>
						<td>
							<a class="navlink" href="logout.php">Logout</a>
						</td>';
							}else{
								echo '<td>
							<a class="navlink" href="login.php">Login</a>
						</td>
						<td>
							<a class="navlink" href="registration.php">Register</a>
						</td>';
							}
						?>
						
					</tr>
				</table>
				
			</div>
		</div>
	</div>
	

	<!-- Search Student -->
	
	

</div>
<!-- main jquery script -->
<script  src="js/jquery-3.2.1.min.js"></script>

<!-- homemenu tab script -->
<script  src="js/homemenu.js"></script>

<!-- topnavfixed script -->
<script  src="js/topnavfixed.js"></script>
<div class="container-fluid">
		<div class="row">
			<div class="col">
				<h1 class="d-flex justify-content-center">
					About Us
				</h1>
			</div>
		</div>	
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<h5>
					<div class="text_contents">
					This website is for students in our university who like to learn online or teach online. You can be a tutor or a student easily by signing up to the website. <br>
					This project is made as a result of our 2nd year university project. We had 3 members in our group. <br><br>
					&#9733; Madushan(leader)<br>
					&#9733; Ashan<br>
					&#9733; Dilanga<br>
					&#9733; Hirusha<br><br>
					You can choose timeslots to learn or teach and students can choose tutors as they need. So this is easier than you think. <br>
					If you have any questions, please contact us. 
					</div>
				
				</h5>
			</div>
			<div class="col">
				<img src="learn.jpg"class="rounded mx-auto d-block">	
			</div>
		</div>	
	</div>
</body>
</html>
