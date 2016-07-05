<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/users/add" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">用户名称：</label>
                    <input type="text" name="username" value="" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
                    <input type="password" name="password" value="" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称：</label>
                    <input type="text" name="nicheng" value="" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td style="padding-top: 6px;padding-bottom: 6px;">
                    <label for="name" class="control-label x85">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label>
                    <input type="radio" name="sex" id="j_custom_sex1" data-toggle="icheck" value="1" data-rule="checked" checked data-label="男">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="sex" id="j_custom_sex2" data-toggle="icheck" value="2" data-label="女">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">联系方式：</label>
                    <input type="text" name="tel" value="" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">电子邮件：</label>
                    <input type="text" name="email" value="" size="35" class="form-control input-nm" data-rule="email">
                </td>
            </tr>
            <tr>
                <td style="padding-top: 6px;padding-bottom: 6px;">
                    <label for="name" class="control-label x85">管理员组：</label>
                    <select name="role_id"  data-toggle="selectpicker" >
                        <?php
                        foreach($roleData as $item) {
                            ?>
                            <option value="<?php echo $item->id;?>"  ><?php echo $item->name;?></option>
                            <?php
                        }
                        ?>
                    </select>
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