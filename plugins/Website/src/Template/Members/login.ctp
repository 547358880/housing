<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>包河区“征、算、建、安、管”</title>
    <script src="<?php echo $this->request->base?>/js/mui.min.js"></script>
    <link href="<?php echo $this->request->base?>/css/mui.min.css" rel="stylesheet"/>
    <link href="<?php echo $this->request->base?>/css/comm.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8">
        mui.init();
    </script>
</head>
<body>
<div class="bg-color">
    <div class="login-cen">
        <img class="login-img" src="<?php echo $this->Url->image('logo.png'); ?>" />
        <p class="login-tex"><?php if(!empty($configData)) {echo $configData->name;}?></p>
    </div>
    <div class="login-01">
        <form method="post" action="<?php echo $this->Url->build('/website/members/login');?>" class="form-01">
            <input type="text" class="text" placeholder="请输入用户名" name="username">
            <div class="key">
                <input type="password" placeholder="请输入密码" name="password" class="text">
            </div>
            <div class="login-bg">
                <input type="submit" value="登录">
            </div>
        </form>
    </div>
</div>
</body>
</html>
