<div id="comments">
    <?php
    if (have_comments()) :
        global $comments_by_type;
        $comments_by_type = separate_comments($comments);
        if (! empty($comments_by_type['comment'])) :
    ?>
            <section id="comments-list" class="comments">
                <h3 class="comments-title"><?php comments_number(__('No comments yet'), __('1 comment'),  '% ' . __('comments')); ?></h3>
                <?php if (get_comment_pages_count() > 1) : ?>
                    <nav id="comments-nav-above" class="comments-navigation" role="navigation">
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>
                <ul>
                    <?php wp_list_comments(array('type' => 'comment', 'callback' => 'my_custom_comment')); ?>
                    <?php //wp_list_comments(array('type' => 'comment')); 
                    ?>
                </ul>
                <?php if (get_comment_pages_count() > 1) : ?>
                    <nav id="comments-nav-below" class="comments-navigation" role="navigation">
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>
            </section>
        <?php
        endif;
        if (! empty($comments_by_type['pings'])) :
            $ping_count = count($comments_by_type['pings']);
        ?>
            <section id="trackbacks-list" class="comments">
                <h3 class="comments-title"><?php echo '<span class="ping-count">' . esc_html($ping_count) . '</span> ' . esc_html(_nx('Trackback or Pingback', 'Trackbacks and Pingbacks', $ping_count, 'comments count', 'blankslate')); ?></h3>
                <ul>
                    <?php wp_list_comments('type=pings&callback=blankslate_custom_pings'); ?>
                </ul>
            </section>
    <?php
        endif;
    endif;
    if (comments_open()) {

        // 產生隨機混合題（加減乘）
        $a = rand(1, 10);
        $b = rand(1, 10);

        // 隨機選擇運算符號
        $ops = ['+', '-', '×'];
        $op = $ops[array_rand($ops)];

        // 計算答案
        switch ($op) {
            case '+':
                $ans = $a + $b;
                break;
            case '-':
                $ans = $a - $b;
                break;
            case '×':
                $ans = $a * $b;
                break;
        }

        // 存進 Session 給後端驗證
        $_SESSION['comment_captcha_answer'] = $ans;
        $_SESSION['comment_captcha_question'] = "{$a} {$op} {$b}";

        // 題目文字
        $question = "{$a} {$op} {$b}";

        //======================================================================================================
        // 自訂欄位
        $fields = array(
            'author' => '<div class="form-row">
                    <label for="author"> ' . __('Your Name', 'dgw') . ' <span class="required">*</span></label>
                    <input id="author" name="author" type="text" value="" size="30" required />
                 </div>',
            'email' => '<div class="form-row">
                    <label for="email">' . __('Your E-mail', 'dgw') . ' <span class="required">*</span></label>
                    <input id="email" name="email" type="email" value="" size="30" required />
                 </div>',
        );

        // 留言欄位
        $comment_field = '<div class="form-row-comment">
                      <label for="comment">' . __('Comment Content', 'dgw') . ' <span class="required">*</span></label>
                      <textarea id="comment" name="comment" class="comment-input" rows="5" required></textarea>
                  </div>
                  
                  <div class="form-row-math">
                  <label for="math_answer">'.__('Perform Calculations', 'dgw') .' : <strong>' . $question . '</strong> = </label>
                  <input id="math_answer" name="math_answer" type="text"  maxlength="4" required />
                  <span id="math-check-msg" style="margin-left:10px;"></span>
                  </div>
                  ';

        // 組合所有設定
        $comments_args = array(
            'fields' => $fields,
            'comment_field' => $comment_field,
            'title_reply' => __('Please share your opinions', 'dgw'),
            // 'title_reply_to' => 'Reply to to to %s',
            // 'cancel_reply_link' => __('Cancel Reply 123', 'dgw'), // 重要：要有取消回覆連結
            'label_submit' => __('Submit Comment', 'dgw'),
            'format' => 'html5', // 確保使用正確的格式
        );
        comment_form($comments_args);
    }
    ?>
</div>
<script>
    jQuery(document).ready(function($) {
        // comment-reply-link
        // 當點擊回覆連結時，監聽 URL 變化
        jQuery(document).on('click', '.comment-reply-link', function(e) {
            e.preventDefault();

            var that = jQuery(this);
            var href = that.attr('href').replace(/\?replytocom=\d+/, ''); // ✅ 清掉 replytocom

            var replyToCom = that.parent().siblings('.comment-author').text();

            if (replyToCom) {
                var cancelText = '<?php echo __('Cancel', 'dgw') ?>';
                var replyText = '<?php echo __('Reply to', 'dgw') ?>';
                var html = "<small><a id='cancel-comment-reply-link' rel='nofollow' href='" + href + "' class='cancel-reply-link'>" + cancelText + "</a></small>";

                jQuery('#reply-title').html(replyText + " " + replyToCom + html);
            }
        });

        //=========================================================================
        let math_ok = false; // ← 全域變數，用來控制能否提交

        // 🔍 監聽輸入欄位
        $(document).on("keyup", "#math_answer", function() {

            var answer = $(this).val().trim();

            // 空值直接清空訊息
            if (answer === "") {
                math_ok = false;
                $("#math-check-msg").html("").removeClass("correct wrong");
                return;
            }

            // 如果欄位空白 → 不允許提交
            if (answer === "") {
                math_ok = false;
                $("#math-check-msg").text("").css("color", "");
                return;
            }

            // AJAX 驗證
            $.post("<?php echo admin_url('admin-ajax.php'); ?>", {
                action: "check_math_captcha",
                answer: answer
            }, function(res) {
                if (res.status === "ok") {
                    $("#math-check-msg")
                        .html('<i class="fa-solid fa-check"></i>')
                        .removeClass("wrong")
                        .addClass("correct");
                    math_ok = true;
                } else {
                    $("#math-check-msg")
                        .html('<i class="fa-solid fa-xmark"></i>')
                        .removeClass("correct")
                        .addClass("wrong");
                    math_ok = false;
                }
            }, "json");

        });



        // ⛔ 阻止提交（核心）
        $(document).on("submit", "#commentform", function(e) {
             let correctAnswer  = '<?php echo __('The calculation problem is incorrect. Please enter the correct answer!', 'dgw') ?>'
            if (!math_ok) {
                e.preventDefault();
                alert(correctAnswer);
                jQuery('#math_answer').focus().val('');
                return false;
            }

            // 正確 → 允許提交
            return true;
        });
    });
</script>