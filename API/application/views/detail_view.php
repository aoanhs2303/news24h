<div class="container ctn_dt">
			<div class="col-sm-9 col_9_dt">
				<?php foreach ($detail as $value) { ?>
					<div class="detail-blog">
					<h3 ><?php echo $value['title'] ?></h3>
					<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=false&share=true&height=35&appId=1739686212720357" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

					<p class="pull-right"><span class="badge"><?php echo $value['name'] ?></span> - Ngày đăng: <b><?php echo $value['created_date'] ?></b></p>
					
					<hr style="margin: 0px; background-color: #444;">
					<b class="brief_content"><?php echo $value['brief_content'] ?></b>
					<p class="content"><?php echo $value['content'] ?></p>
					</div>
				<?php } ?>
				
			<div class="comment-block">
				<div class="detail-blog">
					<div class="section-head" style="margin-bottom: 6px">
						<h4>BÌNH LUẬN</h4>
					</div>
					<div class="one_comment">
						<div class="thumb" style="opacity: 1;"><img alt="" src="https://i.pinimg.com/originals/5a/59/1c/5a591c4e208e1747894b41ec7f830beb.png" height="50" width="50"></div>
						<div class="comment_content">
							
							<?php if(isset($_SESSION["user"])){ ?>
							<h5 id="cm_name"><?php echo $_SESSION["user"] ?></h5>
								<input type="text" id="cm_content" name="content" class="form-control" placeholder="Nhập nôi dung bình luận">
								<input type="hidden" id="cm_idarticle" name="id_article" class="form-control" value="<?php echo $value['id_article'] ?>">
								<input type="hidden" id="cm_iduser" name="id_user" class="form-control" value="<?php echo $_SESSION["id_user"] ?>">
							<?php } else { ?>
							<h5>Đăng nhập để bình luận</h5>
								<input type="text" class="form-control" disabled placeholder="Nhập nôi dung bình luận">
							<?php } ?>
							
						</div>
					</div>
					<div id="comment_block">
					<?php foreach ($comment as $value): ?>
					<div class="one_comment">
						<div class="thumb" style="opacity: 1;"><img alt="" src="https://i.pinimg.com/originals/5a/59/1c/5a591c4e208e1747894b41ec7f830beb.png" class="avatar avatar-50 photo" height="50" width="50"></div>
						<div class="comment_content">
							<h5><?php echo $value['username'] ?> <small>- <?php echo $value['time'] ?></small></h5>
							<?php echo $value['content'] ?>
						</div>
					</div>	
					<?php endforeach ?>
					</div>	
				</div>


			</div>
			<div class="relate-news">
			<div class="row">
				<div class="section-head" style="margin-bottom: 6px">
					<h4 class="text-center">BÀI VIẾT LIÊN QUAN</h4>
				</div>
				<?php foreach ($relate as $key => $value) { ?>
					<div class="col-md-4 col-sm-4">
						<div class="new-post" style="height: unset;">
							<img style="height: 150px;" src="<?php echo base_url() ?>uploads/<?php echo $value['image'] ?>" alt="" class="img-responsive">
							<h6><a href="<?php echo base_url() ?>home/detail/<?php echo $value['id_article'] ?>"><?php echo $value['title'] ?></a></h6>
						</div>
					</div>
				<?php } ?>
				
			</div>
			
				</div>
			</div>
			<div class="col-sm-3 side-bar" style="background-color: #F7F7F7;">
				<div class="side-tin-hot">
					<h4 class="facebook-page"><span>KẾT NỐI VỚI CHÚNG TÔI</span></h4>
				</div>
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1739686212720357" width="100%" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				<hr>

				<div class="wrapper-hot">
					<div class="side-tin-hot">
						<h4 class="block-title"><span>XEM NHIỀU</span></h4>
					</div>
					
					<?php foreach ($xemnhieu as $key => $value) { 
						if($key == 0) { ?>
						<div id="one-news-top">
							<div class="img-top img_xnn">
								<img class="img-fluid" src="<?php echo base_url() ?>uploads/<?php echo $value['image'] ?>" alt="">
							</div>
							<h3 class="title-top-side"><a href=""><?php echo $value['title'] ?></a></h3>
						</div>
						<?php } else { ?>
						<div class="one-news-hot">
							<div class="img-news-hot">
								<a href=""><img style="height: 60px; width: 80px" src="<?php echo base_url() ?>uploads/<?php echo $value['image'] ?>" alt=""></a>
							</div>
							<div class="detail-news-hot">
								<h3><a href="<?php echo base_url() ?>home/detail/<?php echo $value['id_article'] ?>"><?php echo $value['title'] ?></a></h3>
								<div class="datetime-side">10/3/2018</div>
							</div>
						</div>
						<?php } ?>
						
						<?php } ?>

				
				</div>

			</div>

		</div>
	</div>
	<script>
		$('#cm_content').keypress(function(event) {

			if (event.which == 13 && $('#cm_content').val()){
				var today = new Date();
				var dd = today.getDate();
			    var mm = today.getMonth()+1; //January is 0!
			    var yyyy = today.getFullYear();
			    if(dd<10){
			      	dd='0'+dd;
			    } 
			    if(mm<10){
			      	mm='0'+mm;
			    }
			    var today = dd+'/'+mm+'/'+yyyy;
				$.ajax({
					url: 'http://localhost/news24h/API/Home/addComment',
					type: 'post',
					dataType: 'json',
					data: {
						content: $('#cm_content').val(),
						id_article: $('#cm_idarticle').val(),
						id_user: $('#cm_iduser').val(),
					},
				})
				.always(function() {
					
					var data_append = `
					<div class="one_comment">
						<div class="thumb" style="opacity: 1;"><img alt="" src="https://i.pinimg.com/originals/5a/59/1c/5a591c4e208e1747894b41ec7f830beb.png" class="avatar avatar-50 photo" height="50" width="50"></div>
						<div class="comment_content">
							<h5>`+$('h5#cm_name').html()+` <small>- `+today+`</small></h5>
							`+$('#cm_content').val()+`
						</div>
					</div>`;
					$('#comment_block').prepend(data_append);
					$('#cm_content').val('');
				});	
			}
		});
			
	</script>