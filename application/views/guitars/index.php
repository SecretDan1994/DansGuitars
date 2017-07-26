<h2><?= $title ?></h2>
<?php foreach ($guitars as $guitar) : ?>
	<h3><?php echo $guitar['title'];?></h3>
	<div class="row">
		<div class="col-md-3">
		<a class="thumbnail" style="margin-bottom: 10px;" href="<?php echo site_url('/guitars/'.$guitar['poster_name'].'/'.$guitar['slug']); ?>">
			<img class="guitar-thumb" src="<?php echo site_url();?>static/img/guitars/<?php echo $guitar['guitar_image'];?>">
		</a>
		</div>
		<div class="col-md-9">
			<small class="guitar-date">posted by: <?php echo $guitar['poster_name'] ?> on: <?php echo $guitar['created_at'];?> in <strong><?php echo $guitar['name'];?></strong></small>
			</br></br>
			<div class="guitar-price">
				<h1>Current Price: $<?php echo number_format((float)$guitar['price'], 2, '.', ''); ?></h1>
			</div>
			<p><a class="btn btn-default" href="<?php echo site_url('/guitars/'.$guitar['poster_name'].'/'.$guitar['slug']); ?>">Read More</a></p>			
		</div>
	</div>
<?php endforeach; ?>
<div class="pagination-links">
	<?php echo $this->pagination->create_links(); ?>
</div>