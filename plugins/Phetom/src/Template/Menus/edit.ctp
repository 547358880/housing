<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/menus/edit/<?php echo $data->id;?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <input type="hidden" name="id" value="<?php echo $data->id;?>">
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单名称：</label>
                    <input type="text" name="name" value="<?php echo $data->name;?>" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">上级菜单：</label>
                    <input type="text" name="parent.name" class="form-control input-nm" value="<?php if(empty($data->parent_menu->name)){echo '顶级菜单';}else{echo $data->parent_menu->name;}?>" data-title="查找上级菜单" size="35" data-toggle="lookup" data-url="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/menus/lookup" data-group="parent" data-width="600" data-height="300">
                    <input type="hidden" name="parent.id" value="<?php if(empty($data->parent_menu->id)){echo '0';}else{echo $data->parent_menu->id;}?>">
                    <input type="hidden" name="parent.level" value="<?php if(empty($data->parent_menu->level)){echo '0';}else{echo $data->parent_menu->level;}?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单图标：</label>
                    <input type="text" name="icon" value="<?php echo $data->icon;?>" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单链接：</label>
                    <input type="text" name="url" value="<?php echo $data->url;?>" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单标识：</label>
                    <input type="text" name="rel" value="<?php echo $data->rel;?>" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单排序：</label>
                    <input type="text" name="sort" class="form-control input-nm" value="<?php echo $data->sort;?>" size="35" data-toggle="spinner" data-min="0" data-max="100" data-step="1" data-rule="integer">
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