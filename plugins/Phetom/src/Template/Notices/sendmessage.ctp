<script>
    $('input[name="day"]').on('ifChanged', function(e) {
        var checked = $(this).is(':checked'), val = $(this).val();
        if(checked) {
            var msgval = $('#msg').val();
            msgval = msgval.replace("10", val);
            msgval = msgval.replace("20", val);
            msgval = msgval.replace("30", val);
            $("#msg").html(msgval);
        }
    });

    $('input[name="type"]').on('ifChanged', function(e) {
        var checked = $(this).is(':checked'), val = $(this).val();
        if(checked) {
            if(val == 1) {
                var msgval = $('#msg').val();
                msgval = msgval.replace("延期", '到期');
                $("#msg").html(msgval);
            }
            if(val == 2) {
                var msgval = $('#msg').val();
                msgval = msgval.replace("到期", '延期');
                $("#msg").html(msgval);
            }
        }
    });
</script>
<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/notices/sendmessage/<?php echo $item_id;?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td style="padding-top: 10px;padding-bottom: 10px;">
                    <label for="name" class="control-label x85">项目名称：</label>
                    <input type="text" value="<?php echo $itemData->name;?>" size="47" class="form-control input-nm">
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;padding-bottom: 10px;">
                    <label for="name" class="control-label x85">时&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;间：</label>
                    <input type="radio" name="day" id="j_custom_day1" data-toggle="icheck" value="10" data-rule="checked" checked data-label="10天">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="day" id="j_custom_day2" data-toggle="icheck" value="20" data-rule="checked" data-label="20天">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="day" id="j_custom_day3" data-toggle="icheck" value="30" data-rule="checked" data-label="30天">
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;padding-bottom: 10px;">
                    <label for="name" class="control-label x85">短信类型：</label>
                    <input type="radio" name="type" id="j_custom_type1" data-toggle="icheck" value="1" data-rule="checked" checked data-label="到期">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="type" id="j_custom_type2" data-toggle="icheck" value="2" data-rule="checked" data-label="延期">
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;">
                    <label for="name" class="control-label x85">短信内容：</label>
                    <textarea readonly name="text" rows="3" cols="47" data-height="auto" id="msg"><?php echo $templateData['notice'];?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">联系人：</label>
                    <input type="text" name="msg.name" value="" class="form-control input-nm" data-title="查找联系人" size="47" data-toggle="lookup" data-url="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/contacts/lookup" data-group="msg" data-width="800" data-height="600">
                    <input type="hidden" name="msg.tel" value="">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close btn-no">关闭</button></li>
        <li><button type="submit" class="btn-blue">发送</button></li>
    </ul>
</div>