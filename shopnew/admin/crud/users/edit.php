<!DOCTYPE html>
<?php $path = "http://localhost/tuan_viet_php/shopnew/admin/"; ?>


<html lang="en">

<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>Metronic | Base Controls</title>
	<meta name="description" content="Base form control examples">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->

	<!--begin::Base Styles -->
	<link href="<?php echo $path; ?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?php echo $path; ?>assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="<?php echo $path; ?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?php echo $path; ?>assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?php echo $path; ?>assets/demo/default/media/img/logo/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

	<!--PHP validate -->
	<?php
	$conn = new mysqli('localhost', 'root', '', 'myadmin');
	if ($conn->connect_error) {
		echo "Connetion failed: " . $conn->connect_error;
	}
	$id = $_GET['id'];
	$sql_id = "SELECT * FROM users WHERE id=" . $id;
	$detail = $conn->query($sql_id);
	$detail = $detail->fetch_object();
	$user = $detail->username;
	$password = $detail->password;
	$fullname = $detail->fullname;
	$email = $detail->email;
	$phone = $detail->phone;
	$date_created = $detail->date_created;
	$errors = [];
	if (isset($_POST['btn_editUser'])) {
		$user = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$date_created = $_POST['date_created'];
		if (strlen($user) <= 3 || strlen($user) > 20 || !ctype_alnum($user)) {
			$errors['username'] = 1;
		}
		if (strlen($password) < 6) {
			$errors['password'] = 1;
		}

		if (strlen($fullname) <= 10) {
			$errors['fullname'] = 1;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = 1;
		}
		if (strlen($phone) < 10) {
			$errors['phone'] = 1;
		}
		if (strlen($date_created) <= 5) {
			$errors['date_created'] = 1;
		}
		if ($errors == []) {
			$sql_update = "UPDATE users SET username = '" . $user . "', password = '" . $password . "', fullname = '" . $fullname . "', email = '" . $email . "', phone = '" . $phone . "', date_created = '" . $date_created . "' where id =" . $id;
			if ($conn->query($sql_update) === TRUE) {
				header('Location: http://localhost/tuan_viet_php/shopnew/admin/crud/users/list.php');
			} else {
				echo "Error: " . $sql_update . "<br>" . $conn->error;
			}
		}
	}
	?>


	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

		<?php require_once("../layouts/header_inner.php"); ?>

		<!-- begin::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

			<!-- BEGIN: Left Aside -->
			<?php require_once("layouts/left_aside.php"); ?>

			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">

				<!-- BEGIN: Subheader -->
				<?php require_once("layouts/subheader.php"); ?>


				<!-- END: Subheader -->
				<div class="m-content">
					<div class="row">
						<div class="col-md-6">

							<!--begin::Portlet-->
							<div class="m-portlet m-portlet--tab">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
											<h3 class="m-portlet__head-text">
												Edit Users
											</h3>
										</div>
									</div>
								</div>

								<!--begin::Form-->
								<form method="post" action="edit.php?id=<?php echo $id; ?>" class="m-form m-form--fit m-form--label-align-right">
									<div class="m-portlet__body">
										<div class="form-group m-form__group">
											<label>Username</label>
											<input type="text" name="username" value="<?php echo $user; ?>" class="form-control m-input">
										</div>
										<?php if (isset($errors['username'])) : ?>
											<div class="alert alert-primary" role="alert">
												Username required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label>Password</label>
											<input type="password" name="password" value="<?php echo $password; ?>" class="form-control m-input">
										</div>
										<?php if (isset($errors['password'])) : ?>
											<div class="alert alert-primary" role="alert">
												Password required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label>Fullname</label>
											<input type="text" name="fullname" value="<?php echo $fullname; ?>" class="form-control m-input">
										</div>
										<?php if (isset($errors['fullname'])) : ?>
											<div class="alert alert-primary" role="alert">
												Fullname required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label>Email</label>
											<input type="email" name="email" value="<?php echo $email; ?>" class="form-control m-input">
										</div>
										<?php if (isset($errors['email'])) : ?>
											<div class="alert alert-primary" role="alert">
												Email required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label>Phone</label>
											<input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control m-input">
										</div>
										<?php if (isset($errors['phone'])) : ?>
											<div class="alert alert-primary" role="alert">
												Phone required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label>Date Created</label>
											<input type="text" name="date_created" value="<?php echo $date_created; ?>" class="form-control m-input">
										</div>
										<?php if (isset($errors['date_created'])) : ?>
											<div class="alert alert-primary" role="alert">
												Date required!
											</div>
										<?php endif; ?>
									</div>
									<div class="m-portlet__foot m-portlet__foot--fit">
										<div class="m-form__actions">
											<button type="submit" name="btn_editUser" class="btn btn-primary">Edit</button>
											<button type="reset" class="btn btn-secondary">Cancel</button>
										</div>
									</div>
								</form>

								<!--end::Form-->
							</div>

							<!--end::Portlet-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Body -->

	<!-- begin::Footer -->
	
	<?php require_once("../layouts/footer.php"); ?>

	<!-- end:: Page -->

	<!-- begin::Quick Sidebar -->
	<?php require_once("../layouts/quick_sidebar.php"); ?>

	<!-- end::Quick Sidebar -->

	<!-- begin::Scroll Top -->
	<div id="m_scroll_top" class="m-scroll-top">
		<i class="la la-arrow-up"></i>
	</div>

	<!-- end::Scroll Top -->

	<!-- begin::Quick Nav -->
	<ul class="m-nav-sticky" style="margin-top: 30px;">
		<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
			<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank">
				<i class="la la-cart-arrow-down"></i>
			</a>
		</li>
		<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
			<a href="https://keenthemes.com/metronic/documentation.html" target="_blank">
				<i class="la la-code-fork"></i>
			</a>
		</li>
		<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
			<a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank">
				<i class="la la-life-ring"></i>
			</a>
		</li>
	</ul>

	<!-- begin::Quick Nav -->

	<!--begin::Base Scripts -->
	<script src="<?php echo $path; ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="<?php echo $path; ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

	<!--end::Base Scripts -->
</body>

<!-- end::Body -->

</html>