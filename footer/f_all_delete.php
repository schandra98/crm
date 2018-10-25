<script>
    function deletePermintaan(id) {
        if (confirm('Are You Sure to Delete This Data?')) {
            var data = 'id_permintaan=' + id;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('delete/deletePermintaan'); ?>',
                data: data,
                success: function (response) {
                    refresh();
                },
                error: function (xhr, err) {
                    console.log("responseText: " + xhr.responseText);
                }
            });
            // Save it!
        } else {
            // Do nothing!
        }
        return false;
    }
</script>

<script>
    function deleteKegiatan(id) {
        if (confirm('Are You Sure to Delete This Data?')) {
            var data = 'id_kegiatan=' + id;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('delete/deleteKegiatan'); ?>',
                data: data,
                success: function (response) {
                    refresh();
                },
                error: function (xhr, err) {
                    console.log("responseText: " + xhr.responseText);
                }
            });
            // Save it!
        } else {
            // Do nothing!
        }
        return false;
    }
</script>