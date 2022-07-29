<?php
include_once "../base.php";

$users=$User->all();
foreach($users as $user){
    echo "<tr>";
    echo "<td>{$user['acc']}</td>";
    echo "<td>".
        str_repeat("*",strlen($user['pw'])).    //密碼長度 用*重複
        "</td>";
    echo "<td>";
    echo "<input type='checkbox' name='del[]' value='{$user['id']}'>";  //刪除帶入id值
    echo "</td>";
    echo "</tr>";
}
?>