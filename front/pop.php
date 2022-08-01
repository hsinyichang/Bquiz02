<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td width="20%">人氣</td>
        </tr>
    

    <?php
        $all=$News->math('count','id',['sh'=>1]); //先找出全部有幾筆
        $div=5;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        //以上分頁功能
        $rows=$News->all(['sh'=>1]," order by `good` desc limit $start,$div");
        //依照人氣指數遞減排序  (大->小)
        foreach($rows as $row){
        ?>
        <tr>
            <td class="clo"><?=$row['title'];?></td>
            <td><?=mb_substr($row['text'],0,20);?>...</td> <!--取前面的幾個字-->
            <td></td>
        </tr>
        <?php 
        }

        ?>
    </table>
    <div>
        <?php 
        if(($now-1)>0){    //當前頁是2以後的會顯示'<'左箭頭
            echo "<a href='?do=news&p=".
                  ($now-1).
                 "'> < </a>";    //當在第2頁時，按下左箭頭就會到(2-1)頁
        }

        for($i=1;$i<=$pages;$i++){
            $fontsize=($now==$i)?'24px':'18px';
            echo "<a href='?do=news&p={$i}' style='font-size:{$fontsize}'> $i </a>";
        }
        if(($now+1)<=$pages){
            echo "<a href='?do=news&p=".
                  ($now+1).
                 "'> > </a>";
        }

        ?>
</fieldset>