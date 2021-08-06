<div class="container-fluid">

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/Banner/kalender.jpg') ?>" class="d-block w-100" alt="...">
            </div>

        </div>
    </div>

    <!-- Modal Bahan -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php foreach ($bahan as $row) { ?>

                    <div class="modal-body">
                        <h6 class="card-title ml-2"><?= $row->bahan ?></h6>
                        <img src="<?php echo base_url() . '/assets/img/produk/bahan/' . $row->foto ?>" class="card-img-top" alt="...">
                        <span class="btn btn-light mb-2 mt-2">
                            Rp. <?php echo number_format($row->harga, 0, ',', '.')  ?>
                        </span><br>
                    </div>
                <?php } ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Laminasi -->
    <div class="modal fade" id="laminasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Finishing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php foreach ($laminasi as $row) { ?>

                    <div class="modal-body">
                        <h6 class="card-title ml-2"><?= $row->nama ?></h6>
                        <img src="<?php echo base_url() . '/assets/img/produk/laminasi/' . $row->foto ?>" class="card-img-top" alt="...">
                        <span class="btn btn-light mb-2 mt-2">
                            Rp. <?php echo number_format($row->harga, 0, ',', '.')  ?>
                        </span><br>
                    </div>
                <?php } ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sudut -->
    <div class="modal fade" id="finishing" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Finishing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php foreach ($finishing as $row) { ?>

                    <div class="modal-body">
                        <h6 class="card-title ml-2"><?= $row->nama ?></h6>
                        <img src="<?php echo base_url() . '/assets/img/produk/finishing/' . $row->foto ?>" class="card-img-top" alt="...">

                    </div>
                <?php } ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="card col-md-6 ml-5 shadow p-3 mb-5 bg-white rounded mt-5">
            <h2>PESAN KALENDER MEJA</h2>
            <div class="card-body">
                <div class="row">
                    <?= form_open('kalender_meja', array('enctype' => 'multipart/form-data')) ?>
                    <div class="perhitungan">
                        <div class="col-md-12">
                            <h4>
                                <h4>Input Detail Pesanan</h4>
                            </h4>
                            <div class="form-group">
                                <label for="">Ukuran :</label>

                                <select class="form-control" name="ukuran" id="ukuran" required="">
                                    <option disabled selected value="">Pilih Ukuran</option>
                                    <option value="A5">A5 (14.8 x 21 cm)</option>

                                </select>
                            </div>
                            <h4>Upload Desain</h4>
                            <?php echo $this->session->flashdata('pesan') ?>

                            <div class="product-page-product-wrap">
                                <div class="clearfix">
                                    <input type="file" class="dropify" name="upload" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tipe Bahan : </label>

                                <select class="form-control" name="bahan" id="bahan">
                                    <option disabled selected value="">Pilih Bahan</option>
                                    <?php
                                    foreach ($bahan as $row) {
                                    ?>
                                        <option <?php echo $bahan_selected == $row->id ? 'selected="selected"' : '' ?> value="<?php echo $row->id ?>"><?php echo $row->bahan ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Bahan</label>
                                <select class="form-control" name="harga" id="harga">
                                    <?php
                                    foreach ($harga as $hrg) {
                                    ?>
                                        <!--di sini kita tambahkan class berisi id provinsi-->
                                        <option class="<?php echo $hrg->id_bhn_fk ?>" value="<?php echo $hrg->harga ?>"><?php echo $hrg->harga ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Sisi : </label>

                                <select class="form-control" name="finishing1" id="finishing1">
                                    <option disabled selected value="">Pilih Sisi</option>

                                    <option value="dua sisi">Dua Sisi</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tipe dudukan : </label>

                                <select class="form-control" name="dudukan" id="dudukan">
                                    <option disabled selected value="">Pilih Dudukan</option>
                                    <?php
                                    foreach ($dudukan as $row) {
                                    ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tipe Finishing : </label>

                                <select class="form-control" name="finishing" id="finishing">
                                    <option disabled selected value="">Pilih FInishing</option>
                                    <?php
                                    foreach ($finishing as $row) {
                                    ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tipe Laminasi : </label>

                                <select class="form-control" name="laminasi1" id="laminasi1">
                                    <option disabled selected value="">Pilih Laminasi</option>
                                    <?php
                                    foreach ($laminasi as $row) {
                                    ?>
                                        <option <?php echo $laminasi_selected == $row->id ? 'selected="selected"' : '' ?> value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Harga Laminasi</label>
                                <select class="form-control" name="harga_laminasi" id="harga_laminasi">
                                    <?php
                                    foreach ($harga_laminasi as $hrg) {
                                    ?>
                                        <!--di sini kita tambahkan class berisi id provinsi-->
                                        <option class="<?php echo $hrg->id_laminasi_fk ?>" value="<?php echo $hrg->harga ?>"><?php echo $hrg->harga ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Jumlah (pcs) :</label>
                                <input type="number" name="jumlah" class="form-control" id="jumlah" onkeyup="showTotal()" required autocomplete="off">
                            </div>
                            <br>

                            <h4>Total</h4>
                            <div id="total">
                                <h3>0</h3>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary" name="keranjang"><i class="fa fa-shopping-cart"></i>Add to cart
                            </button>
                            <?= form_close() ?>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <select name="" id=""><img src="<?php echo base_url() . '/uploads/bahan/' . $row->foto ?>" class="card-img-top">
                                                <p><?php echo $row->ket ?></p>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DETAIL PRODUK -->

        <div class="card col-md-4 shadow p-3 mb-5 bg-white rounded offset-md-1 mt-5">
            <div class="sidebar-fixed" style="position: static; max-width: 100%;">
                <h2>Detail Produk</h2>

                <div class="accordion" id="accordionExample">

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Produk
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo base_url('assets/img/produk/contoh/desk_calendar_mockup_ok_3.png') ?>" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url('assets/img/produk/contoh/Calendar-Mockup-1.jpg') ?>" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo base_url('assets/img/produk/contoh/table-calendar-mockup-paper-card-flipping.jpg') ?>" class="d-block w-100" alt="...">
                                        </div>

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Bahan
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php foreach ($bahan as $row) { ?>

                                    <div class="card mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 mt-2 mb-1">
                                                <span>
                                                    <div class="detail-gambar">
                                                        <div class="overlay">

                                                            <img src="<?php echo base_url() . '/assets/img/produk/bahan/' . $row->foto ?>" class="card-img-top" alt="..." href="<?= $row->id ?>" data-toggle="modal" data-target="#staticBackdrop">

                                                        </div>

                                                    </div>
                                                </span>
                                            </div>
                                            <div class="card-body col-md-8">
                                                <h6 class="card-title ml-2"><?= $row->bahan ?></h6>
                                                <p class="card-text ml-2" style="font-size: 14;"><?= $row->ket ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>


                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Laminasi
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php foreach ($laminasi as $row) { ?>

                                    <div class="card mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 mt-2 mb-1">
                                                <span>
                                                    <div class="detail-gambar">
                                                        <div class="overlay">

                                                            <img src="<?php echo base_url() . '/assets/img/produk/laminasi/' . $row->foto ?>" class="card-img-top" alt="..." href="<?= $row->id ?>" data-toggle="modal" data-target="#laminasi">

                                                        </div>

                                                    </div>
                                                </span>
                                            </div>
                                            <div class="card-body col-md-8">
                                                <h6 class="card-title ml-2"><?= $row->nama ?></h6>
                                                <p class="card-text ml-2" style="font-size: 14;"><?= $row->ket ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>


                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    Finishing
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFive" class="collapse show" aria-labelledby="headingfive" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php foreach ($finishing as $row) { ?>

                                    <div class="card mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 mt-2 mb-1">
                                                <span>
                                                    <div class="detail-gambar">
                                                        <div class="overlay">

                                                            <img src="<?php echo base_url() . '/assets/img/produk/finishing/' . $row->foto ?>" class="card-img-top" alt="..." href="<?= $row->id ?>" data-toggle="modal" data-target="#finishing">

                                                        </div>

                                                    </div>
                                                </span>
                                            </div>
                                            <div class="card-body col-md-8">
                                                <h6 class="card-title ml-2"><?= $row->nama ?></h6>
                                                <p class="card-text ml-2" style="font-size: 14;"><?= $row->ket ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>



                </div>



            </div>
        </div>

    </div>
</div>

<style>
    .detail-gambar {
        position: relative;
        width: 100%;

    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 1;
        transition: .5s ease;
        background-color: #808080;
    }

    .detail-gambar:hover .overlay {
        opacity: 0.2;
    }

    .text {
        color: black;
        font-size: 10px;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>

<script src="<?php echo base_url('assets/js/dropdown/jquery-1.10.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dropdown/jquery.chained.min.js') ?>"></script>





<script>
    $("#harga").chained("#bahan"); // disini kita hubungkan harga dengan bahan
    $("#harga_laminasi").chained("#laminasi1"); // disini kita hubungkan harga dengan bahan
</script>

<script type="text/javascript">
    $(".perhitungan").keyup(function() {
        var harga = parseInt($("#harga").val())
        var jumlah = parseInt($("#jumlah").val())
        var bahan = $("#bahan").val()
        var ukuran = $('#ukuran').val();
        var finishing = $('#finishing1').val();
        var hrg_laminasi = parseInt($("#harga_laminasi").val())
        var laminasi = $("#laminasi1").val()

        var total = 0;
        var html = '';
        if (finishing === 'satu sisi') {
            total = (harga + hrg_laminasi) * jumlah * 1;
            html = '' +
                '<h3> Rp. ' + formatRupiah(parseInt(total).toString()) + '</h3>';
            $('#total').html(html);
        } else if (finishing === 'dua sisi') {
            total = (harga + hrg_laminasi) * jumlah * 1;
            html = '' +
                '<h3> Rp. ' + formatRupiah(parseInt(total).toString()) + '</h3>';
            $('#total').html(html);
        }
    });


    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>