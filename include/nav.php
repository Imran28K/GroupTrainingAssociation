
<nav style="display: inline-flex;">
	<div class="logo">
    <a href="index.php">
	<img style="height:55px; margin-left:50px; margin-top:-10px; " src="images/no.png">
	</a>
	</div>
	<div class="menu">
	</div>
	<div class="register">
		<?php  
		if (isset($_SESSION['id'])) 
		{
			echo "<a href='logout.php'>Logout</a>";
		} else 
		{
			echo "<a href='index.php' class='mx-2'>Login</a>";
		}
		?>
		
	</div>
</nav>