var sum = function () {
    var yunfei = $("#waifaluru_yingfuyunfei").val();
    yunfei = (yunfei == "" || yunfei == undefined) ? 0 : yunfei;
    var yingfusonghuofei = $("#waifaluru_yingfusonghuofei").val();
    yingfusonghuofei = (yingfusonghuofei == "" || yingfusonghuofei == undefined) ? 0 : yingfusonghuofei;
    var yingfuqita = $("#waifaluru_yingfuqita").val();
    yingfuqita = (yingfuqita == "" || yingfuqita == undefined) ? 0 : yingfuqita;
    var yufuyunfei = $("#waifaluru_yufuyunfei").val();
    yufuyunfei = (yufuyunfei == "" || yufuyunfei == undefined) ? 0 : yufuyunfei;
    var sumyunfei = parseFloat(yunfei) + parseFloat(yingfusonghuofei) + parseFloat(yingfuqita) - parseFloat(yufuyunfei);
    if ((sumyunfei == "" || sumyunfei == undefined)) {

    } else {
        var yingshouyue = ($("#daofuzonge").text() - sumyunfei);
        yingshouyue = (yingshouyue <= 0) ? '' : yingshouyue;
        $("#yingshouyue").text(yingshouyue);
        var yingfuyue = (sumyunfei - $("#daofuzonge").text());
        yingfuyue = (yingfuyue <= 0) ? '' : yingfuyue;
        $("#yingfuyue").text(yingfuyue);
    }
    return sumyunfei;
}

$(function () {
    $("#sumyunfei").text(sum());
    $("#waifaluru_yingfuyunfei,#waifaluru_yingfusonghuofei,#waifaluru_yingfuqita,#waifaluru_yufuyunfei").bind("keyup", function () {
        $("#sumyunfei").text(sum());
    })


    $("#chk_all").bind("click", function () {
        $("input[name='ids']").attr("checked", $(this).is(":checked"));
    });

    $("#shenhe").bind("click", function () {
        shenhe(1);
    });
    $("#fanshenhe").bind("click", function () {
        shenhe(0);
    });

});

/**
 * @check  bool 审核/反审核
 */
function shenhe(check, dataStart, dateEnd, chengyungongsi, $zhongzhuandan) {
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

    $.ajax({
        type: "POST",  //默认值: "GET")。请求方式 ("POST" 或 "GET")， 默认为 "GET"。
        url: "/deposit/deposit-shehe",  //当前页地址。发送请求的地址。
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