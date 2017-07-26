<h2><?php echo $guitar['title']; ?></h2>
<div class="row">
	<div class="col-md-3">
		<a class="thumbnail" style="margin-bottom: 10px;" href="#">
			<img class="guitar-thumb" src="<?php echo site_url();?>static/img/guitars/<?php echo $guitar['guitar_image'];?>">
		</a>
	</div>
</div>
<small class="guitar-date">posted by: <?php echo $guitar['poster_name'] ?> on: <?php echo $guitar['created_at']; ?></small></br>
<div class="guitar-price">
	Current Price: $<?php echo number_format((float)$guitar['price'], 2, '.', ''); ?>
</div>

<?php if($this->session->userdata('user_id') == $guitar['user_id']): ?>
	<hr>
	<a class="btn btn-default pull-left" href="<?php echo site_url('/guitars/edit/'.$guitar['poster_name'].'/'.$guitar['slug']); ?>">Edit</a>
	<?php echo form_open('/guitars/delete/'.$guitar['poster_name'].'/'.$guitar['slug']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
	</form>
<?php endif; ?>

<hr>
<h3>Bids</h3>
<?php if($bids) : ?>
	<?php foreach($bids as $bid) : ?>
		<div class="well">
			<span id="bid-div_<?php echo $bid['id']; ?>">
				<h5><?php echo $bid['created_at']; ?> [by <strong><?php echo $bid['bidder']; ?></strong>]</h5>
				<p>Bidded for: $<?php echo number_format((float)$bid['amount'], 2, '.', ''); ?></p>
				<h3>Comment: <?php echo $bid['comment']; ?></h3>
			</span>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>No Bids To Display</p>
<?php endif; ?>
<hr>

<?php if(!$this->session->userdata('logged_in')) : ?>
	<h3>Login <a href="<?php echo base_url();?>users/login">Here</a> to Add a Bid</h3>
<?php else: ?>
	<?php if($this->session->userdata('username') != $guitar['poster_name']) : ?>
		<h3>Add Bid</h3>
		<?php echo validation_errors(); ?>
		<?php echo form_open('bids/create/'.$guitar['id']); ?>
			<div class="form-group">
				<label>Quantity</label>
				<input type="text" name="quantity" class="form-control">
			</div>
			<div class="form-group">
				<label>Amount</label>
				<input type="text" name="amount" class="form-control">
			</div>
			<div class="form-group">
				<label>Comment</label>
				<textarea id="editor1" name="comment" class="form-control"></textarea>
			</div>
			<input type="hidden" name="poster_name" value="<?php echo $guitar['poster_name']; ?>">
			<input type="hidden" name="slug" value="<?php echo $guitar['slug']; ?>">
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>
	<?php endif; ?>
<?php endif; ?>

