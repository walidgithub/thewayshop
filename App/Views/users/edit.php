 <!-- Start All Title Box -->
<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>My Account</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Shop</a></li>
					<li class="breadcrumb-item active">My Account</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End All Title Box -->
<br>
<!-- Start My Account  -->
<div class="row">
	<div class="col-sm-6 col-lg-6 mb-3">
		<div class="checkout-address">
			<div class="title-left">
				<h3>User data</h3>
			</div>
<?php
    if ($errors){
        $errortext = 'كلمة المرور غير صحيحة';
        ?>
        <div class="form-error alert alert-danger">
            <span><?= $errortext ?></span>
        </div>
        <?php
    }
?>
			<form method="post" name="form-user-add" id="form-user-add" enctype="multipart/form-data" class="needs-validation" novalidate>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="firstName">First name *</label>
						<input name="firstname" type="text" class="form-control" id="firstName" placeholder="" value="<?= $users->firstname ?>" required>
						<div class="invalid-feedback"> Valid first name is required. </div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="lastName">Last name *</label>
						<input name="lastname" type="text" class="form-control" id="lastName" placeholder="" value="<?= $users->lastname ?>" required>
						<div class="invalid-feedback"> Valid last name is required. </div>
					</div>
				</div>
				<div class="mb-3">
					<label for="oldpassword">Old Password *</label>
					<div class="input-group">
						<input name="oldpassword" type="text" class="form-control" id="oldpassword" placeholder="" required>
						<div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
					</div>
				</div>
				<div class="mb-3">
					<label for="password">Password *</label>
					<div class="input-group">
						<input name="password" type="text" class="form-control" id="password" placeholder="" required>
						<div class="invalid-feedback" style="width: 100%;"> Your password is required. </div>
					</div>
				</div>
				<div class="mb-3">
					<label for="email">Email Address *</label>
					<input name="email" type="email" class="form-control" id="email" placeholder="" value="<?= $users->email ?>" required>
					<div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
				</div>
				<div class="mb-3">
					<label for="tel">Tel</label>
					<input name="tel" type="text" class="form-control" id="tel" placeholder="" value="<?= $users->tel ?>" required>
					<div class="invalid-feedback"> Please enter your telephone. </div>
				</div>
				 <div class="submit-button text-center">
									<button class="btn hvr-hover" id="submit" type="submit">Save</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</div>
	
</div>
<br>
<!-- End My Account -->