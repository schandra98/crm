<div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $title ?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a data-dismiss="modal" class="close-link"><span>Close</span><i class="fa fa-close"></i></a>
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
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label style="font-family: Trebuchet MS" class="control-label " >Handling Report<span class="required"></span></label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php if ("" != $dataProdukDetailHandling["HANDLING_REPORT"]) { ?>
                                        <textarea name="input-handling_report<?= $form ?>" id="keluhan-<?= $form ?>" class="resizable_textarea form-control" placeholder="Keterangan Keluhan" tabindex="5"><?= $dataProdukDetailHandling["HANDLING_REPORT"] ?></textarea>                                   
                                    <?php } else { ?>
                                        <textarea name="input-handling_report<?= $form ?>" id="keluhan-<?= $form ?>" class="resizable_textarea form-control" placeholder="Keterangan Keluhan" tabindex="5"></textarea>                                   
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
                                    <i class="fa fa-plus"></i> Tambah Report
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







