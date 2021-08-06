<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            Detail User
        </div>
        <div class="card-body">
            <?php foreach ($user as $pdk) : ?>
             
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Username</td>
                                <td><strong><?php echo $pdk->username ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><strong><?php echo $pdk->nama ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nomor Telpon</td>
                                <td><strong><?php echo $pdk->no_hp ?></strong></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><strong><?php echo $pdk->email ?></strong></td>
                            </tr>
                            <tr>
                                <td>alamat</td>
                                <td><strong><?php echo $pdk->alamat ?></strong></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><strong><?php if ($pdk->id_role  == '1') : ?>
								    <label class="badge badge-lg badge-primary">Admin</label>
						    	    <?php elseif ($pdk->id_role  == '2') : ?>
								    <label class="badge badge-info">Customer</label>
                                    <?php elseif ($pdk->id_role == '3') : ?>
								    <label class="badge badge-success">Operator</label>

							<?php endif; ?></strong></td>
                            </tr>

                        </table>

                    </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>