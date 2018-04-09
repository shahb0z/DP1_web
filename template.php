<!DOCTYPE head PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
	<body>
	<div id="container">
		<div id="header">
			<h1 align="right">E-AUCTIONS</h1>
			<h3 align="left" style="color: white;"><?php if(isset($_GET['guest'])&&$_GET['guest']=='1') $profile = "Guest Profile!"; echo $profile;?></h3>
		</div>
		<div id="content">
			<div id = "nav">
				<?php if (!isset($_SESSION['user'])){ ?>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="login.php">LOG IN</a></li>
					<li><a href="signup.php">SIGN UP</a></li>
					<li><a href="index.php?guest=1">SHOW BIDS</a></li>
				</ul>
				<?php 
					}
					else{
				?>
				<ul>
					<li><a href="user.php?">HOME</a></li>
					<li><a href="user.php?view=goods">GOODS</a></li>
					<li><a href="user.php?view=bids">VALID BIDS</a></li>
					<li><a href="user.php?view=list">MAKE BIDS</a></li>
					<li><a href="logout.php">LOG OUT</a></li>
				</ul>
				<?php }?>
			</div>
			<div id="main">
			
				<?php 
					echo $content;
					if (isset($_GET['view'])&&$content==""){
						$view = $_GET['view'];
						switch ($view) {
							case 'goods':
							include_once 'usergoods.php';
							break;
							
							case 'bids':
							include_once 'userbids.php';
							break;
							
							case 'list':
								include_once 'listofgoods.php';
							break;
						}
					}
					if(isset($_GET['guest'])&&$_GET['guest']=='1'){
						include_once 'guest.php';
					}

				?>
			</div>
		</div>
		<div id="footer">
			<a href = "http://www.polito.it"><img class = "image" alt="polito" src="logo.gif"></a>
			<a href = "https://www.facebook.com/shahbozbek.abdunabiyev"><img class = "image" alt="facebook" src="facebook.png"></a>
			<noscript style="float: right; color: red;">JavaScript Disabled!</noscript>
		</div>
	</div>	
	</body>
</html>