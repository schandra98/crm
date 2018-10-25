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

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input name="input-user-username" type="text" class="form-control" placeholder="Username" value="<?= $users["USERNAME"] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input name="input-user-password" type="password" class="form-control" placeholder="Password" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Karyawan <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="input-id_karyawan" class="select2_single form-control" tabindex="-1">
                                <option disabled selected="true">Pilih Karyawan</option>
                                <?php
                                if (isset($dataKaryawan)) {
                                    foreach ($dataKaryawan as $var) {
                                        if ($var->id_karyawan == $users["ID_KARYAWAN"]) {
                                            echo '<option value="' . $var->id_karyawan . '#' . $var->nama_karyawan . '" selected="true">' . $var->nama_karyawan . '</option>';
                                        } else {
                                            echo '<option value="' . $var->id_karyawan . '#' . $var->nama_karyawan . '">' . $var->nama_karyawan . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Department <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="input-id_department" class="select2_single form-control" tabindex="-1">
                                <option disabled selected="true"> Pilih Department</option>
                                <?php
                                if (isset($dataDepartment)) {
                                    foreach ($dataDepartment as $var) {
                                        if ($var->id_department == $users["ID_DEPARTMENT"]) {
                                            echo '<option value="' . $var->id_department . '#' . $var->nama_department . '" selected="true">' . $var->nama_department . '</option>';
                                        } else {
                                            echo '<option value="' . $var->id_department . '#' . $var->nama_department . '">' . $var->nama_department . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Aktif </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="input_aktif" required="required" >
                                <option selected disabled="" value="-1">Pilih Aktif</option>
                                <?php if ($users["AKTIF"] == "0") { ?>
                                    <option value="0" selected="true">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                <?php } elseif ($users["AKTIF"] == "1") { ?>
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

                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Level Tahap <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="level_tahap">
                                <option disabled selected="true">Pilih Level Tahap</option>
                                <?php
                                for ($i = -1; $i <= 10; $i++) {
                                    $selc = ($users["LEVEL_TAHAP"] == $i) ? "selected" : "";
                                    echo "<option value='$i' $selc>$i</option>";
                                }
                                ?>
                            </select>
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
                            <a class="btn btn-danger pull-right" href="<?= base_url('Delete/deleteUsers/' . $users["ID_USER"]); ?>" onclick="return confirm('Are you sure to Delete?');"> <i class="fa fa-trash" ></i> Delete </a>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once (APPPATH . 'views/layout/footer/f_all_insert.php'); ?>