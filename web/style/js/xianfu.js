$(function(){
    $("#chk_all").bind("click",function(){
        $("input[name='ids']").attr("checked",$(this).is(":checked"));
    });

    $("#shouyin").bind('click',function(){
        Util.Dialog({
            boxID: "dialog-callback-value",
            title: "选择资金账号",
            content: "text:<select id='fukuanfangshi'><option>现金</option><option>银行卡</option></select>",
            yesBtn: ["确定", function(){
                var fangshi = $("#fukuanfangshi").val();
                xianfu(1,fangshi)
                return true;
            }]
        });
        return false;
    });

    $("#quxiaoshouyin").bind('click',function(){
        xianfu(0)
    });
})



function xianfu(check,fangshi) {
    var ids = new Array();
    $('input[name="ids"]:checked').each(function () {
        ids.push($(this).val());
    });
    if (ids.length == 0) {
        return;
    }
    var data = "ids=" + ids + "&check=" + check;
    $('.ym-searchfield').each(function () {
        data = data + "&" + $(this).attr('name') + "=" + $(this).val();
    });
    if(fangshi) {
        data = data+"&fangshi="+fangshi;
    }

    $.ajax({
        type: "POST",  //默认值: "GET")。请求方式 ("POST" 或 "GET")， 默认为 "GET"。
        url: "/order/xianfu",  //当前页地址。发送请求的地址。
        data: data, //发送到服务器的数据。将自动转换为请求字符串格式。
        dataType: "html",//预期服务器返回的数据类型。如果不指定，jQuery 将自动根据 HTTP 包 MIME 信息来智能判断
        success: function (context) {//请求成功后的回调函数。
            $("tbody").html(context);
            $("#chk_all").removeAttr('checked');
            alert("操作成功!");
        },
        async: true,   //true为异步请求，false为同步请求
        error: function () {
            alert("操作失败:请联系管理员!");
        }
    })
};