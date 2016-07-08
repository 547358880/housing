<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/setcurrent/<?php echo $item_id;?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">项目名称：</label>
                    <input type="text" value="<?php echo $itemData->name;?>" size="35" class="form-control input-nm">
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">当前进度：</label>
                    <input type="text" name="current.name" value="<?php if(isset($data) && !empty($data->name)){echo $data->name;}?>" class="form-control input-nm" data-title="查找进度" size="35" data-toggle="lookup" data-url="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/lookup/<?php echo $item_id;?>" data-group="current" data-width="800" data-height="600">
                    <input type="hidden" name="current.id" value="<?php if(isset($data) && !empty($data->id)){echo $data->id;}?>">
                    <input type="hidden" name="current.parentid" value="<?php if(isset($data) && !empty($data->id)){echo $data->parent_id;}?>">
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