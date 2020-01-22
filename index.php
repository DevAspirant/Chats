<?php 
	include 'database.php';
	include 'process.php';
	// create select query 
	$query = 'SELECT * FROM shouts ORDER BY id DESC';
	$shouts = mysqli_query($con,$query);
 ?>
<?php 

// create select query 
$query = "SELECT * FROM shouts";
$shots = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<title> SHOUT OUT </title>
		<link rel='stylesheet' href='style.css' type='text/css' />
	</head>
	<body>
		<div id='container'>
		<header>
			<h1> Shout out </h1>
		</header>
		
		<div id='shouts'>
			<ul>
				<?php while($row = mysqli_fetch_assoc($shots)) : ?>
				<li class='shout'><span><?php echo $row['time'] ?> - </span> <strong><?php echo $row['user'] ; ?></strong>: <?php echo $row['message']; ?> </li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div id='input'>
			<?php if(isset($_GET['error'])) : ?>
				<div class='error'><?php echo $_GET['error'];?></div>
			<?php endif; ?>
			<form method='post' action='process.php'>
				<input type='text' name='user' placeholder='Enter your name' />
				<input type='text' name='message' placeholder='Enter A Message' />
				<br />
				<input class='shout-btn' type='submit' name='submit' value='shout it out' />
				<input class='clear-btn' type='submit' name='clear' value='clear' />
		</div>
		<h3><?php echo 'php version is : ' . phpversion(); ?></h3>
		</div>
	</body>
</html>