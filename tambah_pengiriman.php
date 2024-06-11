<?php
include 'db.php';
include 'check_session.php';

// Check if form is submitted
if (isset($_POST['simpan'])) {
    // Ambil data dari form
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

    // Query untuk memasukkan data ke dalam tabel pengiriman
    $insert_query = "INSERT INTO pengiriman (client_id, driver_id, asal_gudang_id, tanggal_muat, tanggal_bongkar, jenis_barang, target_pengiriman, tujuan_bongkar, plat, realisasi_pengiriman, keterlambatan, status_pengiriman)
                    VALUES ('$client_id', '$nama_supir', '$asal_gudang', '$tanggal_muat', '$tanggal_bongkar', '$jenis_barang', '$target_pengiriman', '$tujuan_bongkar', '$plat', '$realisasi_pengiriman', '$keterlambatan', '$status_pengiriman')";

    // Eksekusi query
    if (mysqli_query($conn, $insert_query)) {
        echo "Data berhasil disimpan.";
        // Redirect ke halaman tabel data pengiriman setelah penyimpanan data
        header("Location: pengiriman.php");
        exit();
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
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
                        <a class="collapse-item" href="status_pengiriman.php">Status Pengiriman</a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Client</h1>
                    <p class="mb-4">Data yang diinputkan akan dimasukkan ke data client pada sistem ini.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Client</h6>
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
                                          echo "<option value=\"" . $client_row['client_id'] . "\">" . $client_row['nama_client'] . "</option>";
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
                                          echo "<option value=\"" . $driver_row['driver_id'] . "\">" . $driver_row['nama_supir'] . "</option>";
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
                                          echo "<option value=\"" . $gudang_row['warehouse_id'] . "\">" . $gudang_row['nama_gudang'] . "</option>";
                                      }
                                      ?>
                                  </select>
                              </div>


                            <div class="form-group">
                                <label for="tanggal_muat">Tanggal Muat:</label>
                                <input type="date" class="form-control" id="tanggal_muat" name="tanggal_muat">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_bongkar">Tanggal Bongkar:</label>
                                <input type="date" class="form-control" id="tanggal_bongkar" name="tanggal_bongkar">
                            </div>

                            <div class="form-group">
                                <label for="jenis_barang">Jenis Barang:</label>
                                <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="ESTA KIESER-MAG">
                            </div>

                            <div class="form-group">
                                <label for="target_pengiriman">Target Pengiriman:</label>
                                <input type="text" class="form-control" id="target_pengiriman" name="target_pengiriman">
                            </div>

                            <div class="form-group">
                                <label for="tujuan_bongkar">Tujuan Bongkar:</label>
                                <input type="text" class="form-control" id="tujuan_bongkar" name="tujuan_bongkar" value="CIPTA FUTURA ESTATE">
                            </div>

                            <div class="form-group">
                                <label for="plat">Plat:</label>
                                <input type="text" class="form-control" id="plat" name="plat">
                            </div>

                            <div class="form-group">
                                <label for="realisasi_pengiriman">Realisasi Pengiriman:</label>
                                <input type="text" class="form-control" id="realisasi_pengiriman" name="realisasi_pengiriman" >
                            </div>

                            <div class="form-group">
                                <label for="keterlambatan">Keterlambatan:</label>
                                <input type="text" class="form-control" id="keterlambatan" name="keterlambatan">
                            </div>

                            <div class="form-group">
                                <label for="status_pengiriman">Status:</label>
                                <select class="form-control" id="status_pengiriman" name="status_pengiriman">
                                    <option value="Belum Berangkat">Belum Berangkat</option>
                                    <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                                    <option value="Telah Sampai">Telah Sampai</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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
