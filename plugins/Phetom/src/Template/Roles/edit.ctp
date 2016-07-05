<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/roles/edit/<?php echo $role->id?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <input type="hidden" name="id" value="<?php echo $role->id?>">
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称：</label>
                    <input type="text" name="name" value="<?php echo $role->name;?>" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">排&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;序：</label>
                    <input type="text" name="sort"  class="form-control input-nm" value="<?php echo $role->sort;?>" size="35" data-toggle="spinner" data-min="0" data-max="100" data-step="1" data-rule="integer">
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