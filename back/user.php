<fieldset>
    <legend>帳號管理</legend>
    <table class="ct">
        <tr>
            <td class="clo">帳號</td>
            <td class="clo">密碼</td>
            <td class="clo">刪除</td>
        </tr>
        <tbody id="users">
        
        </tbody>
    </table>
    <div class="ct">
    <button onclick="del()">確定刪除</button>
        <button onclick="$('table input').prop('checked',false)">清空選取</button>
    </div>

</fieldset>

<h1>會員註冊</h1>
    <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>

    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="$('table input').val('')">清除</button>
            </td>
            <td></td>
        </tr>
    </table>

<script>
    getUsers();
    
    function getUsers(){
    $.get("./api/users.php",(users)=>{  //這裡不用帶參數，因為要顯示全部的資料
        $("#users").html(users)
    })
    }

    function del(){
    let ids=new Array();
    $("table input[type='checkbox']:checked").each((idx,box)=>{
        ids.push($(box).val())
    })
    $.post("./api/del_user.php",{del:ids},()=>{
        getUsers()
    })
}
</script>