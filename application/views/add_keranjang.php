<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/template_cart/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template_cart/css/main.css">
    <!--===============================================================================================-->
</head>

<!-- Header -->


<body class="animsition">



    <!-- Title Page -->


    <!-- Cart -->
    <section class="cart bgwhite ">
        <div class="container">
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Product</th>
                            <th class="column-3">Price</th>
                            <th class="column-4 p-l-70">Quantity</th>
                            <th class="column-5" width="15%">SubTotal</th>
                            <th class="column-6" width="20%">Action</th>

                        </tr>
                        <?php

                        foreach ($keranjang as $keranjang) {
                            $id_produk = $keranjang['id'];
                            $produk = $this->m_produk->detail_keranjang($id_produk);

                            echo form_open(base_url('dashboard/update_keranjang/' . $keranjang['rowid']));

                        ?>
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="<?php echo base_url('uploads/' . $produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                                    </div>
                                </td>
                                <td class="column-2"><?php echo $keranjang['name'] ?></td>
                                <td class="column-3">Rp. <?php echo number_format($keranjang['price'], 0, ',', '.') ?></td>
                                <td class="column-4">
                                    <div class="flex-w bo5 of-hidden w-size17">
                                        <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                            <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                        </button>

                                        <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

                                        <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                            <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="column-5">Rp. <?php $sub_total = $keranjang['price'] * $keranjang['qty'];
                                                            echo number_format($sub_total, '0', ',', '.');
                                                            ?>

                                </td>
                                <td>
                                    <button type="submit" name="update" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i> Update
                                    </button>
                                    <a href="<?php echo base_url('dashboard/hapus_keranjang/' . $keranjang['rowid']) ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-trash-o"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php
                            echo form_close();
                        }
                        ?>
                        <tr class="table-row bg-info text-strong" style="font-weight:bold;">
                            <td colspan="4" class="column-1">Total Belanja</td>
                            <td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(), '0', ',', '.') ?></td>

                        </tr>
                    </table>
                    <br>
                    <p class="pull-right">
                        <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash-o"></i>Bersihkan Keranjang Belanja
                        </a>

                        <a href="<?php echo base_url('dashboard/pembayaran') ?>" class="btn btn-sm btn-success">
                            <i class="fa fa-shopping-cart"></i>Checkout
                        </a>
                    </p>
                </div>
            </div>

            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm">

                </div>

                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <!-- Button -->

                </div>
            </div>


        </div>
    </section>



    <!-- Footer -->


    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <!-- Container Selection -->
    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>



    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/template_cart/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/template_cart/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/template_cart/vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/template_cart/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/template_cart/vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });

        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect2')
        });
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/template_cart/js/main.js"></script>

</body>

</html>