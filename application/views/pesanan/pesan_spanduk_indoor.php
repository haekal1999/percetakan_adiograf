<div class="container-fluid">

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/Banner/banner.jpg') ?>" class="d-block w-100" alt="...">
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
                        <img src="<?php echo base_url() . '/assets/img/produk/spanduk/bahan/' . $row->foto ?>" class="card-img-top" alt="...">
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

    <!-- Modal Finishing -->
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
                        <img src="<?php echo base_url() . '/assets/img/produk/spanduk/finishing/' . $row->foto ?>" class="card-img-top" alt="...">
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
            <h2>PESAN SPANDUK INDOOR</h2>
            <div class="card-body">
                <div class="row">
                    <?= form_open('spanduk_indoor', array('enctype' => 'multipart/form-data')) ?>
                    <div class="perhitungan">
                        <div class="col-md-12">
                            <h4>
                                <h4>Input Detail Pesanan</h4>
                            </h4>
                            <div class="form-group">
                                <label for="">Ukuran :</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        Panjang (m)
                                    </div>
                                    <div class="col-md-6">
                                        Lebar (m)
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="panjang" id="panjang" class="form-control" required autocomplete="off">
                                            <option value="" disabled selected>Masukan Panjang</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="lebar" id="lebar" class="form-control" required autocomplete="off">
                                            <option value="" disabled selected>Masukan Lebar</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4>Upload Gambar</h4>
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
                                <label>Harga Per Meter</label>
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
                                <label for="">Jenis Finishing :</label><br>
                                <select name="finishing" id="finishing" class="form-control" required>
                                    <option disabled selected value="">Pilih Finishing</option>

                                    <?php foreach ($finishing as $row) { ?>
                                        <option value="<?php echo $row->nama ?>"><?= $row->nama ?> </option>
                                    <?php  } ?>
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

        <div class="card col-md-4 shadow p-3 mb-5 bg-white rounded offset-md-1 mt-5">
            <div class="sidebar-fixed" style="position: static; max-width: 100%;">
                <h2>Detail Produk</h2>

                <div class="accordion" id="accordionExample">
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
                                            <div class="col-md-4 ">
                                                <span>
                                                    <img src="<?php echo base_url() . '/assets/img/produk/spanduk/bahan/' . $row->foto ?>" class="card-img-top" alt="...">
                                                    <a href="<?= $row->id ?>" class="btn btn-outline-info btn-sm btn-block" data-toggle="modal" data-target="#staticBackdrop">Lihat</a>
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
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Finishing
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php foreach ($finishing as $row) { ?>

                                    <div class="card mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 ">
                                                <span>
                                                    <img src="<?php echo base_url() . '/assets/img/produk/spanduk/finishing/' . $row->foto ?>" class="card-img-top" alt="...">
                                                    <a href="<?= $row->id ?>" class="btn btn-outline-info btn-sm btn-block" data-toggle="modal" data-target="#finishing">Lihat</a>
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

<script src="<?php echo base_url('assets/js/dropdown/jquery-1.10.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dropdown/jquery.chained.min.js') ?>"></script>
<script>
    $("#harga").chained("#bahan"); // disini kita hubungkan harga dengan bahan
</script>

<script type="text/javascript">
    $(".perhitungan").keyup(function() {
        var harga = parseInt($("#harga").val())
        var jumlah = parseInt($("#jumlah").val())
        var panjang = parseInt($("#panjang").val())
        var lebar = parseInt($("#lebar").val())
        var bahan = $("#bahan").val()
        var bahan1 = $("#bahan1").attr("value", bahan)



        var total = 0;
        var total = harga * jumlah * (panjang * lebar);

        var html = '';
        html = '' +
            '<h3> Rp. ' + formatRupiah(parseInt(total).toString()) + '</h3>';
        $('#total').html(html);
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