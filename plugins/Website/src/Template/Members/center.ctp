<style>
    .iconcenter{
        font-size: 40px;
        margin-top: 13px;
    }
</style>
<div class="top-bg">
    <div class="photo">
        <?php
            $imgUrl = $this->request->base . '/img/photo.png';
            if (!empty($userInfo['headimgurl'])) {
                $imgUrl = $userInfo['headimgurl'];
            }
            ?>
            <img class="photo-02 " src="<?php echo $imgUrl;?>" />
            <?php
        ?>
        <p class="name">你好！<?php echo $userInfo['nickname'];?></p>
    </div>
    <div class="line-01"></div>
    <a href="<?php echo $this->request->base;?>/website/members/info">
        <div class="cen-list">
<!--            <img class="photo-01" src="--><?php //echo $this->request->base; ?><!--/img/photo01.png" />-->
            <i class="iconfont photo-01 iconcenter" style="color: #4fbde8;">&#xe600;</i>
            <span class="photo-tex">个人中心</span>
        </div>
    </a>
    <a href="<?php echo $this->request->base;?>/website/notices/lists">
        <div class="cen-list">
<!--            <img class="photo-01" src="--><?php //echo $this->request->base; ?><!--/img/photo04.png" />-->
            <i class="iconfont photo-01 iconcenter" style="color: #f05572;">&#xe620;</i>
            <span class="photo-tex">我的提醒</span>
        </div>
    </a>

    <a href="<?php echo $this->request->base;?>/website/contacts/lists">
        <div class="cen-list">
            <!--            <img class="photo-01" src="--><?php //echo $this->request->base; ?><!--/img/photo04.png" />-->
            <i class="iconfont photo-01 iconcenter" style="color: #41c28d;">&#xe627;</i>
            <span class="photo-tex">通讯录</span>
        </div>
    </a>

    <a href="<?php echo $this->request->base;?>/website/members/logout">
        <div class="cen-list">
            <i class="iconfont photo-01 iconcenter" style="color: #3a3b50;">&#xe62e;</i>
            <span class="photo-tex">退出</span>
        </div>
    </a>



    <div class="none"></div>
</div>