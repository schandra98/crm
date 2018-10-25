<div class="x_panel">
    <div class="x_title">
        <?php
        echo "<h5>INSERT REPORT APPROACH DATA";
        echo '</h5>';
        ?>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form class="form-horizontal form-label-left" method="POST" id="form-part" action="<?= $link ?>"> 
            <div class="row">
                <div id="step-2">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="StepTitle">Approach Date</h5>

                                <?php if ("" != $dataReportApproach["DATE_APPROACH"]) { ?>
                                    <input name="input-tgl_approach" id="input-tgl_approach" tabindex="1" class="input-tanggal date-picker form-control col-md-12 col-xs-12" placeholder="DD/MM/YYYY" type="text" value="<?= date("d/m/Y", strtotime($dataReportApproach["DATE_APPROACH"])) ?>" >
                                <?php } else { ?>
                                    <input name="input-tgl_approach" id="input-tgl_approach" tabindex="1" class="input-tanggal date-picker form-control col-md-12 col-xs-12" placeholder="DD/MM/YYYY" type="text" onchange="setVal(this)">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step-3">
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="StepTitle">Choose Type of Customer</h5>
                                <select name="input-contact" id='customer' class="select2_single form-control" tabindex="2" onchange="leaveChange1(this.options[this.selectedIndex].value)">
                                    <option selected="" disabled="" value="">Choose Type of Customer</option>
                                    <?php if ("" != $dataReportApproach["KODE"]) { ?>
                                        <option value="1" selected>Existing Customer</option>
                                        <option value="0" >Prospective Customer</option>
                                    <?php } elseif ("" != $dataReportApproach["ID_CONTACT"]) { ?>
                                        <option value="1" >Existing Customer</option>
                                        <option value="0" selected >Prospective Customer</option>
                                    <?php } else { ?>
                                        <option value="1" >Existing Customer</option>
                                        <option value="0" >Prospective Customer</option>
                                    <?php } ?>
                                </select> 
                            </div>
                        </div>
                    </div>    
                    <div id="existing" value="1" style="display: none">
                        <div class="col-md-6 col-xs-12" >
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5 class="StepTitle">Existing Customer</h5>
                                    <select name="input-customerexist" id='input-customerexist' class="select2_single form-control" tabindex="2" >
                                        <option selected="" disabled="" value="">Existing Customer</option>
                                        <?php
                                        foreach ($dataCustomerExst as $var) {
                                            if ($dataReportApproach["KODE"] == $var->KODE) {
                                                echo '<option value="' . trim($var->KODE) . '" selected>' . $var->NAMA . '</option>';
                                            } else {
                                                echo '<option value="' . trim($var->KODE) . '">' . $var->NAMA . '</option>';
                                            }
                                        }
                                        ?>   
                                    </select>   

                                </div>
                            </div>
                        </div>  
                    </div>
                    <div id="prosp" value="0" style="display: none">
                        <div class="col-md-3 col-xs-12" >
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5 class="StepTitle">Prospective Company</h5>
                                    <select name="input-customercomp" id='input-customercomp' class="select2_single form-control" tabindex="2" onchange="showCustContact()">
                                        <option selected="" disabled="" value="">Customer's Company</option>
                                        <?php
                                        foreach ($dataCustomerProsp as $var) {
                                            if ($dataReportApproach["ID_COMPANY"] == $var->ID_COMPANY) {
                                                echo '<option value="' . $var->ID_COMPANY . '" selected>' . $var->COMPANY_NAME . '</option>';
                                            } else {
                                                echo '<option value="' . $var->ID_COMPANY . '">' . $var->COMPANY_NAME . '</option>';
                                            }
                                        }
                                        ?> 
                                    </select>                            
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12" >
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5 class="StepTitle">Prospective Customer</h5>
                                    <select name="input-customerpros" id='input-customerpros' class="select2_single form-control" tabindex="2" >
                                        <option selected="" disabled="" value="">Prospective Customer</option>
                                    </select>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h5 class="StepTitle">Kategori Produk</h5>
                            <select name="input-product_header" id='input-product_header'  class="select2_single form-control" tabindex="2" onchange="showProductDetail();">
                                <option selected="" disabled="" value="">Kategori Produk</option>
                                <?php
                                foreach ($dataProdukHeader as $var) {
                                    if ($dataReportApproach["ID_PRODUCT_HEADER"] == $var->ID_PRODUCT_HEADER) {
                                        echo '<option value="' . $var->ID_PRODUCT_HEADER . '" selected>' . $var->PRODUCT_HEADER . '</option>';
                                    } else {
                                        echo '<option value="' . $var->ID_PRODUCT_HEADER . '">' . $var->PRODUCT_HEADER . '</option>';
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
                            <h5 class="StepTitle">Produk</h5>
                            <select name="input-product_detail" id='input-product_detail' class="select2_single form-control" tabindex="2" onchange="leaveChange5(this.id, 'keterangan-produk_d')">
                                <option selected="" disabled="" value="">Produk</option>
                            </select>   
                        </div>
                    </div>
                </div>   
                <div class="col-md-3 col-xs-12" id="keterangan-produk_d" style="display: none">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12" >  

                            <h5 class="StepTitle">Keterangan Produk</h5>               

                            <input type="text" class="form-control"  name="keterangan-produk_d" placeholder="Keterangan Produk" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h5 class="StepTitle">Media</h5>
                            <select name="input-media" id='input-media' class="select2_single form-control" tabindex="2" onchange="leaveChange5(this.id, 'keterangan-media')">
                                <option selected="" disabled="" value="">Produk</option>
                                <?php
                                foreach ($dataMedia as $var) {
                                    if ($dataReportApproach["ID_MEDIA"] == $var->ID_MEDIA) {
                                        echo '<option value="' . $var->ID_MEDIA . '" selected>' . $var->MEDIA . '</option>';
                                    } else {
                                        echo '<option value="' . $var->ID_MEDIA . '">' . $var->MEDIA . '</option>';
                                    }
                                }
                                ?>   
                            </select>   
                        </div>
                    </div>
                </div>   
                <div class="col-md-3 col-xs-12" id="keterangan-media" style="display: none">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">  
                            <h5 class="StepTitle">Keterangan Media</h5>
                            <input type="text" class="form-control"  name="keterangan-media" placeholder="Keterangan Media" value="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="step-7">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="StepTitle">Report</h5>
                                <?php if ("" != $dataReportApproach["REPORT"]) { ?>
                                    <textarea name="input-report" id='input-report' class="resizable_textarea form-control" placeholder="Masukkan Report" tabindex="5"><?= $dataReportApproach["REPORT"] ?></textarea>                                   
                                <?php } else { ?>
                                    <textarea name="input-report" id='input-report' class="resizable_textarea form-control" placeholder="Masukkan Report" tabindex="5"></textarea>                                   
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="step-6">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-right ">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="StepTitle">Kategori Report</h5>
                                    <select name="input-kategori[]" id="input-kategori" class="select2_multiple form-control" multiple="" tabindex="2">
                                        <?php
                                        if (isset($dataKategori)) {
                                            foreach ($dataKategori as $var) {
                                                $selected = (strpos($dataReportApproach["ID_KATEGORI"], ',' . $var->ID_KATEGORI . ',') !== FALSE) ? 'selected' : "";
                                                echo '<option value="' . $var->ID_KATEGORI . '" ' . $selected . '>' . $var->KATEGORI . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="row ">
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <?php if ($action == 'add') { ?>
                            <button type="submit" class="btn btn-success pull-right">
                                <i class="fa fa-save"></i> Save
                            </button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-warning pull-right">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a class="btn btn-danger pull-right" href="<?= ($linkDelete) ?>" 
                               onclick="return confirm('Are you sure to Delete?');"> <i class="fa fa-trash" ></i> Delete 
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
    </div>           
</div>           







<?php include_once (APPPATH . "views/layout/footer/f_insert_report.php") ?>  

