<?php
include_once "../base.php";
unset($_POST['pw2']);//直接不要儲存這個
$User->save($_POST);//其他的都存進來

?>