<?php
include_once "../base.php";

if(isset($_POST['del'])){//若沒有勾選就不會送出
    foreach($_POST['del'] as $id){//列出有勾選的刪除選項的id
        $News->del($id);   //把該選項刪掉
    }
}

$rows=$News->all();  //列出全部的資料  主要是sh
foreach($rows as $row){
    if(in_array($row['id'],$_POST['sh'])){  //確定修改送出後  有在陣列裡的
        $row['sh']=1;    
    }else{     //沒在陣列裡的  (沒有勾選sh)
        $row['sh']=0;
    }
    $News->save($row);
}
to("../back.php?do=news");
?>