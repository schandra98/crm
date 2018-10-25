<!-- bootstrap-daterangepicker -->
<script src="<?= base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- jQuery Tags Input -->
<script src="<?= base_url() ?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Autosize -->
<script src="<?= base_url() ?>assets/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?= base_url() ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- jquery.inputmask -->
<script src="<?= base_url() ?>assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?= base_url() ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Bootstrap Modal Alert -->




<!-- bootstrap-daterangepicker -->
<script>
    function dp() {
        $("input.datetime-range").rangeDateTimePicker();
        $("input.time-range").rangeTimePicker();
        $("input.input-tanggal-waktu").singleDateTimePicker();
        $("input.input-tanggal").singleDatePicker();
    }
    $.fn.singleDatePicker = function () {
        $(this).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format('DD/MM/YYYY'));
        });
        return $(this).daterangepicker({
//            format: "YYYY-MM-DD" ,
            singleDatePicker: true,
            autoUpdateInput: false,
            locale: {
                format: "DD/MM/YYYY"
            }
        });
    };
    $.fn.rangeDatePicker = function () {
        $(this).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });
        return $(this).daterangepicker({
            singleDatePicker: false,
            autoUpdateInput: false
        });
    };
    $.fn.singleDateTimePicker = function () {
        $(this).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format('DD/MM/YYYY'));
        });
        return $(this).daterangepicker({
            timePicker: true,
            singleDatePicker: true,
            timePicker24Hour: true,
            autoUpdateInput: false
        });
    };
    $.fn.rangeDateTimePicker = function () {
        $(this).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format('DD/MM/YYYY HH:mm') + ' - ' + picker.endDate.format('DD/MM/YYYY HH:mm'));
        });
        return $(this).daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            autoUpdateInput: false
        });
    };
    $.fn.TimePicker = function () {
        $(this).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format('DD/MM/YYYY HH:mm') + ' - ' + picker.endDate.format('DD/MM/YYYY HH:mm'));
        });
        return $(this).daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: true,
            autoUpdateInput: false
        });
    };
    $.fn.rangeTimePicker = function () {
        $(this).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format('HH:mm') + ' - ' + picker.endDate.format('HH:mm'));
        });
        return $(this).daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            autoUpdateInput: false
        });
    };
    function inputmask() {
        $(":input").inputmask()
    }

    function select2() {
        $(".select2_single").select2({

            width: '100%'
        });
        $(".select2_group").select2({
            width: '100%'
        });
        $(".select2_multiple").select2({
            maximumSelectionLength: 50,
            placeholder: "",
            allowClear: true,
            width: '100%'
        });
        $.fn.modal.Constructor.prototype.enforceFocus = function () {

        };
    }

    function autosize() {
        autosize($('.resizable_textarea'));
    }

    var navbar = document.getElementById("sample");
    function myFunction() {
        if (window.pageYOffset >= 120) {
            navbar.classList.add("sticky")
            // alert(navbar);
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>

<script type="text/javascript">

    function tambahBarang(brg) {
        var id = $(brg).attr('id').split('-btn');
        var num = parseInt(id, 20) + 1;
        document.getElementById("row-" + (num)).style.display = "block";
        document.getElementById((num - 1) + "-btn").id = (num) + "-btn";
        if (num == 10) {
            document.getElementById((num) + "-btn").style.display = "none";
        }
    }
    function smartwizard() {
        $('#wizard').smartWizard();
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonNext').addClass('btn btn-success');
        $('.buttonFinish').addClass('btn btn-default');
    }
    function leaveChange(val) {
        var disp = (val == 8) ? "block" : "none";
        document.getElementById("keterangan-produk").style.display = disp;
    }
    
</script>
<script>
    function load_all() {
        dp();
        select2();
        inputmask();
        smartwizard();
      
    }
    $(document).ready(function () {
        load_all();
    });


</script>

    