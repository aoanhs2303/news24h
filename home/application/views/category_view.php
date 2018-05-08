
	</header>
	
	<div class="section">
		<div class="container">
			<div class="section-head">
				<h3>MỚI CẬP NHẬT <span><img class="badge-tag" src="<?php echo base_url() ?>vendor/img/badge-new.png" height="30px" alt=""></span></h3>
			</div>
			<div class="row">
				<?php foreach ($latest_article as $latest) { ?>
				<div class="col-md-4 col-sm-4">
					<a href="<?php echo base_url() . vn_to_str($latest['title']) .'-'. $latest['id_article']?>.chn">
						<div class="new-post">
							<div class="detail">
								<img src="<?php echo base_url().'uploads/'.$latest['image'] ?>" alt="<?php echo base_url().$latest['image'] ?>" class="img-responsive">
								<p><?php echo $latest['brief_content'] ?></p>
							</div>
							<h4><a href="<?php echo base_url() . vn_to_str($latest['title']) .'-'. $latest['id_article']?>.chn"><?php echo $latest['title'] ?></a></h4>

							<span class="date"><i class="fa fa-clock-o"></i> <script>timeStamp = new Date(<?php echo $latest['created_date'] ?>*1000); document.write(timeStamp.toLocaleDateString("en-US"));</script></span>
						</div>	
					</a>
					
				</div>
				<?php } ?>
				
			</div>
			<input type="hidden" id="id_category" value="<?php echo $latest['id_category'] ?>">
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
					<a href="<?php echo base_url() . vn_to_str($nb['title']) .'-'. $nb['id_article']?>.chn">
						<div class="new-post">
							<div class="detail">
								<img src="<?php echo base_url().'uploads/'.$nb['image'] ?>" alt="<?php echo base_url().$nb['image'] ?>" class="img-responsive">
								<p><?php echo $nb['brief_content'] ?></p>
							</div>
							<h4><a href="<?php echo base_url() . vn_to_str($nb['title']) .'-'. $nb['id_article']?>.chn"><?php echo $nb['title'] ?></a></h4>
							<span class="date"><i class="fa fa-clock-o"></i> <script>timeStamp = new Date(<?php echo $nb['created_date'] ?>*1000); document.write(timeStamp.toLocaleDateString("en-US"));</script></span>

						</div>	
					</a>
				</div>
				<?php } ?>
				
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			
			<div class="row">
				<div class="col-md-8" >
					<div id="post-data" >
						<div class="section-head">
							<h3>ĐỪNG BỎ LỞ</h3>
						</div>
						<?php foreach ($other_article as $nb) { ?>
						<div class="new-post1 pb-2">
							<div class="row">
								<a href="<?php echo base_url() . vn_to_str($nb['title']) .'-'. $nb['id_article']?>.chn">
									<div class="col-md-3 pr-0">
										<img class="dbl_img" src="<?php echo base_url().'uploads/'.$nb['image'] ?>" alt="<?php echo base_url().$nb['image'] ?>" class="img-responsive">	
									</div>
									<div class="col-md-9">
										<h4><a href="<?php echo base_url() . vn_to_str($nb['title']) .'-'. $nb['id_article']?>.chn"><?php echo $nb['title'] ?></a></h4>
										<p  class="br_content"><?php echo $nb['brief_content'] ?></p>	
										<span class="date"><i class="fa fa-clock-o"></i> <script>timeStamp = new Date(<?php echo $nb['created_date'] ?>*1000); document.write(timeStamp.toLocaleDateString("en-US"));</script></span>
									</div>
								</a>
							</div>
						</div>
						<?php } ?>
					</div>
					<button id="ajax_load" class="btn btn-danger read-more">Xem thêm <i class="fa fa-refresh fa-spin"></i></button>
				</div>
				<div class="col-md-4 xemnhieu_cate">
					<div class="section-head">
						<h3>XEM NHIỀU</h3>
					</div>
					<?php foreach ($xemnhieu as $key => $value) { 
						if($key == 0) { ?>
						<div class="new-post" style="height: unset;">
							<div class="detail">
								<img class="img-responsive" src="<?php echo base_url() ?>uploads/<?php echo $value['image'] ?>" alt="">
								<p><?php echo $value['brief_content'] ?></p>
							</div>
							<h5><a href="<?php echo base_url() . vn_to_str($value['title']) .'-'. $value['id_article']?>.chn"><?php echo $value['title'] ?></a></h5>
						</div>

						<?php }  else {?>

						<div class="row pb-1">
							<div class="col-md-4 pr-0">
								<img class="img-responsive" src="<?php echo base_url() ?>uploads/<?php echo $value['image'] ?>" alt="">
							</div>
							<div class="col-md-8">
								<h6><a href="<?php echo base_url() . vn_to_str($value['title']) .'-'. $value['id_article']?>.chn"><?php echo $value['title'] ?></a></h6>	
							</div>
						</div>
						<?php }?>
						<?php }?>

					</div>
				</div>


				<div class="ajax-load text-center" style="display:none">
					<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
				</div>


			</div>
		</div>
		<script type="text/javascript">

		var id_category = $('#id_category').val();
		var page = 1;
		$('#ajax_load').click(function() {
			page++;
			loadMoreData(page);
		})
		function loadMoreData(page){
			$.ajax(
			{
				url: 'http://localhost/news24h/API/home/loadmore?page=' + page +'&id_category=' + id_category,
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