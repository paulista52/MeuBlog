<!DOCTYPE html>
<html>
<head>
	<title>freeBlog</title>
	<!-- Metas  -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!-- End of metas -->
	<!-- Loading the stylesheet -->
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link rel="stylesheet" type="text/css" href="<?php siteUrl(); ?>/view/library/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" media="screen,projection">
	<!-- End of loading the materialize icons -->
	<link rel="stylesheet" type="text/css" href="<?php siteUrl(); ?>/view/library/css/my-style.css">
	<link rel="stylesheet" type="text/css" href="<?php siteUrl(); ?>/view/library/css/styleBlog.css">
	<!-- End of loading of stylesheet -->
</head>
<body id="top">
	
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<header>
		<nav class="menu-desktop">
			<div class="nav-wrapper turquoise">
				<div class="container">
					<a href="#" class="brand-logo">freeBlog</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="<?php siteURL();?>/">Home</a></li>
						<li><a href="<?php siteURL();?>/blog">Blog</a></li>
						<li><a href="<?php siteURL();?>/portifolio">Portifólio</a></li>
						<li><a href="<?php siteURL(); ?>/admin/panel">Painel de controle</a></li>
						<?php if(verifyAuthUser()): ?>							
							<li><a href="<?php siteURL(); ?>/admin/logout">Sair</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>
		<nav class="menu-mobile turquoise">
			<ul id="slide-out" class="sidenav">
				<h5 class="center title-menu">FreeBlog menu</h5>
				<?php if(verifyAuthUser()): ?>
					<li><a class="waves-effect" href="<?php siteURL(); ?>/admin/panel">Painel de controle</a></li>
				<?php endif; ?>
				<li><a class="waves-effect" href="<?php siteURL();?>/">Home</a></li>
				<li><a class="waves-effect" href="<?php siteURL();?>/blog">Blog</a></li>
				<li><a class="waves-effect" href="<?php siteURL();?>/portifolio">Portifólio</a></li>
			</ul>
			<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		</nav>
	</header>
	<section>
		<div class="container">
			