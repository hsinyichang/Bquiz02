<style>
    .type{
        cursor: pointer;
        color: blue;
        margin: 1rem 0;
        /* padding-bottom: 0.1rem; */
        max-width: max-content; /* 可將box的寬度調整跟文字一樣 */
    }
    .type:hover{
        border-bottom:1px solid blue;
        /* text-decoration: underline; */
    }
</style>

<div>目前位置：首頁 > 分類網誌 > <span id="header"></span></div>
<div style="display: flex;">
<fieldset>
    <legend>分類網誌</legend>
    <div class="type">健康新知</div>
    <div class="type">菸害防制</div>
    <div class="type">癌症防治</div>
    <div class="type">慢性病防治</div>
</fieldset>

<fieldset>
    <legend>文章列表</legend>
    <div></div>
</fieldset>
</div>

<script>
    $(".type").on("click",function(){   //當點下去時該標籤(this)會出現在sapn 的header裡
        let type=$(this).text()  //該標籤的文字
        $("#header").text(type)  //header的文字為(type↑)
    })


</script>