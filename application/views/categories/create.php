<div class="row" style="margin-bottom: 525px; ">
    <div class="col-lg-12">
		<h2><?= $title; ?></h2>

		<?php echo validation_errors(); ?>

		<?php echo form_open_multipart('categories/create'); ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Enter name">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>