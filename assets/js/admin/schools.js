function del(id) {
    if (!confirm('确定删除这所学校吗？')) { 
        return; 
    }

    $.ajax({
        type: "POST",
        url: "/admin/api_del_school",
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
    window.location = '/admin/edit_school/'+id;
}