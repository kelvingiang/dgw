<?php
$footer = get_query_var('pagename', 1);
switch ($footer) {
  case '':
  case 'about-cn':
  case 'about-vn':
  case 'cases':
  case 'industry':
  case 'solution':
  case 'service':
  case 'resource':
  case 'activities':
  case 'contact-cn':
  case 'contact-vn':
    get_template_part('templates/template', 'footer');
}

get_template_part('templates/template', 'home-side-right');

wp_footer(); ?>

<script type="text/javascript">
  //window.onscroll = checkAnimation;
  var prevScrollPos = window.pageYOffset;
  window.onscroll = function() {
    // PHAN AN HIEN MENU 
    // KIEM TRA HEADER KHAC NONE MOI THUC HIEN
    //   if (jQuery('#header').css('display') !== 'none') {
    menuAnimation();
    //   }

    // // PHAN SHOW HINH ANH KHI RE CHUOT XUONG TOI
    // if (document.querySelector('.animation-item')) {
    //     Animation_show();
    // }


    //   if (document.querySelector('.scroll-show-horizontal')) {
    //       func_show_horizontal();
    //   }


    //   if (document.querySelector('#supervisor-slider')) {
    //       func_remove_behind_class();
    //   }

    // PHAN AN HIEN HEADER TRONG MOBILE STYLE
    var currentScrollPos = window.pageYOffset;
    //   if (prevScrollpos > currentScrollPos) {
    //       document.getElementById("mobile-header").style.top = "0";
    //   } else {
    //       document.getElementById("mobile-header").style.top = "-320px";
    //   }
    prevScrollPos = currentScrollPos;
  }

  // 禁止右鍵選單，這樣用戶無法透過右鍵選取「複製」功能
  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });

  //禁止快捷鍵，如 Ctrl+C 來複製內容。
  document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && (e.key === 'c' || e.key === 'a' || e.key === 'x')) {
      e.preventDefault();
    }
  });

  //禁止用戶拖拽文本或圖片來進行複製。
  document.addEventListener('dragstart', function(e) {
    e.preventDefault();
  });

  //禁止 F12（開發者工具），避免部分用戶檢視網站代碼。
  //   document.addEventListener('keydown', function(e) {
  //     if (e.key === 'F12') {
  //       e.preventDefault();
  //     }
  //   });

//============================================================================================
// phần click vào item để chuyển đến trang single xem toàn bộ nội dụng bài đăng ==============
          jQuery(document).on('click', '.item', function() {
            let permalink = jQuery(this).attr("data-link");
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>', // lay doi tuong chuyen sang dang array
                type: 'post', //                data: $(this).serialize(),
                data: {
                    action: 'plus_one_view', // ✅ 對應後端的 hook 名稱
                    postID: jQuery(this).attr("data-post"),
                },
                dataType: 'json',
                // khi load dữ liêu show chữ loading.....
                success: function(data) { // set ket qua tra ve  data tra ve co thanh phan status va message
                    if (data.status === 'done') {
                        window.location.href = permalink;
                    } else if (data.status === 'empty') {
                        // jQuery("#load-more").hide();
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });



</script>

<!-- add zalo chat trực tiếp trên web 19/06/2024  -->



</body>


</html>