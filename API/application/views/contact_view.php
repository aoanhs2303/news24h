	<div class="pages" style="padding-top: 40px">
		<div class="container">
			<div class="pages-head">
				<h3>LIÊN HỆ VỚI CHÚNG TÔI</h3>
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="contact-form">
					<form method="POST" action="<?php echo base_url() ?>home/send">
						<div class="form-group">
							<input type="text" name="contact_name" placeholder="Nhập tên ...">
						</div>
						<div class="form-group">
							<input type="email" name="contact_email" placeholder="Nhập Email ...">
						</div>
						<div class="form-group">
							<input type="text" name="contact_subject" placeholder="Nhập tiêu đề (subject) ...">
						</div>
						<div class="form-group">
							<textarea name="contact_content" placeholder="Nhập nội dung ..." cols="30" rows="5"></textarea>
						</div>
						<button type="submit" class="btn button-default">Gửi</button>
					</form>
				</div>
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="contact-text">
					<p>Thực tập công nghệ phần mềm <b>Nhóm 51</b></p>
					<ul>
						<li><i class="fa fa-map-marker"></i>Thành phố Hồ Chí Minh</li>
						<li><a><i class="fa fa-user"></i> Trần Như Lực</a>
						<li><a><i class="fa fa-user"></i> Đào Huỳnh Trung</a>
						<li><a><i class="fa fa-user"></i> Nguyễn Thị Bích Vân</a>
						<li><a><i class="fa fa-user"></i> Hoàng Văn Nghĩa</a>
					</ul>
				</div>
			</div>
		</div>
	</div>