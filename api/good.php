<?php
include_once "../base.php";
$text=$_POST['text'];
$id=$_POST['id'];
$news=$News->find($id);

switch($text){
    case '讚':
    $news['good']++;
    break;

    case '收回讚':
    $news['good']--;
    break;
}
$News->save($news);
?>