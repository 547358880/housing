<!DOCTYPE html>
<html>
<head>
    <title>包河区“征、算、建、安、管”</title>
    <meta charset="utf-8">
    <?php if ($this->request->params['controller'] == 'Map') {   //百度地图禁止页面放大?>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <?php } else {?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php }?>
    <?php
        echo $this->Html->css(array('mui.min', 'comm'));
        echo $this->Html->script('mui.min');
    ?>
    <link rel="stylesheet" href="<?php echo $this->request->base;?>/iconfont/iconfont.css">
    <link rel="stylesheet" href="<?php echo $this->request->base;?>/exit/iconfont.css">
    <script type="text/javascript">
        mui.init();
        var baseUrl = '<?php echo \Cake\Core\Configure::read('App.fullBaseUrl') . $this->request->base; ?>'
        var pageParam = {}; //分页额外参数
    </script>
</head>
<body>

    <?php
        echo $this->fetch('content');
        echo $this->element('footer');
    ?>
</body>

<?php
    echo $this->Html->script(array('lib-min'));
    echo $this->fetch('afterScript')
?>
</html>