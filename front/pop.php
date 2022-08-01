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
            <td class="title clo"><?=$row['title'];?></td>
            <td class="pop">
                <span class="summary"><?=mb_substr($row['text'],0,20);?>...</span> <!--取前面的幾個字-->
                <div class="modal"><?=nl2br($row['text'])?></div>
            </td>
            <td>
               <span><?=$row['good']?></span> 個人說<img src="./icon/02B03.jpg" style="width: 25px;">
               <?php
               if(isset($_SESSION['user'])){   //未登入不會顯示讚可以按
                echo "-<a href='#' class='great'>讚</a>";
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
</fieldset>

<script>
$(".title, .pop").hover(  //加了.pop  是可以讓游標移到彈出視窗捲動
    function(){
        $(this).parent().find('.modal').show()  //這裡使用parent  find是因為.title 和.pop的next child無法一起找到modal這個div
    },
    function(){
        $(this).parent().find('.modal').hide()
    }
    )

$(".great").on("click",function(){ //自己寫 不要用js的good
    let text=$(this).text()
    let num=parseInt($(this).siblings('span').text())//轉數字  同層不同元素要使用兄弟siblings
    if(text==='讚'){
        text=$(this).text('收回讚')
        $(this).siblings('span').text(num+1)
    }else{
        text=$(this).text('讚')
        $(this).siblings('span').text(num-1)
    }
})




    /* $(".title").hover(
    function (){
        $(this).next().children('.modal').show()
    },
    function (){
        $(this).next().children('.modal').hide()
    }
)
$(".pop").hover(
    function (){
        $(this).children('.modal').show()
    },
    function (){
        $(this).children('.modal').hide()
    }
)
 */

</script>