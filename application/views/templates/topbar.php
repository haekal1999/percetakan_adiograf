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

             <!-- Topbar Search -->
             <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                 <div class="head-logo">
                     <a href="<?php echo base_url('dashboard/index/')  ?>">
                         <img src="<?php echo base_url('assets/img/logo.png') ?>" style="width: 10rem;">
                     </a>
                 </div>
             </form>

             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">

                 <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                 <li class="nav-item dropdown no-arrow d-sm-none">
                     <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-search fa-fw"></i>
                     </a>
                     <!-- Dropdown - Messages -->
                     <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                         <form class="form-inline mr-auto w-100 navbar-search">
                             <div class="input-group">
                                 <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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

                     <?php
                        $id = $this->session->userdata('id');
                        $pelanggan = $this->BayarModel->lihat_keranjang_status1($this->session->userdata('id'))->result_array();
                        ?>
                     <a class="nav-link dropdown-toggle" role="button" href="<?php echo base_url('keranjang') ?>">
                         <i class="fas fa-shopping-cart fa-fw"></i>
                         <!-- Counter - Alerts -->
                         <span class="badge badge-danger badge-counter"><?= count($pelanggan) ?></span>
                     </a>

                 </li>

                 <!-- Nav Item - Alerts -->
                 <li class="nav-item dropdown no-arrow mx-1">
                     <?php
                        $id = $this->session->userdata('id');
                        $pelanggan = $this->BayarModel->lihat_keranjang_faktur($this->session->userdata('id'))->result_array();

                        ?>
                     <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-bell fa-fw"></i>
                         <!-- Counter - Alerts -->
                         <span class="badge badge-danger badge-counter"><?= count($pelanggan) ?></span>
                     </a>
                     <!-- Dropdown - Alerts -->
                     <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                         <h6 class="dropdown-header">
                             Status Pesanan </h6>
                         <?php $lihat_pesanan = $this->BayarModel->lihat_keranjang_faktur($this->session->userdata('id'))->result_array();

                            foreach ($lihat_pesanan as $pesanan) {

                            ?>
                             <a class="dropdown-item d-flex align-items-center" href="<?= base_url('detail-pesanan/' . $pesanan['faktur_id']) ?>">
                                 <div class="mr-3">
                                     <div class="icon-circle bg-primary">
                                         <i class="fas fa-file-alt text-white"></i>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="small text-gray-500"><?php
                                                                        $helper = array('nominal', 'tgl_indo');
                                                                        $this->load->helper($helper);
                                                                        $tanggal = explode(" ", $pesanan['faktur_date_created']);
                                                                        echo $tanggal[1] . ', ' . date_indo($tanggal[0]);
                                                                        ?></div>
                                     <span class="font-weight-bold"><?php if ($pesanan['faktur_status'] == 'belum') : ?>
                                             <label class="badge badge-warning">Belum Melakukan Pembayaran</label>
                                         <?php elseif ($pesanan['faktur_status'] == 'sudah') : ?>
                                             <label class="badge badge-success">Pembayaran Sudah Dikonfirmasi</label>
                                         <?php elseif ($pesanan['faktur_status'] == 'tunggu') : ?>
                                             <label class="badge badge-warning">Menunggu Dikonfirmasi Admin </label>
                                         <?php elseif ($pesanan['faktur_status'] == 'cetak') : ?>
                                             <label class="badge badge-primary">Pesanan Sedang Dicetak </label>
                                         <?php elseif ($pesanan['faktur_status'] == 'tidak_sesuai') : ?>
                                             <label class="badge badge-danger">Nominal Pembayaran Tidak Sesuai </label>
                                         <?php elseif ($pesanan['faktur_status'] == 'selesai') : ?>
                                             <label class="badge badge-info">Pesanan Sudah Siap (Bisa Diambil) </label>
                                         <?php endif; ?></span>
                                 </div>
                             </a>
                         <?php
                            } ?>
                         <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('pesanan/') ?>">Lihat Semua Pesanan</a>
                     </div>
                 </li>

                 <div class="navbar">
                     <div class="topbar-divider d-none d-sm-block"></div>

                     <ul class="nav navbar-nav navbar-right">
                         <i class="btn btn-light btn-md fas fa-user-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <?php if ($this->session->userdata('nama')) { ?>
                                 <li>
                                     <div><?php echo $this->session->userdata('nama') ?></div>
                                 </li>
                             <?php } else { ?>
                                 <li><?php echo anchor('auth/login', 'login'); ?></li>
                             <?php } ?>
                         </i>

                         <div class="dropdown-menu dropdown-menu-left">
                             <a class="dropdown-item" href="<?= base_url('edit_profil') ?>"> Profile</a>
                             <a class="dropdown-item" href="<?= base_url('pesanan') ?>"> Riwayat Pesanan</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Keluar</a>
                         </div>
                     </ul>

                 </div>


             </ul>

         </nav>

         <!-- End of Topbar -->