<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard_admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Tables -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Produk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('admin/produk') ?>">Produk</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/bahan') ?>">Bahan</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/harga_bahan') ?>">Harga Bahan</a>

                        <a class="collapse-item" href="<?php echo base_url('admin/laminasi') ?>">Laminasi</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/harga_laminasi') ?>">Harga Laminasi</a>

                        <a class="collapse-item" href="<?php echo base_url('admin/finishing') ?>">Finishing</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/user') ?>">
                    <i class="fas fa-fw fas fa-users"></i>
                    <span>Data User</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/rekening') ?>">
                    <i class="fas fa-fw fas fa-users"></i>
                    <span>Rekening Adiograf</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/transaksi') ?>">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Data Transaksi</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/pesanan') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Data Pesanan</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/antrian_satu') ?>">
                    <i class="fas fa-fw fa-walking"></i>
                    <span>Antrian Satu</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/antrian_dua') ?>">
                    <i class="fas fa-fw fa-walking"></i>
                    <span>Antrian Dua</span></a>
            </li>

            <hr class="sidebar-divider my-0">

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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="navbar">


                            <div class="topbar-divider d-none d-sm-block"></div>

                            <ul class="nav navbar-nav navbar-right">
                                <?php if ($this->session->userdata('username')) { ?>
                                    <li>
                                        <div>Selamat Datang <?php echo $this->session->userdata('username') ?></div>
                                    </li>
                                    <li class="ml-2"><?php echo anchor('auth/logout', 'logout'); ?></li>
                                <?php } else { ?>
                                    <li><?php echo anchor('auth/login', 'login'); ?></li>
                                <?php } ?>

                            </ul>

                        </div>



                    </ul>

                </nav>
                <!-- End of Topbar -->