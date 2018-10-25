<script>
    $(document.body).on('hidden.bs.modal', function () {
        $('#add').removeData('bs.modal')
    });
    $(document).on('hidden.bs.modal', function (e) {
        $(e.target).removeData('bs.modal');
    });
</script>