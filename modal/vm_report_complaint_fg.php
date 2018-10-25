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
            <form class="form-horizontal form-label-left" method="POST" id="form-part" action="<?= $link ?>">                
                <?php
                for ($form = 1; $form <= 10; $form++) {
                    ?>
                    <div class="row" id="row-<?= $form ?>" style="display: <?= ($form == 1) ? "block" : "none" ?>">
                        <div class="col-md-2 col-xs-12">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label style="font-family: Trebuchet MS" class="control-label " >Nama Barang<span class=""></span></label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select name="input-barang<?= $form ?>" id="barang-<?= $form ?>" class="select2_single form-control" tabindex="2">
                                        <option selected="" disabled="" value="-1">Nama Barang</option>
                                        <?php
                                        if (isset($dataMasterBarang)) {
                                            foreach ($dataMasterBarang as $var) {
                                                if (($var->KODE_BARANG) == $dataProdukDetailFG['KODE_BARANG']) {
                                                    echo '<option value="' . $var->KODE_BARANG . '" selected="true">' . $var->NAMA_BARANG . '</option>';
                                                } else {
                                                    echo '<option value="' . $var->KODE_BARANG . '">' . $var->NAMA_BARANG . '</option>';
                                                }
                                            }
                                        }
                                        ?> 
                                    </select>                            
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-xs-12" >
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label style="font-family: Trebuchet MS" class="control-label " >Jumlah<span class=""></span></label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php if ("" != $dataProdukDetailFG["JUMLAH"]) { ?>
                                        <input name="input-jumlah<?= $form ?>" type="text" class="form-control" id="jumlah-<?= $form ?>" placeholder="0" value="<?= $dataProdukDetailFG["JUMLAH"] ?>">
                                    <?php } else { ?>
                                        <input name="input-jumlah<?= $form ?>" type="text" class="form-control" id="jumlah-<?= $form ?>" placeholder="0" value="">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label style="font-family: Trebuchet MS" class="control-label">Tanggal Kirim </label>
                                </div>  
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php if ("" != $dataProdukDetailFG["TGL_KIRIM"]) { ?>
                                        <input name="input-tgl_kirim<?= $form ?>" id="tanggal-kirim-<?= $form ?>" tabindex="1" class="input-tanggal date-picker form-control col-md-7 col-xs-12" placeholder="DD-MM-YYYY" type="text" value="<?= date("d/m/Y", strtotime($dataProdukDetailFG["TGL_KIRIM"])) ?>" >
                                    <?php } else { ?>
                                        <input name="input-tgl_kirim<?= $form ?>" id="tanggal-kirim-<?= $form ?>" tabindex="1" class="input-tanggal date-picker form-control col-md-7 col-xs-12" placeholder="DD-MM-YYYY" type="text" value="" >
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12" >
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label style="font-family: Trebuchet MS" class="control-label " >No POI/SP<span class=""></span></label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php if ("" != $dataProdukDetailFG["NO_PO_INTERN"]) { ?>
                                        <input type="text" class="form-control" name="input-no_poi<?= $form ?>" id="jumlah-<?= $form ?>" placeholder="No POI/SP" value="<?= $dataProdukDetailFG["NO_PO_INTERN"] ?>">
                                    <?php } else { ?>
                                        <input type="text" class="form-control" name="input-no_poi<?= $form ?>" id="jumlah-<?= $form ?>" placeholder="No POI/SP" value="">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label style="font-family: Trebuchet MS" class="control-label " >Keterangan Keluhan<span class=""></span></label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php if ("" != $dataProdukDetailFG["KETERANGAN"]) { ?>
                                        <textarea name="input-keterangan<?= $form ?>" id="keluhan-<?= $form ?>" class="resizable_textarea form-control" placeholder="Keterangan Keluhan" tabindex="5"><?= $dataProdukDetailFG["KETERANGAN"] ?></textarea>                                   
                                    <?php } else { ?>
                                        <textarea name="input-keterangan<?= $form ?>" id="keluhan-<?= $form ?>" class="resizable_textarea form-control" placeholder="Keterangan Keluhan" tabindex="5"></textarea>                                   
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($action == 'edit') {
                        break;   
                    }
                }
                ?>
                <div class="ln_solid"></div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                            <?php if ($action == 'add') { ?>
                                <button type="submit" class="btn btn-success pull-right">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <a onclick="tambahBarang(this)" id="1-btn" class="btn btn-primary pull-right" >
                                    <i class="fa fa-plus"></i> Tambah Barang
                                </a>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-success pull-right">
                                    <i class="fa fa-save"></i> Update
                                </button>
                                <a class="btn btn-danger pull-right" href="<?= ($linkDelete) ?>" 
                                   onclick="return confirm('Are you sure to Delete?');"> 
                                    <i class="fa fa-trash" ></i> Delete 
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once (APPPATH . 'views/layout/footer/f_all_insert.php'); ?>







