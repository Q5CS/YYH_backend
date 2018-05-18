function _logout() {
    $.ajax({
        type: "POST",
        url: "user/logout",
        dataType: "json",
        success: function (response) {
            location.reload();
        }
    });
}

$('#a-logout').click(function () {
    $(this).html('请稍候');
    _logout();
});