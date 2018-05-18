var Editor;

$(function() {
    Editor = editormd("editor", {
        width   : "100%",
        height  : 640,
        syncScrolling : "single",
        path    : "/assets/editormd/lib/"
    });
});

var tags = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        url: '/admin/api_get_tags/?name=%QUERY',
        wildcard: '%QUERY'
    }
});
tags.initialize();

$('#input-tags').tagsinput({
    itemValue: 'id',
    itemText: 'name',
    typeaheadjs: {
        displayKey: 'name',
        source: tags.ttAdapter()
    }
});

for(var i=0;i<old_tags.length;i++) {
    $('#input-tags').tagsinput('add', { "id": old_tags[i].id , "name": old_tags[i].name });
}

function save() {
    id = editing;
    content = Editor.getMarkdown();
    tags = $('#input-tags').val();
    name = $('#input-name').val();
    img = $('#input-img').val();

    $.ajax({
        type: "POST",
        url: "/admin/api_edit_school",
        data: {
            'id': id,
            'name': name,
            'desc': content,
            'tags': tags,
            'img': img
        },
        dataType: "json",
        success: function (response) {
            alert('保存成功');
            location.reload();
        }
    });
}