<!DOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="UTF-8">
    <title>这是个实力</title>
    <link rel="stylesheet" href="<?php echo $this->request->base;?>/css/adminlogin.css">
    <style>
        .message {
            color:#000000;
        }
    </style>
</head>
<body>
<div class="page-container">

    <form action="<?php echo $this->request->base;?>/users/login" method="post">
        <?php echo $this->Flash->render() ?>
        <div>
            <input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
        </div>
        <div>
            <input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
        </div>
        <button type="submit">登录</button>
    </form>
</div>
</body>
</html>