<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/members/edit/<?php echo $member->id; ?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
			<input type='hidden' name='id' value = "<?php echo $member->id; ?>" >
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">用户名：</label>
                    <input type="text"  name="username" value="<?php echo $member->username;?>" size="25" class="form-control input-nm" data-rule="required">
					<span style="color:#ff0000;">*</span>
                </td>
            </tr>
			<tr>
                <td>
                    <label for="name" class="control-label x85">密码：</label>
                    <input type="text"  name="password" value="" size="25" class="form-control input-nm" >
                </td>
            </tr>
			<tr>
                <td>
                    <label for="name" class="control-label x85">手机号：</label>
                    <input type="text" name="tel" value="<?php echo $member->tel; ?>" size="25" class="form-control input-nm" >
                </td>
            </tr>

			<tr>
                <td>
                    <label for="name" class="control-label x85" >性别：</label>
                    <select name="sex" data-toggle="selectpicker" >
						<option value="1" <?php if ($member->sex == 1) echo "selected"; ?>>男</option>
						<option value="2" <?php if ($member->sex == 2) echo "selected"; ?>>女</option>
					</select>
                </td>
            </tr>

			<tr>
                <td>
                    <label for="name" class="control-label x85">邮箱：</label>
                    <input type="text" name="email" value="<?php echo $member->email; ?>" size="25" class="form-control input-nm" >
                </td>
            </tr>

			<tr>
                <td>
                    <label for="name" class="control-label x85" >会员状态：</label>
                    <select name="state" data-toggle="selectpicker" >
						<option value="1" <?php if ($member->state==1) echo "selected"; ?>>正常会员</option>
						<option value="2" <?php if ($member->state==2) echo "selected"; ?>>冻结会员</option>
					</select>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close">关闭</button></li>
        <li><button type="submit" class="btn-default">保存</button></li>
    </ul>
</div>