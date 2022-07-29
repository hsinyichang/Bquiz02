<form action="./api/news.php" method="post">
<table style="width: 80%; margin:auto; text-align:center">
    <tr>
        <th width="10%">編號</th>
        <th width="70%">標題</th>
        <th width="10%">顯示</th>
        <th width="10%">刪除</th>
    </tr>
    <?php
    $all=$News->math('count','id');
    $div=3;   //每頁要顯示的數量
    $pages=ceil($all/$div);    //有多少頁數
    $now=$_GET['p']??1;  //沒有get到p 就是第一頁
    $start=($now-1)*$div;  //每頁從第幾筆開始  第2頁就是從第3筆(陣列[4])開始
    $rows=$News->all("limit $start ,$div");   //第幾筆開始取幾筆
    foreach($rows as $key => $row){

    ?>
    <tr>
        <td><?=$key+1;?></td>
        <td><?=$row['title'];?></td>
        <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>" ></td>

    </tr>
    <?php

    }
    ?>

</table>
<div class="ct">
<?php
if(($now-1)>0){    //當前頁是2以後的會顯示'<'左箭頭
    echo "<a href='?do=news&p=".
          ($now-1).
         "'> < </a>";    //當在第2頁時，按下左箭頭就會到(2-1)頁
}

for($i=1;$i<=$pages;$i++){
    $fontsize=($now==$i)?'24px':'16px';
    echo "<a href='?do=news&p={$i}' style='font-size:$fontsize'>";
    echo $i;
    echo "</a>";
}
if(($now+1)<=$pages){
    echo "<a href='?do=news&p=".
          ($now+1).
         "'> > </a>";
}
?>
</div>
<div class="ct"><input type="submit" value="確定修改"></div>
</form>