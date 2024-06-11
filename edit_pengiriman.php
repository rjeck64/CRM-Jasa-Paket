<?php
include 'db.php';
include 'check_session.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM pengiriman WHERE shipment_id = $id");
  $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
  $client_id = $_POST['client_id'];
  $nama_supir = $_POST['nama_supir'];
  $asal_gudang = $_POST['asal_gudang'];
  $tanggal_muat = $_POST['tanggal_muat'];
  $tanggal_bongkar = $_POST['tanggal_bongkar'];
  $jenis_barang = $_POST['jenis_barang'];
  $target_pengiriman = $_POST['target_pengiriman'];
  $tujuan_bongkar = $_POST['tujuan_bongkar'];
  $plat = $_POST['plat'];
  $realisasi_pengiriman = $_POST['realisasi_pengiriman'];
  $keterlambatan = $_POST['keterlambatan'];
  $status_pengiriman = $_POST['status_pengiriman'];

  $update_query = "UPDATE pengiriman SET client_id='$client_id', driver_id ='$nama_supir', asal_gudang_id ='$asal_gudang', tanggal_muat='$tanggal_muat', tanggal_bongkar='$tanggal_bongkar', jenis_barang='$jenis_barang', target_pengiriman='$target_pengiriman', tujuan_bongkar='$tujuan_bongkar', plat='$plat', realisasi_pengiriman='$realisasi_pengiriman', keterlambatan='$keterlambatan', status_pengiriman='$status_pengiriman' WHERE shipment_id = $id";

  if (mysqli_query($conn, $update_query)) {
    echo "Data berhasil diperbarui.";
    // Redirect ke halaman tabel data pengiriman setelah pembaruan data
    header("Location: pengiriman.php");
    exit();
  } else {
    echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
  }
}

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT first_name, last_name FROM users WHERE id = '$user_id' LIMIT 1";
    $result1 = $conn->query($sql);

    $row1 = $result1->fetch_assoc();
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
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-1 ">PT. Cahaya Baru Transindo Utama</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-laugh-wink"></i>
                    <span>Client</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Content of Client</h6>
                        <a class="collapse-item" href="client.php">Table Data Client</a>
                        <a class="collapse-item" href="tambah_client.php">Tambah Data Client</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Driver</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Driver</h6>
                        <a class="collapse-item" href="driver.php">Table Data Driver</a>
                        <a class="collapse-item" href="tambah_driver.php">Tambah Data Driver</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Pengiriman</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengiriman</h6>
                        <a class="collapse-item" href="pengiriman.php">Table Data Pengiriman</a>
                        <a class="collapse-item" href="tambah_pengiriman.php">Tambah Data Pengiriman</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

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
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $row1["first_name"] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Pengiriman</h1>
                    <p class="mb-4">Data yang diinputkan akan dimasukkan ke data pengiriman pada sistem ini.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Pengiriman</h6>
                        </div>
                        <div class="card-body">
                            <!-- <h1>Test</h1> -->
                            <form class="" action="" method="post">
                              <div class="form-group">
                                  <label for="client_id">Nama Client:</label>
                                  <select class="form-control" id="client_id" name="client_id">
                                      <?php
                                      $client_result = mysqli_query($conn, "SELECT * FROM client");
                                      while ($client_row = mysqli_fetch_assoc($client_result)) {
                                          echo "<option value=\"" . $client_row['client_id'] . "\" " . ($client_row['client_id'] == $row['client_id'] ? "selected" : "") . ">" . $client_row['nama_client'] . "</option>";
                                      }
                                      ?>
                                  </select>
                              </div>

                            <div class="form-group">
                                <label for="nama_supir">Nama Supir:</label>
                                <select class="form-control" id="nama_supir" name="nama_supir">
                                    <?php
                                    $driver_result = mysqli_query($conn, "SELECT * FROM driver");
                                    while ($driver_row = mysqli_fetch_assoc($driver_result)) {
                                        echo "<option value=\"" . $driver_row['driver_id'] . "\" " . ($driver_row['driver_id'] == $row['driver_id'] ? "selected" : "") . ">" . $driver_row['nama_supir'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="asal_gudang">Asal Gudang:</label>
                                <select class="form-control" id="asal_gudang" name="asal_gudang">
                                    <?php
                                    $gudang_result = mysqli_query($conn, "SELECT * FROM gudang");
                                    while ($gudang_row = mysqli_fetch_assoc($gudang_result)) {
                                        echo "<option value=\"" . $gudang_row['warehouse_id'] . "\" " . ($gudang_row['warehouse_id'] == $row['asal_gudang_id'] ? "selected" : "") . ">" . $gudang_row['nama_gudang'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_muat">Tanggal Muat:</label>
                                <input type="date" class="form-control" id="tanggal_muat" name="tanggal_muat" value="<?php echo $row['tanggal_muat']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_bongkar">Tanggal Bongkar:</label>
                                <input type="date" class="form-control" id="tanggal_bongkar" name="tanggal_bongkar" value="<?php echo $row['tanggal_bongkar']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="jenis_barang">Jenis Barang:</label>
                                <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="<?php echo $row['jenis_barang']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="target_pengiriman">Target Pengiriman:</label>
                                <input type="text" class="form-control" id="target_pengiriman" name="target_pengiriman" value="<?php echo $row['target_pengiriman']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="tujuan_bongkar">Tujuan Bongkar:</label>
                                <input type="text" class="form-control" id="tujuan_bongkar" name="tujuan_bongkar" value="<?php echo $row['tujuan_bongkar']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="plat">Plat:</label>
                                <input type="text" class="form-control" id="plat" name="plat" value="<?php echo $row['plat']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="realisasi_pengiriman">Realisasi Pengiriman:</label>
                                <input type="text" class="form-control" id="realisasi_pengiriman" name="realisasi_pengiriman" value="<?php echo $row['realisasi_pengiriman']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="keterlambatan">Keterlambatan:</label>
                                <input type="text" class="form-control" id="keterlambatan" name="keterlambatan" value="<?php echo $row['keterlambatan']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="status_pengiriman">Status:</label>
                                <select class="form-control" id="status_pengiriman" name="status_pengiriman">
                                    <option value="Belum Berangkat" <?php if ($row['status_pengiriman'] == "Belum Berangkat") echo "selected"; ?>>Belum Berangkat</option>
                                    <option value="Dalam Perjalanan" <?php if ($row['status_pengiriman'] == "Dalam Perjalanan") echo "selected"; ?>>Dalam Perjalanan</option>
                                    <option value="Telah Sampai" <?php if ($row['status_pengiriman'] == "Telah Sampai") echo "selected"; ?>>Telah Sampai</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <!-- <span>Copyright &copy; Your Website 2020</span> -->
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
