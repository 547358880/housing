<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title><?php if(!empty($configData)) {echo $configData->name;}?></title>
    <link rel="stylesheet" href="<?php echo $this->request->base;?>/css/login.css">
    <link href="<?php echo $this->request->base;?>/favicon.ico" type="image/x-icon" rel="icon">
    <link href="<?php echo $this->request->base;?>/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <style>
        body{
            margin: 0;
            background: none;
            filter: none;
        }
        .bgImg{
            background: url("<?php echo $this->request->base;?>/images/yunqibg.jpg") center no-repeat;
            background-size: cover;
            filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->request->base;?>/images/yunqibg.jpg',sizingMethod='scale');
            -ms-filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->request->base;?>/images/yunqibg.jpg',sizingMethod='scale');
            width: 100%;
            height:100%;
            position: absolute;
            left: 0;
            top:0;
            z-index: -1;
        }
        .logo{
            margin: 0 auto ;
            padding: 100px 0 100px 0;
            text-align: center;
        }
    </style></head>

<body>
<div class="bgImg"></div>
<div class="loginContainer">
    <div class="logo">
        <img src="<?php echo $this->request->base.'/images/logo.png';?>" width="100">
        <h1 style="color: #ff0000;"><?php if(!empty($configData)) {echo $configData->name;}?></h1>
    </div>
    <form method="POST" action="<?php echo $this->Url->build(["plugin" => $this->request->params['plugin'], "controller" => "Users", "action" => "login"]);?>" id="login_verify">
        <div class="loginBox">
            <?php echo $this->Flash->render();?>
            <ul class="login_text">
                <li>
                    <span class="nameId"></span>
                    <input style="display:none">
                    <input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
                </li>
                <li>
                    <span class="passId"></span>
                    <input style="display:none">
                    <input type="password" name="password" class="password" placeholder="密码" autocomplete="off" oncontextmenu="return false" onpaste="return false" />
                </li>
            </ul>
            <button type="submit" class="loginBtn" id="loginBtn">登　　录</button>
        </div>
    </form>
    <p class="footer" style="bottom:0">© <?php if(!empty($configData)) {echo $configData->startyear;}?> <?php if(!empty($configData)) {echo $configData->name;}?>,Inc.All rights reserved.</p>
</div>
</body></html>