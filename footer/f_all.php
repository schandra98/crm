
<script>
    //Getting the URL dynamically
    var url = $(location).attr('href');

    // Getting the file name i.e last segment of URL (i.e. example.html)
    var fn = url.split('/').reverse()[0];

    // Getting the extension (i.e. html)
    var ext = url.split('/').reverse()[0].split('.').reverse()[0];

    // Getting the second last segment of URL (i.e. segment1)
    var lm = url.split('/').reverse()[1];

    function refresh() {
        window.location.reload();
    }
    function goBack() {
        window.history.back();
    }

    function detectmob() {
        if (navigator.userAgent.match(/Android/i)
                || navigator.userAgent.match(/webOS/i)
                || navigator.userAgent.match(/iPhone/i)
                || navigator.userAgent.match(/iPad/i)
                || navigator.userAgent.match(/iPod/i)
                || navigator.userAgent.match(/BlackBerry/i)
                || navigator.userAgent.match(/Windows Phone/i)) {
            return true;
        } else {
            return false;
        }
    }
    function onMobile() {
        document.getElementById("menu_toggle").click(); // Click on the checkbox
    }
</script>

