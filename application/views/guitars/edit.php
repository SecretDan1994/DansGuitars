<div class="row" style="margin-bottom: 316px; ">
    <div class="col-lg-12">
		<h2><?= $title; ?></h2>

		<?php echo validation_errors(); ?>

		<?php echo form_open('guitars/update'); ?>
			<input type="hidden" name="id" value="<?php echo $guitar['id']; ?>">
			<div class="form-group">
				<label>Price</label>
				<input type="text" class="form-control" name="price" placeholder="Price" value="<?php echo $guitar['price'];?>">
			</div>
			<div class="form-group">
				<label>Upload Image</label>
				<input type="file" name="userfile" size="20">
			</div>
			<div class="form-group">
				<label>Quantity</label>
				<input type="text" class="form-control" name="quantity" placeholder="Quantity" value="<?php echo $guitar['quantity'];?>">
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="category_id" class="form-control">
					<?php foreach($categories as $category): ?>
						<option value="<?php echo $category['id'];?>"><?php echo $category['name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<button type="submit" class="btn btn-default">Update Guitar</button>
		</form>
	</div>
</div>