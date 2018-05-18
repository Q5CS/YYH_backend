<ol class="am-breadcrumb">
    <li>
        <a class="am-active am-icon-home">首页</a>
    </li>
</ol>

<div class="fly-content" style="text-align: center">
    <h1>请选择一个摊位编辑</h1>
    <?php 
        foreach ($stalls as $t) {
            $id = $t["id"];
            $name = $t["name"];
            echo "
            <a href=\"main/edit/$id\">$name</a>
            <br>
            ";
        }
    ?>
    <p style="text-align: center">如有疑问，请联系 QQ 394976586</p>
</div>