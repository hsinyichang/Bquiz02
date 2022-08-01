<?php
include_once "../base.php";
$text=$_POST['text'];
$id=$_POST['id'];
$news=$News->find($id);

switch($text){
    case '讚':
    $news['good']++;
    $Log->save(['news'=>$id,'user'=>$_SESSION['user']]);  //將log資料存進去
    break;

    case '收回讚':
    $news['good']--;
    $Log->del(['news'=>$id,'user'=>$_SESSION['user']]);
    break;
}
$News->save($news);
?>