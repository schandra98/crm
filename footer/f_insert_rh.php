<script type="text/javascript">
    $(function () {
        changetextbox();
    });

    function changetextbox()
    {
        var val = document.getElementById("input-dnr").value;
        if (val.toString() === '5' | val.toString() === '13') {
            $('#input-proses3').prop('disabled', false);
            $('#proses3').prop('hidden', false);
            $('#disposisi').removeClass('col-md-12');
            $('#disposisi').addClass('col-md-6');
        } else {
            $('#input-proses3').prop('disabled', true);
            $('#proses3').prop('hidden', true);
            $('#disposisi').removeClass('col-md-6');
            $('#disposisi').addClass('col-md-12');
        }
    }
</script>

<script>
    function hapus_file() {
        if (confirm('Anda yakin ingin menghapus file ini?')) {
            document.getElementById("old_file").innerHTML = "Data Lama Terhapus";
            document.getElementById("input-userfile").value = "";
        }
    }
</script>