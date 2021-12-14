<div style="text-align: right; padding: 1rem; margin-right:1rem;">
    <a class="link-languages" data-type="cn" onclick="changeLanguages(this)">
        中 文
    </a> |
    <a class="link-languages" data-type="vn" onclick="changeLanguages(this)">
        Tiếng Việt
    </a>

</div>
&#160;&#160;
<script>
function changeLanguages(el) {
    var type = jQuery(el).attr('data-type');

    jQuery.ajax({
        url: '<?php echo get_template_directory_uri() . '/ajax/change_languages.php' ?>',
        dataType: 'json',
        type: 'post',
        data: {
            type: type
        },
        success: function(res) {
            // alert(res.status);
            if (res.status === 'ok') {
                //window.location = location.href;
                //location.reload();
                window.location = 'http://localhost/digiwin';

                // window.location = 'https://digiwin.com.vn/';
            }
        }
    });
}
</script>