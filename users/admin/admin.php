<!DOCTYPE html>
<html>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	text-decoration: none;
	list-style: none;
	font-family: 'Open Sans', sans-serif;
}

body{
	background: #f5f6fa;
}

.wrapper .sidebar{
	background: #fff;
	position: fixed;
	top: 0;
	left: 0;
	width: 225px;
	height: 100%;
	padding: 30px 0;
	transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
	margin-bottom: 30px;
	text-align: center;
}

.wrapper .sidebar .profile img{
	width: 80px;
	height: 80px;
	margin: 0 auto;
	display: block;
}

.wrapper .sidebar .profile h3{
	color: #8d599f;
	margin: 10px 0 5px;
}

.wrapper .sidebar .profile p{
	color: #666;
	font-size: 14px;
}

.wrapper .sidebar ul li a{
	padding: 13px 30px;
	display: block;
	border-bottom: 1px solid #ececec;
	color: #666;
	font-size: 14px;
	position: relative;
}

.wrapper .sidebar ul li a .icon{
	color: #c7cfdb;
	width: 30px;
	display: inline-block;
}

.wrapper .sidebar ul li a:before{
	content: "";
	position: absolute;
	top: 0;
	right: 0;
	width: 3px;
	height: 100%;
	background: #8d599f;
	display: none;
}

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
	color: #8d599f;
	background: linear-gradient(to right, #fff, #f6edfc)
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
	color: #8d599f;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
	display: block;
}

.wrapper .section{
	width: calc(100% - 225px);
	margin-left: 225px;
	transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
	background: #fff;
	height: 50px;
	border: 1px solid #f5f6fa;
	display: flex;
	align-items: center;
	padding: 0 30px;
}

.wrapper .section .top_navbar .hamburger a{
	font-size: 24px;
	color: #8d599f;
}

.wrapper .section .top_navbar .hamburger a:hover{
	color: #cbaede;
}

.wrapper .section .container{
	margin: 30px;
	background: #fff;
	padding: 50px;
	line-height: 28px;
}

body.active .wrapper .sidebar{
	left: -225px;
}

body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
}
    </style>
<head>
	<meta charset="utf-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
	<div class="sidebar">
		<div class="profile">
			<img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
			<h3>Saffi Ullah</h3>
			<p>Admin</p>
		</div>
		<ul>
			<li><a href="#" class="active">
				<span class="icon"><i class="fas fa-home"></i></span>
				<span class="item">View Progress</span>
				</a>
			</li>
			<li><a href="#">
				<span class="icon"><i class="fas fa-desktop"></i></span>
				<span class="item">View Attendance</span>
				</a>
			</li>
			<li><a href="#">
				<span class="icon"><i class="fas fa-user-friends"></i></span>
				<span class="item">Employment Status</span>
				</a>
			</li>
			<li><a href="#">
				<span class="icon"><i class="fas fa-tachometer-alt"></i></span>
				<span class="item">Module Information</span>
				</a>
			</li>
			<li><a href="#">
				<span class="icon"><i class="fas fa-database"></i></span>
				<span class="item">Development</span>
				</a>
			</li>
			<li><a href="#">
				<span class="icon"><i class="fas fa-chart-line"></i></span>
				<span class="item">Reports</span>
				</a>
			</li>
			<li><a href="#">
				<span class="icon"><i class="fas fa-user-shield"></i></span>
				<span class="item">Settings</span>
				</a>
			</li>
			<li><a href="C:\xampp\htdocs\GroupTrainingAssociation\credentials\login.php">
				<span class="icon"><i class="fas fa-cog"></i></span>
				<span class="item">Logout</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="section">
		<div class="top_navbar">
			<div class="hamburger">
				<a href="#"><i class="fas fa-bars"></i></a>
			</div>
		</div>
		<div class="container">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
	</div>
</div>

<script type="text/javascript">
	var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
</script>

</body>
</html>