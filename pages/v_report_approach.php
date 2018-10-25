<ul class="addstrg">
    <a href="<?= base_url('core/reportApproach/-1') ?>" data-toggle="modal"  data-target="#add" data-backdrop="true" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
</ul>
<div class="x_panel">
    <div class="x_title">
        <?php
        echo '<h5>REPORT APPROACH</h5>';
        ?>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div id="sample">
            <table border="1" width="100%" cellspacing="2" style="margin-top:8px;">
                <tr style="background:#72989B; color:#f7f7f7;">
                    <td width="5%" style="text-align:center;padding: 5px;"><b>No</b></td>
                    <td width="10%" style="text-align:center; padding: 5px;"><b>Date Approach</b></td>
                    <td width="15%" style="text-align:center; padding: 5px;"><b>Nama Sales</b></td>
                    <th width="10%" style="text-align:center; padding: 5px;"><b>Kategori Produk</b></th>
                    <th width="10%" style="text-align:center; padding: 5px;"><b>Produk</b></th>
                    <th width="10%" style="text-align:center; padding: 5px;"><b>Kategori Report</b></th>
                    <th width="5%" style="text-align:center; padding: 5px;"><b>E/D</b></th>
                </tr>
            </table>
        </div>
        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel"> 
                <?php
                $a = 1;
                foreach ($dataReportApproach as $dra) {
                    $color = ($a % 2 == 0) ? "#f7f7f7" : "#e3e3e3";
                    ?>
                    <a class="" role="tab" id="heading<?= $a ?>" data-toggle="collapse" data-parent="#accordion" href="#act<?= $a ?>" aria-expanded="true" aria-controls="act<?= $a ?>">
                        <h4 class="panel-title">
                            <table class="table table-bordered dt-responsive dataTable collapsed" border="1" width="100%" cellspacing="2" style="margin-top:4px;margin-bottom:5px; font-size: 13px; background-color: <?= $color ?>">
                                <tr>
                                    <td width="5%" style="text-align:center;padding: 5px;"><?= $a ?></td>
                                    <td width="10%" style="text-align:center; padding: 5px;"><?= $dra->DATE_APPROACH ?></td>
                                    <?php
                                    foreach ($dataSales as $var2) {
                                        if ($dra->KODE_SALES == $var2->KODE_SALES) {
                                            echo '<td width="15%" style="text-align:center; padding: 5px;">' . $var2->NAMA_SALES . '</td>';
                                        }
                                    }
                                    ?>

                                    <td style="text-align: center;align-content: center; width: 10%"><?= $dra->PRODUCT_HEADER ?></td>
                                    <td style="text-align: center;align-content: center; width: 10%"><?= $dra->PRODUCT_DETAIL ?></td>
                                    <td width="10%" style="text-align:center; padding: 5px;">
                                        <?php
                                        foreach ($dataKategori as $var) {

                                            $kategori = (strpos($dra->ID_KATEGORI, ',' . $var->ID_KATEGORI . ',') !== FALSE) ? $var->KATEGORI . ', ' : " ";
                                            echo $kategori;
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;align-content: center; width: 5%">
                                        <a href="<?= base_url('core/reportApproach/' . $dra->ID_REPORT) ?>" 
                                           data-toggle="modal"  data-target="#add" data-backdrop="true" class="">
                                            <i class="fa fa-edit"></i>                                                
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </h4>
                    </a>
                    <div id="act<?= $a ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $a++ ?>" >
                        <table class="table table-bordered dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr style="color: #0D3349; background-color:#e6ecff;">

                                    <?php if ("" != $dra->KETERANGAN_PD) { ?>
                                        <th width="15%" style="text-align:center; padding: 5px;"><b>Keterangan Prod Detail</b></th>
                                    <?php } ?>
                                    <td width="10%" style="text-align:center; padding: 5px;"><b>Media</b></td>
                                    <?php if ("" != $dra->KETERANGAN_M) { ?>
                                        <th width="15%" style="text-align:center; padding: 5px;"><b>Keterangan Media</b></th>
                                    <?php } ?>
                                    <td width="15%" style="text-align:center; padding: 5px;"><b>Company Name</b></td>
                                    <td width="20%" style="text-align:center; padding: 5px;"><b>Prospective Customer Name</b></td>
                                    <td width="20%" style="text-align:center; padding: 5px;"><b>Existing Customer Name</b></td>

                                </tr>
                            </thead>
                            <tbody>
                                <tr style="color: #0D3349">

                                    <?php if ("" != $dra->KETERANGAN_PD) { ?>
                                        <td style="text-align: center;align-content: center; width: 10%"><?= $dra->KETERANGAN_PD ?></td>
                                    <?php } ?>
                                    <td width="10%" style="text-align:center; padding: 5px;"><?= $dra->MEDIA ?></td>
                                    <?php if ("" != $dra->KETERANGAN_M) { ?>
                                        <td style="text-align: center;align-content: center; width: 10%"><?= $dra->KETERANGAN_M ?></td>                                  
                                    <?php } ?> 
                                    <td width="15%" style="text-align:center; padding: 5px;"><?= $dra->COMPANY_NAME ?></td>
                                    <td width="20%" style="text-align:center; padding: 5px;"><?= $dra->NAME ?></td>
                                    <td width="20%" style="text-align:center; padding: 5px;"><?= $dra->NAMA ?></td>

                                </tr>
                            </tbody>
                        </table > 
                        <table class="table table-bordered dt-responsive" cellspacing="0" width="100%">
                            <tr style="color: #0D3349; background-color:#e6ecff;">
                                <th width="100%" style="text-align:center; padding: 5px;"><b>Report</b></th>
                            </tr>
                            <tr style="color: #0D3349">
                                <td style="text-align: center;align-content: center; width: 100%"><?= $dra->REPORT ?></td>

                            </tr>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

