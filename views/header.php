<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" href="/fontawesome/css/all.css">
	<link rel="stylesheet" href="/css/style.css">
	<script src="/js/jquery-3.3.1.js"></script>
	<script src="/js/script.js"></script>
	<title>MANGOTUNES</title>
</head>
<body>

<?php if(isset($_SESSION['user'])) : ?>
	<!-- header - login - -->
	<header>
		<div class="size">
			<a href="/" id="header-logo">
				<img src="/img/mango_logo.jpg" alt="logo">
			</a>
			<div id="header-nav">
				<form class="search-box" action="/search" method="get">
					<input type="text" name="word">
					<button type="submit"><i class="fas fa-search"></i></button>
				</form>
				<a href="/write"><i class="fas fa-plus-circle"></i></a>
				<div class="user-img" onclick="location.href='/user'">
					<img src="<?= $user->img ?>" alt="">
				</div>
				<button id="header-menu-btn"><span><i class="fas fa-bars"></i></span>
				</button>
				<ul id="header-menu">
					<li><a href="/">About US</a></li>
					<li><a href="/">Get Help</a></li>
					<li><a href="/">Terms and Privacy</a></li>
					<li><a href="/logout">Log Out</a></li>
				</ul>
				
			</div>
		</div>
	</header>

	<?php else : ?>

	<!-- header - no login - -->
	<header>
		<div class="size">
			<a href="/" id="header-logo">
				<img src="/img/mango_logo.jpg" alt="logo">
			</a>
			<div id="header-nav">
				<form class="search-box" action="/search" method="get">
					<input type="text" name="word">
					<button type="submit"><i class="fas fa-search"></i></button>
				</form>
				<button id="login-btn" class="brown-btn"><a href="/login">Log In</a></button>
				<button id="header-menu-btn"><span><i class="fas fa-bars"></i></span>
				</button>
				<ul id="header-menu">
					<li><a href="/">About US</a></li>
					<li><a href="/">Get Help</a></li>
					<li><a href="/">Terms and Privacy</a></li>
				</ul>
				
			</div>
		</div>
	</header>

	<!-- // header - no login -  -->

	<?php endif; ?>