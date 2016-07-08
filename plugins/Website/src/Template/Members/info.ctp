<style>
    .area {
        margin: 20px auto 0px auto;
    }
    .mui-input-group:first-child {
        margin-top: 20px;
    }
    .mui-input-group label {
        width: 22%;
    }
    .mui-input-row label~input,
    .mui-input-row label~select,
    .mui-input-row label~textarea {
        width: 78%;
    }
    .mui-checkbox input[type=checkbox],
    .mui-radio input[type=radio] {
        top: 6px;
    }
    .mui-content-padded {
        margin-top: 25px;
    }
    .mui-btn {
        padding: 10px;
    }

    .comminput{
        line-height: 21px;
        padding: 10px 15px;
    }

    .btncolor{
        background: #97d83b;
        border: #97d83b;
    }

    .backbtn{
        font-size: 12px;
        color: #000;
    }
</style>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left backbtn" style="margin-left:6px;padding-top:15px;font-size: 14px;color: #000;">返回</a>
    <h1 class="mui-title">个人中心</h1>
</header>
<div class="mui-content">
    <form  name="form1" id="form1" class="mui-input-group" method="post" action="<?php echo $this->request->base;?>/website/members/info">
        <input type="hidden" name="mid" value="<?php echo $memberData->id;?>">
        <div class="mui-input-row">
            <label>昵称</label>
            <input name="nickname" value="<?php echo $memberData->nickname;?>" class="mui-input-clear mui-input comminput" placeholder="请输入昵称">
        </div>
        <div class="mui-input-row">
            <label>电话</label>
            <input name="tel" value="<?php echo $memberData->tel;?>" class="mui-input-clear mui-input comminput" placeholder="请输入电话">
        </div>
    </form>
    <div class="mui-content-padded">
        <button id='save' class="mui-btn mui-btn-block mui-btn-primary btncolor" onclick="ok()">保存</button>
    </div>
</div>
<script>
    function ok() {
        document.getElementById("form1").submit();
    }
</script>