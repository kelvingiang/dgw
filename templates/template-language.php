<div>
    <a data-type="cn" onclick="changeLannguage(this)"> 中 文 </a> |
    <a data-type="vn" onclick="changeLannguage(this)"> Tiếng Việt </a>
</div>
&#160;&#160;
<script>
    function changeLannguage(el) {
        var type = jQuery(el).attr('data-type');
        console.log(type);
        jQuery.ajax({
            url: '<?php echo get_template_directory_uri() . '/ajax/change_language.php' ?>',
            dataType: 'json',
            type: 'post',
            data: {
                type: type
            },
            success: function(res) {
                if (res.status === 'ok') {
                    //  window.location = location.href;
                    location.reload();
                }
            }
        });
    }
</script>