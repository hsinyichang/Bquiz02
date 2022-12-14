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
<fieldset style="width: 120px;">
    <legend>分類網誌</legend>
    <div class="type">健康新知</div>
    <div class="type">菸害防制</div>
    <div class="type">癌症防治</div>
    <div class="type">慢性病防治</div>
</fieldset>

<fieldset style="width: calc(100% - 120px);">
    <legend>文章列表</legend>
    <div id="content"></div>
</fieldset>
</div>

<script>
    getList('健康新知');  //先寫死一個 讓畫面可以先顯示

    $(".type").on("click",function(){   //當點下去時該標籤(this)會出現在sapn 的header裡
        let type=$(this).text()  //該標籤的文字★
        $("#header").text(type)  //header的文字為(type↑)

    getList(type); //這裡再執行點下去會出現的文章列表
    })

    function getList(type){  //這裡的type就是宣告的文字★
        $.get("./api/get_List.php",{type},(list)=>{
            $("#content").html(list)  //將拿到的列表放到content的區塊內
        })
    }

    function getNews(id){  //  ./api/getList.php 使用的方法  ，將a標籤拿到的id值 代入
        $.get("./api/get_news.php",{id},(news)=>{
            $("#content").html(news)
        })
    }
    

</script>