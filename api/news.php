<?php
include_once "../base.php";

if(isset($_POST['del'])){//若沒有勾選就不會送出
    foreach($_POST['del'] as $id){
        $News->del($id);
    }
}

$rows=$News->all();
foreach($rows as $row){
    if(in_array($row['id'],$_POST['sh'])){
        $row['sh']=1;
    }else{
        $row['sh']=0;
    }
    $News->save($row);
}
to("../back.php?do=news");
?>