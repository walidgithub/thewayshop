 <!-- Start All Title Box -->
<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Register your shop</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Home</a></li>
					<li class="breadcrumb-item active">Shop data</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main">
<?php
    if ($errors){
        $errortext = 'يوجد محل بنفس التفاصيل';
        ?>
        <div class="form-error alert alert-danger">
            <span><?= $errortext ?></span>
        </div>
        <?php
    }
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="contact-form-right">
				<div class="title-left">
				<h3>Main data</h3>
			    </div>

					<form method="post" name="add-new-shop" id="add-new-shop" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="Shopname" name="shopname" placeholder="Shop name" required data-error="Please enter the shop name">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select id="Address" name="address" class="form-control" required data-error="Please enter the shop address">
                                     <option value="Alex">Alex</option>
                                     <option value="Cairo">Cairo</option>
                                     <option value="Tanta">Tanta</option>
                                     <option value="Aswan">Aswan</option>
                                    </select>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select id="Category" name="category" class="form-control" required data-error="Please enter the shop category">
									 <option value="Shoes">Shoes</option>
                                     <option value="Wallet">Wallet</option>
                                     <option value="Bags">Bags</option>
                                     <option value="Shirt">Shirt</option>
									 <option value="T-shirt">T-shirt</option>
									 <option value="Women Shoes">Women Shoes</option>
                                    </select>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="description" class="form-control" id="Description" placeholder="Description" rows="4" data-error="Please enter the shop description" required></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class=col-md-12>
								<div class="submit-button text-center">
									<button class="btn hvr-hover" id="submit" type="submit">Save $ Add items</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Contact Us -->