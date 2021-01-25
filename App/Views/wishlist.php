 <!-- Start All Title Box -->
<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Wishlist</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Shop</a></li>
					<li class="breadcrumb-item active">Wishlist</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End All Title Box -->

<!-- Start Wishlist  -->
<div class="wishlist-box-main">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-main table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Images</th>
								<th>Product Name</th>
								<th>Unit Price </th>
								<th>Add Item</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($wishlist as $wishlistitem):
							?>
                            <tr>
								<td class="thumbnail-img">
									<a href="">
																		<?php
if ($wishlistitem->thumb == "data:image/;base64,"){
?>
<img class="img-fluid" src="<?= App::$path ?>images/items/no_thumb.jpg" alt="" />
<?php
}else{
?>
<img class="img-fluid" src="<?= $wishlistitem->thumb ?>" alt="" />
<?php
}
?>
									</a>
								</td>
								<td class="name-pr">
									<a href="">
										<?= $wishlistitem->itemname ?>
									</a>
								</td>
								<td class="price-pr">
									<p><?= $wishlistitem->itemprice ?></p>
								</td>

								<td class="add-pr">
                                    <?php
								    if($cartexist){
									 foreach ($cartexist as $cartitemid):
										$citemid=$cartitemid->itemid;
									 endforeach;
									 if($citemid == $wishlistitem->itemid){
									?>
                                        <a class="btn hvr-hoverIn" data-fancybox-close="" href="#" item_id="<?= $wishlistitem->itemid ?>" id="<?= $wishlistitem->itemid . "cart" ?>" onclick="addtocart(this, event);">In cart</a>
										<?php
									 }else{
									?>
                                    <a class="btn hvr-hover" data-fancybox-close="" href="#" item_id="<?= $wishlistitem->itemid ?>" id="<?= $wishlistitem->itemid . "cart" ?>" onclick="addtocart(this, event);">Add to cart</a>
									<?php
									 }
								    }else{
								?>
								<a class="btn hvr-hover" data-fancybox-close="" href="#" item_id="<?= $wishlistitem->itemid ?>" id="<?= $wishlistitem->itemid . "cart" ?>" onclick="addtocart(this, event);">Add to cart</a>
								<?php
								}?>
                                </td>

								<td class="remove-pr">
									<a href="#" item_id="<?= $wishlistitem->id ?>" onclick="deleteItem(this, event);">
									<i class="fas fa-times"></i>
								</a>
								</td>
							</tr>
							<?php
							endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Wishlist -->
