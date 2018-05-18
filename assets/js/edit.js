var needSave = false;
var E = window.wangEditor;
var editor = new E('#div1', '#div2');
// 关闭粘贴样式的过滤
editor.customConfig.pasteFilterStyle = false;
// 关闭粘贴图片
editor.customConfig.pasteIgnoreImg = true;

// 图片上传
editor.customConfig.uploadImgMaxSize = 5 * 1024 * 1024;
editor.customConfig.uploadImgMaxLength = 5;
editor.customConfig.uploadImgTimeout = 30000;
editor.customConfig.uploadImgServer = 'main/uploadImg';
editor.customConfig.uploadImgHooks = {
	before: function (xhr, editor, files) {
		layer.load(0, {
			shade: [0.5, '#000']
		});
		// 图片上传之前触发
		// xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，files 是选择的图片文件

		// 如果返回的结果是 {prevent: true, msg: 'xxxx'} 则表示用户放弃上传
		// return {
		//     prevent: true,
		//     msg: '放弃上传'
		// }
	},
	success: function (xhr, editor, result) {
		layer.closeAll('loading');
		layer.msg('上传图片成功');
		// 图片上传并返回结果，图片插入成功之后触发
		// xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
	},
	fail: function (xhr, editor, result) {
		layer.closeAll('loading');
		// 图片上传并返回结果，但图片插入错误时触发
		// xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
	},
	error: function (xhr, editor) {
		layer.closeAll('loading');
		// 图片上传出错时触发
		// xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
	},
	timeout: function (xhr, editor) {
		layer.closeAll('loading');
		// 图片上传超时时触发
		// xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
	}
};
// 内容变化？
editor.customConfig.onchange = function (html) {
	needSave = true;
}
editor.create();

$("#btn-save").click(function () {
	$(this).html("保存中");
	$(this).attr("disabled", "true");
	txt = editor.txt.html();
	console.log(txt);
	$.ajax({
		type: "POST",
		url: "main/save",
		data: {
			"id": id,
			"title": name,
			"content": txt
		},
		dataType: "html",
		success: function (response) {
			alert("保存成功！");
			needSave = false;
			location.reload();
		}
	});
});

$(window).bind('beforeunload', function () {
	if (needSave) return '请确认是否关闭！';
});

$("#btn-preview").click(function () {
    layer.open({
        type: 1,
        title: "手机预览",
        skin: 'layui-layer-rim',
        area: ['375px', '667px'],
        content: "<div style=\"padding:.5em\">" + editor.txt.html() + "</div>"
      });
});
