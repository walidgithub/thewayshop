<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
	<ul class="slides-container">
		<li class="text-center">
			<img src="images/banner-01.jpg" alt="">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="m-b-20">
							<strong>Welcome to<br> The Way Shop</strong></h1>
						<p class="m-b-40" style="font-size: 20px">You can register your shop's data easily</p>
						<p>
							<a class="btn hvr-hover" href="#">Register your shop</a></p>
					</div>
				</div>
			</div>
		</li>
		<li class="text-center">
			<img src="images/banner-02.jpg" alt="">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="m-b-20">
							<strong>Welcome to<br> The Way Shop</strong></h1>
						<p class="m-b-40" style="font-size: 20px">Shopping is easily on The Way Shop</p>
						<p>
							<a class="btn hvr-hover" href="#">Shop Now</a></p>
					</div>
				</div>
			</div>
		</li>
		<li class="text-center">
			<img src="images/banner-03.jpg" alt="">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="m-b-20">
							<strong>Welcome to<br> The Way Shop</strong></h1>
						<p class="m-b-40" style="font-size: 20px">Search for the best and the nearest</p>
						<p>
							<a class="btn hvr-hover" href="#">Shop Now</a></p>
					</div>
				</div>
			</div>
		</li>
	</ul>
	<div class="slides-navigation">
		<a href="#" class="next">
			<i class="fa fa-angle-right" aria-hidden="true"></i></a>
		<a href="#" class="prev">
			<i class="fa fa-angle-left" aria-hidden="true"></i></a>
	</div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
<div class="categories-shop">
	<div class="container">
	    <form id="searchcategory" name="searchcategory" action="<?= App::$path ?>Shop/searchall" method="post">
            <label class="custom-control-label" for="Address" style="font-weight:bold">Select Address:</label>
		    <select id="Address" name="address" class="form-control">
                <option value="Alex">Alex</option>
                <option value="Cairo">Cairo</option>
                <option value="Tanta">Tanta</option>
                <option value="Aswan">Aswan</option>
            </select>
		</form>
		<br>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="shop-cat-box">
					<img class="img-fluid" src="images/t-shirts-img.jpg" alt="" />
					<a class="btn hvr-hover" href="#" onclick="searchtshirt()">T-shirts</a>
					<input id="tshirt" type="hidden" name="" readonly="readonly" form="searchcategory" value="T-shirt">
				</div>
				<div class="shop-cat-box">
					<img class="img-fluid" src="images/shirt-img.jpg" alt="" />
					<a class="btn hvr-hover" href="#" onclick="searchshirt()">Shirt</a>
					<input id="shirt" type="hidden" name="" readonly="readonly" form="searchcategory" value="Shirt">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="shop-cat-box">
					<img class="img-fluid" src="images/wallet-img.jpg" alt="" />
					<a class="btn hvr-hover" href="#" onclick="searchwallet()">Wallet</a>
					<input id="wallet" type="hidden" name="" readonly="readonly" form="searchcategory" value="Wallet">
				</div>
				<div class="shop-cat-box">
					<img class="img-fluid" src="images/women-bag-img.jpg" alt="" />
					<a class="btn hvr-hover" href="#" onclick="searchbags()">Bags</a>
					<input id="bags" type="hidden" name="" readonly="readonly" form="searchcategory" value="Bags">
			    </div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="shop-cat-box">
					<img class="img-fluid" src="images/shoes-img.jpg" alt="" />
					<a class="btn hvr-hover" href="#" onclick="searchshoes()">Shoes</a>
					<input id="shoes" type="hidden" name="" readonly="readonly" form="searchcategory" value="Shoes">
				</div>
				<div class="shop-cat-box">
					<img class="img-fluid" src="images/women-shoes-img.jpg" alt="" />
					<a class="btn hvr-hover" href="#" onclick="searchwshoes()">Women Shoes</a>
					<input id="wshoes" type="hidden" name="" readonly="readonly" form="searchcategory" value="Women Shoes">
				</div>
			</div>
		</div>
		
	</div>
</div>
<!-- End Categories -->
