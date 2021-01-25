 <!-- Start All Title Box -->
<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Login</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Home</a></li>
					<li class="breadcrumb-item active">Login</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End All Title Box -->

<div class="cart-box-main">
	<div class="container">
		<div class="row new-account-login">
			<div class="col-sm-6 col-lg-6 mb-3">
				<div class="title-left">
					<h3>Account Login</h3>
				</div>
				<form method="post" name="form-login" id="form-login" enctype="multipart/form-data" class="mt-3 review-form-box" id="formLogin">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="InputEmail" class="mb-0">User name</label>
							<input name="username" type="text" class="form-control" id="InputUsername" placeholder="Enter username"> </div>
						<div class="form-group col-md-6">
							<label for="InputPassword" class="mb-0">Password</label>
							<input name="password" type="password" class="form-control" id="InputPassword" placeholder="Password"> </div>
							<div class="form-group col-md-6">
							<a href="<?= App::$path ?>Users/add" style="margin-bottom: 10px;color:#ff0000">Sign Up</a></div>
					</div>
					
					<button type="submit" class="btn hvr-hover">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>