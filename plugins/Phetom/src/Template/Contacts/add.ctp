<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/contacts/add" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
                    <input type="text" name="name" value="" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">联系方式：</label>
                    <input type="text" name="tel" value="" size="35" class="form-control input-nm" data-rule="required">
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