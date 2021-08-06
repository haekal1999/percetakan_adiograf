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
                <div class="sidebar-brand-text mx-3">OPERATOR CETAK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('operator/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>



            <!-- Nav Item - Tables -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('operator/pesanan') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Pesanan Masuk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('operator/pesanan_cetak') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Sedang Dicetak</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('operator/pesanan_selesai') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Pesanan Selesai</span></a>
            </li>
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
                                        <div><?php echo $this->session->userdata('username') ?></div>
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