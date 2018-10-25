<?php if ($tahap == 1) { ?>
    <ul class="addstrg">
        <a href="<?= base_url('core/reportComplainHeader/-1') ?>" data-toggle="modal" data-target="#add" data-backdrop="true" class="float" >
            <i class="fa fa-plus my-float"></i>
        </a>
    </ul>
<?php } ?>
<div class="x_panel">
    <div class="x_title">
        <?php
        echo '<h2>REPORT COMPLAINT<small>';
        echo '</small></h2>';
        ?>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div id="sample">
            <table border="1" width="100%" cellspacing="2" style="margin-top:8px;">
                <tr style="background:#55666b; color:#f7f7f7;">                    <td width="5%" style="text-align:center;padding: 5px;"><b>No</b></td>
                    <td width="15%" style="text-align:center; padding: 5px;"><b>Nama Pelanggan</b></td>
                    <td width="15%" style="text-align:center; padding: 5px;"><b>Nama Sales</b></td>
                    <td width="10%" style="text-align:center; padding: 5px;"><b>Tgl Surat Keluhan</b></td>
                    <td width="10%" style="text-align:center; padding: 5px;"><b>Tgl Retur / Sample</b></td>
                    <td width="20%" style="text-align:center; padding: 5px;"><b>Alamat Pelanggan</b></td>
                    <td width="5%" style="text-align:center; padding: 5px;"><b>Area Sales</b></td>
                    <td width="10%" style="text-align:center; padding: 5px;"><b>No Surat Keluhan</b></td>
                    <td width="10%" style="text-align:center; padding: 5px;"><b>No Surat Jalan</b></td>
                </tr>
            </table>
        </div>
        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel"> 

                <?php
                $a = 1;
                foreach ($dataCustomer as $dc) {
                    $color = ($a % 2 == 0) ? "#f7f7f7" : "#cfe1ffe6";
                    ?>
                    <a class="" role="tab" id="heading<?= $a ?>" data-toggle="collapse" data-parent="#accordion" href="#act<?= $a ?>" aria-expanded="true" aria-controls="act<?= $a ?>">
                        <h4 class="panel-title">
                            <table class="table table-bordered dt-responsive dataTable collapsed" border="1" width="100%" cellspacing="2" style="margin-top:4px;margin-bottom:5px; font-size: 13px; background-color: <?= $color ?>" >
                                <tr>
                                    <td width="5%" style="text-align:center;padding: 5px;"><?= $a ?></td>
                                    <td width="15%" style="text-align:center; padding: 5px;"><?= $dc->NAMA ?></td>
                                    <?php
                                    foreach ($dataSales as $var2) {
                                        if ($dc->KODE_SALES == $var2->KODE_SALES) {
                                            echo '<td width="15%" style="text-align:center; padding: 5px;">' . $var2->NAMA_SALES . '</td>';
                                        }
                                    }
                                    ?>
                                    <td width="10%" style="text-align:center; padding: 5px;"><?= $dc->DATE_RETUR_SAMPLE ?></td>
                                    <td width="10%" style="text-align:center; padding: 5px;"><?= $dc->DATE_COMPLAIN ?></td>
                                    <td width="20%" style="text-align:center; padding: 5px;"><?= $dc->ALAMAT1 ?></td>
                                    <td width="5%" style="text-align:center; padding: 5px;"><?= $dc->KODE_AREA ?></td>
                                    <td width="10%" style="text-align:center; padding: 5px;"><?= $dc->NO_SURAT_KELUHAN ?></td>
                                    <td width="10%" style="text-align:center; padding: 5px;"><?= $dc->NO_SURAT_JALAN ?></td>
                                </tr>
                            </table>
                        </h4>
                    </a>
                    <div id="act<?= $a ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $a ?>" >
                        <table class="table table-bordered dt-responsive dataTable collapsed" cellspacing="0" width="100%">
                            <thead>
                                <tr style="color: #0D3349; background-color:#e6ecff;">
                                    <th style="text-align: center;align-content: center; width: 10%">Ditujukan kepada</th>
                                    <th style="text-align: center;align-content: center; width: 10%">Batas Waktu</th>
                                    <th style="text-align: center;align-content: center; width: 20%">Komplain</th>
                                    <th style="text-align: center;align-content: center; width: 8%">E/D Header</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr style="color: #0D3349">
                                    <th style="text-align: center;align-content: center; width: 10%"><?= $dc->NAMA_DEPARTMENT ?></th>
                                    <th style="text-align: center;align-content: center; width: 10%"><?= $dc->BATAS_WAKTU ?></th>
                                    <th style="text-align: center;align-content: center; width: 30%"><?= $dc->COMPLAIN ?></th>
                                    <th style="text-align: center;align-content: center; width: 5%">
                                        <a href="<?= base_url('core/reportComplainHeader/' . $dc->ID_REPORT_COMPLAIN_HEADER) ?>" 
                                           data-toggle="modal"  data-target="#add" data-backdrop="true" class="">
                                            <i class="fa fa-edit"></i>                                                
                                        </a>
                                    </th>
                                </tr>
                            </tbody>

                        </table> 
                        <div class="panel-body">

                            <div class="col-xs-1">
                                <!-- required for floating -->
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-left" >
                                    <li class=""><a href="#home-<?= $a ?>" data-toggle="tab" style="font-size: 9px; color: #f7f7f7; background-color: #afcbb1"><b>Finish<br>Goods</b></a>
                                    </li>
                                    <li><a href="#profile-<?= $a ?>" data-toggle="tab" style="font-size: 9px; color: #f7f7f7; background-color: #92cff0"><b>Handling</b></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-11">
                                <!-- Tab panes -->

                                <div class="tab-content">

                                    <div class="tab-pane active" id="home-<?= $a ?>">
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #f2f2f2">
                                            <div class="x_panel" style="background-color: #afcbb1">
                                                <div class="x_title">
                                                    <?php
                                                    echo '<h2 style="color:#fff">Finish Goods</h2>';
                                                    ?>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <table class="table table-bordered dt-responsive dataTable collapsed" cellspacing="0" width="100%" style="background-color: #525f52">
                                                    <thead>
                                                        <tr style="color: #deffe7">
                                                            <th style="text-align: center;align-content: center; width: 2%">No</th>
                                                            <th style="text-align: center;align-content: center; width: 12%">Nama Barang</th>
                                                            <th style="text-align: center;align-content: center; width: 10%">Jumlah</th>
                                                            <th style="text-align: center;align-content: center; width: 10%">Tanggal Kirim</th>
                                                            <th style="text-align: center;align-content: center; width: 10%">No POI/SP</th>
                                                            <th style="text-align: center;align-content: center; width: 30%">Keterangan</th>
                                                            <th style="text-align: center;align-content: center; width: 5%">E/D Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $idx1 = 1;
                                                    foreach ($dataProdukDetailFG as $fg) {
                                                        if ($dc->ID_REPORT_COMPLAIN_HEADER == $fg->ID_REPORT_COMPLAIN_HEADER) {
                                                            $color = ($idx1 % 2 == 0) ? "#deffe7" : "#f7f7f7";
                                                            ?>
                                                            <tbody>
                                                                <tr style=" background-color: <?= $color ?>; color: #0D3349">
                                                                    <td style="text-align: center;align-content: center; width: 2%"><?= $idx1 ?></td>
                                                                    <td style="text-align: center;align-content: center; width: 12%"><?= $fg->NAMA_BARANG ?></td>
                                                                    <td style="text-align: center;align-content: center; width: 10%"><?= $fg->JUMLAH ?></td>
                                                                    <td style="text-align: center;align-content: center; width: 10%"><?= $fg->TGL_KIRIM ?></td>
                                                                    <td style="text-align: center;align-content: center; width: 10%"><?= $fg->NO_PO_INTERN ?></td>
                                                                    <td style="text-align: center;align-content: center; width: 30%"><?= $fg->KETERANGAN ?></td>
                                                                    <td style="text-align: center;align-content: center; width: 5%">
                                                                        <a href="<?= base_url('core/productDetailFg/' . $fg->ID_REPORT_COMPLAIN_DTL_FG . '/' . $dc->ID_REPORT_COMPLAIN_HEADER) ?>" 
                                                                           data-toggle="modal"  data-target="#add" data-backdrop="true" class="">
                                                                            <i class="fa fa-edit"></i> 
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <?php
                                                            $idx1++;
                                                        }
                                                    }
                                                    ?>
                                                    <!--<div class='separator'></div>-->
                                                </table> 
                                            </div>
                                        </div>
                                        <?php if ($tahap != 3) { ?>    
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="7" style="text-align: center;align-content: center; width: 100%">
                                                        <a href="<?= base_url('core/productDetailFg/-1/' . $dc->ID_REPORT_COMPLAIN_HEADER) ?>" 
                                                           data-toggle="modal"  data-target="#add" data-backdrop="true" class="">
                                                            <i class="fa fa-plus"></i> Add Finish Goods
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php } ?>    

                                    </div>
                                    <div class="tab-pane" id="profile-<?= $a++ ?>">
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #f2f2f2">
                                            <div class="x_panel"  style="background-color:#2f9ad599">
                                                <div class="x_title">
                                                    <?php
                                                    echo '<h2 style="color:#fff">Handling</h2>';
                                                    ?>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <ul class="list-unstyled timeline">
                                                        <?php
                                                        $indx = 1;
                                                        foreach ($dataProdukDetailHandling as $hdl) {
                                                            if ($dc->ID_REPORT_COMPLAIN_HEADER == $hdl->ID_REPORT_COMPLAIN_HEADER) {
                                                                $color = ($indx % 2 == 0) ? "#c6ddff" : "#f1faff";
                                                                ?>

                                                                <li style="background-color: <?= $color ?>">
                                                                    <div class="block">
                                                                        <div class="tags">
                                                                            <a href="#" class="tag" style="font-family: Trebuchet MS; font-size:11px; background-color: #79B0B080">
                                                                                <span><?= $hdl->NAMA_DEPARTMENT ?></span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="block_content">
                                                                            <h2 class="title">
                                                                                <a style="font-family: Trebuchet MS; font-size:13px; color: #767676"><?= $hdl->HANDLING_REPORT ?></a>
                                                                            </h2>
                                                                            <div class="byline">
                                                                                <span><?= $hdl->DATE_HANDLING ?></span> by <a><?= $hdl->NAMA_KARYAWAN ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php
                                                                $indx++;
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($tahap != 3) { ?>    
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="7" style="text-align: center;align-content: center; width: 100%">
                                                        <a href="<?= base_url('core/productDetailHandling/-1/' . $dc->ID_REPORT_COMPLAIN_HEADER) ?>" 
                                                           data-toggle="modal"  data-target="#add" data-backdrop="true" class="">
                                                            <i class="fa fa-plus"></i> Add Complaint Handling
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>

<br>
<br>

