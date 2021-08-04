<?php require 'header.php';?>

<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Datatables</span> - Basic</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<a href="datatable_basic.html" class="breadcrumb-item">Datatables</a>
					<span class="breadcrumb-item active">Basic</span>
				</div>

				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			<div class="header-elements d-none">
				<div class="breadcrumb justify-content-center">
					<a href="#" class="breadcrumb-elements-item">
						<i class="icon-comment-discussion mr-2"></i>
						Support
					</a>

					<div class="breadcrumb-elements-item dropdown p-0">
						<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
							<i class="icon-gear mr-2"></i>
							Settings
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
							<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
							<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">

		<!-- Basic datatable -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Basic datatable</h5>
			</div>		
			<table class="table datatable-basic">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Job Title</th>
						<th>DOB</th>
						<th>Status</th>
		
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Marth</td>
						<td><a href="#">Enright</a></td>
						<td>Traffic Court Referee</td>
						<td>22 Jun 1972</td>
						<td><span class="badge badge-success">Active</span></td>
						<td class="text-center">
							<div class="list-icons">
								
							</div>
						</td>
					</tr>

				</tbody>
			</table>
		</div>
		<!-- /basic datatable -->
	</div>
	<!-- /content area -->

	<?php require 'footer.php';?>
</div>
</body>
</html>
