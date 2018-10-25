<div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $title ?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-dismiss="modal" class="close-link"><span>Close </span><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="POST" id="form-part" action="<?= $link; ?>">                
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >Nama Pelanggan<span class=""></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="input-pelanggan" id="input-pelanggan" class="select2_single form-control" tabindex="2" >
                                    <option selected="" disabled="" value="-1">Nama Pelanggan</option>
                                    <?php
                                    if (isset($dataMCS)) {
                                        foreach ($dataMCS as $var) {
                                            if (trim($var->KODE) == $dataReportComplainHeader['KODE']) {
                                                echo '<option value="' . $var->KODE . '" selected="true">' . $var->NAMA . '</option>';
                                            } else {
                                                echo '<option value="' . $var->KODE . '">' . $var->NAMA . '</option>';
                                            }
                                        }
                                    }
                                    ?> 
                                </select>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >Nama Sales<span class=""></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="input-sales" id="input-pic" class="select2_single form-control" tabindex="2" >
                                    <option selected="" disabled="" value="-1">Nama Sales</option>
                                    <?php
                                    if (isset($dataSales)) {
                                        foreach ($dataSales as $var) {
                                            if ($var->KODE_SALES == $dataReportComplainHeader["KODE_SALES"]) {
                                                echo '<option value="' . $var->KODE_SALES . '" selected="true">' . $var->NAMA_SALES . '</option>';
                                            } else {
                                                echo '<option value="' . $var->KODE_SALES . '">' . $var->NAMA_SALES . '</option>';
                                            }
                                        }
                                    }
                                    ?> 
                                </select>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12" >
                                <label style="font-family: Trebuchet MS" class="control-label">Tanggal Surat Keluhan </label>
                            </div>  
                            <div class="col-md-12 col-sm-12 col-xs-12" >
                                <?php if ("" != $dataReportComplainHeader["DATE_COMPLAIN"]) { ?>
                                    <input name="input-tgl_surat_keluhan" id="input-tgl_surat_keluhan" tabindex="1" class="input-tanggal date-picker form-control col-md-7 col-xs-12" type="text" value="<?= date("d/m/Y", strtotime($dataReportComplainHeader["DATE_COMPLAIN"])) ?>" onchange="updateDate();">
                                <?php } else { ?>
                                    <input name="input-tgl_surat_keluhan" id="input-tgl_surat_keluhan" tabindex="1" class="input-tanggal date-picker form-control col-md-7 col-xs-12" placeholder="Pilih Tanggal"  type="text" value="" onchange="updateDate();">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12" >
                                <label style="font-family: Trebuchet MS" class="control-label">Tanggal Retur/Sample </label>
                            </div>  
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if ("" != $dataReportComplainHeader["DATE_RETUR_SAMPLE"]) { ?>
                                    <input name="input-tgl_retur"  tabindex="1" class="input-tanggal date-picker form-control col-md-7 col-xs-12" type="text" value="<?= date("d/m/Y", strtotime($dataReportComplainHeader["DATE_RETUR_SAMPLE"])) ?>">
                                <?php } else { ?>
                                    <input name="input-tgl_retur"  tabindex="1" class="input-tanggal date-picker form-control col-md-7 col-xs-12" placeholder="Pilih Tanggal"  type="text" value="" >
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >No Surat Keluhan<span class=""></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if ("" != $dataReportComplainHeader['NO_SURAT_KELUHAN']) { ?>
                                    <input type="text" class="form-control" name="input-no_nurat_keluhan" placeholder="No Surat Keluhan" value="<?= $dataReportComplainHeader['NO_SURAT_KELUHAN'] ?>">
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="input-no_nurat_keluhan" placeholder="No Surat Keluhan" value="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >No Surat Jalan<span class=""></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if ("" != $dataReportComplainHeader['NO_SURAT_JALAN']) { ?>
                                    <input type="text" class="form-control" name="input-no_nurat_jalan" placeholder="No Surat Jalan"  value="<?= $dataReportComplainHeader['NO_SURAT_JALAN'] ?>">
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="input-no_nurat_jalan" placeholder="No Surat Jalan"  value="">
                                <?php } ?>                            
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label" >Pilih Jenis Produk<span class=""></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="input-product_header" id="input-pic" class="select2_single form-control" tabindex="2" onchange="leaveChange(this.options[this.selectedIndex].value)">
                                    <option selected="" disabled="" value="-1">Pilih Jenis Produk</option>
                                    <?php
                                    if (isset($dataProdukHeader)) {
                                        foreach ($dataProdukHeader as $var) {
                                            if ($var->ID_PRODUCT_HEADER == $dataReportComplainHeader["ID_PRODUCT_HEADER"]) {
                                                echo '<option value="' . $var->ID_PRODUCT_HEADER . '" selected="true">' . $var->PRODUCT_HEADER . '</option>';
                                            } else {
                                                echo '<option value="' . $var->ID_PRODUCT_HEADER . '">' . $var->PRODUCT_HEADER . '</option>';
                                            }
                                        }
                                    }
                                    ?>    
                                </select>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12" id="keterangan-produk" style="display: none">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12" >  
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label style="font-family: Trebuchet MS" class="control-label">Keterangan Produk<span ></span></label>
                                </div>
                                <input type="text" class="form-control"  name="input-keterangan_produk" placeholder="Keterangan Produk" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="ln_solid"></div>
                <font style="font-size: 17px; font-family: Century Gothic">&nbsp;&nbsp;PERMINTAAN DARI PELANGGAN ATAS KELUHAN</font>
                <br><br>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if ("" != $dataReportComplainHeader["COMPLAIN"]) { ?>
                                    <textarea name="input-komplain" class="resizable_textarea form-control" placeholder="Masukkan Keterangan" tabindex="5"><?= $dataReportComplainHeader["COMPLAIN"] ?></textarea>                                   
                                <?php } else { ?>
                                    <textarea name="input-komplain" class="resizable_textarea form-control" placeholder="Masukkan Keterangan" tabindex="5"></textarea>                                   
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <font style="font-size: 17px; font-family: Century Gothic">&nbsp;&nbsp;UNTUK DIBUATKAN LAPORAN HASIL IDENTIFIKASI KELUHAN</font>
                <br><br>
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >Ditujukan Kepada<span class=""></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="input-kepada" id="input-pic" class="select2_single form-control" tabindex="2" >
                                    <option selected disabled="" value="-1">Ditujukan Kepada</option>
                                    <?php
                                    foreach ($dataDepartment as $dpt) {
                                        if ($dataReportComplainHeader["NAMA_DEPARTMENT"] == $dpt->nama_department) {
                                            ?>
                                            <option value="<?= $dpt->id_department . "#" . $dpt->nama_department ?>" selected><?= $dpt->nama_department ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $dpt->id_department . "#" . $dpt->nama_department ?>" ><?= $dpt->nama_department ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >Batas Waktu (3 hari)<span class=""></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if ("" != $dataReportComplainHeader["BATAS_WAKTU"]) { ?>
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="input-batas_waktu" id='input-batas_waktu' readonly placeholder="Batas Waktu Penyerahan" value="<?= date("d/m/Y", strtotime($dataReportComplainHeader["BATAS_WAKTU"])) ?>" >
                                <?php } else { ?>
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="input-batas_waktu" id='input-batas_waktu' readonly placeholder="Batas Waktu Penyerahan" value="<?= date("d/m/Y", strtotime($dataReportComplainHeader["BATAS_WAKTU"] . "+ 3 day")) ?>">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >Keterangan Tambahan<span class=""></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if ("" != $dataReportComplainHeader["KETERANGAN_TAMBAHAN"]) { ?>
                                    <textarea name="input-keterangan_tambahan" class="resizable_textarea form-control" placeholder="Keterangan Tambahan" tabindex="5"><?= $dataReportComplainHeader["KETERANGAN_TAMBAHAN"] ?></textarea>                                   
                                <?php } else { ?>
                                    <textarea name="input-keterangan_tambahan" class="resizable_textarea form-control" placeholder="Keterangan Tambahan" tabindex="5"></textarea>                                   
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <?php
                                if ($dataReportComplainHeader["TAHAP"] != 2) {
                                    if ($action == 'add') {
                                        ?>
                                        <button type="submit" class="btn btn-success pull-right">
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                    <?php } else { ?>
                                        <a class="btn btn-danger pull-right" href="<?= ($linkDelete) ?>" 
                                           onclick="return confirm('Are you sure to Delete?');"> <i class="fa fa-trash" ></i> Delete 
                                        </a>
                                        <button type="submit" class="btn btn-warning pull-right">
                                            <i class="fa fa-save"></i> Update
                                        </button>
                                        <?php
                                    }
                                } elseif ($dataReportComplainHeader["TAHAP"] == 2) {
                                    if ($action == 'add') {
                                        ?>
                                        <button type="submit" class="btn btn-success pull-right">
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                    <?php } else { ?>
                                        <a class="btn btn-danger pull-right" href="<?= ($linkDelete) ?>" 
                                           onclick="return confirm('Are you sure to Delete?');"> <i class="fa fa-trash" ></i> Delete 
                                        </a>
                                        <button type="submit" class="btn btn-warning pull-right">
                                            <i class="fa fa-save"></i> Update
                                        </button>
                                        <a class="btn btn-primary pull-right" href="<?= ($linkUpdate) ?>"> 
                                            <i class="fa fa-check" ></i> Finish 
                                        </a>
                                        <?php
                                    }
                                }
                            
                            ?>

                        </div>
                    </div>
                </div>
            </form>
            <br>
            <br>
        </div>
    </div>
</div>



<?php include_once (APPPATH . 'views/layout/footer/f_all_insert.php'); ?>

