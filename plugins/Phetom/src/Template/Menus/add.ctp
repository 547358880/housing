<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/menus/add" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单名称：</label>
                    <input type="text" name="name" value="" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">上级菜单：</label>
                    <input type="text" name="parent.name" value="" class="form-control input-nm" data-title="查找上级菜单" size="35" data-toggle="lookup" data-url="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/menus/lookup" data-group="parent" data-width="800" data-height="600">
                    <input type="hidden" name="parent.id">
                    <input type="hidden" name="parent.level">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单图标：</label>
                    <input type="text" name="icon" value="" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单链接：</label>
                    <input type="text" name="url" value="" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单标识：</label>
                    <input type="text" name="rel" value="" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">菜单排序：</label>
                    <input type="text" name="sort" class="form-control input-nm" value="0" size="35" data-toggle="spinner" data-min="0" data-max="100" data-step="1" data-rule="integer">
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