$('#btn-recharge').click(function() {
    num = $('#input-cardnum').val().trim();
    if(!num) {
        alert('请输入充值卡号！');
        return;
    }
    $(this).button('loading');
    recharge(num);
});

$('#input-cardnum').bind('keypress', function (event) {
    if (event.keyCode == "13") {
        $('#btn-recharge').click();
    }
});

function recharge(num) {
    $.ajax({
        type: "POST",
        url: "/card/recharge",
        data: {
            'cardNum': num
        },
        dataType: "json",
        success: function (response) {
            if(response.status > 0) {
                alert(response.msg);
                num = $('#input-cardnum').val('');
            } else {
                alert(response.msg);
            }
            $('#btn-recharge').button('reset');
        }
    });
}