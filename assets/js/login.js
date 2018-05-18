function login() {
    un = $('#input-username').val().trim();
    if (un == '') {
        alert('用户编码不能为空!');
    } else {
        $('#btn-login').html('登录中');
        $('#btn-login').attr('disabled','true');
        _login(un);
    }
}

function _login(id) {
    $.ajax({
        type: "POST",
        url: "user/login",
        data: {
            "id": id
        },
        dataType: "json",
        success: function (response) {
            if (response.status > 0) {
                location.reload();
            } else {
                alert(response.msg);
                $('#btn-login').html('登录');
                $('#btn-login').removeAttr('disabled');
            };
        }
    });
}

$('#btn-login').click(function () {
    login();
});
$('#input-username').bind('keypress', function (event) {
    if (event.keyCode == "13") {
        login();
    }
});