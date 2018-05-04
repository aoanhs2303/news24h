
	</header>
	
	<div class="section">
		<div class="container">
			
			<div class="row">
				<div class="col-md-8" >
					<div id="post-data" >
						<div class="kbwc-boxsearch">
                            <div class="kbwcb-input">
                            	<form action="<?php echo base_url() ?>home/search" method="GET">
                                <input placeholder="Tìm kiếm" id="searchinput-main" type="text" value="" class="query" name="query" onfocus="SearchOnFocusHome(this)">
                                <button type="submit" title="Tìm kiếm" class="kbwcbi-submit">
                                    <span> &nbsp;</span>
                                </button>
                                </form>
                            </div>
                        </div>
						<div class="section-head">
							<h3>TÌM THẤY <?php echo $num_res ?> KẾT QUẢ: "<?php echo $query ?>"</h3>
						</div>
						<?php foreach ($search_res as $nb) { ?>
						<div class="new-post1 pb-2">
							<div class="row">
								<a href="<?php echo base_url() . vn_to_str($nb['title']) .'-'. $nb['id_article']?>.chn">
									<div class="col-md-3 pr-0">
										<img class="dbl_img" src="<?php echo base_url().'uploads/'.$nb['image'] ?>" alt="<?php echo base_url().$nb['image'] ?>" class="img-responsive">	
									</div>
									<div class="col-md-9">
										<h4><a href="<?php echo base_url() . vn_to_str($nb['title']) .'-'. $nb['id_article']?>.chn"><?php echo $nb['title'] ?></a></h4>
										<p class="br_content"><?php echo $nb['brief_content'] ?></p>	
										<span class="date"><i class="fa fa-clock-o"></i> <script>timeStamp = new Date(<?php echo $nb['created_date'] ?>*1000); document.write(timeStamp.toLocaleDateString("en-US"));</script></span>
									</div>
								</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-4">
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


			</div>
		</div>
