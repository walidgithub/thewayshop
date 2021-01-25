 <!-- Start All Title Box -->
<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Shop Detail</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Shop</a></li>
					<li class="breadcrumb-item active">Shop Detail </li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
	<div class="container">
		<div class="row">
		<?php
		foreach ($shopdetails as $shopdetail): ?>
			<div class="col-xl-5 col-lg-5 col-md-6">
				<div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
						<?php
if ($shopdetail->thumb == "data:image/;base64,"){
?>
<img class="d-block w-100" src="<?= App::$path ?>images/items/no_thumb.jpg" alt="First slide"> </div>
<?php
}else{
?>
<img class="d-block w-100" src="<?= $shopdetail->thumb ?>" alt="First slide"> </div>
<?php
}
?>
					</div>
				</div>
			</div>
			<div class="col-xl-7 col-lg-7 col-md-6">
				<div class="single-product-details">
			
					<h2 id="itemname"><?= $shopdetail->itemname ?></h2>
					<h5>
						<del><?= $shopdetail->pricebefore ?></del></h5>
					<p id="itemprice" style="font-size:20px;color:#d33b33;font-weight:bold;"><?= $shopdetail->priceafter ?></p>
					
					<h4>Short Description:</h4>
					<p><?= $shopdetail->description ?></p>
					<?php endforeach; ?>
					<ul>
						<li>
							<div class="form-group quantity-box">
								<label class="control-label">Quantity</label>
								<input id="itemquant" class="form-control" value="1" min="0" step="1" type="number">
								<div class="d-flex gr-total">
						         <h5>Total</h5>
						         <div class="ml-auto h5" id="total">
						         <?= $shopdetail->priceafter ?>
						         </div>
					</div>
							</div>
						</li>
					</ul>
		
					<div class="price-box-bar">
						<div class="cart-and-bay-btn">
						<?php
if (isset($_SESSION['user'])){
?>
<a class="btn hvr-hover" data-fancybox-close="" href="#" onclick="addcheck()">Buy Now</a>
<?php
}else{
?>
<a class="btn hvr-hover" data-fancybox-close="" href="<?= App::$path ?>Users/login">Login & Buy Now</a>
<?php
}
						?>
							<?php
								if($cartexist){
									foreach ($cartexist as $cartitemid):
										$citemid=$cartitemid->itemid;
									endforeach;
									if($citemid == $shopdetail->id){
									?>
                                        <a class="btn hvr-hoverIn" data-fancybox-close="" href="#" item_id="<?= $shopdetail->id ?>" id="<?= $shopdetail->id . "cart" ?>" onclick="addtocart(this, event);">In cart</a>
										<?php
									}else{
									?>
                                    <a class="btn hvr-hover" data-fancybox-close="" href="#" item_id="<?= $shopdetail->id ?>" id="<?= $shopdetail->id . "cart" ?>" onclick="addtocart(this, event);">Add to cart</a>
									<?php
									}
								}else{
								?>
								<a class="btn hvr-hover" data-fancybox-close="" href="#" item_id="<?= $shopdetail->id ?>" id="<?= $shopdetail->id . "cart" ?>" onclick="addtocart(this, event);">Add to cart</a>
								<?php
								}?>
						</div>
					</div>

					<div class="add-to-btn">
						<div class="add-comp">
						<?php
								if($wichlistexist){
									foreach ($wichlistexist as $wishlistitemid):
										$wlitemid=$wishlistitemid->itemid;
									endforeach;
									if($wlitemid == $shopdetail->id){
									?>
                                        <a class="btn hvr-hoverIn" data-fancybox-close="" href="#" item_id="<?= $shopdetail->id ?>" id="<?= $shopdetail->id ?>" onclick="addtowishlist(this, event);"> In wishlist</a>
										<?php
									}else{
									?>
                                    <a class="btn hvr-hover" data-fancybox-close="" href="#" item_id="<?= $shopdetail->id ?>" id="<?= $shopdetail->id ?>" onclick="addtowishlist(this, event);"> Add to wishlist</a>
									<?php
									}
								}else{
								?>
								<a class="btn hvr-hover" data-fancybox-close="" href="#" item_id="<?= $shopdetail->id ?>" id="<?= $shopdetail->id ?>" onclick="addtowishlist(this, event);"> Add to wishlist</a>
								<?php
								}?>
						</div>
						<div class="share-bar">
							<a class="btn hvr-hover" href="#">
								<i class="fab fa-facebook" aria-hidden="true"></i></a>
							<a class="btn hvr-hover" href="#">
								<i class="fab fa-google-plus" aria-hidden="true"></i></a>
							<a class="btn hvr-hover" href="#">
								<i class="fab fa-twitter" aria-hidden="true"></i></a>
							<a class="btn hvr-hover" href="#">
								<i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
							<a class="btn hvr-hover" href="#">
								<i class="fab fa-whatsapp" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Cart -->