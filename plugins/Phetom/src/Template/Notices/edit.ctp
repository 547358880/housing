<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/notices/edit/<?php echo $data->id;?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td style="padding-top: 10px;padding-bottom: 10px;">
                    <label for="name" class="control-label x85">项目名称：</label>
                    <input type="text" value="<?php echo $data->item->name;?>" readonly size="47" class="form-control input-nm">
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;padding-bottom: 10px;">
                    <label for="name" class="control-label x85">提醒类型：</label>
                    <?php
                    $i = 1;
                    foreach($typeData as $key => $val) {
                        ?>
                        <input type="radio" name="type" id="j_custom_type<?php echo $i;?>" data-toggle="icheck" value="<?php echo $key;?>" data-rule="checked" <?php if($key == $data->type){echo 'checked';}?> data-label="<?php echo $val;?>">&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
                        $i++;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;padding-bottom: 10px;">
                    <label for="name" class="control-label x85">发送时间：</label>
                    <input type="text" size="47" readonly value="<?php echo $data->created->format('Y-m-d H:i:s');?>" class="form-control input-nm" data-toggle="datepicker" data-pattern="yyyy-MM-dd HH:mm:ss">
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;">
                    <label for="name" class="control-label x85">内&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;容：</label>
                    <textarea name="text" rows="6" cols="47" data-toggle="autoheight"><?php echo $data->text;?></textarea>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;">
                    <label for="name" class="control-label x85">查看人员：</label>
                    <textarea rows="6" cols="47" data-toggle="autoheight" readonly><?php
                            if (isset($memberData) && !empty($memberData)) {
                                $memberName = '';
                                foreach($memberData as $item) {
                                    $name = !empty($item->nickname) ? $item->nickname : $item->username;
                                    $memberName .= $name . '、';
                                }
                                echo trim($memberName, '、');
                            }
                        ?></textarea>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close btn-no">关闭</button></li>
        <li><button type="submit" class="btn-blue">保存</button></li>
    </ul>
</div>