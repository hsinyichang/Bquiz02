<fieldset>

    <legend>目前位置：首頁 > 最新文章區</legend>
    <table id="news">
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td width="20%"></td>
        </tr>
        <?php
        $all=$News->math('count','id',['sh'=>1]); //先找出全部有幾筆
        $div=5;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        //以上分頁功能
        $rows=$News->all(['sh'=>1]," limit $start,$div");

        foreach($rows as $row){
        ?>
        <tr>
            <td class="clo title" style="cursor: pointer;">
                <?=$row['title'];?>
            </td>
            <td>
                <span class="summary"><?=mb_substr($row['text'],0,20);?>...</span> <!--取前面的幾個字-->
                <span class="full" style="display: none;"><?=nl2br($row['text'])?></span>
            </td> 
            <td>
            <?php
               if(isset($_SESSION['user'])){   //未登入不會顯示讚可以按
                if($Log->math('count','id',['news'=>$row['id'],'user'=>$_SESSION['user']])>0){
                    echo "<a class='great' href='#' data-id='{$row['id']}'>收回讚</a>";
                }else{
                    echo "<a class='great' href='#' data-id='{$row['id']}'>讚</a>";
                }
                }
               ?>
            </td>
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
    </div>
</fieldset>

<script>
$(".title").on("click",function(){
    $(this).next().children().toggle()
})

$(".great").on("click",function(){ //自己寫 不要用js的good
    let text=$(this).text()
    let id=$(this).data('id')
    $.post('./api/good.php',{id,text},()=>{
    if(text==='讚'){
        $(this).text('收回讚')

    }else{
        $(this).text('讚')

    }
})
})

</script>