<?php require_once('include/vn_to_str.php') ?>
<?php foreach ($posts as $nb) { ?>
<div class="new-post1 pb-2">
	<div class="row">
		<a href="<?php echo base_url() . vn_to_str($nb['title']) .'-'. $nb['id_article']?>.chn">
		<div class="col-md-3 pr-0">
			<img class="dbl_img" src="<?php echo base_url().'uploads/'.$nb['image'] ?>" alt="<?php echo base_url().$nb['image'] ?>" class="img-responsive">	
		</div>
		<div class="col-md-9">
			<h4><a href="<?php echo base_url() . vn_to_str($nb['title']) .'-'. $nb['id_article']?>.chn"><?php echo $nb['title'] ?></a></h4>
			<p class="br_content"><?php echo $nb['brief_content'] ?></p>
			<span class="date"><i class="fa fa-clock-o"></i> 20/4/2018</span>
		</div>
		</a>
	</div>
</div>
<?php } ?>
<script>
	
	// document.q(timeStamp.toLocaleDateString("en-US"))
</script>