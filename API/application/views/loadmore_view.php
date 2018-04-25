<?php foreach ($posts as $nb) { ?>
<div class="new-post1 pb-2">
	<div class="row">
		<a href="<?php echo base_url() ?>home/detail/<?php echo $nb['id_article'] ?>">
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