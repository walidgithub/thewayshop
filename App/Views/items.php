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
    if ($errors1){
        $errortext = 'يوجد صنف بنفس الاسم';
        ?>
        <div class="form-error alert alert-danger">
            <span><?= $errortext ?></span>
        </div>
        <?php
    }
    elseif ($errors2){
        $errortext = 'خطأ . تم حذف بيانات المحل';
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
				<h3>Adding items</h3>
			    </div>

					<form method="post" id="add-new-item" name="add-new-item" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<select id="itemtype" name="itemtype" class="form-control" required data-error="Insert item type please">
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
									<input type="text" class="form-control" id="itemname" name="itemname" placeholder="Item name" required data-error="Insert item name please">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" placeholder="Price before" id="pricebefore" class="form-control" name="pricebefore" required data-error="Please enter the price">
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Price after" id="priceafter" class="form-control" name="priceafter" required data-error="Please enter the price after discount">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" id="description" placeholder="Desciption" rows="4" data-error="Please enter the Desciption" name="description" required></textarea>
									<div class="help-block with-errors"></div>
								</div>

								<div class="col-md-4 text-center">
									<img id="ItemImg" src="<?= App::$path ?>images/items/no_thumb.jpg" class="img-fluid" alt="Image"  width="100%">
									<div class="image-upload">
										<label for="item-input">
											<p id="UploadItemImg" style="margin: 0px;margin-right: 10px;cursor: pointer;">
												Uplaod image
											</p>
										</label>
										<input id="item-input" type="file" accept="image/*" name="file" onchange="loadItemImg(event)" />
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="submit-button text-center">
									<button class="btn hvr-hover" id="submit" type="submit">Save</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="table-main table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Image</th>
							<th>Product Name</th>
							<th>Price before</th>
							<th>Price after</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
						<?php

    foreach ($items as $item): ?>
        <tr>
							<td class="thumbnail-img">
								<a href="#">
									<img class="img-fluid" src="<?=  $item->thumb ?>" alt="" />
								</a>
							</td>
							<td class="name-pr">
								<p><?= $item->itemname ?></p>
							</td>
							<td class="price-pr">
								<p><?= $item->pricebefore ?></p>
							</td>
							<td class="price-pr">
								<p><?= $item->priceafter ?></p>
							</td>
							<td class="remove-pr">
								<a href="#" item_id="<?= $item->id ?>" onclick="deleteItem(this, event);">
									<i class="fas fa-times"></i>
								</a>
							</td>
						</tr>
    <?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- End Contact Us -->