<style type="text/css">
    .toolbar {
        border: 1px solid #ccc;
    }

    .text {
        border: 1px solid #ccc;
        height: 600px;
    }

    /* table 样式 */

    .layui-layer-content table {
        border-top: 1px solid #ccc;
        border-left: 1px solid #ccc;
    }

    .layui-layer-content table td,
    .layui-layer-content table th {
        border-bottom: 1px solid #ccc;
        border-right: 1px solid #ccc;
        padding: 3px 5px;
    }

    .layui-layer-content table th {
        border-bottom: 2px solid #ccc;
        text-align: center;
    }

    /* blockquote 样式 */

    .layui-layer-content blockquote {
        display: block;
        border-left: 8px solid #d0e5f2;
        padding: 5px 10px;
        margin: 10px 0;
        line-height: 1.4;
        font-size: 100%;
        background-color: #f1f1f1;
    }

    /* code 样式 */

    .layui-layer-content code {
        display: inline-block;
        *display: inline;
        *zoom: 1;
        background-color: #f1f1f1;
        border-radius: 3px;
        padding: 3px 5px;
        margin: 0 3px;
    }

    .layui-layer-content pre code {
        display: block;
    }

    /* ul ol 样式 */

    .layui-layer-content ul,
    .layui-layer-content ol {
        margin: 10px 0 10px 20px;
    }
</style>

<ol class="am-breadcrumb">
    <li>
        <a class="am-active am-icon-home">编辑</a>
    </li>
</ol>

<div class="fly-content" style="padding-top:.5em">
    <h2 style="text-align:center">当前编辑：
        <?php echo $name; ?>
        <a href="main/index">返回</a>
    </h2>
    <div id="div1" class="toolbar">
    </div>
    <div id="div2" class="text">
        <?php echo $content; ?>
    </div>
    <div style="text-align: center;">
        <button type="button" id="btn-preview" class="am-btn am-btn-primary" style="margin-top:.5em">预览</button>
        <button type="button" id="btn-save" class="am-btn am-btn-primary" style="margin-top:.5em">保存</button>
    </div>
</div>

<script>
    var id = <?php echo $sid ?> ;
    var name = "<?php echo $name; ?>";
</script>
