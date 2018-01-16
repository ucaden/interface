<!DOCTYPE html>
<html>
<head>
    <title>汇房文件同步脚本</title>
</head>
<body>
<div style="text-align:center;margin-top:40px;">
    <form action="?" method="post">
        <div>
            <span>请输入同步文件列表，以换行间隔</span>
        </div>
        <div>
            <textarea name="file_list" style="width:500px;height:300px;"></textarea>
        </div>
        <input type="submit" value="提交">
    </form>
    <div>
        <?php if(!empty($copyFalseList)):  ?>
        <p>如下文件不存在：</p>
        <?php foreach($copyFalseList as $file_item): ?>
        <p><?php echo $file_item?></p>
        <?php endforeach;?>
        <?php endif;?>
    </div>
    <div>
        <?php if(!empty($syncSuccessList)):  ?>
        <p>同步文件成功，列表如下：</p>
        <?php foreach($syncSuccessList as $file_item): ?>
        <p><?php echo $file_item?></p>
        <?php endforeach;?>
        <?php endif;?>
    </div>
</div>
</body>
</html>