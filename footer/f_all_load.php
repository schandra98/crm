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
<script src="<?= base_url() ?>assets/vendors/Added/js/bootstrap-table-expandable.js"></script>

<!-- Datatables -->
<script>

    function dataTablesbtn() {
        var handleDataTableButtons = function () {
            if ($(".datatable-buttons").length) {
                $(".datatable-buttons").DataTable({
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
                    pageLength: 5,
                    responsive: true,
                    "dom": '<"top"lBf>rt<"bottom"ip><"clear">'
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
    }
    function dataTablesbtn2() {
        var handleDataTableButtons = function () {
            if ($(".datatable-buttons").length) {
                $(".datatable-buttons").DataTable({
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
                    pageLength: 5,
                    responsive: true,
                    "sDom": '<"top"rt<"clear">><"bottom" p><"clear">'

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
    }

    function loaddataTable() {

        if (detectmob() == true) {
            dataTablesbtn2();
        } else {
            dataTablesbtn();
        }

    }
    $(document).ready(function () {
        loaddataTable();
    });
</script>
