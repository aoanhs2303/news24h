<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tin tức 24h </title>
	

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet"> 


	<link rel="icon" href="<?php echo base_url() ?>vendor/img/favicon.png">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/owl.theme.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/yamm.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/responsive.css">

	<link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=vietnamese" rel="stylesheet">
</head>
<body>

	<header>
			
			<div class="container">
				<!-- navbar -->
				<nav class="navbar navbar-default navbar-ng">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
								<span class="sr-only"></span>
								<i class="fa fa-bars"></i>
							</button>
							<a href="index.html" class="navbar-brand"><h1><i class="fa fa-file-text-o"></i>NEWS24H</h1></a>
						</div>
						<form class="form-inline my-2 my-lg-0 search_style">
							<div class="input-group search_group">
							  <input class="form-control mr-sm-2" type="text" placeholder="Nhập nội dung tìm kiếm">
							  <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
							 </div> 	
					    </form>
					</div>
				</nav>
			</div>

			<div class="section-navigation yamm">
				<div class="collapse navbar-collapse n-link" id="bs-navbar">
					<div class="container">
						<ul class="nav navbar-nav">
							<li><a href="category.html">Home</a></li>
							<?php foreach ($danhmuc as $dm) { ?>
							<li><a href="category.html"><?php echo $dm['name'] ?></a></li>	
							<?php } ?>
						</ul>

					</div>
				</div>
			</div>