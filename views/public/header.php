<!DOCTYPE html>
<?php require "adminMenuSettings.php" ?>

<html lang="en">

<head>
	<base href="/cms/views/public/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= settings("title") ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<!-- <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=1zObPI606U-zhZaH0k6MOR5r4JYdGCOJ5Tif7FuU1d48F_VsFo8qDp8zr4cQZr8yBeRECLTJ4a0TmuorTjdlW3FxRp2Hag2go3IXJDdIEMKlQMNvy1nN-UscOzYX8DVztDM7V1WHefZVmosk0c3ZPdwAmQdXqXwS1I2PpJhlKbc" charset="UTF-8"></script>  -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/datatables_basic.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Uploader Scripts - Yeni-->
	<script src="global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="global_assets/js/demo_pages/uploader_bootstrap.js"></script>
	<script src="global_assets/js/demo_pages/extension_dnd.js"></script>
	<!-- /theme JS files -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


	<style>
		.ck-editor__editable {
			min-height: 180px;
		}


		@media (min-width: 34em) {
			.card-columns {
				-webkit-column-count: 2;
				-moz-column-count: 2;
				column-count: 2;
			}
		}

		@media (min-width: 48em) {
			.card-columns {
				-webkit-column-count: 3;
				-moz-column-count: 3;
				column-count: 3;
			}
		}

		@media (min-width: 62em) {
			.card-columns {
				-webkit-column-count: 4;
				-moz-column-count: 4;
				column-count: 4;
			}
		}

		@media (min-width: 75em) {
			.card-columns {
				-webkit-column-count: 5;
				-moz-column-count: 5;
				column-count: 5;
			}
		}

	</style>
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<a href="index.html" class="d-inline-block">
			<div class="navbar-brand d-flex align-items-center">
				<div class="col-md-3 col-sm-4">
					<div class="d-flex align-items-center">
						<i class="icon-pulse2 mr-3 icon-2x"> <?= settings("name"); ?></i>

					</div>
				</div>
		</a>
	</div>

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>

			<li class="nav-item dropdown">
				<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
					<i class="icon-git-compare"></i>
					<span class="d-md-none ml-2">Git updates</span>
					<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">9</span>
				</a>

				<div class="dropdown-menu dropdown-content wmin-md-350">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold">Git updates</span>
						<a href="#" class="text-default"><i class="icon-sync"></i></a>
					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">
							<li class="media">
								<div class="mr-3">
									<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Drop the IE <a href="#">specific hacks</a> for temporal inputs
									<div class="text-muted font-size-sm">4 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<a href="#" class="btn bg-transparent border-warning text-warning rounded-round border-2 btn-icon"><i class="icon-git-commit"></i></a>
								</div>

								<div class="media-body">
									Add full font overrides for popovers and tooltips
									<div class="text-muted font-size-sm">36 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<a href="#" class="btn bg-transparent border-info text-info rounded-round border-2 btn-icon"><i class="icon-git-branch"></i></a>
								</div>

								<div class="media-body">
									<a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch
									<div class="text-muted font-size-sm">2 hours ago</div>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon"><i class="icon-git-merge"></i></a>
								</div>

								<div class="media-body">
									<a href="#">Eugene Kopyov</a> merged <span class="font-weight-semibold">Master</span> and <span class="font-weight-semibold">Dev</span> branches
									<div class="text-muted font-size-sm">Dec 18, 18:36</div>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Have Carousel ignore keyboard events
									<div class="text-muted font-size-sm">Dec 12, 05:46</div>
								</div>
							</li>
						</ul>
					</div>

					<div class="dropdown-content-footer bg-light">
						<a href="#" class="text-grey mr-auto">All updates</a>
						<div>
							<a href="#" class="text-grey" data-popup="tooltip" title="Mark all as read"><i class="icon-radio-unchecked"></i></a>
							<a href="#" class="text-grey ml-2" data-popup="tooltip" title="Bug tracker"><i class="icon-bug2"></i></a>
						</div>
					</div>
				</div>
			</li>
		</ul>

		<span class="badge bg-success ml-md-3 mr-md-auto">??evrimi??i</span>

		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
					<i class="icon-people"></i>
					<span class="d-md-none ml-2">Users</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold">Users online</span>
						<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">
							<li class="media">
								<div class="mr-3">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>
									<span class="d-block text-muted font-size-sm">Lead web developer</span>
								</div>
								<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<a href="#" class="media-title font-weight-semibold">Will Brason</a>
									<span class="d-block text-muted font-size-sm">Marketing manager</span>
								</div>
								<div class="ml-3 align-self-center"><span class="badge badge-mark border-danger"></span></div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<a href="#" class="media-title font-weight-semibold">Hanna Walden</a>
									<span class="d-block text-muted font-size-sm">Project manager</span>
								</div>
								<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<a href="#" class="media-title font-weight-semibold">Dori Laperriere</a>
									<span class="d-block text-muted font-size-sm">Business developer</span>
								</div>
								<div class="ml-3 align-self-center"><span class="badge badge-mark border-warning-300"></span></div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<a href="#" class="media-title font-weight-semibold">Vanessa Aurelius</a>
									<span class="d-block text-muted font-size-sm">UX expert</span>
								</div>
								<div class="ml-3 align-self-center"><span class="badge badge-mark border-grey-400"></span></div>
							</li>
						</ul>
					</div>

					<div class="dropdown-content-footer bg-light">
						<a href="#" class="text-grey mr-auto">All users</a>
						<a href="#" class="text-grey"><i class="icon-gear"></i></a>
					</div>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
					<i class="icon-bubbles4"></i>
					<span class="d-md-none ml-2">Messages</span>
					<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold">Messages</span>
						<a href="#" class="text-default"><i class="icon-compose"></i></a>
					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">
							<li class="media">
								<div class="mr-3 position-relative">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>

								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">James Alexander</span>
											<span class="text-muted float-right font-size-sm">04:58</span>
										</a>
									</div>

									<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
								</div>
							</li>

							<li class="media">
								<div class="mr-3 position-relative">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>

								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Margo Baker</span>
											<span class="text-muted float-right font-size-sm">12:16</span>
										</a>
									</div>

									<span class="text-muted">That was something he was unable to do because...</span>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Jeremy Victorino</span>
											<span class="text-muted float-right font-size-sm">22:48</span>
										</a>
									</div>

									<span class="text-muted">But that would be extremely strained and suspicious...</span>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Beatrix Diaz</span>
											<span class="text-muted float-right font-size-sm">Tue</span>
										</a>
									</div>

									<span class="text-muted">What a strenuous career it is that I've chosen...</span>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Richard Vango</span>
											<span class="text-muted float-right font-size-sm">Mon</span>
										</a>
									</div>

									<span class="text-muted">Other travelling salesmen live a life of luxury...</span>
								</div>
							</li>
						</ul>
					</div>

					<div class="dropdown-content-footer justify-content-center p-0">
						<a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
					</div>
				</div>
			</li>

			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
					<span>Victoria</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
					<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
					<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
					<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
		</ul>
	</div>
	</div>
	<!-- /main navbar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">Admin</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs">Men??ler</div> <i class="icon-menu" title="Main"></i>
						</li>
						<li class="nav-item">
							<a href="/cms/admin/postList" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>



						<?php foreach ($menuler as $key => $value) : ?>

							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="<?= $value['icon'] ?>"></i> <span><?= $value['name'] ?></span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Layouts">
									<?php if ($value['subMenu']) : ?>
										<?php foreach ($value['subMenu'] as $subHref => $subName) : ?>

											<li class="nav-item"><a href="/cms/<?= $subHref ?>" class="nav-link active"><?= $subName ?></a></li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</li>

						<?php endforeach; ?>

						<!-- /main -->
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->