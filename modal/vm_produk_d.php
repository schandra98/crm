<div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $title ?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-dismiss="modal" class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="POST" id="form-users" action="<?= $link ?>">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >NAMA PRODUK <span class="required"></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="barang_h" class="select2_single form-control" tabindex="-1">
                                    <option disabled selected="false">NAMA PRODUK</option>
                                    <?php
                                    if (isset($dataReport)) {
                                        foreach ($dataReport as $var) {
                                            if ($barang_d["ID_PRODUCT_HEADER"] == $var->ID_PRODUCT_HEADER) {
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
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >NAMA PRODUK DETAIL<span class="required"></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="header_barang_d"  placeholder="NAMA PRODUK DETAIL" required="required" value="<?= $barang_d['PRODUCT_DETAIL'] ?>">
                            </div>
                        </div>
                    </div>
                
                
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >KETERANGAN<span class="required"></span></label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="keterangan-barang_d"  placeholder="KETERANGAN"  value="<?= $barang_d['KETERANGAN_PRODUK_DETAIL'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label style="font-family: Trebuchet MS" class="control-label " >AKTIF<span class="required"></span></label>
                            </div>                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="input_aktif" required="required" >
                                    <option selected disabled="" value="-1">Pilih Aktif</option>
                                    <?php if ($barang_d["AKTIF"] == "0") { ?>
                                        <option value="0" selected="true">Tidak Aktif</option>
                                        <option value="1">Aktif</option>
                                    <?php } elseif ($barang_d["AKTIF"] == "1") { ?>
                                        <option value="0">Tidak Aktif</option>
                                        <option value="1" selected>Aktif</option>
                                    <?php } else { ?>
                                        <option value="0">Tidak Aktif</option>
                                        <option value="1">Aktif</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="ln_solid"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <?php if ($action == 'add') { ?>
                            <button type="submit" class="btn btn-success pull-right">
                                <i class="fa fa-save"></i> Save
                            </button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-success pull-right">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a class="btn btn-danger pull-right" href="<?= base_url('Delete/deleteDetailBarang/' . $barang_d["ID_PRODUCT_DETAIL"]); ?>" onclick="return confirm('Are you sure to Delete?');"> <i class="fa fa-trash" ></i> Delete </a>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once (APPPATH . 'views/layout/footer/f_all_insert.php'); ?>