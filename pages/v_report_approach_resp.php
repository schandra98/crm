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
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive datatable-buttons" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date Approach</th>
                    <th>Nama Sales</th>
                    <th>Kategori Produk</th>
                    <th>Produk</th>
                    <th>Keterangan Prod Detail</th>
                    <th>Media</th>
                    <th>Keterangan Media</th>
                    <th>Kategori Report</th>
                    <th>Company Name</th>
                    <th>Prospective Customer Name</th>
                    <th>Existing Customer Name</th>
                    <th>Report</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = 1;
                foreach ($dataReportApproach as $dra) {
                    $color = ($a % 2 == 0) ? "#f7f7f7" : "#e3e3e3";
                    ?>
                    <tr style="color: #0D3349">
                        <td><?= $a++ ?></td>
                        <td><?= $dra->DATE_APPROACH ?></td>
                        <?php
                        foreach ($dataSales as $var2) {
                            if ($dra->KODE_SALES == $var2->KODE_SALES) {
                                echo '<td>' . $var2->NAMA_SALES . '</td>';
                            }
                        }
                        ?>
                        <td><?= $dra->PRODUCT_HEADER ?></td>
                        <td><?= $dra->PRODUCT_DETAIL ?></td>
                        <?php if ("" != $dra->KETERANGAN_PD) { ?>
                            <td><?= $dra->KETERANGAN_PD ?></td>
                        <?php } else { ?>
                            <td>-</td>
                        <?php } ?>
                        <td><?= $dra->MEDIA ?></td>
                        <?php if ("" != $dra->KETERANGAN_M) { ?>
                            <td><?= $dra->KETERANGAN_M ?></td>                                  
                        <?php } else { ?> 
                            <td>-</td>                                  
                        <?php } ?> 
                        <td>
                            <?php
                            foreach ($dataKategori as $var) {
                                $kategori = (strpos($dra->ID_KATEGORI, ',' . $var->ID_KATEGORI . ',') !== FALSE) ? $var->KATEGORI . ', ' : " ";
                                echo $kategori;
                            }
                            ?>
                        </td>
                        <td><?= $dra->COMPANY_NAME ?></td>
                        <td><?= $dra->NAME ?></td>
                        <td><?= $dra->NAMA ?></td>
                        <td><?= $dra->REPORT ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<br>
<br>
<br>




