<div class="table">
    <div border="1" style="width: 100%;height: 40px;">
        <a class="td-text td-01 td-text02" href="<?php echo $this->Url->build('/website/items/detail/' . $item->id);?>">基本信息</a>
        <a class="td-text td-text02" href="<?php echo $this->Url->build('/website/items/accordion/' . $item->id); ?>">项目进度</a>
        <a class="td-text td-text02" href="<?php echo $this->Url->build('/website/notices/lists/' . $item->id); ?>">项目提醒</a>
    </div>
</div>
<div>
    <img class="item-imgbg" src="<?php echo $this->request->base . '/' . $item->image;?>" />
</div>
<div class="title-01">
    <div style="width: 100%;display: block;">
        <p class="tit-02">项目名称：<?php echo $item->name; ?></p>
        <p class="tit-02">开始时间：<?php echo date('Y-m-d', strtotime($item->starttime)); ?></p>
        <p class="tit-02">拆迁户数：<?php echo $item->households; ?>户</p>
        <p class="tit-02">拆迁面积：<?php echo $item->mianji; ?>㎡</p>
        <p class="tit-02">建设单位：<?php echo $item->construction; ?></p>
        <p class="tit-02">建设周期：<?php echo $item->period; ?></p>
    </div>
    <span class="tit-01">简介:</span>
    <p class="text02"><?php echo $item->intro ;?></p>
    <div style="display: block;width:100%;">
        <span class="tit-01">详细介绍:</span>
        <p class="text02"><?php echo $item->content; ?></p>
    </div>
</div>