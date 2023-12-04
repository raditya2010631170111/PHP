<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Homepage</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors_template/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors_template/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors_template/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors_template/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors_template/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors_template/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors_template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors_template/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('vendors_template/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('vendors_template/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
              <div class="card-body">
                <div>
                  Table Playstations | 
                  <a href="/playstations/create" class="btn btn-sm btn-primary">Form</a>
                  <a href="/playstations/delete" class="btn btn-sm btn-primary">Recycle Bin</a>
                  <a href="/playstations" class="btn btn-sm btn-primary">View</a>
				  <a href="/playstations/playstations" class="btn btn-sm btn-primary">Export Import</a>
                </div>
                <div>
                  Table Products | 
                  <a href="/products/create" class="btn btn-sm btn-primary">Form</a>
                  <a href="/products/recyclebin" class="btn btn-sm btn-primary">Recycle Bin</a>
                </div>
                <div>
				  Table Users |
                  <a href="/user/create" class="btn btn-sm btn-primary">Form</a>
                  <a href="/user/edit" class="btn btn-sm btn-primary">Edit</a>
                  <a href="/user/delete" class="btn btn-sm btn-primary">Recycle Bin</a>
                  <a href="/user/myticket" class="btn btn-sm btn-primary">My Ticket</a>
				  <a href="/user/user/" class="btn btn-sm btn-primary">Export Import</a>
                </div>
				<div>
				  Table Transactions |
                  <a href="/transaction/create" class="btn btn-sm btn-primary">Form</a>
                  <a href="/transaction/delete" class="btn btn-sm btn-primary">Recycle Bin</a>
				  <a href="/transaction/transaction" class="btn btn-sm btn-primary">Export Import</a>
                </div>
				<div>
                  Table Purchase | 
                  <a href="/purchase/create" class="btn btn-sm btn-primary">Form</a>
                  <a href="/purchase/recyclebin" class="btn btn-sm btn-primary">Recycle Bin</a>
                </div>
                <div>
				  Table Suppliers |
                  <a href="/suppliers/create" class="btn btn-sm btn-primary">Form</a>
                  <a href="/suppliers/recyclebin" class="btn btn-sm btn-primary">Recycle Bin</a>
                </div>
				<div>
                  Pagination |
                  <a href="/users/onetoone" class="btn btn-sm btn-primary">One to One</a>
                  <a href="/users/onetomany" class="btn btn-sm btn-primary">One to Many</a>
                  <a href="/users/manytomany" class="btn btn-sm btn-primary">Many to Many</a>
                </div>
				<!-- <div>
				  UTS !
				  <a href="/employee/view/1" class="btn btn-sm btn-primary">View Employee</a>
				  <a href="/employee/edit/1" class="btn btn-sm btn-primary">Edit Employee</a>
				  <a href="/employee/delete/1" class="btn btn-sm btn-primary">Delete Employee</a>
				</div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('/vendors_template/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('/vendors_template/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('/vendors_template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('/vendors_template/vendors/progressbar.js/progressbar.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('/vendors_template/js/off-canvas.js')}}"></script>
  <script src="{{ asset('/vendors_template/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('/vendors_template/js/template.js')}}"></script>
  <script src="{{ asset('/vendors_template/js/settings.js')}}"></script>
  <script src="{{ asset('/vendors_template/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('/vendors_template/js/jquery.cookie.js" type="text/javascript')}}"></script>
  <script src="{{ asset('/vendors_template/js/dashboard.js')}}"></script>
  <script src="{{ asset('/vendors_template/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>