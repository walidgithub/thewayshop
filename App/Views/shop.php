<!-- Start All Title Box -->
<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Shop</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Home</a></li>
					<li class="breadcrumb-item active">Shop</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
	<div class="container">
<?php
    if ($errors){
        $errortext = 'لا توجد نتائج بحث';
        ?>
        <div class="form-error alert alert-danger">
            <span><?= $errortext ?></span>
        </div>
        <?php
    }
?>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-right">
					<div class="row product-categorie-box">
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade show active" id="grid-view">
								<?php 
if($items){
?>
<div class="row">
								<?php
								foreach ($items as $item): ?>
									<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
										<div class="products-single fix">
											<div class="box-img-hover">
											<?php
											if ($item->sale == "Sale"){
                                            ?>
                                                <div class="type-lb">
													<p class="sale">Sale</p>
												</div>
                                            <?php
											}
											?>
												
												<?php
if ($item->thumb == "data:image/;base64,"){
?>
<img src="<?= App::$path ?>images/items/no_thumb.jpg" class="img-fluid" alt="Image">
<?php
}else{
?>
<img src="<?= $item->thumb ?>" class="img-fluid" alt="Image">
<?php
}
												?>
												<div class="mask-icon">
													<ul>
														<li>
															<a href="<?= App::$path ?>ShopDetail/showoneitem/<?= $item->itemid ?>" data-toggle="tooltip" data-placement="right" title="View">
																<i class="fas fa-eye"></i></a></li>
														<li>
															<?php
															if($wichlistexist){
																foreach ($wichlistexist as $wichlistexistitemid):
																	$wlitemid=$wichlistexistitemid->itemid;
																endforeach;	
																if($wlitemid == $item->itemid){
																?>
                                                                <a href="#" item_id="<?= $item->itemid ?>" id="<?= $item->itemid ?>" onclick="addtowishlist(this, event);" data-toggle="tooltip" data-placement="right" title="Remove/Add from Wishlist">
																<i class="fas fa-heart"></i></a></li>
															    <?php
															    }else{
																?>
                                                                <a href="#" item_id="<?= $item->itemid ?>" id="<?= $item->itemid ?>" onclick="addtowishlist(this, event);" data-toggle="tooltip" data-placement="right" title="Remove/Add to Wishlist">
																<i class="far fa-heart"></i></a></li>
															    <?php
															    }
															}else{
																?>
																<a href="#" item_id="<?= $item->itemid ?>" id="<?= $item->itemid ?>" onclick="addtowishlist(this, event);" data-toggle="tooltip" data-placement="right" title="Remove/Add to Wishlist">
																<i class="far fa-heart"></i></a></li>
																<?php
															}?>
													</ul>
													<?php
															if($cartexist){
																foreach ($cartexist as $cartitemid):
																	$citemid=$cartitemid->itemid;
																endforeach;
																if($citemid == $item->itemid){
																?>
                                                                <a class="cartadded" href="#" item_id="<?= $item->itemid . "cart" ?>" id="<?= $item->itemid . "cart" ?>" onclick="addtocart(this, event);">In Cart</a>
															    <?php
															    }else{
																?>
                                                                <a class="cart" href="#" item_id="<?= $item->itemid . "cart" ?>" id="<?= $item->itemid . "cart" ?>" onclick="addtocart(this, event);">Add to Cart</a>
															    <?php
															    }
															}else{
																?>
																<a class="cart" href="#" item_id="<?= $item->itemid . "cart" ?>" id="<?= $item->itemid . "cart" ?>" onclick="addtocart(this, event);">Add to Cart</a>
																<?php
															}?>
													
												</div>
											</div>
											<div class="why-text">
												<h4><?= $item->itemname ?></h4>
												<h5> <?= $item->priceafter ?></h5>
											</div>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
<?php
}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Error</h4>
            </div>
            <div class="modal-body">
                <div class="star_modal">
                  <h3>Please login first</h3>
                </div>
            </div>
            <div class="modal-footer">
				<a href="<?= App::$path ?>Users/login" style="color:white;text-decoration:none;border:1px solid #3f81eb;
				background:#3f81eb;border-radius: 5px;font-size:18px;padding-right:20px;padding-left:20px;padding-bottom:3px;
				padding-top:3px">Login</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->

