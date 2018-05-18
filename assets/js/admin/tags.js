function del(id) {
    if (!confirm('确定删除这个标签吗？\n如确定，将同时清除所有高校的这一标签')) { 
        return; 
    }

    $.ajax({
        type: "POST",
        url: "/admin/api_del_tag",
        data: {
            'id': id
        },
        dataType: "json",
        success: function (response) {
            location.reload();
        }
    });
}

function edit(id) {
    tag_name = prompt("请输入新的标签:");

    if(tag_name==null || tag_name=="") return;

    $.ajax({
        type: "POST",
        url: "/admin/api_edit_tag",
        data: {
            'id': id,
            'name': tag_name
        },
        dataType: "json",
        success: function (response) {
            location.reload();
        }
    });

}

function add() {
    tag_name = $('#tag-input').val();
    $.ajax({
        type: "POST",
        url: "/admin/api_add_tag",
        data: {
            'name': tag_name
        },
        dataType: "json",
        success: function (response) {
            location.reload();
        }
    });
}