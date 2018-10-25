
<script src="<?= base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/vendors/jquery-tabledit/jquery.tabledit.js"></script>

<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($(".datatable").length) {
                $(".datatable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        TableManageButtons.init();
    });
</script>

<?php
if ($title == 'List Sales') {
    ?>
    <script>
        $(function () {
            $('#datatable-sales').Tabledit({
                url: '<?php echo base_url('update/updateSales'); ?>',
                editButton: true,
                deleteButton: true,
                hideIdentifier: false,
                columns: {
                    identifier: [1, 'USERNAME'],
                    editable: [[2, 'PASSWORD'], [4, 'KODE_SALES']]
                },
                onSuccess: function () {
                    window.location.reload();
                },
                onFail: function (jqXHR, textStatus, errorThrown) {
                    console.debug(errorThrown);
                    //                window.location.reload();
                }
            });
        });

        $(document).ready(function () {
            $('#datatable-report').click(function () {
                var href = $(this).find("a").attr("href");
                if (href) {
                    window.location = href;
                }
            });
        });
    </script>
    <?php
} else if ($title == 'List User') {
    ?>
    <script>
        $(function () {
            $('#datatable-user').Tabledit({
                url: '<?php echo base_url('update/updateUsers'); ?>',
                editButton: true,
                deleteButton: true,
                hideIdentifier: false,
                columns: {
                    identifier: [1, 'USERNAME'],
                    editable: [[2, 'PASSWORD'], [3, 'HAK_AKSES'], [4, 'KODE_SALES']]
                },
                onSuccess: function () {
                    window.location.reload();
                },
                onFail: function (jqXHR, textStatus, errorThrown) {
                    console.debug(errorThrown);
                    //                window.location.reload();
                }
            });
        });
    </script>
    <?php
}
?>