<?php
include_once "../base.php";

$id=$_GET['id'];  //抓到前面a標籤拿到的id值

$news=$News->find($id);  //找到資料表news  的id值

echo nl2br($news['text']);   //把該id  的text用斷行方式列出來
?>