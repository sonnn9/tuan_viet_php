<!DOCTYPE html>
<?php $path = "http://" . $_SERVER['SERVER_NAME'] . "/tuan_viet_php/shopnew/admin/";
?>

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

	<?php
	$id = $_GET['id'];
	include 'layouts/products.php';
	$product = new Products;
	$category = $product->category();
	$detail = $product->detail_products($id)->fetch_array();

	if (isset($_POST['btn_editProduct'])) {
		$edit = $product->edit_products($_POST, $id);
		// header('Location: http://'.$_SERVER['SERVER_NAME'].'/tuan_viet_php/shopnew/admin/crud/products/list.php');

	}
	?>


	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

		<!-- BEGIN: Header -->
		<?php require_once("../layouts/header_inner.php"); ?>

		<!-- END: Header -->

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
												Edit Products
											</h3>
										</div>
									</div>
								</div>

								<!--begin::Form-->
								<form action="edit.php?id=<?php echo $id; ?>" method="post" class="m-form m-form--fit m-form--label-align-right">
									<div class="m-portlet__body">
										<div class="form-group m-form__group">
											<label>Name</label>
											<input type="text" name="product_name" value="<?php echo isset($edit['data']['product_name']) ? $edit['data']['product_name'] : $detail['product_name']; ?>" class="form-control m-input">
										</div>
										<?php if (isset($edit['error']['product_name'])) : ?>
											<div class="alert alert-primary" role="alert">
												Products name required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label>Quantily</label>
											<input type="text" name="quantily" value="<?php echo isset($edit['data']['quantily']) ? $edit['data']['quantily'] : $detail['quantily']; ?>" class="form-control m-input">
										</div>
										<?php if (isset($edit['error']['quantily'])) : ?>
											<div class="alert alert-primary" role="alert">
												Quantily required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label>Price</label>
											<input type="text" name="price" value="<?php echo isset($edit['data']['price']) ? $edit['data']['price'] : $detail['price']; ?>" class="form-control m-input">
										</div>
										<?php if (isset($edit['error']['price'])) : ?>
											<div class="alert alert-primary" role="alert">
												Price required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label>Date created</label>
											<input type="text" name="date_created" value="<?php echo isset($edit['data']['date_created']) ? $edit['data']['date_created'] : $detail['date_created']; ?>" class="form-control m-input">
										</div>
										<?php if (isset($edit['error']['date_created'])) : ?>
											<div class="alert alert-primary" role="alert">
												DateCreated required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<select class="form-control m-input" name="category" id="exampleSelect1">
												<?php
												while ($row = $category->fetch_array()) {
												?>
													<option value="<?php echo $row['category_id']; ?>" <?php
																										if (isset($edit['data']['category'])) {
																											if ($edit['data']['category'] == $row['category_id']) {
																												echo "selected";
																											}
																										} ?>>
														<?php echo $row['category_name']; ?> </option>
												<?php
												}
												?>
											</select>
										</div>
										<?php if (isset($edit['error']['category'])) : ?>
											<div class="alert alert-primary" role="alert">
												Price required!
											</div>
										<?php endif; ?>
										<div class="form-group m-form__group">
											<label for="exampleTextarea">Description</label>
											<textarea class="form-control m-input" id="exampleTextarea" name="description" rows="3"><?php echo isset($edit['data']['description']) ? $edit['data']['description'] : $detail['description']; ?></textarea>
										</div>
										<?php if (isset($edit['error']['description'])) : ?>
											<div class="alert alert-primary" role="alert">
												Description required!
											</div>
										<?php endif; ?>
									</div>
									<div class="m-portlet__foot m-portlet__foot--fit">
										<div class="m-form__actions">
											<button type="submit" name="btn_editProduct" class="btn btn-primary">Edit</button>
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

	<!-- end::Footer -->
	</div>

	<!-- end:: Page -->

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