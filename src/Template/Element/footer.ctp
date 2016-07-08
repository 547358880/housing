<div class="footer">
    <ul class="nav-ull">
        <li>
            <a class="on <?php if ($this->request->params['controller'] == 'Map') echo 'on01';?>" href="<?php echo $this->Url->build('/website/map/index');?>">
                <i class="icon iconfont ">&#xe648;</i>
                <p class="nav-text nav-text01">首页</p>
            </a>
        </li>
        <li>
            <a class="on <?php if ($this->request->params['controller'] == 'Items' && ($this->request->params['action'] != 'tongji')) echo 'on01';?>" href="<?php echo $this->Url->build('/website/items/lists'); ?>">
                <i class="icon iconfont ">&#xe61b;</i>
                <p class="nav-text nav-text01">项目</p>
            </a>
        </li>
        <li>
            <a class="on <?php if ($this->request->params['action'] == 'tongji') echo 'on01';?>" href="<?php echo $this->Url->build('/website/items/tongji'); ?>">
                <i class="icon iconfont ">&#xe611;</i>
                <p class="nav-text nav-text01">图表</p>
            </a>
        </li>
        <li>
            <a class="on <?php if ($this->request->params['controller'] == 'Members') echo 'on01';?>" href="<?php echo $this->Url->build('/website/members/center'); ?>">
                <i class="icon iconfont ">&#xe706;</i>
                <p class="nav-text nav-text01">我的</p>
            </a>
        </li>
    </ul>
</div>
<div class="none"></div>