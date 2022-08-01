<?php
include_once "../base.php";

$array=[
"健康新知"=>"1",
"菸害防制"=>"2",
"癌症防治"=>"3",
"慢性病防治"=>"4"];
//將文字設為index

$type=$array[$_GET['type']];  //抓到的type文字

$rows=$News->all(['type'=>$type]);   //抓到的type文字轉為value值，就是資料庫news的type分類

foreach($rows as $row){  //這樣就能抓到該分類的title了
    echo "<a href='javascript:getNews({$row['id']})' style='display:block'>";
    //上面點下去的a標籤連結會取得id值，然後再執行getNews()的方法
    echo $row['title'];
    echo "</a>";
}
?>