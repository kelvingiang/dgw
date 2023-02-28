<?php
$page = getParams('page');
$id = getParams('id');
require_once(DIR_MODEL . 'model-vote-function.php');
$voteModel = new Model_Vote_Function();
$vote = $voteModel->getItem($id);


require_once(DIR_MODEL . 'model-vote-shareholder.php');
$shareholderModel = new Model_Vote_Shareholder_Function();
$voteResult = $shareholderModel->getShareholderVoteValue($id);
$voteTotal = $shareholderModel->getVoteTotal($id);
?>
<h1 style=" color:#0843a8"> <?php echo $vote['title']; ?></h1>
<div>
    <?php echo $totalShareholder ?>
</div>
<div class="head-button">
    <a class="button button-primary button-large " href="<?php echo 'admin.php?page=' . $page . '&action=export&id='. $id ?>">導出excel</a>
</div>
<div class="vote-detail-list">
    <div class="vote-detail-list-row row-title">
        <div></div>
        <div>
            <span>姓名</span>
            <span>Họ & Tên</span>
        </div>
        <div>
            <span>認股</span>
            <span>Số Lượng</span>
        </div>
        <div>
            <span>比率</span>
            <span>Tỷ Lệ</span>
        </div>
        <div>
            <span>結果</span>
            <span>Kết Quả</span>
        </div>
    </div>
    <?php
    $stt = 0;
    $total = 0;
    $total_agree = 0;
    $total_disagree = 0;
    foreach ($voteResult as $item) {
        if ($item['val'] != '') {
            $total += $item['count'];
            if ($item['val'] == '1') {
                $total_agree += $item['count'];
            } elseif ($item['val'] == '0') {
                $total_disagree += $item['count'];
            }
        }
    ?>
        <div class="vote-detail-list-row">
            <div> <?php echo ++$stt; ?></div>
            <div class="haihang">
                <span><?php echo $item['name_cn'] ?></span>
                <span><?php echo $item['name_en'] ?></span>
            </div>
            <div><?php echo number_format($item['count']); ?></div>
            <div>
                <?php
                if ($item['val'] != '') {
                    echo number_format($item['count'] / $voteTotal[0]['total'] * 100,2) . '%';
                }
                ?>

            </div>
            <div class="haihang <?php echo $item['val'] == '1' ? 'agree' : 'disagree' ?>">
                <?php  if ($item['val'] == '1') { ?>
                    <label>讚成</label>
                    <label>Đồng Ý</label>
                <?php } elseif ($item['val'] == '0') { ?>
                    <label>不讚成</label>
                    <label>Không Đồng Ý</label>
                <?php  } else {
                    echo  '';
                } ?>
            </div>
        </div>
    <?php } ?>
</div>
<div class="vote-detail-footer">
    <div>
        <span></span>
        <span class="text-title">
            總股數 Tổng Số Cổ Phiếu
        </span>
        <span class="text-title"><?php echo  number_format($total) ?></span>

    </div>
    <div>
        <span class="text-title">贊成 Đồng Ý</span>
        <span>
            <label>股數 Số Cổ Phiếu : <?php echo  number_format($total_agree) ?></label>
        </span>
        <span>
            <label>投票率 Tỷ Lệ : <?php echo number_format($total_agree / $total * 100,2) . '%' ?></label>
        </span>
    </div>
    <div>
        <span class="text-title">不贊成 Không Đồng Ý</span>
        <span>
            <label>股數 Số Cổ Phiếu : <?php echo  number_format($total_disagree) ?> </label>
        </span>
        <span>
            <label>投票率 Tỷ Lệ : <?php echo number_format($total_disagree / $total * 100,2) . '%' ?></label>
        </span>
    </div>