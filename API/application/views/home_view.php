

			<div class="container">
				<!-- slider -->
				<div class="row slide">
					<div class="col-md-8 pr-0 big-slide" style="padding: 3px;">
						<div class="slider">
							<div id="slider-home" class="owl-carousel owl-theme">
								<?php foreach ($hot_article as $hot) { ?>
								<div class="item">
									<a href="<?php echo base_url() ?>home/detail/<?php echo $hot['id_article'] ?>">
										<img src="<?php echo base_url() ?>vendor/img/slide1.jpg" alt="">
										<div class="caption">
											<h2><?php echo $hot['title'] ?></h2>
											<h6>Lorem Ipsum Dolor Sit Meta</h6>
											<button type="button" class="btn button-default"> XEM CHI TIẾT</button>
										</div>
									</a>
								</div>	
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col-md-4 pl-0 small-slide">
						<?php foreach ($hot_article as $hot) { ?>
							<a href="<?php echo base_url() ?>home/detail/<?php echo $hot['id_article'] ?>">
								<div class="new-post" style="height: unset; padding: 3px;">
								<div class="detail">
									<img style="width: 100%" src="<?php echo base_url().'uploads/'.$hot['image'] ?>" alt="<?php echo base_url().$hot['image'] ?>" class="img-responsive">
									<p><?php echo $hot['title'] ?></p>
								</div>
							</div>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>

	</header>

	<div class="section">
		<div class="container">
			<div class="section-head">
				<h3>MỚI CẬP NHẬT <span><img class="badge-tag" src="<?php echo base_url() ?>vendor/img/badge-new.png" height="30px" alt=""></span></h3>
			</div>
			<div class="row">
				<?php foreach ($latest_article as $latest) { ?>
				<div class="col-md-4 col-sm-4">
					<a href="<?php echo base_url() ?>home/detail/<?php echo $latest['id_article'] ?>">
					<div class="new-post">
						<div class="detail">
							<img style="width: 360px; height: 240px" src="<?php echo base_url().'uploads/'.$latest['image'] ?>" alt="<?php echo base_url().$latest['image'] ?>" class="img-responsive">
							<p><?php echo $latest['brief_content'] ?></p>
						</div>
						<h4><a href=""><?php echo $latest['title'] ?></a></h4>
						<span class="date"><i class="fa fa-clock-o"></i> 8 Dec, 2018</span>
					</div>	
					</a>
					
				</div>
				<?php } ?>
				
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<div class="section-head">
				<h3>TIN NỔI BẬT <span><img class="badge-tag" src="<?php echo base_url() ?>vendor/img/badge-hot.jpg" height="30px" alt=""></span></h3>
			</div>
			<div class="row">
				<?php foreach ($nb_article as $nb) { ?>
				<div class="col-md-4 col-sm-4">
					<a href="<?php echo base_url() ?>home/detail/<?php echo $nb['id_article'] ?>">
					<div class="new-post">
						<div class="detail">
							<img style="width: 360px; height: 240px" src="<?php echo base_url().'uploads/'.$nb['image'] ?>" alt="<?php echo base_url().$nb['image'] ?>" class="img-responsive">
							<p><?php echo $nb['brief_content'] ?></p>
						</div>
						<h4><a href=""><?php echo $nb['title'] ?></a></h4>
						<span class="date"><i class="fa fa-clock-o"></i> 8 Dec, 2018</span>
						
					</div>	
					</a>
				</div>
				<?php } ?>
				
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<div class="our-categories">
				<div class="row">
					<div class="cate-link-filter">
						<ul class="simplefilter">
							<li class="active" data-filter="all"><h3>TẤT CẢ</h3></li>
							<li data-filter="1"><h3>THỜI SỰ</h3></li>
							<li data-filter="2"><h3>THẾ GIỚI</h3></li>
							<li data-filter="3"><h3>CÔNG NGHỆ</h3></li>
							<li data-filter="4"><h3>ÂM NHẠC</h3></li>
						</ul>
					</div>
				</div>
				<div class="filtr-container">
					<div class="row categories-filter">
						<?php foreach ($ts_article as $ts) { ?>
						<div class="col-md-4 col-sm-4 filtr-item" data-category="1">
							<a href="<?php echo base_url() ?>home/detail/<?php echo $ts['id_article'] ?>">
							<div class="new-post">
								<div class="detail">
									<img style="width: 360px; height: 240px" src="<?php echo base_url().'uploads/'.$ts['image'] ?>" alt="<?php echo base_url().$ts['image'] ?>" class="img-responsive">
									<p><?php echo $ts['brief_content'] ?></p>
								</div>
								<h4><a href=""><?php echo $ts['title'] ?></a></h4>
								<span class="date"><i class="fa fa-clock-o"></i> 8 Dec, 2020</span>	
							</div>	
							</a>
							
						</div>
						<?php } ?>
		
						<?php foreach ($tg_article as $ts) { ?>
						<div class="col-md-4 col-sm-4 filtr-item" data-category="2">
							<a href="<?php echo base_url() ?>home/detail/<?php echo $ts['id_article'] ?>">
							<div class="new-post">
								<div class="detail">
									<img style="width: 360px; height: 240px" src="<?php echo base_url().'uploads/'.$ts['image'] ?>" alt="<?php echo base_url().$ts['image'] ?>" class="img-responsive">
									<p><?php echo $ts['brief_content'] ?></p>
								</div>
								<h4><a href=""><?php echo $ts['title'] ?></a></h4>
								<span class="date"><i class="fa fa-clock-o"></i> 8 Dec, 2020</span>	
							</div>	
							</a>
							
						</div>
						<?php } ?>
				
						<?php foreach ($cn_article as $ts) { ?>
						<div class="col-md-4 col-sm-4 filtr-item" data-category="3">
							<a href="<?php echo base_url() ?>home/detail/<?php echo $ts['id_article'] ?>">
							<div class="new-post">
								<div class="detail">
									<img style="width: 360px; height: 240px" src="<?php echo base_url().'uploads/'.$ts['image'] ?>" alt="<?php echo base_url().$ts['image'] ?>" class="img-responsive">
									<p><?php echo $ts['brief_content'] ?></p>
								</div>
								<h4><a href=""><?php echo $ts['title'] ?></a></h4>
								<span class="date"><i class="fa fa-clock-o"></i> 8 Dec, 2020</span>	
							</div>	
							</a>
							
						</div>
						<?php } ?>
					
						<?php foreach ($gd_article as $ts) { ?>
						<div class="col-md-4 col-sm-4 filtr-item" data-category="4">
							<a href="<?php echo base_url() ?>home/detail/<?php echo $ts['id_article'] ?>">
							<div class="new-post">
								<div class="detail">
									<img style="width: 360px; height: 240px" src="<?php echo base_url().'uploads/'.$ts['image'] ?>" alt="<?php echo base_url().$ts['image'] ?>" class="img-responsive">
									<p><?php echo $ts['brief_content'] ?></p>
								</div>
								<h4><a href=""><?php echo $ts['title'] ?></a></h4>
								<span class="date"><i class="fa fa-clock-o"></i> 8 Dec, 2020</span>	
							</div>	
							</a>
							
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			
			<div class="row">
				<div class="col-md-8" id="post-data">
					<div class="section-head">
						<h3>ĐỪNG BỎ LỞ</h3>
					</div>
					<?php foreach ($other_article as $nb) { ?>
					<div class="new-post1 pb-2">
						<div class="row">
							<a href="<?php echo base_url() ?>home/detail/<?php echo $ts['id_article'] ?>">
							<div class="col-md-3 pr-0">
								<img style="width: 210px; height: 140px" src="<?php echo base_url().'uploads/'.$nb['image'] ?>" alt="<?php echo base_url().$nb['image'] ?>" class="img-responsive">	
							</div>
							<div class="col-md-9">
								<h4><a href="<?php echo base_url() ?>home/detail/<?php echo $nb['id_article'] ?>"><?php echo $nb['title'] ?></a></h4>
								<p><?php echo $nb['brief_content'] ?></p>	
								<span class="date"><i class="fa fa-clock-o"></i> 8 Dec, 2018</span>
							</div>
							</a>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-4">
					<div class="section-head">
						<h3>XEM NHIỀU</h3>
					</div>
					<div class="new-post" style="height: unset;">
						<div class="detail">
							<img class="img-responsive" src="<?php echo base_url() ?>vendor/img/post1.jpg" alt="">
							<p><?php echo $ts['brief_content'] ?></p>
							<span class="date_corner full-right"><i class="fa fa-clock-o"></i> 8 Dec, 2020</span>	
						</div>
						<h5><a href=""><?php echo $ts['title'] ?></a></h5>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-4 pr-0">
							<img class="img-responsive" src="<?php echo base_url() ?>vendor/img/post1.jpg" alt="">
						</div>
						<div class="col-md-8">
							<h6><a href=""><?php echo $ts['title'] ?></a></h6>	
						</div>
					</div>
				</div>
			</div>


			<div class="ajax-load text-center" style="display:none">
				<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
			</div>


		</div>
	</div>
	<script type="text/javascript">

		var page = 1;
		$(window).scroll(function() {
		    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
		        page++;
		        loadMoreData(page);
		    }
		});
		function loadMoreData(page){
		  $.ajax(
		        {
		            url: 'http://localhost/news24h/API/home/loadmore?page=' + page,
		            type: "get",
		            beforeSend: function()
		            {
		                $('.ajax-load').show();
		            }
		        })
		        .done(function(data)
		        {
		            if(data == ""){
		                $('.ajax-load').html("No more records found");
		                return;
		            }
		            $('.ajax-load').hide();
		            $("#post-data").append(data);
		        })
		        .fail(function(jqXHR, ajaxOptions, thrownError)
		        {
		              alert('server not responding...');
		        });
		}
	</script>