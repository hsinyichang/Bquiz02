<?php
include_once "../base.php";

//$acc=$_POST['acc'];
//echo $User->math('count','id',['acc'=>$acc]);

// echo $User->math('count','id',['acc'=>$_POST['acc']]);

$acc=$_POST['acc']??$_GET['acc'];
echo $User->math('count','id',['acc'=>$acc]);

?>