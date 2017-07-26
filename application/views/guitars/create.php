<div class="row" style="margin-bottom: 242px; ">
    <div class="col-lg-12">
		<h2><?= $title; ?></h2>

		<?php echo validation_errors(); ?>

		<?php echo form_open_multipart('guitars/create'); ?>
			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" placeholder="Add Title">
			</div>
			<div class="form-group">
				<label>Price</label>
				<input type="text" class="form-control" name="price" placeholder="Price" value="">
			</div>
			<div class="form-group">
				<label>Upload Image</label>
				<input type="file" name="userfile" size="20">
			</div>
			<div class="form-group">
				<label>Quantity</label>
				<input type="text" class="form-control" name="quantity" placeholder="Quantity">
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="category_id" class="form-control">
					<?php foreach($categories as $category): ?>
						<option value="<?php echo $category['id'];?>"><?php echo $category['name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<button type="submit" class="btn btn-default">Add Guitar</button>
		</form>
	</div>
</div>