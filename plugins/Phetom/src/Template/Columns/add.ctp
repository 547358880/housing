<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/columns/add" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">栏目名称：</label>
                    <input type="text" name="name" value="" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">上级栏目：</label>
                    <input type="text" name="parent.name" value="<?php if(isset($data) && !empty($data->name)){echo $data->name;}?>" class="form-control input-nm" data-title="查找上级栏目" size="35" data-toggle="lookup" data-url="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/columns/lookup" data-group="parent" data-width="800" data-height="600">
                    <input type="hidden" name="parent.id" value="<?php if(isset($data) && !empty($data->id)){echo $data->id;}?>">
                    <input type="hidden" name="parent.level" value="<?php if(isset($data) && !empty($data->level)){echo $data->level;}?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">栏目拼音：</label>
                    <input type="text" name="pinyin" value="" size="35" class="form-control input-nm" >
                </td>
            </tr>
            <tr>
                <td style="padding-top: 6px;padding-bottom: 6px;">
                    <label for="name" class="control-label x85">栏目类型：</label>
                    <select name="type"  data-toggle="selectpicker" >
                        <?php
                        foreach($typeData as $key => $val) {
                            ?>
                            <option value="<?php echo $key;?>"  ><?php echo $val;?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">栏目排序：</label>
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