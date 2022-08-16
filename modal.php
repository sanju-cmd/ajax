<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <?php include('css.php');?>

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
           <?php include('header.php');?>

            <!-- ========== Left Sidebar Start ========== -->
           <?php include('leftsidebar.php');?>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

            <div class="page-content">
                    <div class="container-fluid">

                <!-- End Page-content -->
                <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <!-- <h4 class="card-title">Buttons example</h4>
                                        <p class="card-title-desc">The Buttons extension for DataTables
                                            provides a common set of options, API methods and styling to display
                                            buttons on a page that will interact with a DataTable. The core library
                                            provides the based framework upon which plug-ins can built.
                                        </p> -->
                                        <form method="POST">
									<div class="row m-4">
									<div class="col-sm-5">
									<?php if(isset($_POST['fromDate'])){?>
									From <input class="form-control" value="<?php echo $_POST['fromDate']?>" type="date" id="datepicker" name="fromDate"/>
									<?php }else{?>
									From <input class="form-control" type="date" id="datepicker" name="fromDate"/>
									<?php }?>
											</div>
											<div class="col-sm-5">
											<?php if(isset($_POST['toDate'])){?>
											To <input class="form-control" value="<?php echo $_POST['toDate']?>" type="date" id="datepicker2" name="toDate"/> 
											<?php }else{?>
											To <input class="form-control"  type="date" id="datepicker2" name="toDate"/> 
											<?php }?>
											</div>
											<div class="col-sm-2">
											<br>
											<button style="height:38px;" class="btn btn-primary" type="submit" ><i class="fa fa-search"></i> Search </button>
											</div>
											</div>
											</form>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr. NO.</th>
                                                <th>Leader</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Whatsapp</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                         <?php
										$i=1;
                                        if(isset($_POST['fromDate']) && isset($_POST['toDate']))
                                        {


                                        $fdate=$_POST['fromDate'];
                                        $fdate=date("d-m-Y", strtotime("$fdate"));
                                        
                                        $tDate=$_POST['toDate'];

                                           
                                        $tDate=date("d-m-Y", strtotime("$tDate"));

                                        //echo "SELECT * FROM `tbl_lead` WHERE date >= '$fdate'  and date <= '$tDate'";

                                        $source->Query("SELECT * FROM `tbl_lead` WHERE date >= '$fdate' and date <= '$tDate' ");



                                        }
                                        else {
                                        
										$source->Query("SELECT * FROM `tbl_lead` where del_status='false'  ORDER BY `id` DESC");
                                        }
										while ($values=$source->Single()){
											
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $values->a_name; ?></td>
                                                <td><?php echo $values->name;?></td>
                                                <td><?php echo $values->email;?></td>
                                                <td><?php echo $values->mobile;?></td>
                                                <td><?php echo $values->whatsapp;?></td>
                                                <td><?php echo $values->purpose;?></td>
                                                <td>
                                                
                                                <button class="btn btn-success text-white" data-toggle="modal" data-target="#exampleModal" onclick="Stats('<?= $values->id;?>')"><?php echo $values->status;?></button>   
                                                <?php # echo $values->status;?>
                                               </td>
                                                <td><?php echo $values->date;?></td>
                                                <td>
                                                <a class="btn btn-outline-success btn-circle" href="UpdateLead?id=<?php echo $values->id;?>"><i class="fa fa-pen"></i></a>
							
							
                                              <button class="btn btn-outline-danger " title="Delete" onclick="Status(<?php echo $values->id?>,'del_status','true','tbl_lead','Delete')"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            
                                            <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end cardaa -->
                            </div> <!-- end col -->
                        </div>
            </div>
        </div>
               
                        <?php include('footer.php');?>
            
                    </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center bg-dark p-3">

                    <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <div class="top-login-modal modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="tmx-loginform" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="tmx-loginform">Login Area</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="login-form-modal">
					 
					 <form method="post" name="login">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary login-btn" name="login">Login</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <p class="message" >Not registered? <a href="#" data-toggle="modal" data-target="#signModal" data-dismiss="modal">Create an account</a></p>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         

         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
        <button type="button" class="close1" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	   <form  method="post"  id="FormSubmit" class="form-element md-float-material form-material" data-parsley-validate="">
      <div class="modal-body" id="modal">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close1" data-dismiss="modal">Close</button>
        <button type="submit" id="btn" class="btn btn-primary" onclick="">Change Status</button>
      </div>
	  </form>
    </div>
  </div>
</div>
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

       <?php include('js.php');?>
       <script type="text/javascript" src="ajax/SignUp.js"></script>
       <script>
         function Status(id,column,value,table,status){
             //alert(id);
            // alert(table);
            //alert(column);
                      swal({
         		title: "Are you sure?",
         		text: "You want to "+status+" this section.",
         		icon: "warning",
         		buttons: true,
         		dangerMode: true,
         		})
         		.then((willDelete) => {
         		if (willDelete) {
         		 $.ajax({
                           url: "code/ManageStatus.php?flag=Delete",
                           type: "post",
                           data: {"id": id,"column":column,"value":value,"table":table,"status":status },
                           success: function(r) {
                               //alert(r);
                               if(r=='Success'){
                                   swal(""+status+"", "Selected data has been "+status+".", "success");
                                   window.setTimeout(function() {
                                 window.location.reload();
                             }, 800);
                               }
                               else{

                                    swal("Failed"," Try  ! Again", "error");
                               }
                           },
                           error: function(s){
                               alert(s);
                           }
                       })
         		}
         		});
                  }
				  
				 
      </script>

<script>
         function Stat(id,column,value,table,status){
            //  alert(id);
            // alert(table);
            // alert(column);
            // alert(value);
            // alert(status);
                      swal({
         		title: "Are you sure?",
         		text: "You want to "+status+" this section.",
         		icon: "warning",
         		buttons: true,
         		dangerMode: true,
         		})
         		.then((willDelete) => {
         		if (willDelete) {
         		 $.ajax({
                           url: "code/ManageStatus.php?flag=Change",
                           type: "post",
                           data: {"id": id,"column":column,"value":value,"table":table,"status":status },
                           success: function(r) {
                               //alert(r);
                               if(r=='Success'){
                                   swal(""+status+"", "Selected data has been "+status+".", "success");
                                   window.setTimeout(function() {
                                 window.location.reload();
                             }, 800);
                               }
                               else{

                                    swal("Failed"," Try  ! Again", "error");
                               }
                           },
                           error: function(s){
                               alert(s);
                           }
                       })
         		}
         		});
                  }
				  
				 
      </script>

<script type="text/javascript">
		function Stats(id)
		{
			
			//alert(id);
			
			$("#exampleModal").modal("show");
            $("#exampleModal .modal-body").html("<center><i class='fa fa-4x fa-spin fa-spinner'></i></center>");
            $("#exampleModal .modal-body").load("ChangeStatus?id="+id);
			
		}
		
		$(".close1").click(function(){
			$("#exampleModal").modal("hide");
           location.reload();
		})
      </script>
    </body>



</html>
