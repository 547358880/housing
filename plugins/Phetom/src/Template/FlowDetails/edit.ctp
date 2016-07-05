<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/edit/<?php echo $data->id;?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">流程名称：</label>
                    <input type="text" name="name" value="<?php echo $data->name;?>" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">上级流程：</label>
                    <input type="text" name="parent.name" value="<?php if(empty($data->parent_flow_detail->name)){echo '顶级流程';}else{echo $data->parent_flow_detail->name;}?>" class="form-control input-nm" data-title="查找上级" size="35" data-toggle="lookup" data-url="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/lookup/<?php echo $data->flow->item_id;?>" data-group="parent" data-width="800" data-height="600">
                    <input type="hidden" name="parent.id" value="<?php if(empty($data->parent_flow_detail->id)){echo '0';}else{echo $data->parent_flow_detail->id;}?>">
                    <input type="hidden" name="parent.level" value="<?php if(empty($data->parent_flow_detail->level)){echo '0';}else{echo $data->parent_flow_detail->level;}?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">截止时间：</label>
                    <input type="text" name="endtime" value="<?php echo date('Y-m-d', strtotime($data->endtime));?>" size="35" class="form-control input-nm" data-rule="required" data-toggle="datepicker" data-pattern="yyyy-MM-dd" >
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