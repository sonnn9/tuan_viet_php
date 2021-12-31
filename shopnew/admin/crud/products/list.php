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
					<div class="m-portlet m-portlet--mobile">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										List Products
									</h3>
								</div>
							</div>
							<div class="m-portlet__head-tools">
								<ul class="m-portlet__nav">
									<li class="m-portlet__nav-item">
										<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
											<span>
												<i class="la la-cart-plus"></i>
												<span>New Order</span>
											</span>
										</a>
									</li>
									<li class="m-portlet__nav-item"></li>
									<li class="m-portlet__nav-item">
										<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
											<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
												<i class="la la-ellipsis-h m--font-brand"></i>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav">
																<li class="m-nav__section m-nav__section--first">
																	<span class="m-nav__section-text">Quick Actions</span>
																</li>
																<li class="m-nav__item">
																	<a href="" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">Create Post</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">Send Messages</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-multimedia-2"></i>
																		<span class="m-nav__link-text">Upload File</span>
																	</a>
																</li>
																<li class="m-nav__section">
																	<span class="m-nav__section-text">Useful Links</span>
																</li>
																<li class="m-nav__item">
																	<a href="" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-info"></i>
																		<span class="m-nav__link-text">FAQ</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																		<span class="m-nav__link-text">Support</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit m--hide">
																</li>
																<li class="m-nav__item m--hide">
																	<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="m-portlet__body">

							<!--begin: Datatable -->
							<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
								<thead>
									<tr>
										<th>ProductID</th>
										<th>Name</th>
										<th>Quantily</th>
										<th>Price</th>
										<th>Date Created</th>
										<th>Categories</th>
										<th>Description</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>

									<?php
									include 'layouts/products.php';
									$list = new Products();
									$result = $list->list_products();
									while ($row = $result->fetch_array()) {
									?>
										<tr>
											<td><?php echo $row['product_id']; ?></td>
											<td><?php echo $row['product_name']; ?></td>
											<td><?php echo $row['quantily']; ?></td>
											<td><?php echo $row['price']; ?></td>
											<td><?php echo $row['date_created']; ?></td>
											<td><?php echo $row['categories']; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td nowrap="">
												<span class="dropdown">
													<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
														<i class="la la-ellipsis-h"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 26px, 0px);">
														<a class="dropdown-item" href="edit.php?id=<?php echo $row['product_id']; ?>"><i class="la la-edit"></i> Edit</a>
														<a class="dropdown-item" href="del.php?id=<?php echo $row['product_id']; ?>"><i class="la la-leaf"></i> Delete</a>
													</div>
												</span>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
		</div>

		<!-- end:: Body -->

		<!-- begin::Footer -->
		<?php require_once("../layouts/footer.php"); ?>

		<!-- end::Footer -->
	</div>

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