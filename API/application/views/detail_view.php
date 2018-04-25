<div class="container">
			<div class="col-sm-9">
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
				

			<div class="relate-news">
			<div class="row">
				<?php foreach ($relate as $value) { ?>
					<div class="col-md-4 col-sm-4">
						<div class="new-post">
							<img style="height: 150px;" src="<?php echo base_url() ?>uploads/<?php echo $value['image'] ?>" alt="" class="img-responsive">
							<h6><a href=""><?php echo $value['title'] ?></a></h6>
						</div>
					</div>
				<?php } ?>
				
			</div>
			<div class="comment-block">
				<div class="fb-comments" data-href="https://vnexpress.net/" data-width="100%" data-numposts="5"></div>
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
					<div id="one-news-top">
						<div class="img-top">
							<img class="img-fluid" src="https://techtalk.vn/wp-content/uploads/2018/01/topdev-AI-265x198.png" alt="">
						</div>
						<h3 class="title-top-side"><a href="">Những quan niệm sai lầm về Deep Learning</a></h3>
					</div>
					<div class="one-news-hot">
						<div class="img-news-hot">
							<a href=""><img style="height: 60px; width: 80px" src="https://techtalk.vn/wp-content/uploads/2017/02/java-oracle-80x60.png" alt=""></a>
						</div>
						<div class="detail-news-hot">
							<h3><a href="">Java EE đổi tên thành Jakarta EE</a></h3>
							<div class="datetime-side">10/3/2018</div>
						</div>
					</div>
					<div class="one-news-hot">
						<div class="img-news-hot">
							<a href=""><img style="height: 60px; width: 80px" src="https://techtalk.vn/wp-content/uploads/2017/08/hamza-bendelladj-1-80x60.jpg" alt=""></a>
						</div>
						<div class="detail-news-hot">
							<h3><a href="">Bị tóm vì cướp tiền của 217 ngân hàng chia cho người nghèo,</a></h3>
							<div class="datetime-side">10/3/2018</div>
						</div>
					</div>
					<div class="one-news-hot">
						<div class="img-news-hot">
							<a href=""><img style="height: 60px; width: 80px" src="https://techtalk.vn/wp-content/uploads/2017/09/cortana-80x60.jpg" alt=""></a>
						</div>
						<div class="detail-news-hot">
							<h3><a href="">Java EE đổi tên thành Jakarta EE</a></h3>
							<div class="datetime-side">10/3/2018</div>
						</div>
					</div>
					<div class="one-news-hot">
						<div class="img-news-hot">
							<a href=""><img style="height: 60px; width: 80px" src="https://techtalk.vn/wp-content/uploads/2017/08/hamza-bendelladj-1-80x60.jpg" alt=""></a>
						</div>
						<div class="detail-news-hot">
							<h3><a href="">Bị tóm vì cướp tiền của 217 ngân hàng chia cho người nghèo,</a></h3>
							<div class="datetime-side">10/3/2018</div>
						</div>
					</div>
					<div class="one-news-hot">
						<div class="img-news-hot">
							<a href=""><img style="height: 60px; width: 80px" src="https://techtalk.vn/wp-content/uploads/2017/09/cortana-80x60.jpg" alt=""></a>
						</div>
						<div class="detail-news-hot">
							<h3><a href="">Java EE đổi tên thành Jakarta EE</a></h3>
							<div class="datetime-side">10/3/2018</div>
						</div>
					</div>					
				</div>

			</div>

		</div>
	</div>