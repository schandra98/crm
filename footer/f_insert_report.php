<script>
    function select2trigger() {
        var idcust = $("#customer").val();
        $("#customer").val(idcust).trigger("change");
    }
    function leaveChange1(val) {

        if (val == 0) {
            document.getElementById("prosp").style.display = "block";
            document.getElementById("existing").style.display = "none";
        }
        if (val == 1) {
            document.getElementById("existing").style.display = "block";
            document.getElementById("prosp").style.display = "none";
        }
    }
    function leaveChange5(opsi, divAppear) {
        var text = $("option:selected", "#" + opsi).text();
        if (text.toLowerCase().search(/other/) == 0) {
            $("#" + divAppear).css("display", "block");
        } else {
            $("#" + divAppear).css("display", "none");
        }
    }
    function showCustContact() {
        var value = document.getElementById("input-customercomp").options[document.getElementById("input-customercomp").selectedIndex].value;
        var link = "<?= base_url('Forms/showProspectiveCustContact/'); ?>" + value;
        $.ajax({
            url: link,
            success: function (data, textStatus, jqXHR) {
                $("#input-customerpros").empty();
                $("#input-customerpros").append(data);
                $("#input-customerpros").val("<?= $dataReportApproach["ID_CONTACT"]; ?>").trigger("change");
            }
        });
    }
    function showProductDetail() {
        var value = document.getElementById("input-product_header").options[document.getElementById("input-product_header").selectedIndex].value;
        var link = "<?= base_url('Forms/showProductDetail/'); ?>" + value;
//        alert(value);
        $.ajax({
            url: link,
            success: function (data, textStatus, jqXHR) {
                $("#input-product_detail").empty();
                $("#input-product_detail").append(data);
                $("#input-product_detail").val("<?= $dataReportApproach["ID_PRODUCT_DETAIL"]; ?>").trigger("change");
            }
        });
    }
    
    $(document).ready(function () {
        load_all();
<?= ($action == 'edit') ? 
        "select2trigger(); showCustContact(); showProductDetail(); " : ""; ?>
    });

    $(function () {
        $("select").change();
    });
</script>

