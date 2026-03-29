<?php
require_once 'core/session_handling.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Tables</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                    </div>
                </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="login.html">
                    <i class="fas fa-fw fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
            </li>
            <!-- Nav Item - Register -->
            <li class="nav-item">
                <a class="nav-link" href="register.html">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Register</span>
                </a>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Expense</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="add.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Expense</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categorytable.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add category</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <!-- Topbar Search -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    echo ($_SESSION['user_name']);
                                    ?>

                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-primary">Expense</h1>
                    <p class="mb-4 text-dark">All your expenses are displayed in the table below.Each row shows essential details like the title,amount,category,description and date,giving
                        you a complete Overview of your spending.And Click the edit button beside any expense to modify the its details.Use Filters to narrow down your expense
                        based on category or date range.
                    </p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 ml-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">View Expense</h6>
                        </div>
                        <br>
                        <div class="row mb-3 ml-2">
                            <div class="col">
                                <select id="filterCategory" class="form-control">
                                    <option value=""> All Categories</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="date" id="filterDate" class="form-control" />
                            </div>
                            <div class="col">
                                <button id="applyFilters" class="btn btn-primary">Filter</button>
                                <button id="clearFilters" class="btn btn-secondary">Clear</button>
                            </div>
                        </div>
                        <div class="ml-4">
                            <table class="table  table-bordered " id="ExpensesTable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ExpensesTablebody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Edit Expense Modal -->
                    <div class="modal fade" id="editExpenseModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="editExpenseForm">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Expense</h5>
                                        <!-- <button type="button" class="btn-cross" data-bs-dismiss="modal" aria-label="Cross"></button> -->
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="edit-id" name="id">
                                        <div class="mb-3">
                                            <label for="edit-title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="edit-title" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit-amount" class="form-label">Amount</label>
                                            <input type="number" class="form-control" id="edit-amount" name="amount" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputcategoryid" class="form-label">Category</label>
                                            <select class="form-control" id="exampleInputcategoryid" name="edit-category_id" required>
                                                <option value="">Select category</option>
                                                <!-- <option value="1">Food</option>
                                                <option value="2">Transport</option>
                                                <option value="3">Entertainment</option>
                                                <option value="4">Health</option> -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit-description" class="form-label">Description</label>
                                            <textarea class="form-control" id="edit-description" name="description" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="edit-date" class="form-label">Date</label>
                                            <!-- <input type="date" class="form-control" id="edit-date" name="date" required> -->
                                            <input type="date" class="form-control" id="edit-date" name="date" placeholder="DD/MM/YYYY">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Management -->
                <!-- <div class="mb-3">
                    <label for="exampleInputcategoryid" class="form-label">Category</label>
                    <div class="d-flex gap-2">
                        <select class="form-control" id="exampleInputcategoryid" name="edit-category_id" required>
                            <option value="">Select category</option>
                        </select>
                        <button type="button" class="btn btn-success" id="addCategoryBtn">Add</button>

                    </div>
                </div> -->

                <!-- Add/Edit Category Modal -->
                <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="categoryForm">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="category-id">

                                    <div class="form-group">
                                        <label for="category-name">Category Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="category-name"
                                            placeholder="Category Name"
                                            required>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="category-limit">Limit Amount</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="category-limit"
                                            step="0.01"
                                            placeholder="e.g. 500.00">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (just once!) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--  jQuery Validation plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <!--  Bootstrap Bundle (includes Popper) -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--  jQuery Easing -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!--  Custom scripts -->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/expenses.js"></script>
    <script src="js/categories.js"></script>
    <!-- 
    DataTables plugins
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!--  DataTables custom script -->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->

</body>

</html>