<div class="languages-box">
    <a class="link-languages" data-type="cn" onclick="changeLanguages(this)">
        中
    </a> |
    <a class="link-languages" data-type="vn" onclick="changeLanguages(this)">
        VN
    </a>
</div>

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
            if (res.status === 'ok') {
                window.location = '<?php echo home_url(); ?>';
            }
        }
    });
}
</script>