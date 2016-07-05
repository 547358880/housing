<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templateDetails/add/<?php echo $template_id;?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <input type="hidden" name="template_id" value="<?php echo $template_id;?>">
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">工作流：</label>
                    <input type="text" value="<?php echo $templateData->name;?>" size="35" class="form-control input-nm">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">流程名称：</label>
                    <input type="text" name="name" value="" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">上级流程：</label>
                    <input type="text" name="parent.name" value="<?php if(isset($data) && !empty($data->name)){echo $data->name;}?>" class="form-control input-nm" data-title="查找上级" size="35" data-toggle="lookup" data-url="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templateDetails/lookup/<?php echo $template_id;?>" data-group="parent" data-width="800" data-height="600">
                    <input type="hidden" name="parent.id" value="<?php if(isset($data) && !empty($data->id)){echo $data->id;}?>">
                    <input type="hidden" name="parent.level" value="<?php if(isset($data) && !empty($data->level)){echo $data->level;}?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">截止时间：</label>
                    <input type="text" name="endtime" value="" size="35" class="form-control input-nm" data-rule="required;integer" > 天
                    <span style="color:#ff0000;">*</span>
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