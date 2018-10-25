<div class="">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List User</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="<?= base_url('core/modal_master/user/-1') ?>" data-toggle="modal"  data-target="#add" data-backdrop="true">
                                <i class="fa fa-plus" alt="tambah data"></i> Tambah Data Baru</a>
                        </li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-users" class="table table-striped table-bordered dt-responsive datatable-buttons tablelength-5">
                        <thead>
                            <tr>
                                <th class="text-center">Username</th>
                                <th class="text-center">Nama Karyawan</th>
                                <th class="text-center">Nama Deptartment</th>
                                <th class="text-center">Level Tahap</th>
                                <th class="text-center">E/D</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($dataUsers)) {
                                foreach ($dataUsers as $var) {
                                    echo '<tr>';
                                    echo '<td>' . $var->USERNAME . '</td>';
//                            echo '<td width=10>' . $var->ID_KARYAWAN . '</td>';
                                    foreach ($dataUsersSQL as $var2) {
                                        if ($var->ID_KARYAWAN == $var2->id_karyawan) {
                                            echo '<td>' . $var2->nama_karyawan . '</td>';
                                        }
                                    }
//                            echo '<td width=10>' . $var->ID_DEPARTMENT . '</td>';
                                    foreach ($dataDeptSQL as $var2) {
                                        if ($var->ID_DEPARTMENT == $var2->id_department) {
                                            echo '<td>' . $var2->nama_department . '</td>';
                                        }
                                    }
                                    echo '<td width=10>' . $var->LEVEL_TAHAP . '</td>';
                                    echo '<td align="center"><a href="' . base_url('core/modal_master/user/' . $var->ID_USER) . '" data-toggle="modal"  data-target="#add" data-backdrop="true"><i class="fa fa-edit"></i></a></td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Media</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="<?= base_url('core/modal_master/media/-1') ?>" data-toggle="modal"  data-target="#add" data-backdrop="true">
                                <i class="fa fa-plus" alt="tambah data"></i> Tambah Data Baru</a>
                        </li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-striped table-bordered dt-responsive datable-pelapor datatable-buttons" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Media</th>
                                <th class="text-center">E/D</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($dataMasterMedia)) {
                                $a = 1;
                                foreach ($dataMasterMedia as $dmm) {
                                    echo '<tr>';
                                    echo '<td>' . $a++ . '</td>';
                                    echo '<td>' . $dmm->MEDIA . '</td>';
                                    echo '<td align="center"><a href="' . base_url('core/modal_master/media/' . $dmm->ID_MEDIA) . '" data-toggle="modal"  data-target="#add" data-backdrop="true"><i class="fa fa-edit"></i></a></td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>               
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Barang Header</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="<?= base_url('core/modal_master/barang/-1'); ?>" data-toggle="modal"  data-target="#add" data-backdrop="true">
                                <i class="fa fa-plus" alt="tambah data"></i> Tambah Data Baru</a>
                        </li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-striped table-bordered dt-responsive datable-pelapor datatable-buttons" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">E/D</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($dataMasterProdukH)) {
                                $a = 1;
                                foreach ($dataMasterProdukH as $dmph) {
                                    echo '<tr>';
                                    echo '<td>' . $a++ . '</td>';
                                    echo '<td>' . $dmph->PRODUCT_HEADER . '</td>';
                                    echo '<td align="center"><a href="' . base_url('core/modal_master/barang/' . $dmph->ID_PRODUCT_HEADER) . '" data-toggle="modal"  data-target="#add" data-backdrop="true"><i class="fa fa-edit"></i></a></td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>               
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Barang Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="<?= base_url('core/modal_master/barang_d/-1'); ?>" data-toggle="modal"  data-target="#add" data-backdrop="true">
                                <i class="fa fa-plus" alt="tambah data"></i> Tambah Data Baru</a>
                        </li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-striped table-bordered dt-responsive datable-pelapor datatable-buttons" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <!--<th class="text-center">ID_PRODUCT_DETAIL</th>-->
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Detail Barang</th>
                                <th class="text-center">E/D</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($dataMasterProdukD)) {
                                $a = 1;
                                foreach ($dataMasterProdukD as $dmpd) {
                                    echo '<tr>';
                                    echo '<td>' . $a++ . '</td>';
//                                    echo '<td>' . $dmpd->ID_PRODUCT_DETAIL . '</td>';
                                    echo '<td>' . $dmpd->PRODUCT_HEADER . '</td>';
                                    echo '<td>' . $dmpd->PRODUCT_DETAIL . '</td>';
                                    echo '<td align="center"><a href="' . base_url('core/modal_master/barang_d/' . $dmpd->ID_PRODUCT_DETAIL) . '" data-toggle="modal"  data-target="#add" data-backdrop="true"><i class="fa fa-edit"></i></a></td>';
//                                    echo '<td>' . $ts->hasil_evaluasi . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>               
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>



