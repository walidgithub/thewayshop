 <!-- Start All Title Box -->
<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Checkout</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Shop</a></li>
					<li class="breadcrumb-item active">Checkout</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
	<div class="container">
		<div class="col-sm-6 col-lg-6 mb-3">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="shipping-method-box">
						<div class="title-left">
							<h3>Shipping Method</h3>
						</div>
						<div class="mb-4">
							<div class="custom-control custom-radio">
								<input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio" onclick="addshippingcost('option1')">
								<label class="custom-control-label" for="shippingOption1">Standard Delivery</label>
								<span class="float-right font-weight-bold">FREE</span> </div>
							<div class="ml-4 mb-2 small">(3-7 business days)</div>
							<div class="custom-control custom-radio">
								<input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio" onclick="addshippingcost('option2')">
								<label class="custom-control-label" for="shippingOption2">Express Delivery</label>
								<span class="float-right font-weight-bold">10.00</span> </div>
							<div class="ml-4 mb-2 small">(2-4 business days)</div>
							<div class="custom-control custom-radio">
								<input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio" onclick="addshippingcost('option3')">
								<label class="custom-control-label" for="shippingOption3">Next Business day</label>
								<span class="float-right font-weight-bold">20.00</span> </div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="odr-box">
						<div class="title-left">
							<h3>Shopping cart</h3>
						</div>
						<div class="rounded p-2 bg-light">
							<div class="media mb-2 border-bottom">
							
								<div class="media-body">
								<?php
							     foreach ($items as $item):?>
									<a href="detail.html"><?= $item->itemname ?></a>
									<div class="small text-muted">Price: <?= $item->itemprice ?>
										<span class="mx-2">|</span> Qty: <?= $item->quantity ?>
										<span class="mx-2">|</span> Subtotal: <?= $item->quantity * $item->itemprice ?></div>
										<?php
							endforeach;?>
								</div>
						
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="order-box">
						<div class="title-left">
							<h3>Your order</h3>
						</div>
						<div class="d-flex">
							<div class="font-weight-bold">Product</div>
							<div class="ml-auto font-weight-bold">Total</div>
						</div>
						<hr class="my-1">
						<div class="d-flex">
							<h4>Sub Total</h4>
							<?php
							     foreach ($total as $itemstotal):?>
							<div id="itemstotal" class="ml-auto font-weight-bold"> <?= $itemstotal->totalbuy ?> </div>
								<?php
							endforeach;?>
						</div>
						<hr class="my-1">
						<div class="d-flex">
							<h4>Shipping Cost</h4>
							<div id="shippingcost" class="ml-auto font-weight-bold"> Free </div>
						</div>
						<hr>
						<div class="d-flex gr-total">
							<h5>Grand Total</h5>
							<div id="total" class="ml-auto h5"> <?= $itemstotal->totalbuy ?> </div>
						</div>
						<hr> </div>
				</div>
				<div class="col-12 d-flex shopping-box">
					<a href="<?= App::$path ?>" class="ml-auto btn hvr-hover">Place Order</a> </div>
			</div>
		</div>
	</div>

</div>

<!-- End Cart -->
