<!DOCTYPE html>
<html lang="en">

<head>
	<?php require'CssLink.php';?>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<?php require'LeftMenu.php';?>
		<?php require'Header.php';?>
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					
					<!--end breadcrumb-->
					
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Manage Transaction</h4>
							</div>
							<hr>
							<div class="table-responsive">
								<table id="GetDataUser" class="table  displaytable-striped table-bordered"  cellspacing="0" width="100%"style="width:100%">
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Type</th>
											<th>UserId</th>
											<th>Name</th>
											<th>TnxId</th>
											<th>Amount</th>
											<th>Messages</th>
											
											<th>Date</th>
											<th>Time</th>
										</tr>
									</thead>
									<tbody>
									
									</tbody>
									
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<?php require'Footer.php';?>
	</div>
	<!-- end wrapper -->
	 
	<?php require'JsLink.php'; ?>
	
	<script>
		$(document).ready(function(){
			var dataTable=$('#GetDataUser').DataTable({
				"processing": true,
				"serverSide":true,
				"ajax":{ 
					url:"../code/fetch.php?flag=wallet_transaction",
					type:"post"
				}
			});
		});
	</script>
		
</body>

</html>