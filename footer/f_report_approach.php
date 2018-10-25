<script>
    function select2trigger() {
        $("#customer").val("1").trigger("change");
    }

    function tambahBarang(brg) {
        var id = $(brg).attr('id').split('-btn');
        var num = parseInt(id, 20) + 1;
        document.getElementById("row-" + (num)).style.display = "block";
        document.getElementById((num - 1) + "-btn").id = (num) + "-btn";
        if (num == 10) {
            document.getElementById((num) + "-btn").style.display = "none";
        }
    }
    
    function leaveChange2(val) {
        if (val == 0) {
            document.getElementById("customer1").style.display = "block";
            document.getElementById("customer3").style.display = "block";
            document.getElementById("customer2").style.display = "none";
            document.getElementById("sum-customerpros").style.display = "block";
            document.getElementById("sum-customerp").style.display = "block";
            document.getElementById("sum-customercomp").style.display = "block";
            document.getElementById("sum-customerc").style.display = "block";
            document.getElementById("sum-customerexist").style.display = "none";
            document.getElementById("sum-customerex").style.display = "none";
        }
        if (val == 1) {
            document.getElementById("customer1").style.display = "none";
            document.getElementById("customer3").style.display = "none";
            document.getElementById("customer2").style.display = "block";
            document.getElementById("sum-customerpros").style.display = "none";
            document.getElementById("sum-customerp").style.display = "none";
            document.getElementById("sum-customercomp").style.display = "none";
            document.getElementById("sum-customerc").style.display = "none";
            document.getElementById("sum-customerexist").style.display = "block";
            document.getElementById("sum-customerex").style.display = "block";
        }
    }

    function leaveChange2insert2(val) {
        if (val == 0) {
            document.getElementById("customer1").style.display = "block";
            document.getElementById("customer3").style.display = "block";
            document.getElementById("customer2").style.display = "none";
        }
        if (val == 1) {
            document.getElementById("customer1").style.display = "none";
            document.getElementById("customer3").style.display = "none";
            document.getElementById("customer2").style.display = "block";
        }
    }

    function setVal(values) {
        var apro = ($("#input-tgl_approach").val()).toString();
        var tgl_approach = apro.substring(apro.lastIndexOf('#') + 1);
        $("#sum-tgl_approach").val(tgl_approach);
        var id_h = $(values).attr("id").replace('input-', '#sum-');
        var newval = $(values).val();
        var newvalues = newval.substring(newval.lastIndexOf('#') + 1);
        $(id_h).val(newvalues);
    }

    $(document).ready(function () {
        load_all();
        select2trigger();
    });

</script>


