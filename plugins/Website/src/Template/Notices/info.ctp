<style>
    .texttop{
        font-size: 18px;
        padding-bottom: 10px;
        color: #000;
    }
    .textcontent{
        padding-top: 10px;
        font-size: 18px;
        line-height: 26px;
        color: #000;
    }
</style>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left backbtn" style="margin-left:6px;padding-top:15px;font-size: 14px;color: #000;">返回</a>
    <h1 class="mui-title">我的提醒</h1>
</header>
<div class="mui-content">
    <div class="title" style="margin: 0 auto; width: 90%;">
        <br>
        <p class="texttop">项目：<?php echo $data->item->name;?>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>时间：<?php echo $data->created->format('Y-m-d H:i');?></p>
        <hr>
        <h5 class="textcontent"><?php echo $data->text;?></h5>
    </div>
</div>