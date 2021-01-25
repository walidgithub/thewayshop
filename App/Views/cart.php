 <!-- Start All Title Box -->
<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Cart</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Shop</a></li>
					<li class="breadcrumb-item active">Cart</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End All Title Box -->

 <!-- Start Cart  -->
<div class="cart-box-main">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-main table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Images</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
						<?php
						    $total=0;
							foreach ($cart as $cartitem):
							?>
                            <tr>
								<td class="thumbnail-img">
									<a href="">
									<?php
if ($cartitem->thumb == "data:image/;base64,"){
?>
<img class="img-fluid" src="<?= App::$path ?>images/items/no_thumb.jpg" alt="" />
<?php
}else{
?>
<img class="img-fluid" src="<?= $cartitem->thumb ?>" alt="" />
<?php
}
?>
										
									</a>
								</td>
								<td class="name-pr">
									<p class="itemname" name="itemname" id="<?= $cartitem->id . "itemname" ?>"><?= $cartitem->itemname ?></p>
								</td>
								<td class="price-pr">
									<p class="itemprice" name="itemprice" id="<?= $cartitem->id . "itemprice" ?>"><?= $cartitem->itemprice ?></p>
								</td>
								<td class="quantity-box"><input id="<?= $cartitem->id . "itemquant" ?>" name="quantity" type="number" size="4" value="1" min="0" step="1" class="c-input-text qty text quantity"></td>
								<td class="remove-pr">
									<a href="#" item_id="<?= $cartitem->id ?>" onclick="deleteItem(this, event);">
									<i class="fas fa-times"></i>
								</a>
								</td>
								<?php $total = $cartitem->itemprice + $total ?>
							</tr>
							<?php
							endforeach;?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="row my-5">
			<div class="col-lg-8 col-sm-12"></div>
			<div class="col-lg-4 col-sm-12">
				<div class="order-box">
					<hr>
					<div class="d-flex gr-total">
						<h5>Total</h5>
						<div class="ml-auto h5" id="total">
						 <?= $total ?>
						</div>
					</div>
					<hr> </div>
			</div>
			<div class="col-12 d-flex shopping-box">
				<a href="#" class="ml-auto btn hvr-hover" onclick="addcheck()">Checkout</a> </div>
		</div>

	</div>
</div>
<!-- End Cart -->
