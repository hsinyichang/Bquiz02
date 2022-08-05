<?php
$subject=$Que->find($_GET['id']);
$options=$Que->all(['subject_id'=>$_GET['id']]);//subject_id 是傳進來問題的id

?>


<fieldset>   <!--從vote 複製檔案過來改-->
    <legend>目前位置：首頁 > 問卷調查 > <?=$subject['text'];?></legend>

    <h3><?=$subject['text'];?></h3>
        <?php
            foreach($options as $opt){
                $sum=($subject['count']==0)?1:$subject['count'];//總數不能為0，不然不能除
                $width=round($opt['count']/$sum,2)*100;//四捨五入取道2位數
                $bg=($width==0)?'#fff':'#ccc';//寬度=0時背景為白色
                echo "<div style='display:flex;align-items:center'>";
                echo "<div style='width:50%'>";
                echo $opt['text'];
                echo "</div>";
                echo "<div style='width:50%'>";
                echo "<div style='min-width:max-content;width:{$width}%;background:{$bg};height:25px;text-align:center;'>";//加上min-width=最大文字寬度，才會在同一行，0票的背景會為白色看不到
                echo $opt['count']."票(".$width."%)";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
        <p class='ct'>
            <button onclick="location.href='?do=que'">返回</button>
        </p>

</fieldset> 